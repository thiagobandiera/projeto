<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogRegistro extends Model
{
    protected $fillable = ['tabela', 'operacao', 'dado_anterior', 'dado_posterior', 'chave', 'usuario', 'user_id'];
}
