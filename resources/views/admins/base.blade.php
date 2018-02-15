<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Document</title>
	<style>
		/*.page-break {page-break-after: always;}*/
	
        td, th{
            border: 1px solid black;
            text-align: center;
        }

        table{
            border-collapse: collapse;
            width: 100%;
            text-align: center;
        }
        
        table#ctitle td{
            border: 1px solid blue;
            /*border: 0;*/
        }
        
        #ufop{
            padding: 0;
        }
        #rep{
            padding: 0; 
        }
        .cabecalho h4{
            margin-top: 0; 
            padding-top: 0;   
            /*border: 1px solid orange;*/
        }
    
        .pull-left{
            text-align: left;
        }

		h4{
			text-align: center;
            padding-bottom: 0;
            margin-bottom: 0;
		}
        
        .margembZero{
            padding-bottom: 0;
            margin-bottom: 0;
        }
        
        .margemtZero{
            padding-top: 0;
            margin-top: 0;
        }
        
        img {
            max-height:80px;
            height: auto;
            /*max-width:200px;*/
            /*width: auto;*/
        }

        .div1{ 
            /*float: left;*/
            /*border: 1px solid orange;*/
            
        }
        .divc{ 
            /*float: left;*/
            /*border: 1px solid red;*/
        }
        .div2{
            /*float: left;*/
            /*border: 1px solid green;*/
        }
        
        .row{
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: auto;
            /*border: 1px solid yellow;*/
        }

        .after-div2{
            clear: both;
        }
	</style>
</head>
<body>
    <div class="box-header">
        <div class="row">       
            <table id="ctitle">
                <tr>
                    <td id="rep" width="20%">
                        <img src="img/brasao-republica.png" alt="logo republica federativa do brasil">
                    </td>
                    <td id="text" width="60%" colspan="2">
                        <h4>UNIVERSIDADE FEDERAL DE OURO PRETO <br>INSTITUTO DE CIÊNCIAS EXATAS E APLICADAS <br>COLEGIADOS DE CURSO</h4>
                        <hr class="linha" id="linha">
                        <br><br><br>
                    </td>
                    <td id="ufop" width="20%" align="left">
                        <img src="img/Logomarca-min.jpg" alt="logo ufop">
                    </td>
                </tr>            
            </table>
        </div>
    </div><!-- end box-header -->
    <div class="box-body after-div2">

        <div class="cabecalho">
            <h4 class="text-center"><strong>PLANO DE ENSINO <br> {{$plano->turma->disciplina->codigo}} - {{$plano->turma->disciplina->nome}}</strong></h4>
            <br>
            <div class="table">
                <table id="table" class="table table-hover table-bordered text-center">
                    <thead>
                        <tr>
                            <td width =75%>
                                <div class="pull-left"><strong>Professor</strong><br></div>
                                @php ($cont=0)
                                @foreach($plano->turma->users as $usuario)
                                    @if($cont>=1)
                                        - {{ $usuario->name}}
                                    @else
                                        {{ $usuario->name}}
                                    @endif
                                    @php ($cont++)
                                @endforeach
                            </td>
                            <td  colspan="2">
                                <div class="pull-left"><strong>Departamento/Unidade</strong><br></div>
                                <strong>{{$plano->turma->disciplina->departamento->sigla}}/ICEA </strong>
                            </td>
                        </tr>

                        
                        <tr>
                            <td>
                                <div class="pull-left"><strong>E-mail</strong><br></div>
                                @php ($cont=0)
                                @foreach($plano->turma->users as $usuario)
                                    @if($cont>=1)
                                        - {{ $usuario->email}}
                                    @else
                                        {{ $usuario->email}}
                                    @endif
                                    @php($cont++)
                                @endforeach
                            </td>
                            <td>
                                <div class="pull-left"><strong>Curso</strong><br></div>
                                {{$plano->turma->curso->sigla}}
                            </td>
                            <td><div class="pull-left"><strong>Turma</strong></div><br></td>
                        </tr>
                    </thead>
                </table>
            </div><!-- end table -->
        </div><!-- end cabecalho -->
        
        <div class="hAula">
            <h4 class="text-center"><strong>Horário de Aula</strong></h4>
            <div class="table">
                <table id="table" class="table table-hover table-bordered text-center">
                    <thead>
                        <tr>
                            <th width =50%>Dia da semana</th>
                            <th>Horário</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($plano->horarios as $h)
                        <tr>
                            <td>{{$h->dia}}</td>
                            <td>{{$h->inicio}} - {{$h->fim}} horas</td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div><!-- end table -->
        </div><!-- end hAula -->
        
        <div class="hAtend">
            <h4 class="text-center"><strong>Horário de Atendimento</strong></h4>
            <div class="table">
                <table id="table" class="table table-hover table-bordered text-center">
                    <thead>
                        <tr>
                            <th width =33.3%>Dia da semana</th>
                            <th width =33.3%>Horário</th>
                            <th width =33.3%>Sala</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($plano->atendimentos as $a)
                        <tr>
                            <td>{{$a->dia}}</td>
                            <td>{{$a->inicio}} - {{$a->fim}} horas</td>
                            <td>{{$a->sala}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div><!-- end table -->
        </div><!-- end hAtend -->
        
        <div class="Aval">
            <h4 class="text-center"><strong>Critérios de Avaliação</strong></h4>
            <div class="table">
                <table id="table" class="table table-hover table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Descrição da avaliação</th>
                            <th>Peso da avaliação (%)</th>
                            <th>Data</th>
                            <th>Conteúdo avaliado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($plano->exames as $e)
                        <tr>
                            <td>{{$e->descricao}}</td>
                            <td>{{$e->peso}}</td>
                            <td>{{$e->data}}</td>
                            <td>{{$e->conteudo}}</td>
                        </tr>
                        @endforeach
                        <tr><td colspan="4"><div class="pull-left">
                            {{$plano->observacoes}}
                        </div><!-- end pull-left --></td></tr>
                    </tbody>
                </table>
            </div><!-- end table -->
        </div><!-- end Aval -->
        
        <div class="Plan">
            <h4 class="text-center"><strong>Planejamento das Aulas (sujeito a mudanças no decorrer do semestre)</strong></h4>
            
            <table id="table" class="margembZero">
                <thead>
                    <tr>
                        <th>Aula</th>
                        <th>Prática/Teórica</th>
                        <th>Data</th>
                        <th>Conteúdo Previsto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($plano->planejamentoAulas as $p)
                    <tr>
                        <td>{{$p->aula}}</td>
                        <td>{{$p->tipo}}</td>
                        <td>{{$p->data}}</td>
                        <td>{{$p->conteudo}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="pull-left"><p class="margemtZero"><strong><u>Atenção:</u></strong> No planejamento acima, cada "aula" corresponde a duas aulas de 50 minutos ou 1h 40minutos.</p></div>
        </div><!-- end Plan -->

    </div><!-- end box-body -->
</body>
</html>