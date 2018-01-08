@extends('layouts.admin')

@section('content')
	<div class="row justify-content-center">
	    <div class="col-8">
			<div class="d-flex justify-content-between">
				<p class="h3">Músicas</p>
				<a href="/admin/musicas/create" class="btn btn-primary btn-md pull-right">Inserir</a>
			</div>
			<br>
	    	<table class="table">
			  <thead class="thead-default">
			    <tr>
			      <th class="text-center">#</th>
			      <th class="text-center">Nome</th>
			      <th class="text-center">Autor</th>
			      <th class="text-center">Capa/Imagem</th>
			      <th class="text-center">MP3</th>
			      <th class="text-center">Ações</th>
			    </tr>
			  </thead>
			  <tbody class="text-center">
				
				@foreach($musicas as $m)
				<tr>
					<td scope="row">{{ $m->id}}</td>
					<td>{{$m->nome}}</td>
					<td>{{$m->autor}}</td>
					<td>
					
			      	</td>
					<td>
					    <div id="progress" class="progress">
					        <div class="progress-bar progress-bar-success"></div>
					    </div>
					</td>
					<td class="d-flex justify-content-center">
						<a class="btn" href="/admin/musicas/{{$m->id}}/edit" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-pencil"></i></a>
						<a class="btn" href="#" data-toggle="tooltip" data-placement="top" title="Imagem"><i class="fa fa-picture-o"></i></a>
						

						<!-- <a class="btn" href="#" data-toggle="tooltip" data-placement="top" title="Musica"><i class="fa fa-music"></i></a> -->
						
						<span class="btn fileinput-button">
					        <i class="fa fa-music" style="color: blue"></i>
					        <input id="fileupload" type="file" name="documento"
					        data-token="{!! csrf_token() !!}">
					    </span>

						<a class="btn" href="#" data-toggle="tooltip" data-placement="top" title="Excluir"><i class="fa fa-trash"></i></a>
					</td>
				</tr>
				@endforeach

			  </tbody>
			</table>  
	    </div>
  	</div>

@endsection


@section('scripts')
@parent
<script>
	;(function($)
	{
	  'use strict';
	  $(document).ready(function()
	  {

	  	var $fileupload     = $('#fileupload'),
	  		$upload_success = $('#upload-success');

	    $fileupload.fileupload({
	        url: '/admin/music_upload',
	        formData: {_token: $fileupload.data('token')},
	        progressall: function (e, data) {
	            var progress = parseInt(data.loaded / data.total * 100, 10);
	            $('#progress .progress-bar').css(
	                'width',
	                progress + '%'
	            );
	        },
	        done: function (e, data) {
	        	$upload_success.removeClass('hide').hide().slideDown('fast');

			    setTimeout(function(){
			    	location.reload();
			    }, 300);
			}
	    });
	  });
	})(window.jQuery);
</script>
@stop