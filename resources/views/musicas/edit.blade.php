@extends('layouts.admin')

@section('content')
<div class="container-fluid">
	<div class="row justify-content-center py-3">
		<div class="col-6">
			<h3 align="center">Editar Música</h3>
			<br>

			<form role="form" action="/admin/musicas/{{$musica->id}}" method="post"> 
			{{ method_field('PATCH') }}
			{{ csrf_field() }}
				<div class="form-group">
					<label for="nome">Nome</label>
					<input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome da Música" value="{{$musica->nome}}">
				</div>
				<div class="form-group">
					<label for="autor">Autor</label>
					<input type="text" class="form-control" id="autor" name="autor" placeholder="Digite o nome do Autor" value="{{$musica->autor}}">
				</div>
			<button type="submit" class="btn btn-block btn-primary">Salvar</button>
			</form>

		</div>
	</div>
</div>
@endsection