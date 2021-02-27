@extends('master')
@section('titulo','Projetos')
@section('corpo')
	<div class="container">
		<h3>Projetos</h3>
		<div class="row">
			<div class="col-sm-6">
				<dl>
					<dt>Nome</dt>
					<dd>{{$projeto->nome}}</dd>
					<dt>Orçamento</dt>
					<dd>{{$projeto->orcamento}}</dd>
          <dt>Data de Inicio</dt>
					<dd>{{$projeto->dataInicio}}</dd>
				</dl>
				<form action="/projeto/{{$projeto->id}}" method="post" onsubmit="return confirm('Confirma exclusão?')">
					@csrf
					@method('DELETE')
					<input type="submit" value="Excluir" class="btn btn-primary btn-sm">
					<a href="/projeto" class="btn btn-primary btn-sm">Voltar</a>
				</form>
			</div>
		</div>
	</div>
@endsection