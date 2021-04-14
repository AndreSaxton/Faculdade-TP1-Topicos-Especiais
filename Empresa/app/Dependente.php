<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependente extends Model
{
    //
    protected $fillable = ['nome','parentesco_id','funcionario_id'];

}
