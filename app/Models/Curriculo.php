<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculo extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'email', 'telefone', 'cargo', 'escolaridade', 'observacoes', 'arquivo', 'ip', 'data_hora_envio'];
}