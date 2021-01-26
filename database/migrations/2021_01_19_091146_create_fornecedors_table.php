<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFornecedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedors', function (Blueprint $table) {
            $table->id();
            $table->string('razaosocial')->nullable();
            $table->string('nomefantasia')->nullable();
            $table->string('inscricao')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('contato');
            $table->string('endereco');
            $table->string('cep')->default('00000-000');
            $table->string('bairro');
            $table->string('cidadeuf');
            $table->string('fixo')->nullable();
            $table->string('celular')->nullable();
            $table->string('skype')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('fornecedors');
    }
}
