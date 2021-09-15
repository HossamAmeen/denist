<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->integer('priority')->default(100);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address')->nullable();
            $table->date('contract_date')->nullable();
            $table->date('contract_expired_date')->nullable();
            $table->string('email');
            $table->string('password');
            $table->string('phone');
            $table->string('store_name');
            $table->text('store_description')->nullable();
            $table->string('store_logo')->nullable();
            $table->string('store_background_image')->nullable();
            $table->string('company_registration_image')->nullable();
            $table->string('national_id_front_image')->nullable();
            $table->string('national_id_back_image')->nullable();
            $table->date('expiration_date')->nullable();
            $table->double('delivery')->default(0);
            $table->double('delivery_time')->default(0);
            $table->double('app_gain')->default(0);
            $table->enum('status' , ['pending','accept' , 'blocked'])->default('pending')->nullable();
            $table->string('block_reason')->nullable();
            $table->string('google_id')->nullable();
            $table->string('facebook_id')->nullable();
            $table->double('rating')->default(0)->nullable();
            $table->double('discount_ratio')->default(0);
            $table->double('client_ratio')->default(0);
            $table->double('client_vip_ratio')->default(0);

            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->bigInteger('city_id')->unsigned()->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
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
        Schema::dropIfExists('vendors');
    }
}
