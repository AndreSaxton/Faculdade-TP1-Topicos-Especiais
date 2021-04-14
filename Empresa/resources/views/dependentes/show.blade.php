@extends('master')
@section('titulo','Dependente')
@section('corpo')

<div class="container">
		<h3>Dependente</h3>
		<div class="row">
			<div class="col-sm-6">
				<dl>
					<dt>Nome</dt>
					<dd>{{$dependentes->nome}}</dd>
					<dt>Parentesco</dt>
					<dd>{{$dependentes->parentesco_id}}</dd>
					<dt>Funcinário</dt>
					<dd>{{$dependentes->funcionario_id}}</dd>
				</dl>

				<form action="/dependente/{{$dependentes->id}}" method="post" onsubmit="return confirm('Confirma exclusão?')">
					@csrf
					@method('DELETE')
					<input type="submit" value="Excluir" class="btn btn-primary btn-sm">
					<a href="/dependente" class="btn btn-primary btn-sm">Voltar</a>
				</form>
			</div>
		</div>
	</div>

@endsection