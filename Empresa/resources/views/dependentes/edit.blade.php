@extends('master')
@section('titulo','Editar Dependente')
@section('corpo')
	<div class="container">
		<h3>Novo Dependente</h3>
		<div class="row">
			<div class="col-sm-6">
				<form action="/dependente/{{$dependentes->id}}" method="post">
					@csrf  <!-- token de segurança -->
					@method('PUT') <!-- para acionar a função update do controller -->
					
					<div>
						<label for="nome">Nome</label>
						<input type="text" name="nome" id="nome" class="form-control" value="{{empty(old('nome')) ? $dependentes->nome : old('nome')}}"/>
						@if($errors->has('nome'))
						<p class="text-danger">{{$errors->first('nome')}}</p>
						@endif
					</div>
					<div class="form-group">
						<label for="parentesco_id">Parentesco</label>
						<input type="text" name="parentesco_id" id="parentesco_id" class="form-control" value="{{empty(old('parentesco_id')) ? $dependentes->parentesco_id : old('parentesco_id')}}"/>
						@if($errors->has('parentesco_id'))
						<p class="text-danger">{{$errors->first('parentesco_id')}}</p>
						@endif	
					</div>
					<div class="form-group">
						<label for="funcionario_id">Funcionario</label>
						<input type="text" name="funcionario_id" id="funcionario_id" class="form-control" value="{{empty(old('funcionario_id')) ? $dependentes->funcionario_id : old('funcionario_id')}}"/>
						@if($errors->has('funcionario_id'))
						<p class="text-danger">{{$errors->first('funcionario_id')}}</p>
						@endif	
					</div>

		    		<input type="submit" value="Alterar" class="btn btn-primary btn-sm"/>
		    		<a href="/dependente" class="btn btn-primary btn-sm">Voltar</a>
				</form>
			</div>
		</div>
	</div>
@endsection