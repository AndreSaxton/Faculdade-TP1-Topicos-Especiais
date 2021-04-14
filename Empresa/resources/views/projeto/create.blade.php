@extends('master')
@section('titulo','Criar Projeto')
@section('corpo')
	<div class="container">
		<h3>Novo Projeto</h3>
		<div class="row">
			<div class="col-sm-6">
				<form action="/projeto" method="post">
					@csrf  <!-- token de segurança -->

					<div class="form-group">
						<label for="nome">Nome</label>
						<input type="text" name="nome" id="nome" class="form-control" value="{{old('nome')}}"/>
						@if($errors->has('nome'))
						<p class="text-danger">{{$errors->first('nome')}}</p>
						@endif
					</div>
					<div>
						<label for="orcamento">Orçamento</label>
						<input type="number(2)" name="orcamento" id="orcamento" class="form-control" value="{{old('orcamento')}}"/>
						@if($errors->has('orcamento'))
						<p class="text-danger">{{$errors->first('orcamento')}}</p>
						@endif
					</div>
          <div>
						<label for="dataInicio">Data de Início</label>
						<input type="date" name="dataInicio" id="dataInicio" class="form-control" value="{{old('dataInicio')}}"/>
						@if($errors->has('dataInicio'))
						<p class="text-danger">{{$errors->first('dataInicio')}}</p>
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

		    		<input type="submit" value="Criar" class="btn btn-primary btn-sm"/>
		    		<a href="/projeto" class="btn btn-primary btn-sm">Voltar</a>
				</form>
			</div>
		</div>
	</div>
@endsection