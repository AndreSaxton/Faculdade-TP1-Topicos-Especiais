<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('funcionario','FuncionarioController');

Route::get('/funcionario', 'FuncionarioController@index');

// Route::resource('funcionario', 'FuncionarioController@index');

Route::resource('projeto', 'ProjetoController');
Route::get('/projeto', 'ProjetoController@index');

Route::resource('departamento', 'DepartamentoController');

Route::resource('dependente', 'DependenteController');

//Usada para acionar o formulario usado pelo usuario para selecionar o documento PDF.
//Note o id do funcionario, ao qual o documento sendo carragado pertence, sendo fornecido na URL. Note que o
// método é GET. Esta rota aciona a função 'documento' do FuncionarioController
Route::get('funcionario/{id}/documento', 'FuncionarioController@documento');

//Usada paracionar a função documentoGravar do FuncionarioController que inserirá objeto Documento no BD,
// conforme dados entrados no formulario pelo usuario e armazenara o PDF em Storage.
Route::post('funcionario/documento', 'FuncionarioController@documentoGravar');

//Usada para obter um documento armazenado exemplificado pela URL a seguir.
//localhost:8000/documento?nome=abc.pdf
Route::get('obterDocumento', function(){
    return response()->file(storage_path("app/documento/".Request::get('nome')));
});

// Route::get('/tarefas', 'TarefaController@index');
Route::resource('tarefas', 'TarefaController');
