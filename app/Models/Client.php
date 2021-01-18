<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable =[
        'nome',
        'razaosocial',
        'nomefantasia',
        'endereco',
        'cep',
        'bairro',
        'cidadeuf',
        'celular',
        'whatsapp',
        'fixo',
        'email',
        'pessoa',
        'cpf',
        'cnpj',
        'inscricao'
    ];
}
