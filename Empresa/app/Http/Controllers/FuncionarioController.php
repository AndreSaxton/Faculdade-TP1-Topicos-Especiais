<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Funcionario;  // referencia o model Funcio´nario
use App\Departamento;
use App\Http\Requests\FuncionarioRequest;

class FuncionarioController extends Controller
{
    // Lista funcionários cadastrados
    public function index()
    {
        // busca dois usuários por vez no BD
        $funcionarios = Funcionario::paginate(2);
        // Aciona View, passando a ela coleção dos funcionários obtidos no BD   
        return View('funcionario.index')->with('funcionarios',$funcionarios); 
    }

    // Aciona a view que envia ao usuário o formulário para cadastro ne novo funcionário
    public function create()
    {
        // return View('funcionario.create');
        return View('funcionario.create')->with('cDepartamentos', Departamento::all());
    }

    // Valida os dados digitados pelo usuário no formulário e, se corretos, cria novo funcionário no BD
    // Dados digitados são obtidos no parâmetro objeto $request 
    // public function store(Request $request)
    public function store(FuncionarioRequest $request)
    {
        //Validações agora estão no FuncionarioRequest
        // Valida os dados em $request
        // $this->validate($request,
        //     [
        //         'nome' => 'required|max:100',    // nome obrigatório e no máximo 100 caracteres
        //         'endereco' => 'required|max:100', // endereço obrigatório e no máximo 100 caracteres
        //         'departamento_id' => 'required|exists:departamentos,id'
        //     ],
        //     // mensagens de erro quando a validação falha.
        //     [
        //         'nome.*' => 'Nome é obrigatório de tamanho máximo de 100 caracteres',
        //         'endereco.required' => 'Endereço é obrigatório',
        //         'endereco.max' => 'Endereço deve ter tamanho máximo de 100 caracteres',
        //         'departamento_id' => 'Departamento invalido'
        //     ]
        // );
        // Cria funcionário no BD
        Funcionario::create($request->all());
        // Redireciona para view que lista os funcionários cadastrados
        return redirect('/funcionario');
    }

    // Aciona view que apresenta os dados do funcionário conforme $id
    public function show($id)
    {
        $funcionario = Funcionario::find($id);
        $projetos = $funcionario->projetos()->get();
        return View('funcionario.show')->with('funcionario',$funcionario)->with('proj',$projetos)->with('documentos', $funcionario->documento()->get());

        // return View('funcionario.show')->with('funcionario',Funcionario::find($id));
    }

    // Aciona view que envia ao usuário formulário preenchido com os dados do funcionário conforme $id
    public function edit($id)
    {
        return View('funcionario.edit')->with('funcionario',Funcionario::find($id));   
    }

    // Valida os dados alrerados pelo usuário (edição) e, se ok, atualiza funcionário no BD 
    // public function update(Request $request, $id)
    public function update(FuncionarioRequest $request, $id)
    {
        //Validações agora estão no FuncionarioRequest
        // $this->validate($request,
        //     [
        //         'nome' => 'required|max:100',
        //         'endereco' => 'required|max:100'
        //     ],
        //     [
        //         'nome.*' => 'Nome é obrigatório de tamanho máximo de 100 caracteres',
        //         'endereco.required' => 'Endereço é obrigatório',
        //         'endereco.max' => 'Endereço deve ter tamanho máximo de 100 caracteres'
        //     ]
        // );
        $funcionario = Funcionario::find($id);  // recupera funcionário do BD
        $funcionario->update($request->all());  // atualiza (grava) novos dados do funcionário
        return redirect('/funcionario');
    }

    // Exclui funcionário conforme $id
    public function destroy($id)
    {
        Funcionario::destroy($id);
        return redirect('/funcionario');
    }


    //Conforme rota em web.php, é acionado por URL como a exemplificada abaixo?
    //localhost:8000/funcionario/34/documento
    //Onde 34 é o id do funcionario para o qual um documento esta sendo carregado
    public function documento($id){
        // Aciona View que gera o formulario usado para seleção do arquivo PDF
        return View('funcionario.documento')->with('id', $id);
    }

    //Conforme rota em web.php é acionado por post de funcionario
    // Dados do formulario, tais como o arquivo sendo uploaded estao em $request
    public function documentoGravar(Request $request)
    {
        // Nestas validações é verificado se funcionario_id em funcionarios.id
        // e é verificado se arquivo existe, é PDF e de tamanho maximo de 512KB.
        $this->validate($request, 
            [
                'funcionario_id' => 'required|exists:funcionarios,id',
                'arquivo' => 'required|file|max:512|mimes:pdf',
            ],
            [
                'funcionario_id' => 'funcionario nao localizado',
                'arquivo' => 'Arquivo PDF de no mazimo 512 bytes',
            ]
        );
        
        // Verifica se o arquivo existe e é valido (redundante com as validações)
        if($request->hasFile('arquivo') && $request->file('arquivo')->isValid()){
            // Cria noe interno para o arquivo gerando um indentificador unico (uniqid) e com a mesma extensção do arquivo orignal
            $nomearq = uniqid('XYZ').'.'.$request->file('arquivo')->extension();
            
            // Grava arquivo na pasta storage/app/documentos
            $request->file('arquivo')->storeAs('documentos', $nomearq);

            // Grava novo objeto documento no BD
            \App\Documento::create(['nomeOriginal'=>$request->file('arquivo')->getClientOriginalName(),
            'nomeArmazenamento'=>$nomearq, 'funcionario_id'=>$request->input('funcionario_id')]);

        }

        return redirect('/funcionario'); //Volta para listagens de usuarios (index)
    }

}
