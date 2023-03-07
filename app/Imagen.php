<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table='imagen';
    protected $primaryKey='id';
    protected $fillable=['producto_id','image'];    //
}
