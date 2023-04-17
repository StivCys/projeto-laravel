<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadePeso extends Model
{
    //
    protected $table='unidades_peso';
    protected $fillable= ['unidade','descricao'];
}
