<?php

namespace App\Http\Controllers;

use App\Dependente;
use Illuminate\Http\Request;

class DependenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Dependentes = Dependente::paginate(10);
        // Aciona View, passando a ela coleção dos funcionários obtidos no BD   
        return View('dependentes.index')->with('Dependentes',$Dependentes); 
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('dependentes.create');
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
                'nome' => 'required|max:100',    // nome obrigatório e no máximo 100 caracteres
                'parentesco_id' => 'required|max:100', // endereço obrigatório e no máximo 100 caracteres
                'funcionario_id' => 'required|exists:departamentos,id'
            ],
            // mensagens de erro quando a validação falha.
            [
                'nome.*' => 'Nome é obrigatório de tamanho máximo de 100 caracteres',
                'parentesco_id.required' => 'Endereço é obrigatório',
                'funcionario_id.required' => 'Endereço é obrigatório'
            ]
        );
        // Cria funcionário no BD
        Dependente::create($request->all());
        // Redireciona para view que lista os funcionários cadastrados
        return redirect('/dependente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dependente  $dependente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // $dependente = Dependente::find($id);
        // return View('dependentes.show')->with('dependentes',Dependente::find($dependente));
        return View('dependentes.show')->with('dependentes',Dependente::find($id));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dependente  $dependente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // $dependente = Dependente::find($id);
        // return View('dependentes.edit')->with('dependentes',Dependente::find($dependentes));   
        return View('dependentes.edit')->with('dependentes',Dependente::find($id));   

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dependente  $dependente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $dependente = Dependente::find($id);  // recupera funcionário do BD
        $dependente->update($request->all());  // atualiza (grava) novos dados do funcionário
        return redirect('/dependente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dependente  $dependente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Dependente::destroy($id);
        return redirect('/dependente');
    }
}
