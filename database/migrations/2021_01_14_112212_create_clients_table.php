<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('razaosocial')->nullable();
            $table->string('nomefamtasia')->nullable();
            $table->string('endereco');
            $table->string('bairro');
            $table->string('cidadeuf');
            $table->string('celular')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('fixo')->nullable();
            $table->string('email')->nullable();
            $table->string('pessoa');
            $table->string('cpf')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('inscricao')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
