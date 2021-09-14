<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Unit;
use App\Models\User;
use App\Models\Status;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Customer;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasRoles;

    protected $guarded = [];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'customer',
        'product_id',
        'status_id',
        'unit_id',
        'description',
        'quantity',
    ];
    /*
    protected $casts = [
        'is_featured' => 'boolean',
        'is_place' => 'boolean',
    ];
    */
    // Order Has One Author
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Order has One Unit as Have only One Product
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    // Order has One Production
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Order Has Many Offers
    public function offers(){
        return $this->hasMany(Offer::class);
    }

    // Order has One Status
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * Get all of the Order's comments.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Get all of the Order's deadlines.
     */
    public function deadlines()
    {
        return $this->morphMany(Deadline::class, 'deadlinable');
    }

    public function format()
    {
        // Repository Format
        Carbon::setLocale('en');


        $p_offer = $this->offers->where('type', 'p_offer')->first();
        $l_offer = $this->offers->where('type', 'l_offer')->first();


        $formatted = [
            "id" => $this->id,
            "user" => $this->user,
            "author" => $this->user->name,
            "customer" => $this->customer ?? null,
            "product" => $this->product ?? null,
            "unit" => $this->unit ?? null,
            "quantity" => $this->quantity,
            "description" => $this->description,
            "status" => $this->status->name_ge ?? null,
            "status_id" => $this->status->id ?? null,
            "row_color" => $this->status->row_color ?? null,
            "created_at" => $this->created_at->diffForHumans(),
            "updated_at" => $this->updated_at->diffForHumans(),
            "comments" => $this->comments->map->format(),
            "deadlines" => [
                "REQUEST_HANDLING" => $this->deadlines->where('deadline_type', 'REQUEST_HANDLING')->first()->deadline,
                "MANUFACTURING" => $this->deadlines->where('deadline_type', 'MANUFACTURING')->first()->deadline,
                "TRANSPORTATION" => $this->deadlines->where('deadline_type', 'TRANSPORTATION')->first()->deadline,
                "ORDER_HANDLING" => $this->deadlines->where('deadline_type', 'ORDER_HANDLING')->first()->deadline,
            ],
            $this->deadlines->map->format(),
            "p_offer" => $p_offer,
            "fp_offer" => ($p_offer !== null) ? $p_offer->format() : false,
            "l_offer" => $l_offer,
            "fl_offer" => ($l_offer !== null) ? $l_offer->format() : false,
        ];

        return json_decode(json_encode($formatted), FALSE);
    }

}