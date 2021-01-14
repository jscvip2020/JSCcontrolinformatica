<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    use HasFactory;
    protected $fillable =[
        'nome',
        'razaosocial',
        'nomefamtasia',
        'endereco',
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
