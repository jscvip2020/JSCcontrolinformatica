<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'marca_id',
        'nome',
        'modelo',
        'descricao'
    ];


    public function marca(){
        return $this->belongsTo(Marca::class);
    }
}
