<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('patient_id');
            $table->index('patient_id');
            $table->foreign('patient_id')
              ->references('id')
              ->on('patients')
              ->onDelete('cascade');

            $table->unsignedBigInteger('doctor_id');
            $table->index('doctor_id');
            $table->foreign('doctor_id')
              ->references('id')
              ->on('doctors')
              ->onDelete('cascade');

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
        Schema::dropIfExists('appointments');
    }
}
