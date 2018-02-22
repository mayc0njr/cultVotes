<?php

namespace App\Http\Controllers;
use App\Musica;
use App\User;
use Illuminate\Http\Request;
use PDF;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Total geral de votos
        $total_votos = User::where('voto','!=','null')->count();

        // Total de votos por música, percentual,
        $sum_votos = \DB::table('users')
        ->select('voto', \DB::raw('count(*) as total'))
        ->where('voto','!=','null')
        ->groupBy('voto')
        ->get();

        foreach($sum_votos as $v){
            $percent = $total_votos == 0 ? 0 : (number_format((($v->total / $total_votos) * 100), 2));
            $v->percent = $percent;
            $v->nome = Musica::find($v->voto)->nome;
        }
        
        return view('admins.home-admin')->with(compact('total_votos','sum_votos'));
    }
    

    public function relatorio(){
        // lista de músicas,
        $musicas = Musica::all();
        
        // lista de votos -> cpf - nome da música,
        $votos = \DB::table('users')
        ->join('musicas', 'users.voto', '=', 'musicas.id')
        ->select('cpf', 'nome')
        ->where('voto','!=','null')
        ->get();
        
        // Total geral de votos
        $total_votos = User::where('voto','!=','null')->count();

        // Total de votos por música, percentual,
        $sum_votos = \DB::table('users')
        ->select('voto', \DB::raw('count(*) as total'))
        ->where('voto','!=','null')
        ->groupBy('voto')
        ->orderBy('total', 'desc')
        ->get();

        foreach($sum_votos as $v){
            $percent = $total_votos == 0 ? 0 : (number_format((($v->total / $total_votos) * 100), 2));
            $v->percent = $percent;
            $v->nome = Musica::find($v->voto)->nome;
        }

        $pdf = PDF::loadView('admins.relatorio', compact('musicas', 'votos' , 'sum_votos', 'total_votos'));
        return $pdf->stream('relatorio.pdf');
    }

}
