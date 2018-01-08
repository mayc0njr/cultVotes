@extends('layouts.admin')

@section('content')

<div class="row justify-content-center">
	<div class="col-6">
		<h3 align="center">Inserir Música</h3>
		<br>

		
		<form role="form" action="/admin/musicas" method="post"> 
		{{ csrf_field() }}
			<div class="form-group">
				<label for="nome">Nome</label>
				<input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome da Música">
			</div>
			<div class="form-group">
				<label for="autor">Autor</label>
				<input type="text" class="form-control" id="autor" name="autor" placeholder="Digite o nome do Autor">
			</div>
		  <button type="submit" class="btn btn-block btn-primary">Salvar</button>
		</form>

	</div>
</div>
@endsection

