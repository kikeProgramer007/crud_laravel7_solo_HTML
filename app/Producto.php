<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable=['descricion','precio','id_categoria'];
    public $timestamps = false;
    // RELACION DE UNO A MUCHOS
    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

}
