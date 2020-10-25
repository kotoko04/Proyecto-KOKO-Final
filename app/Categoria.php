<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'categorias';
    public $timestamps = false;

    protected $fillable = ['id', 'descripcion','estado'];

    public function producto(){
        return $this->belongsTo(Producto::class,'id');
    }
}
