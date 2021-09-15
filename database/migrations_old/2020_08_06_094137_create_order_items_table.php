<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->double('price');
            $table->double('total_cost')->default(0);
            $table->double('choice_price')->default(0);
            $table->double('choice_price_after_discount')->default(0);
            $table->enum('status' , ['pending from client','sending from client','edit from vendor','accept from client' ,
            'cancelled from client' , 'accept from vendor', 'cancelled from vendor' ,'working' , 'delivering' , 'done','User returned product','vendor accept returned product','vendor rejects returned product'])->default('pending from client')->nullable();
            $table->string('refuse_reason')->default('');
            $table->double('discount');
            $table->double('discount_ratio');
            $table->boolean('is_vip')->default(0);
            $table->integer('quantity'); 
            $table->integer('over_quantity')->default(0);          
            $table->double('vendor_benefit')->default(0);
            $table->double('rating')->default(0)->nullable();
           
            $table->bigInteger('product_id')->unsigned()->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('set null');

            $table->bigInteger('vendor_id')->unsigned()->nullable();
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('set null');
            
            $table->bigInteger('client_id')->unsigned()->nullable();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('set null');


            $table->bigInteger('order_id')->unsigned()->nullable();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('set null');

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
        Schema::dropIfExists('order_items');
    }
}
