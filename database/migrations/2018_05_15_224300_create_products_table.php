<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('marca');
            $table->string('categoria');
            $table->text('descricaoProduto')->nullable();
            $table->unsignedInteger('amount')->default(0);
            $table->unsignedInteger('beforeAmount')->default(0);


            //$table->rememberToken();//guarda o tokem
            $table->timestamps();//guarada o tempo
            $table->softDeletes();//ser for apagado sera escondido
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
