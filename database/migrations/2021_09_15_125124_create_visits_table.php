<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('status')->default('منتظر');
            
            $table->bigInteger('doctor_id')->unsigned()->nullable();
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('set null');

            $table->bigInteger('nurse_id')->unsigned()->nullable();
            $table->foreign('nurse_id')->references('id')->on('nurses')->onDelete('set null');

            $table->bigInteger('patient_id')->unsigned()->nullable();
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('set null');

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
        Schema::dropIfExists('visits');
    }
}
