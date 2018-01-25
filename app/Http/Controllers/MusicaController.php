<?php

namespace App\Http\Controllers;

use App\Musica;
use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MusicaController extends Controller
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

    public function index(){
        $musicas = Musica::all();
        return view('musicas.index')->with(compact('musicas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('musicas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        Musica::create($request->all());
        session()->flash('info', 'Cadastro de música realizado com sucesso!');
        return redirect('/admin/musicas');
    }

    public function upload(){
        // /**
		// * Request related
		// */
		$file = \Request::file('documento');
		$musicId = \Request::get('musicId'); 
        
		// // /**
		// // * Storage related
		// // */
        $storagePath = storage_path().DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.$musicId;    
		$fileName = 'track'. $musicId.'.mp3';
        
		// // /**
		// // * Database related
        // // */
        $musica = Musica::find($musicId);
        
        if(isset($musica->file)){
            $fileModel = File::find($musica->file);
            $fileModel->name =  $file->getClientOriginalName();
        }
        else{
            $fileModel = new \App\File();
            $fileModel->name = $file->getClientOriginalName();
            $musica->file()->save($fileModel);
        }

        return $file->move($storagePath, $fileName);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Musica  $musica
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $musica = Musica::find($id);
        return view('musicas.edit')->with(compact('musica'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Musica  $musica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $musica = Musica::find($id);
        $musica->nome = $request->nome;
        $musica->autor = $request->autor;
        $musica->save();
        session()->flash('info', 'Musica atualizada com sucesso!');
        return redirect('/admin/musicas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Musica  $musica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Musica $musica)
    {
        $dir = public_path('storage'.DIRECTORY_SEPARATOR.'arquivos'.DIRECTORY_SEPARATOR.$musica->id);
        Storage::deleteDirectory($dir);
        
        // File::destroy($musica->file->id);
        // Musica::destroy($musica->id);
        // session()->flash('warning', 'Cadastro de música removido com sucesso!');
        // return redirect('/admin/musicas');
    }

    
}
