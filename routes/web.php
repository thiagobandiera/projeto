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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['LogAcesso'])->group(function (){
	
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/dashboard', 'Dashboard\DashboardController@index')->name('dashboard');

	/** Acesso **/
	Route::resource('role', 'Acesso\RoleController');
	Route::resource('permission', 'Acesso\PermissionController');

	/** User **/
	Route::get('/profile', 'User\UserController@profile')->name('profile');
	Route::post('/profile_update', 'User\UserController@profileUpdate')->name('profile.update');
	Route::get('/password', 'User\UserController@password')->name('password');
	Route::post('/password_update', 'User\UserController@passwordUpdate')->name('password.update');
	Route::resource('user', 'User\UserController');
	Route::get('online', 'User\UserController@online')->name('online');

	/** Configuração **/
	Route::resource('conta', 'Configuracao\ContaController');
	Route::resource('categoria', 'Configuracao\CategoriaController');

	/** Transação **/
	Route::resource('transacao', 'Transacao\TransacaoController');

	/** Relatorio **/
	Route::get('fluxoCaixa', 'Relatorio\RelatorioController@fluxoCaixa')->name('fluxoCaixa');
	Route::post('fluxoCaixaGerar', 'Relatorio\RelatorioController@fluxoCaixaGerar')->name('fluxoCaixaGerar');

});

