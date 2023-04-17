<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    //
    protected $fillable= ['nome','descricao','peso','unidade_id','unidade_peso_id'];
}
