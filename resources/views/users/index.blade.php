@extends('layouts.admin')

@section('content')

<div class="container-fluid">
	
        Músicas já ouvidas</br>
        <ul>
        @foreach($listens as $l)
            <li>{{$l->musica_id}}</li>
        @endforeach
        </ul>
    
</div>

@endsection