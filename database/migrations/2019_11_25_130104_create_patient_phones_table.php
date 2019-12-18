<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientPhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_phones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ddd', 2);
            $table->string('numero', 10);
            $table->enum('tipo', array('fixo', 'celular', 'comercial'));
            $table->integer('patient_id')->unsigned();
            $table->foreign('patient_id')
                ->references('id')->on('patients')
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
        Schema::dropIfExists('patient_phones');
    }
}
