@extends('layouts.admin')

@section('content')
<div class="container-fluid">
	<div class="row justify-content-center py-5">
	  	<div class="col-8">
			
			<div class="d-flex justify-content-between">
				<p class="h3">Músicas</p>
				<a href="/admin/musicas/create" class="btn btn-primary btn-md pull-right">Inserir</a>
			</div>
			<br>
			<div class="table-responsive">
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
						<tr class="music-row" id="row-{{$m->id}}">
							<td scope="row">{{ $m->id}}</td>
							<td>{{$m->nome}}</td>
							<td>{{$m->autor}}</td>
							<td>
								
							</td>
							<td>
							@if(isset($m->file))
								<div id="player-{{$m->id}}"> 
									<audio controls>
										<source src="{{asset("storage".DIRECTORY_SEPARATOR."app".DIRECTORY_SEPARATOR."public".DIRECTORY_SEPARATOR.$m->id.DIRECTORY_SEPARATOR."track".$m->id.".mp3")}}" type="audio/mpeg">
									</audio>
								</div>
							@else
								<div id="progress-{{$m->id}}" class="progress">
									<div class="hide" id="player-{{$m->id}}"> 
											<audio controls>
												<source src="" type="audio/mpeg">
											</audio>
										</div>
										<div class="progress-bar progress-bar-success" id="bar-{{$m->id}}"></div>
									
								</div>
							@endif	
							</td>
							<td class="d-flex justify-content-center">
								<a class="btn" href="/admin/musicas/{{$m->id}}/edit" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-pencil"></i></a>
								<a class="btn" href="#" data-toggle="tooltip" data-placement="top" title="Imagem"><i class="fa fa-picture-o"></i></a>
								
								<span class="btn fileinput-button">
										<i class="fa fa-music" style="color: blue"></i>
										<input id="fileupload-{{$m->id}}" type="file" name="documento"
										data-token="{!! csrf_token() !!}" data-music-id="{{$m->id}}">
								</span>

								<form action="/admin/musicas/{{$m->id}}" method="POST">
									<input type="hidden" name="_method" value="DELETE">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<button type="submit" class="btn btn-link" data-toggle="tooltip" data-placement="top" title="Excluir"><i class="fa fa-trash"></i></button>
								</form>

							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
	  	</div>
	</div>
</div>
@endsection

@push('css')
	<style>
		.hide {
			display: none;
		}
	</style>
@endpush

@section('scripts')
@parent
<script type="text/javascript" src="{{asset('js/queryUtils.js')}}"></script>
<script>
	;(function($)
	{
	  'use strict';
	  $(document).ready(function()
	  {
	  	var fileupload     = '#fileupload-',
			$upload_success = $('#upload-success'),
			progressId,
			bar,
			player,
			uploads = [];

			$(".music-row").each(function(index, item){
				var $id = $(fileupload + getId(item.id));
				$id.fileupload({
	        	url: '/admin/music_upload',
				formData: {_token: $id.data('token'),  musicId: $id.data('musicId')},
			
				start: function(e, data){
					progressId = '#progress-' + $id.data('musicId') + ' .progress-bar';
					bar = '#bar-' + $id.data('musicId');
					player = '$player' + $id.data('musicId');
				},
				
				progressall: function (e, data) {
					var progress = parseInt(data.loaded / data.total * 100, 10);
					$(progressId).css(
							'width',
							progress + '%'
					);
				},
				
				done: function (e, data) {
					
					setTimeout(function(){
						location.reload();
					}, 300);
				}
			});
			
			uploads.push($id);
		});
	    
	  });
	})(window.jQuery);
</script>
@stop