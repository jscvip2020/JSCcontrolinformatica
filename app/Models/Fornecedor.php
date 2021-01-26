<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $fillable = [
        'razaosocial',
        'nomefantasia',
        'cnpj',
        'inscricao',
        'contato',
        'endereco',
        'cep',
        'bairro',
        'cidadeuf',
        'celular',
        'whatsapp',
        'skype',
        'fixo',
        'email',

    ];
    use HasFactory;
}
