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
Route::get('fbLogin', 'FacebookController@fbLogin');

Route::resource('configuracao','ConfiguracaoController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


/**
 * Aqui faço o tratamento para a prettyUrl, retornando um 
 */
Route::bind('prettyURL', function($value, $route)
{

	$prettyUrl = App\PrettyUrl::all()->where('url', $value)->first();

	

	dd($prettyUrl);



	// dd($user, $ong);

    return $user;
});

Route::group(['before' => 'auth'], function() {
	Route::get('perfil', 'PerfilController@index');
	Route::get('editarPerfil', 'PerfilController@edit');
	Route::post('editarPerfil/{id}', 'PerfilController@update');
	Route::post('editarPerfilFoto/{id}', 'PerfilController@updatePhoto');


	Route::get('{prettyURL}', 'PerfilController@showUserProfile');
});


