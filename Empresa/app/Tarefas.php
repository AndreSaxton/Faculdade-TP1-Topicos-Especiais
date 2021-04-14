<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarefas extends Model
{
    //
    protected $fillable = ['descricao', 'dataInicio', 'dataTermino', 'projeto_id', 'funcionario_id'];       
}
