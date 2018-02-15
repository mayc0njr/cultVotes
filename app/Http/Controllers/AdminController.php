<?php

namespace App\Http\Controllers;
use App\Musica;
use App\Voto;
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
        // total of records
        $total_votos = Voto::count();

        // sum of the records grouped by music
        $sum_votos = \DB::table('votos')
        ->join('musicas','musica_id', '=', 'musicas.id')
        ->select('musica_id','nome',\DB::raw ('count(*) as total'))
        ->groupBy('musica_id')
        ->get();
        
        foreach($sum_votos as $v){
            $percent = number_format((($v->total / $total_votos) * 100), 2);
            $v->percent = $percent;
        }

        return view('admins.home-admin')->with(compact('total_votos','sum_votos'));
    }
    

    public function relatorio(){
        $musicas = Musica::all();
        $votos = Voto::all();
        $pdf = PDF::loadView('admins.relatorio', compact('votos', 'musicas'));
        return $pdf->stream('relatorio.pdf');
    }

}
