<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderChoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      
        Schema::create('order_choices', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('name');
            $table->string('group_name');
            $table->double('price');
            $table->integer('quantity')->default(1);
            $table->bigInteger('order_item_id')->unsigned()->nullable();
            $table->foreign('order_item_id')->references('id')->on('order_items')->onDelete('set null');
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
        Schema::dropIfExists('order_choices');
    }
}
