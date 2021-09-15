<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->double('price')->default(0);
            // $table->double('total_cost')->default(0);
            $table->double('delivery_cost')->default(0);
            $table->double('discount_ratio');
            $table->double('total_discount')->default(0);
            $table->enum('status' , ['pending from client','sending from client','edit from vendor','accept from client' ,
            'cancelled from client' , 'accept from vendor', 'cancelled from vendor' ,'working' , 'delivering' , 'done','User returned product',
            'vendor accept returned product','vendor rejects returned product'])->default('pending from client')->nullable();
            $table->string('refuse_reason')->default('');
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->double('vendor_benefit')->default(0);

            $table->boolean('is_vip')->default(0);
            // $table->double('rating')->default(0)->nullable();
            $table->boolean('isWithDelivery')->default(0);
            // $table->bigInteger('product_id')->unsigned()->nullable();
            // $table->foreign('product_id')->references('id')->on('products')->onDelete('set null');

            $table->bigInteger('vendor_id')->unsigned()->nullable();
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('set null');

            $table->bigInteger('client_id')->unsigned()->nullable();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('set null');

            $table->bigInteger('cart_id')->unsigned()->nullable();
            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('set null');

            $table->bigInteger('client_address_id')->unsigned()->nullable();
            $table->foreign('client_address_id')->references('id')->on('client_addresses')->onDelete('set null');

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
        Schema::dropIfExists('orders');
    }
}
