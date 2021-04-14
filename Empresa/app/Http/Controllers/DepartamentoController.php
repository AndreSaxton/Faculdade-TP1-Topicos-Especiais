<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;

class DepartamentoController extends Controller
{
    //
        // Lista funcionários cadastrados
        public function index()
        {
        //   return 'teste';
            // busca dois usuários por vez no BD
            $departamentos = Departamento::paginate(10);
            // Aciona View, passando a ela coleção dos funcionários obtidos no BD   
            return View('departamento.index')->with('departamentos',$departamentos); 
        }
    
        // Aciona a view que envia ao usuário o formulário para cadastro ne novo funcionário
        public function create()
        {
            return View('departamento.create');
        }
    
        // Valida os dados digitados pelo usuário no formulário e, se corretos, cria novo funcionário no BD
        // Dados digitados são obtidos no parâmetro objeto $request 
        public function store(Request $request)
        {
            // Valida os dados em $request
            $this->validate($request,
            [
                'nome' => 'required|max:100',    // nome obrigatório e no máximo 100 caracteres
                'sigla' => 'required|max:100',   // sigla obrigatório e no máximo 100 caracteres
            ],
            // mensagens de erro quando a validação falha.
            [
                'nome.*' => 'Nome é obrigatório de tamanho máximo de 100 caracteres',
                'sigla.*' => 'Sigla é obrigatório de tamanho máximo de 100 caracteres',
            ]
            );
            // Cria funcionário no BD
            Departamento::create($request->all());
            // Redireciona para view que lista os funcionários cadastrados
            return redirect('/departamento');
        }
    
        // Aciona view que apresenta os dados do funcionário conforme $id
        public function show($id)
        {
            return View('departamento.show')->with('departamento',Departamento::find($id));
        }
    
        // Aciona view que envia ao usuário formulário preenchido com os dados do funcionário conforme $id
        public function edit($id)
        {
            return View('departamento.edit')->with('departamento',Departamento::find($id));   
        }
    
        // Valida os dados alrerados pelo usuário (edição) e, se ok, atualiza funcionário no BD 
        public function update(Request $request, $id)
        {
            $departamentos = Departamento::find($id);  // recupera funcionário do BD
            $departamentos->update($request->all());  // atualiza (grava) novos dados do funcionário
            return redirect('/departamento');
        }
    
        // Exclui funcionário conforme $id
        public function destroy($id)
        {
            Departamento::destroy($id);
            return redirect('/departamento');
        }
    
}
