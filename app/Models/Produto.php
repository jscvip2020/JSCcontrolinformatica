<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'codbarra',
        'condicao',
        'nome',
        'descricao',
        'qtd',
        'valor_custo',
        'perc_lucro',
        'valor_final',
        'fornecedor_id',
        'fabricante_id',
        'min_estoque',
        'status',
    ];


    public function fabricante()
    {
        return $this->belongsTo(Fabricante::class);
    }

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }
}
