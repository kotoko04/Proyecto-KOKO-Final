<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'marcas';
    public $timestamps = false;

    protected $fillable = ['id', 'nombre','descripcion'];

    public function producto(){
        return $this->belongsTo(Producto::class,'id');
    }
}
