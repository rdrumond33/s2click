<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {

            $table->increments('id');
            $table->string('nome');
            $table->string('cpfPaciente')->unique();
            $table->string('responsavel')->nullable();
            $table->string('Cpfresponsavel')->unique()->nullable();
            $table->enum('especiais', ['sim', 'nao']);
            $table->string('necessidade')->nullable();
            $table->text('receita')->nullable();
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
        Schema::dropIfExists('patients');
    }
}
