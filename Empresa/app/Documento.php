<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    // Definiar as propriedades da Model
    protected $fillable = ['nomeOriginal', 'nomeArmazenamento', 'funcionario_id'];

    // Nao havera as propriedades create_at e updated_at
    public $timestamps = false;
}
