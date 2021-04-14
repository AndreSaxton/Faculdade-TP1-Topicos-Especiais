@extends('master')
@section('titulo','Editar Tarefa')
@section('corpo')
	<div class="container">
		<h3>Editar Tarefa</h3>
		<div class="row">
			<div class="col-sm-6">
				<form action="/tarefas/{{$tarefa->id}}" method="post">

					@csrf  <!-- token de segurança -->
					@method('PUT') <!-- para acionar a função update do controller -->
					<div class="form-group">
						<label for="descricao">Nome</label>
						<input type="text" name="descricao" id="descricao" class="form-control" value="{{empty(old('descricao')) ? $tarefa->descricao : old('descricao')}}"/>
						@if($errors->has('descricao'))
						<p class="text-danger">{{$errors->first('descricao')}}</p>
						@endif	
					</div>
					<div>
						<label for="projeto_id">Projeto</label>
						<select name='projeto_id' id='projeto_id'>
							@foreach($cProjetos as $d)
								<option value="{{$d->id}}">{{$d->nome}}</option>
							@endforeach
						</select>
					</div>
					<div>
						<label for="funcionario_id">Gerente</label>
						<select name='funcionario_id' id='funcionario_id'>
							@foreach($cFuncionarios as $f)
								<option value="{{$f->id}}">{{$f->nome}}</option>
							@endforeach
						</select>
					</div>
					<div>
						<label for="dataInicio">Data de Início</label>
						<input type="date" name="dataInicio" id="dataInicio" class="form-control" value="{{empty(old('dataInicio')) ? $tarefa->dataInicio : old('dataInicio')}}"/>
						@if($errors->has('dataInicio'))
						<p class="text-danger">{{$errors->first('dataInicio')}}</p>
						@endif
					</div>
					<div>
						<label for="dataTermino">Data de Início</label>
						<input type="date" name="dataTermino" id="dataTermino" class="form-control" value="{{empty(old('dataTermino')) ? $tarefa->dataTermino : old('dataTermino')}}"/>
						@if($errors->has('dataTermino'))
						<p class="text-danger">{{$errors->first('dataTermino')}}</p>
						@endif
					</div>
		    		<input type="submit" value="Alterar" class="btn btn-primary btn-sm"/>
		    		<a href="/tarefas" class="btn btn-primary btn-sm">Voltar</a>

				</form>
			</div>
		</div>
	</div>
@endsection