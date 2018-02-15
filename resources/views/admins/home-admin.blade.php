@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-md-center py-5">
        <div class="col-md-10">
            
            <div class="card border-dark">
                <div class="card-header bg-transparent border-dark">
                    <span class="float-left">Status da Votação</span>
                    <!-- <button class="btn btn-dark float-right"><i class="fas fa-sync"></i>Atualizar</button> -->
                </div>
                <div class="card-body text-dark">
                    
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>Música</th>
                                <th>Votos</th>
                                <th>Porcentagem</th>
                                <th>Barra de Progresso</th>
                        
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sum_votos as $votos)
                            <tr>
                                <td>{{$votos->nome}}</td>
                                <td>{{$votos->total}}</td>
                                <td>{{$votos->percent}}%</td>
                                <td>
                                    <div class="progress" title="{{$votos->percent}}%" >
                                        <div class="progress-bar progress-bar-striped" style="width:{{$votos->percent}}%"></div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection
