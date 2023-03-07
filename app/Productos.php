<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table='productos';
    protected $primaryKey='id';
    protected $fillable=['codigo','nombre','descripcion','modelo','stock','precio','categoria_id', 'image'];//image
    public function categoria()
    {
    	return $this->belongsTo(Categoria::class,'categoria_id','id');
    }
}

