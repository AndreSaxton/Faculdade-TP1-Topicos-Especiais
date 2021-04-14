@extends('master')
@section('titulo','Lista de Departamentos')
@section('corpo')
<a href="/departamento/create" class="btn btn-primary btn-sm">Novo</a>
<table class="table table-striped">
<tr>
	<th>ID</th>
	<th>Sigla</th>
	<th>Departamento</th>
	<th></th>
</tr>
<!-- Loop pela coleção de funcionários -->
@foreach($departamentos as $f)
<tr>
	<td>{{$f->id}}</td>
	<td>{{$f->sigla}}</td>
	<td>{{$f->nome}}</td>
	<td>
		<a href="/departamento/{{$f->id}}" class="btn btn-primary btn-sm">Detalhe</a>
		<a href="/departamento/{{$f->id}}/edit" class="btn btn-primary btn-sm">Editar</a>
	</td>
</tr> 
@endforeach
</table>
<!-- Botões de paginação -->
{{ $departamentos->links() }}
@endsection