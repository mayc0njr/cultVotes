<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', function () {
    return view('home');
});

Route::prefix('admin')->group(function(){
	Route::get('/login', 'Auth\AdminLoginController@showloginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');

	Route::get('/relatorio', 'AdminController@relatorio')->name('admin.relatorio');
	
	Route::resource('musicas', 'MusicaController');
	Route::post('/music_upload', 'MusicaController@upload');

});


// Upload Routes
//-------------------------------------------------------------------------------------->
Route::get('upload', 'UploadController@index');

Route::post('upload', ['as' => 'files.upload', 'uses' => 'UploadController@upload']);

Route::get('usuario/{userId}/download/{fileId}', ['as' => 'files.download', 'uses' => 'UploadController@download']);

Route::get('usuario/{userId}/remover/{fileId}', ['as' => 'files.destroy', 'uses' => 'UploadController@destroy']);
//-------------------------------------------------------------------------------------->

