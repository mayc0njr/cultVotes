<?php

namespace CultVotes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use CultVotes\User;
use CultVotes\Musica;
use CultVotes\Listen;

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
        $userId = Auth::id();
        $musicas = Musica::all();
        $listens = \DB::table('listens')
        ->select('musica_id')
        ->where('user_id', $userId)->get();
        return view('users.index')->with(compact('musicas','listens'));
    }

    public function vote($idMusic){
        $user = User::find(Auth::id());
        $user->voto = $idMusic;
        $user->save();

        session()->flash('success', 'Voto cadastrado com sucesso!');
        return redirect('/users/');
    }

    public function votacao(){
        $musicas = Musica::all();
        return view('users.votacao')->with(compact('musicas'));
    }

    public function listen(){
        $userId = \Request::get('user_id'); 
        $musicId = \Request::get('music_id');     
        $listened = \DB::table('listens')
                        ->where([
                            ['musica_id', $musicId],
                            ['user_id', $userId]
                        ])
                        ->exists();
                                                  
        if(!$listened){
            $mlisten = new \CultVotes\Listen();
            $mlisten->musica_id = $musicId; 
            $mlisten->user_id = $userId;
            $mlisten->save();
        }
        return;
    }
}
