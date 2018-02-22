@extends('layouts.admin')

@section('content')

<div class="container-fluid">
	<div class="row justify-content-center py-5">
	  	<div class="col-8 d-flex justify-content-between">

            @foreach($musicas as $m)
                <a class="btn btn-dark" href="users/vote/{{$m->id}}">{{$m->nome}}</a>
            @endforeach

        </div>
    </div>
</div>

@endsection