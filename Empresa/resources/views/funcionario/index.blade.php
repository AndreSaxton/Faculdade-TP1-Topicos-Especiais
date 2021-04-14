@extends('master')
@section('titulo','Lista de Funcionários')
@section('corpo')
<a href="/funcionario/create" class="btn btn-primary btn-sm">Novo</a>
<table class="table table-striped">
<tr>
	<th>Nome</th>
	<th>Endereço</th>
	<th>Departamento</th>
	<th>Data de Nascimento</th>
	<th></th>
</tr>
<!-- Loop pela coleção de funcionários -->
@foreach($funcionarios as $f)
<tr>
	<td>{{$f->nome}}</td>
	<td>{{$f->endereco}}</td>
	<td>{{$f->belongsTo('App\Departamento','departamento_id','id')->first()->nome  }}</td>
	<td>{{$f->data_nascimento}}</td>
	<td>
		<a href="/funcionario/{{$f->id}}" class="btn btn-primary btn-sm">Detalhe</a>
		<a href="/funcionario/{{$f->id}}/edit" class="btn btn-primary btn-sm">Editar</a>
		<a href="/funcionario/{{$f->id}}/documento" class="btn btn-primary btn-sm">Documento</a>
	</td>
</tr> 
@endforeach
</table>
<!-- Botões de paginação -->
{{ $funcionarios->links() }}
@endsection