<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("order_id");
            $table->unsignedBigInteger("user_id"); // Seeder
            $table->unsignedBigInteger("incoterm_id")->nullable();
            $table->unsignedBigInteger("currency_id")->nullable();
            $table->float("price")->nullable();
            $table->string("type");
            $table->text("description")->nullable();
            $table->string("city")->nullable();
            $table->integer("days")->nullable();
            $table->boolean("active")->default(0);
            $table->integer("active_days")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
