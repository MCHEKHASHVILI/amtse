<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderRepository
{
    protected $deadline_types, $default_offers;

    public function __construct()
    {
        $this->deadline_types = 
        [
            "REQUEST_HANDLING",
            "MANUFACTURING",
            "TRANSPORTATION",
            "ORDER_HANDLING",
        ];

        $this->default_offers = 
        [
            [
                "type" => "p_offer",
                "user_id" => Auth::id() ?? 1,
                "price" => 0,
                "description" => "",
                "city" => "",
                "currency_id" => null,
                "incoterm_id" => null,
                "days" => null,
            ],
            [
                "type" => "l_offer",
                "user_id" => Auth::id() ?? 1,
                "price" => 0,
                "description" => "",
                "city" => "",
                "currency_id" => null,
                "incoterm_id" => null,
                "days" => null,
            ],  
        ];
    }
    

    public function all()
    {
        return Order::orderBy("created_at", "desc")
            ->get()
            ->map->format();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  $data
     * @return \Illuminate\Http\Response
     */
    public function store($data)
    {
        
        /**
         * Collect Data
         * Order Data
        **/

        // Order Data
        $order = [
            'user_id' => Auth::id(),
            'customer' => $data['customer'],
            'product_id' => $data['product_id'],
            'unit_id' => $data['unit_id'],
            'quantity' => $data['quantity'],
            'description' => $data['description'],
        ];
    
        // Create Order
        $order = Order::create($order);
        // Deadline Types
        
        // Loop Through Deadlines
        foreach($this->deadline_types as $type)
        {
            $order->deadlines()->create(["deadline_type" => $type, "deadline" => $data[$type] ?? Carbon::today()]);
        }
 
        // Loop Through Offers
        /*
        foreach($this->default_offers as $offer)
        {
            // Create Default Offers
            $order->offers()->create($offer);
        }
        */
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $data
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($data, $id)
    {
        // Get The Order
        $order = Order::findOrFail($id);

        // Collect The Data
        $updated = [
            'user_id' => Auth::id(),
            'customer' => $data['customer'],
            'product_id' => $data['product_id'],
            'unit_id' => $data['unit_id'],
            'quantity' => $data['quantity'],
            'description' => $data['description'],
        ];
        
        // Loop Through Deadlines
        foreach($this->deadline_types as $type)
        {
            // Check Requested Deadlines
            if($data->has($type)){
                // Update Deadline
                $deadline = $order->deadlines()->where("deadline_type", $type)->first();
                $deadline->deadline = $data[$type];
                $deadline->save();
            }
        }
        // Update Order
        return $order->update($updated);
    }

    /**
     * Same Function as Store But for Seeder (without Request Class)
     */
    public function seeder_store($data)
    {
        
        // Order Data
        $order = [
            'user_id' => 1,
            'customer' => $data['customer'],
            'product_id' => $data['product_id'],
            'unit_id' => $data['unit_id'],
            'quantity' => $data['quantity'],
            'description' => $data['description'],
        ];
      
        // Create Order
        $order = Order::create($order);
        // Deadline Types
        
        // Loop Through Deadlines
        foreach($this->deadline_types as $type)
        {
            $order->deadlines()->create(["deadline_type" => $type, "deadline" => $data["REQUEST_HANDLING"] ?? Carbon::today()]);
        }

        // Loop Through Offers
        /*
        foreach($this->default_offers as $offer)
        {
            // Create Default Offers
            $order->offers()->create($offer);
        }
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Return Order
        return Order::findOrFail($id)->format();
    }



}