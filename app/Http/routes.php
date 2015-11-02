<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('artikel', 'ArtikelController@index');

Route::get('artikel/add', 'ArtikelController@create');

Route::post('artikel/save', 'ArtikelController@store');

Route::get('artikel/edit/{id}', 'ArtikelController@edit');

Route::post('artikel/update', 'ArtikelController@update');

Route::get('artikel/delete/{id}', 'ArtikelController@destroy');

Route::post('komentar', 'ArtikelController@komentar');

Route::get('/images/{filename}', function($filename) {
  $path = storage_path() . '/' . $filename;
  $file = File::get($path);
  $type = File::mimeType($path);

  $response = Response::make($file, 200);
  $response->header("Content-Type", $type);

  return $response;
});

// Route::get('api/artikel/all', function() {
//   $data = array('artikel'=>
//   array('id'=>1,
//         'judul'=>'judul artikel'
//         'isi'=>'isi artikel'
//         'timestamps'=>'2015-01-01 01:01:01')
//       );
//
//       $ch = curl_init($key);
//       curl_setopt($ch, CURLOPT_URL, $key);
//       curl_setopt($ch, )
// });

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('/{slug}', 'HomeController@index');

Route::get('pdf/{slug}', 'WelcomeController@showpdf');
Route::get('mail/{slug}', function($slug) {
  $artikel = \App\Posts::where('slug', $slug)->first();
  Mail::send('artikel.pdf', ['data' => $artikel], function($message) {
    $message->to(Auth::user()->email, Auth::user()->name)->subject("Update Artikel");
  });
});
//
// Route::bind('siswa', function ($siswa) {
// 	return App\Siswa::find($siswa);
// });
//
// Route::resource('siswa', 'SiswaController');
//
// Blog
