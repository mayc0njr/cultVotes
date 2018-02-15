<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		
	</style>
</head>
<body>
	<div class="box-header">
        <div class="row">

		</div>
	</div>

	<h2 class="text-center">Concurso Cultural de Música</h2>
	<h4 class="text-center pb-5">Bicentenário João Monlevade</h4>

	<h4>Músicas Concorrentes</h4>
	<table id="table" class="table pb-3">
		<thead>
			<tr>
				<th>Nº</th>
				<th>Música</th>
				<th>Autor</th>
			</tr>
		</thead>
		<tbody>
			{{$cont = 0}}
			@foreach($musicas as $m)
			<tr>
				{{$cont++}}
				<td>{{$cont}}</td>
				<td>{{$m->nome}}</td>
				<td>{{$m->autor}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	<hr>

	<h4>Votos registrados</h4>
	<table id="table" class="table pb-3">
		<thead>
			<tr>
				<th>Id</th>
				<th>CPF</th>
				<th>Música</th>
			</tr>
		</thead>
		<tbody>
			@foreach($votos as $v)
			<tr>
				<th>{{$v->id}}</th>
				<th>{{$v->users_id}}</th>
				<th>{{$v->musica_id}}</th>
				
				<th>{{$v->user()->email}}</th>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>