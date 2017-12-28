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
Route::get('CVigente','ConvenioController@verComvenioVigente');
Route::get('CVencido','ConvenioController@verComvenioVencido');
Route::get('CTramite','ConvenioController@verComvenioTramite');
Route::get('login', 'Auth\LoginController@LoginForm');


    Route::get('/','HomeController@index');
    Route::resource('convenios', 'ConvenioController');
    Route::get('convenio/{id}', 'ConvenioController@Eliminar')->name('convenio.Eliminar');
    Route::post('convenio/fileUpload','ConvenioController@uploadFile');
    Route::post('convenio/fileDelete','ConvenioController@deleteFile');


    Route::resource('usuarios', 'UsuarioController');
    Route::get('usuario/{id}', 'UsuarioController@Eliminar')->name('usuario.Eliminar');

    Route::resource('usinactivo', 'UsuarioInactivosController');

    Route::resource('responsables', 'ResponsableController');
    Route::get('responsable/{id}', 'ResponsableController@Eliminar')->name('responsable.Eliminar');
    Route::get('excelResponsable/{id}','ResponsableController@excelResponsable')->name('excel.Respon');

    Route::resource('resinac', 'ResponsableInactivoController');

    Route::resource('control', 'AccesoController');

    Route::get('excelConvenios', 'ExcelController@excelConvenios')->name('excel.Convenios');
    Route::post('excelConvenios', 'ExcelController@excelConvenios')->name('excel.Convenios');

    Route::resource('fichas', 'FichaController');


    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('testsession', function () {
        return session()->all();
    });


    Route::get('convenios/{convenio}/ficha', 'ConvenioController@verFicha')->name('convenios.ficha');
    Route::get('convenios/{convenio}/img', 'ConvenioController@verImg')->name('convenios.img');

    Route::resource('contrato', 'ContratoController');
Route::get('ContratoVigente','ContratoController@verContratoVigente');
Route::get('ContratoVencido','ContratoController@verContratoVencido');
Route::post('contrato/fileUpload','ContratoController@uploadFile');
Route::post('contrato/fileDelete','ContratoController@deleteFileContrato');

Route::get('contrato/{contrato}/img', 'ContratoController@verImgContrato')->name('contrato.img');
Route::get('uploadFile', 'ConvenioController@uploadbyid');
Route::get('convenios/{convenio}/ficha/{idficha}','ConvenioController@imprimir')->name('convenios.imprimir');

Route::resource('categorias', 'CategoriaController');

Route::get('convenios/{id}', 'ConvenioController@Eliminarficha')->name('convenios.Eliminarficha');

Route::get('contrato/{id}', 'ContratoController@elicontrato')->name('contratos.eli');

Route::get('excelContratos', 'ContratoController@excelContratos')->name('excel.Contratos');
Route::post('excelContratos', 'ContratoController@excelContratos')->name('excel.Contratos');



