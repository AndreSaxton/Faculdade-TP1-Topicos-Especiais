<?php

namespace App\Http\Controllers;

use App\Tarefas;
use App\Funcionario;  // referencia o model Funcio´nario
use App\Projeto;  // referencia o model Funcio´nario
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    //
    public function index()
    {
        $Tarefas = Tarefas::paginate(10);
        // Aciona View, passando a ela coleção dos funcionários obtidos no BD   
        return View('tarefas.index')->with('Tarefas',$Tarefas); 
        
    }

    public function create()
    {
        //
        return View('tarefas.create');
    }

    public function store(Request $request)
    {
        //
        // Valida os dados em $request
        $this->validate($request,
            [
                'descricao' => 'required|max:100',    // nome obrigatório e no máximo 100 caracteres
                'projeto_id' => 'required|exists:projetos,id',
                'funcionario_id' => 'required|exists:departamentos,id',
                'dataInicio' => 'required',
                'dataTermino' => 'required'
            ],
            // mensagens de erro quando a validação falha.
            [
                'descricao.required' => 'Endereço é obrigatório',
                'projeto_id.required' => 'Endereço é obrigatório',
                'funcionario_id.required' => 'Endereço é obrigatório',
                'dataInicio.required' => 'Endereço é obrigatório',
                'dataTermino.required' => 'Endereço é obrigatório'
            ]
        );
        // Cria funcionário no BD
        Tarefas::create($request->all());
        // Redireciona para view que lista os funcionários cadastrados
        return redirect('/tarefas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tarefas  $projeto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return View('tarefas.show')->with('tarefa',Tarefas::find($id));
    }

    public function edit($id)
    {
        //
        return View('tarefas.edit')->with('tarefa',Tarefas::find($id))
                                   ->with('cFuncionarios', Funcionario::all())
                                   ->with('cProjetos', Projeto::all());
        // return View('tarefa.create')->with('cFuncionarios', Funcionario::all());

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tarefas  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,
            [
                'descricao' => 'required|max:100', // nome obrigatório e no máximo 100 caracteres
                'dataInicio' => 'required',          // dataInicio obrigatório e no máximo 100 caracteres
                'dataTermino' => 'required',          // dataInicio obrigatório e no máximo 100 caracteres
                'projeto_id' => 'required',
                'funcionario_id' => 'required'
            ],
            [
                'descricao.*' => 'Nome é obrigatório de tamanho máximo de 100 caracteres',
                'dataInicio.required' => 'Data de Início é obrigatório',
                'dataTermino.required' => 'Data de Termino é obrigatório',
                'projeto_id.required' => 'Projeto é obrigatório',
                'funcionario_id.required' => 'Gerente é obrigatório'
            ]
        );
        $tarefa = Tarefas::find($id);  // recupera tarefa do BD
        $tarefa->update($request->all());  // atualiza (grava) novos dados do tarefa
        return redirect('/tarefas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tarefas  $projeto
     * @return \Illuminate\Http\Tarefas
     */
    public function destroy($id)
    {
        //
        Tarefas::destroy($id);
        return redirect('/tarefas');
    }
}
