<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<title>Relatório - Concurso Cultural</title>
</head>
<body>
	<div class="box-header">
        <div class="row">

		</div>
	</div>

	<h2 class="text-center">Concurso Cultural de Música</h2>
	<h4 class="text-center pb-5">Bicentenário João Monlevade</h4>


	<h4 class="font-weight-light pb-3">Relatório Geral</h4>
	
	<h5 class="font-italic font-weight-light">Músicas Concorrentes</h5>
	<table id="table" class="table pb-4">
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

	<hr class="py-3">
	
	<h5 class="font-italic font-weight-light">Estatísticas de Votação</h5>
	
	<table id="table" class="table pb-4">
		<thead>
			<tr>
				<th>Nº</th>
				<th>Música</th>
				<th>Quantidade Votos</th>
				<th>Percentual</th>
			</tr>
		</thead>
		<tbody>
			{{$cont = 0}}
			@foreach($sum_votos as $s)
			<tr>
				{{$cont++}}
				<td>{{$cont}}</td>
				<td>{{$s->nome}}</td>
				<td>{{$s->total}}</td>
				<td>{{$s->percent}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	<hr class="py-3">

	<h5 class="font-italic font-weight-light">Votos registrados</h5>
	<table id="table" class="table pb-4">
		<thead>
			<tr>
				<th>Nº</th>
				<th>CPF</th>
				<th>Música</th>
			</tr>
		</thead>
		<tbody>
			{{$cont = 0}}
			@foreach($votos as $v)
			<tr>
				{{$cont++}}
				<td>{{$cont}}</td>
				<th>{{$v->cpf}}</th>
				<th>{{$v->nome}}</th>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>
