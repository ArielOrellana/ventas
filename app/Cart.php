<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
	protected $table='carts';
	protected $primaryKey='id';
    protected $fillable=['price','qty','product_name','session_id','product_id','id'];

}

