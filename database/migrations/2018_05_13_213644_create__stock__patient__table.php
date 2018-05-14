<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockPatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_patient', function (Blueprint $table) {

            $table->unsignedinteger('patient_id');
            $table->unsignedinteger('stock_id')->unsigned();

            $table->primary(['stock_id','patient_id']); //chave primaria composta

            $table->foreign('patient_id')->references('id')->on('patients')
                ->onUpdated('cascade')
                ->onDelete('cascade');

            $table->foreign('stock_id')->references('id')->on('stocks')
                ->onUpdated('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_patient');
    }
}
