@extends('master')
@section('titulo','Criar Funcionário')
@section('corpo')
	<div class="container">
		<h3>Novo Funcionário</h3>
		<div class="row">
			<div class="col-sm-6">
				<form action="/funcionario" method="post">
					@csrf  <!-- token de segurança -->
					<div class="form-group">
						<label for="nome">Nome</label>
						<input type="text" name="nome" id="nome" class="form-control" value="{{old('nome')}}"/>
						@if($errors->has('nome'))
						<p class="text-danger">{{$errors->first('nome')}}</p>
						@endif
					</div>
					
					<div>
						<label for="endereco">Endereco</label>
						<input type="text" name="endereco" id="endereco" class="form-control" value="{{old('endereco')}}"/>
						@if($errors->has('endereco'))
						<p class="text-danger">{{$errors->first('endereco')}}</p>
						@endif
					</div>

					<div>
						<label for="departamento_id">Departamento</label>
						<select name='departamento_id' id='departamento_id'>
							@foreach($cDepartamentos as $d)
								<option value="{{$d->id}}">{{$d->nome}}</option>
							@endforeach
						</select>
					</div>

					<div>
						<label for="data_nascimento">Data Nascimento</label>
						<input type="date" name="data_nascimento" id="data_nascimento" class="form-control" value="{{old('data_nascimento')}}"/>
						@if($errors->has('data_nascimento'))
						<p class="text-danger">{{$errors->first('data_nascimento')}}</p>
						@endif
					</div>

		    		<input type="submit" value="Criar" class="btn btn-primary btn-sm"/>
		    		<a href="/funcionario" class="btn btn-primary btn-sm">Voltar</a>
				</form>
			</div>
		</div>
	</div>
@endsection