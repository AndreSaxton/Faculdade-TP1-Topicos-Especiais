@extends('master')
@section('titulo','Funcionário')
@section('corpo')
	<div class="container">
		<h3>Funcionário</h3>
		<div class="row">
			<div class="col-sm-6">
				<dl>
					<dt>Nome</dt>
					<dd>{{$funcionario->nome}}</dd>
					<dt>Data de Nascimento</dt>
					<dd>{{$funcionario->data_nascimento}}</dd>
					<dt>Endereço</dt>
					<dd>{{$funcionario->endereco}}</dd>
					<dt>Departamento</dt>
					<dd>{{$funcionario->departamento_id}}</dd>
				</dl>

				<h3>Documento</h3>
				@foreach($documentos as $d)
					<p><a href="/obterDocumento?nome={{$d->nomeArmazenamento}}" target="_blank">
					{{$d->nomeOriginal}}</a></p>
				@endforeach
				<form action="/funcionario/{{$funcionario->id}}" method="post" onsubmit="return confirm('Confirma exclusão?')">
					@csrf
					@method('DELETE')
					<input type="submit" value="Excluir" class="btn btn-primary btn-sm">
					<a href="/funcionario" class="btn btn-primary btn-sm">Voltar</a>
				</form>
			</div>
		</div>
	</div>
@endsection