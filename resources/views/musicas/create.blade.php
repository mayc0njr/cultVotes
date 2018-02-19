@extends('layouts.admin')

@section('content')
<div class="container-fluid">
	<div class="row justify-content-center py-3">
		<div class="col-6">
			<h3 align="center">Inserir Música</h3>
			<br>

			<form role="form" action="/admin/musicas" method="post"  enctype="multipart/form-data"> 
			{{ csrf_field() }}
				<div class="form-group">
					<label for="nome">Nome</label>
					<input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome da Música" required 
					oninvalid="this.setCustomValidity('Campo vazio, por favor digite o nome da música.')" oninput="setCustomValidity('')">
				</div>
				<div class="form-group">
					<label for="autor">Autor</label>
					<input type="text" class="form-control" id="autor" name="autor" placeholder="Digite o nome do Autor"  required 
					oninvalid="this.setCustomValidity('Campo vazio, por favor digite o nome do autor.')" oninput="setCustomValidity('')">
				</div>
	
				<div class="form-group">
					<label for="arquivo">Música</label>
					<div class="input-group input-file" name="arquivo">
						<input type="text" class="form-control" placeholder='Escolha o Arquivo de Música' />			
						<span class="input-group-btn">
							<button class="btn btn-light btn-choose" type="button"><i class="fa fa-music" style="color: blue"></i> Procurar</button>
						</span>
					</div>
				</div>
					
				<button type="submit" class="btn btn-block btn-primary">Salvar</button>
			</form>

		</div>
	</div>
</div>
@endsection


@push('css')
	<style>
	
	</style>
@endpush


@section('scripts')
@parent
<script>
	function bs_input_file() {
		$(".input-file").before(
			function() {
				if ( ! $(this).prev().hasClass('input-ghost') ) {
					var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
					element.attr("name", $(this).attr("name"));

					element.change(function(){
						element.next(element).find('input').val((element.val()).split('\\').pop());
					});

					$(this).find("button.btn-choose").click(function(){
						element.click();
					});
					
					$(this).find('input').css("cursor","pointer");
					
					$(this).find('input').mousedown(function() {
						$(this).parents('.input-file').prev().click();
						return false;
					});

					return element;
				}
			}
		);
	}
	$(function() {
		bs_input_file();
	});

</script>
@stop