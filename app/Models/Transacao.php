<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Categoria;
use App\Models\Conta;

class Transacao extends Model
{
    use SoftDeletes;

    protected $table = 'transacoes';

    protected $fillable = ['descricao','categoria_id','user_id', 'conta_id', 'conta_id_transaction', 'data', 'valor', 'tipo'];
    protected $guarded = ['id', 'created_at', 'update_at', 'deleted_at'];

    public function categoria()
    {
    	return $this->belongsTo(Categoria::class);
    }

    public function conta()
    {
    	return $this->belongsTo(Conta::class);
    }

    public function conta_transfer()
    {
        return $this->belongsTo(Conta::class, 'conta_id_transaction', 'id');
    }
}
