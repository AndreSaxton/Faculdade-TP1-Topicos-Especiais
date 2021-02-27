@extends('master')
@section('titulo','Lista de Projetos')
@section('corpo')
<a href="/projeto/create" class="btn btn-primary btn-sm">Novo</a>
<table class="table table-striped">
<tr>
	<th>Nome</th>
	<th>Orçamento</th>
	<th>Data de Início</th>
	<th></th>
</tr>
<!-- Loop pela coleção de funcionários -->
@foreach($projetos as $f)
<tr>
	<td>{{$f->nome}}</td>
	<td>{{$f->orcamento}}</td>
	<td>{{$f->dataInicio}}</td>
	<td>
		<a href="/projeto/{{$f->id}}" class="btn btn-primary btn-sm">Detalhe</a>
		<a href="/projeto/{{$f->id}}/edit" class="btn btn-primary btn-sm">Editar</a>
	</td>
</tr> 
@endforeach
</table>
<!-- Botões de paginação -->
{{ $projetos->links() }}
@endsection