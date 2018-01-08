<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
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
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$adminId = \Auth::user()->id;

		$user = \App\Admin::with('files')->find($adminId);

		return view('uploads.index')->with(compact('user'));
	}

	public function upload()
	{
		// /**
		// * Request related
		// */
		$file = \Request::file('documento');
		$userId = \Request::get('userId');
		
		// // /**
		// // * Storage related
		// // */
		$storagePath = storage_path().'\documentos\\'.$userId;
		$fileName = $file->getClientOriginalName();
		
		// // /**
		// // * Database related
		// // */
		$fileModel = new \App\File();
		$fileModel->name = $fileName;

		$user = \App\Admin::find($userId);
		$user->files()->save($fileModel);

		return $file->move($storagePath, $fileName);
	}

	public function download($userId, $fileId)
	{
		$file = \App\File::find($fileId);

		$storagePath = storage_path().'/documentos/'.$userId;

		return \Response::download($storagePath.'/'.$file->name);
	}

	public function destroy($userId, $fileId)
	{
		$file = \App\File::find($fileId);

		$storagePath = storage_path().'/documentos/'.$userId;

		$file->delete();

		unlink($storagePath.'/'.$file->name);

		return redirect()->back()->with('success', 'Arquivo removido com sucesso!');
	}

}
