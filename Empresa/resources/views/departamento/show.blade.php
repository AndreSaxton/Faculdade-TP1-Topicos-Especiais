@extends('master')
@section('titulo','Departamento')
@section('corpo')

<div class="container">
		<h3>Departamento</h3>
		<div class="row">
			<div class="col-sm-6">
				<dl>
					<dt>Sigla</dt>
					<dd>{{$departamento->sigla}}</dd>
					<dt>Nome</dt>
					<dd>{{$departamento->nome}}</dd>
				</dl>

				<form action="/departamento/{{$departamento->id}}" method="post" onsubmit="return confirm('Confirma exclusão?')">
					@csrf
					@method('DELETE')
					<input type="submit" value="Excluir" class="btn btn-primary btn-sm">
					<a href="/departamento" class="btn btn-primary btn-sm">Voltar</a>
				</form>
			</div>
		</div>
	</div>

@endsection