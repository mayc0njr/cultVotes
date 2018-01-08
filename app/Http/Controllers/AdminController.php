<?php

namespace App\Http\Controllers;
use App\Musica;
use Illuminate\Http\Request;

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
        return view('admins.admin');
    }

   public function relatorio(){
        return view('admins.relatorio');
    }


}
