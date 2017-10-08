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
    return view('principal2');
});
Route::resource('convenios','ConvenioController');
Route::get('convenio/{id}','ConvenioController@Eliminar')->name('convenio.Eliminar');

Route::resource('usuarios','UsuarioController');
Route::get('usuario/{id}','UsuarioController@Eliminar')->name('usuario.Eliminar');

Route::resource('usinactivo','UsuarioInactivosController');

Route::resource('responsables','ResponsableController');
Route::get('responsable/{id}','ResponsableController@Eliminar')->name('responsable.Eliminar');

Route::resource('resinac','ResponsableInactivoController');

Route::resource('control','AccesoController');

Route::get('excelConvenios', 'ExcelController@excelConvenios')->name('excel.Convenios');

Route::resource('fichas','FichaController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('testsession',function(){
return session()->all();
});


Route::get('convenios/{convenio}/ficha','ConvenioController@verFicha')->name('convenios.ficha');
Route::get('convenios/{convenio}/img','ConvenioController@verImg')->name('convenios.img');

