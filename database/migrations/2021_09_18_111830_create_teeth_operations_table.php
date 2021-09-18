<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeethOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teeth_operations', function (Blueprint $table) {
            $table->id();
            $table->string('operation')->nullable();
            $table->bigInteger('patient_id')->unsigned()->nullable();
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('set null');

            $table->bigInteger('teeth_id')->unsigned()->nullable();
            $table->foreign('teeth_id')->references('id')->on('teeths')->onDelete('set null');

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
        Schema::dropIfExists('teeth_operations');
    }
}
