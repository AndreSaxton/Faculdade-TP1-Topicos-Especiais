@extends('master')
@section('titulo','Adicionar documento')
@section('corpo')
	<div class="container">
		<h3>Documento</h3>
		<div class="row">
			<div class="col-sm-6">
			<!-- Formularios que fazem upload de arquivos devem usar POST e o ENCTYPE exemplificado aqui -->
				<form action="/funcionario/documento" method="post" enctype='multipart/form-data'>
					@csrf  <!-- token de segurança -->
					<input type="hidden" name="funcionario_id" value={{$id}}>

					<div class="form-group">
						<label for="arquivo">Arquivo</label>
						<!-- Para seleção do arquivo para upload é usado input do tipo FILE -->
						<input type="file" name="arquivo" id="arquivo" class="form-control"/>
						@if($errors->has('arquivo'))
						<p class="text-danger">{{$errors->first('arquivo')}}</p>
						@endif
					</div>

					<div class="form-group">
		    		<input type="submit" value="Criar" class="btn btn-primary btn-sm"/>
		    		<a href="/funcionario" class="btn btn-primary btn-sm">Voltar</a>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection