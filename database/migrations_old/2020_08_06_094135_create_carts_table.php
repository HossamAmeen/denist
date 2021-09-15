<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_done' )->default(false);
            $table->double('total_cost');
            // $table->double('discount');
            // $table->double('discount_ratio');
            // $table->boolean('is_vip')->default(0);
            // $table->integer('quantity'); 
            // $table->integer('over_quantity')->default(0);
            $table->date('date')->nullable();

            
            // $table->bigInteger('client_address_id')->unsigned()->nullable();
            // $table->foreign('client_address_id')->references('id')->on('client_addresses')->onDelete('set null');
            
            $table->bigInteger('client_id')->unsigned()->nullable();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('set null');
            
            $table->bigInteger('product_id')->unsigned()->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
