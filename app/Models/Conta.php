<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Transacao;

class Conta extends Model
{
	use SoftDeletes;
	
    protected $fillable = ['name','user_id','saldo_inicial','saldo_atual'];
    protected $guarded = ['id', 'created_at', 'update_at'];

    public function transacoes()
    {
    	return $this->hasMany(Transacao::class);
    }
    
}
