<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
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
        $user = User::find(Auth::id());
        $user->voto = $idMusic;
        $user->save();

        session()->flash('success', 'Voto cadastrado com sucesso!');
        return redirect('/users/');
    }

}
