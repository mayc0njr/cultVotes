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

Route::group(['middleware' => ['web']], function () {
    Auth::routes();
});


Route::get('/', function(){
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::prefix('admin')->group(function(){
	Route::get('/login', 'Auth\AdminLoginController@showloginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/relatorio', 'AdminController@relatorio')->name('admin.relatorio');
	Route::resource('musicas', 'MusicaController');
    Route::post('/music_upload', 'MusicaController@upload');
    
    // DomPDF Routes
    Route::get('/pdf', array('as' => 'pdf', 'uses' => 'AdminController@pdf'));
});


// File Storage Routes
Route::get('storage/app/public/{musicId}/{filename}', function ($musicId, $filename)
{
	$path = storage_path().DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.$musicId.DIRECTORY_SEPARATOR.$filename;
    
    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::prefix('users')->group(function(){
    Route::get('/', 'UserController@index');
    Route::get('/vote/{id}', 'UserController@vote');
    Route::get('/votacao', 'UserController@votacao');
    Route::post('/listen', 'UserController@listen')->name('listen');
});


