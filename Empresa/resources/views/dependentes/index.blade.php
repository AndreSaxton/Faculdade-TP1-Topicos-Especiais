@extends('master')
@section('titulo','Lista de Dependentes')
@section('corpo')
<a href="/dependente/create" class="btn btn-primary btn-sm">Novo</a>
<table class="table table-striped">
<tr>
	<th>ID</th>
	<th>Nome</th>
	<th>Parentesco</th>
	<th>Funcinário</th>
	<th></th>
</tr>
<!-- Loop pela coleção de dependentes -->
@foreach($Dependentes as $f)
<tr>
	<td>{{$f->id}}</td>
	<td>{{$f->nome}}</td>
	<td>{{$f->parentesco_id}}</td>
	<td>{{$f->funcionario_id}}</td>
	<td>
		<a href="/dependente/{{$f->id}}" class="btn btn-primary btn-sm">Detalhe</a>
		<a href="/dependente/{{$f->id}}/edit" class="btn btn-primary btn-sm">Editar</a>
	</td>
</tr> 
@endforeach
</table>
<!-- Botões de paginação -->
{{ $Dependentes->links() }}
@endsection