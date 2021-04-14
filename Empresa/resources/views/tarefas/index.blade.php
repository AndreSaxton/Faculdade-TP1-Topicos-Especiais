@extends('master')
@section('titulo','Lista de Tarefas')
@section('corpo')
<a href="/tarefas/create" class="btn btn-primary btn-sm">Novo</a>
<table class="table table-striped">
<tr>
	<th>ID</th>
	<th>Descrição</th>
	<th>Date de Inicio</th>
	<th>Data de Termino</th>
	<th>Projeto</th>
	<th>Funcinário</th>
	<th></th>
</tr>
<!-- Loop pela coleção de Tarefas -->
@foreach($Tarefas as $f)
<tr>
	<td>{{$f->id}}</td>
	<td>{{$f->descricao}}</td>
	<td>{{$f->dataInicio}}</td>
	<td>{{$f->dataTermino}}</td>
	<td>{{$f->projeto_id}}</td>
	<td>{{$f->funcionario_id}}</td>
	<td>
		<a href="/tarefas/{{$f->id}}" class="btn btn-primary btn-sm">Detalhe</a>
		<a href="/tarefas/{{$f->id}}/edit" class="btn btn-primary btn-sm">Editar</a>
	</td>
</tr> 
@endforeach
</table>
<!-- Botões de paginação -->
{{ $Tarefas->links() }}
@endsection