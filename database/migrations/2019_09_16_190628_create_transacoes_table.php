<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descricao');
            $table->bigInteger('categoria_id')->nullable()->unsigned();  
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('conta_id');
            $table->foreign('conta_id')->references('id')->on('contas');
            $table->BigInteger("conta_id_transaction", false, true)->nullable();   
            $table->foreign('conta_id_transaction')->references('id')->on('contas');
            $table->date('data');
            $table->double('valor', 8, 2);
            $table->enum('tipo', ['I', 'O', 'T']);
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
        Schema::dropIfExists('transacoes');
    }
}
