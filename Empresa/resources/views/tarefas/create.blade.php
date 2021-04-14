@extends('master')
@section('titulo','Criar Tarefa')
@section('corpo')
	<div class="container">
		<h3>Novo Tarefa</h3>
		<div class="row">
			<div class="col-sm-6">
				<form action="/tarefas" method="post">
					@csrf  <!-- token de segurança -->
					<div class="form-group">
						<label for="descricao">Descrição</label>
						<input type="text" name="descricao" id="descricao" class="form-control" value="{{old('descricao')}}"/>
						@if($errors->has('descricao'))
						<p class="text-danger">{{$errors->first('descricao')}}</p>
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
						<label for="dataTermino">Data de Termino</label>
						<input type="date" name="dataTermino" id="dataTermino" class="form-control" value="{{old('dataTermino')}}"/>
						@if($errors->has('dataTermino'))
						<p class="text-danger">{{$errors->first('dataTermino')}}</p>
						@endif
					</div>

					<div class="form-group">
						<label for="projeto_id">Projeto</label>
						<input type="number" name="projeto_id" id="projeto_id" class="form-control" value="{{old('projeto_id')}}"/>
						@if($errors->has('projeto_id'))
						<p class="text-danger">{{$errors->first('projeto_id')}}</p>
						@endif
					</div>

					<div class="form-group">
						<label for="funcionario_id">Funcinário</label>
						<input type="number" name="funcionario_id" id="funcionario_id" class="form-control" value="{{old('funcionario_id')}}"/>
						@if($errors->has('funcionario_id'))
						<p class="text-danger">{{$errors->first('funcionario_id')}}</p>
						@endif
					</div>

		    		<input type="submit" value="Criar" class="btn btn-primary btn-sm"/>
		    		<a href="/tarefas" class="btn btn-primary btn-sm">Voltar</a>
				</form>
			</div>
		</div>
	</div>
@endsection