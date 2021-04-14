<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    //
    protected $fillable = ['nome', 'orcamento', 'dataInicio', 'funcionario_id'];

    public function funcionarios(){
        return $this->belongsToMany('App\Funcionario');
    }
}
