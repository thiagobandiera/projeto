<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{

	use SoftDeletes;
	
    protected $fillable = ['name','categoria_id','user_id'];
    protected $guarded = ['id', 'created_at', 'update_at'];

    public function categoriaPai()
    {
        return $this->belongsTo(Categoria::class,'categoria_id', 'id');
    }

    public function categoriaFilho()
    {
        return $this->hasMany(Categoria::class,'categoria_id', 'id');
    }

}
