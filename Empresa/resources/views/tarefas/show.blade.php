@extends('master')
@section('titulo','Tarefas')
@section('corpo')
	<div class="container">
		<h3>Tarefa</h3>
		<div class="row">
			<div class="col-sm-6">
				<dl>
					<dt>ID</dt>
					<dd>{{$tarefa->id}}</dd>
					<dt>Descrição</dt>
					<dd>{{$tarefa->descricao}}</dd>
					<dt>Projeto</dt>
					<dd>{{$tarefa->projeto_id}}</dd>
					<dt>Funcionario</dt>
					<dd>{{$tarefa->funcionario_id}}</dd>
          <dt>Data de Inicio</dt>
					<dd>{{$tarefa->dataInicio}}</dd>
					<dt>Data de Termino</dt>
					<dd>{{$tarefa->dataTermino}}</dd>
				</dl>
				<form action="/tarefas/{{$tarefa->id}}" method="post" onsubmit="return confirm('Confirma exclusão?')">
					@csrf
					@method('DELETE')
					<input type="submit" value="Excluir" class="btn btn-primary btn-sm">
					<a href="/tarefas" class="btn btn-primary btn-sm">Voltar</a>
				</form>
			</div>
		</div>
	</div>
@endsection