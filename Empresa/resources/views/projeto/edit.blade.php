@extends('master')
@section('titulo','Editar Projeto')
@section('corpo')
	<div class="container">
		<h3>Novo Projeto</h3>
		<div class="row">
			<div class="col-sm-6">
				<form action="/projeto/{{$projeto->id}}" method="post">

					@csrf  <!-- token de segurança -->
					@method('PUT') <!-- para acionar a função update do controller -->
					<div class="form-group">
						<label for="nome">Nome</label>
						<input type="text" name="nome" id="nome" class="form-control" value="{{empty(old('nome')) ? $projeto->nome : old('nome')}}"/>
						@if($errors->has('nome'))
						<p class="text-danger">{{$errors->first('nome')}}</p>
						@endif	
					</div>
					<div>
						<label for="funcionario_id">Gerente</label>
						<select name='funcionario_id' id='funcionario_id'>
							@foreach($cFuncionarios as $d)
								<option value="{{$d->id}}">{{$d->nome}}</option>
							@endforeach
						</select>
					</div>
					<div>
						<label for="orcamento">Orçamento</label>
						<input type="number(2)" name="orcamento" id="orcamento" class="form-control" value="{{empty(old('orcamento')) ? $projeto->orcamento : old('orcamento')}}"/>
						@if($errors->has('orcamento'))
						<p class="text-danger">{{$errors->first('orcamento')}}</p>
						@endif
					</div>
					<div>
						<label for="dataInicio">Data de Início</label>
						<input type="date" name="dataInicio" id="dataInicio" class="form-control" value="{{empty(old('dataInicio')) ? $projeto->dataInicio : old('dataInicio')}}"/>
						@if($errors->has('dataInicio'))
						<p class="text-danger">{{$errors->first('dataInicio')}}</p>
						@endif
					</div>
		    		<input type="submit" value="Alterar" class="btn btn-primary btn-sm"/>
		    		<a href="/projeto" class="btn btn-primary btn-sm">Voltar</a>

				</form>
			</div>
		</div>
	</div>
@endsection