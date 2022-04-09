<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable=['nombre'];
    public $timestamps=false;
    // One To Many -Una categoria puede tener uno o muchos productos
    public function productos()
    {
        return $this->hasMany('App\Producto');
    }
}
