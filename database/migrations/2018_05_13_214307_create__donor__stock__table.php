<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonorStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donor_stock', function (Blueprint $table) {
            $table->unsignedinteger('donor_id');
            $table->unsignedinteger('stock_id')->unsigned();

            $table->primary(['stock_id','donor_id']); //chave primaria composta

            $table->foreign('donor_id')->references('id')->on('donors')
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
        Schema::dropIfExists('donor_stock');
    }
}
