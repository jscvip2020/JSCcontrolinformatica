<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('codbarra')->nullable();
            $table->enum('condicao',['Novo','Usado']);
            $table->string('nome');
            $table->text('descricao')->nullable();
            $table->integer('qtd');
            $table->decimal('valor_custo',8,2);
            $table->decimal('perc_lucro',8,2);
            $table->decimal('valor_final',8,2);
            $table->foreignId('fornecedor_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('fabricante_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->integer('min_estoque');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('produtos');
    }
}
