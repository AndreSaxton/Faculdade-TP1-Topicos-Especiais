<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    //
    protected $fillable = ['sigla', 'nome'];

    public function funcionarios(){
        return $this.hasMany('App\Funcionario');
    }
}
