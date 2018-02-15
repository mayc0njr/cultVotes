<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Voto;
use App\Musica;

class UserController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musicas = Musica::all();
        return view('users.index')->with(compact('musicas'));
    }

    public function vote($idMusic){
        $voto = new Voto();
        $voto->users_id = Auth::id();
        $voto->musica_id = $idMusic;
        $voto->save();
        session()->flash('sucess', 'Voto cadastrado com sucesso!');
        return redirect('/users/');
    }

}
