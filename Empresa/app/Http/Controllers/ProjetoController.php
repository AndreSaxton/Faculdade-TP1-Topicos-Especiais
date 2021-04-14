<?php

namespace App\Http\Controllers;

use App\Projeto;
use App\Funcionario;  // referencia o model Funcio´nario

use Illuminate\Http\Request;

class ProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // busca dois usuários por vez no BD
        $projetos = Projeto::paginate(2);
        // Aciona View, passando a ela coleção dos projetos obtidos no BD   
        return View('projeto.index')->with('projetos',$projetos); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return View('projeto.create');
        return View('projeto.create')->with('cFuncionarios', Funcionario::all());


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // Valida os dados em $request
        $this->validate($request,
            [
                'nome'       => 'required|max:100', // nome obrigatório e no máximo 100 caracteres
                'orcamento'  => 'required',         // orcamento obrigatório e no máximo 100 caracteres
                'dataInicio' => 'required'          // dataInicio obrigatório e no máximo 100 caracteres
            ],
            // mensagens de erro quando a validação falha.
            [
                'nome.*' => 'Nome é obrigatório de tamanho máximo de 100 caracteres',
                'orcamento.required' => 'Orçamento é obrigatório',
                'dataInicio.required' => 'Data de Início é obrigatório'
            ]
        );
        // Cria projeto no BD
        Projeto::create($request->all());
        // Redireciona para view que lista os projetos cadastrados
        return redirect('/projeto');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return View('projeto.show')->with('projeto',Projeto::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return View('projeto.edit')->with('projeto',Projeto::find($id))->with('cFuncionarios', Funcionario::all());   
        // return View('projeto.create')->with('cFuncionarios', Funcionario::all());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,
            [
                'nome'       => 'required|max:100', // nome obrigatório e no máximo 100 caracteres
                'orcamento'  => 'required',         // orcamento obrigatório e no máximo 100 caracteres
                'dataInicio' => 'required'          // dataInicio obrigatório e no máximo 100 caracteres
            ],
            [
                'nome.*' => 'Nome é obrigatório de tamanho máximo de 100 caracteres',
                'orcamento.required' => 'Orçamento é obrigatório',
                'dataInicio.required' => 'Data de Início é obrigatório',
            ]
        );
        $projeto = Projeto::find($id);  // recupera projeto do BD
        $projeto->update($request->all());  // atualiza (grava) novos dados do projeto
        return redirect('/projeto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Projeto::destroy($id);
        return redirect('/projeto');
    }
}
