<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $fillable = ['nome','endereco','departamento_id', 'data_nascimento'];

    public function projetos(){
      return $this->hasMany('App\Projeto');
    }
    public function departamento(){
      return $this->belongsToMany('App\Departamento');
    }

    // metodo para obet a coleção dos documentos do funcionario
    public function documento(){
      return $this->hasMany('App\Documento');
    }
}

 
/*

  $funcionarios = Funcionario::all();

  Funcionario::create(['nome'=>'joao','endereco'=>'rua x 44']);

*/