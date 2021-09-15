<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_cards', function (Blueprint $table) {
            $table->id(); 
            $table->string('number');
            // $table->double('value');
            $table->string('user_name')->nullable();
            $table->string('user_email')->nullable();
            $table->boolean('is_used')->default(false);
            $table->string('user_table')->nullable();
            $table->date('date')->nullable();
            $table->bigInteger('benefactor_id')->unsigned()->nullable();
           
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
        Schema::dropIfExists('shipping_cards');
    }
}
