<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->default('');
            $table->string('last_name')->default('');
            $table->string('gender')->default('');
            $table->string('email')->default('');
            $table->string('password')->default('');
            $table->string('phone')->default('');
            $table->string('image')->nullable();
            $table->enum('status' , ['pending','accept' , 'blocked'])->default('pending')->nullable();
            $table->string('block_reason')->default('');
            $table->text('google_id')->nullable();
            $table->text('facebook_id')->nullable();
            $table->double('rating')->default(0);
            $table->date('entered_date')->nullable();
            $table->boolean('is_vip')->default(0);
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
        Schema::dropIfExists('clients');
    }
}
