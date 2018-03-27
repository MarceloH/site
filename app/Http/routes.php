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

/* Rotas area administrativa */
Route::controller('admin/users', 'Admin\UsersController');


Route::controller('admin/banners', 'Admin\BannersController');

Route::controller('admin/albuns', 'Admin\AlbunsController');

Route::controller('admin/fotos', 'Admin\FotosController');


Route::controller('admin/linksuteis', 'Admin\LinksUteisController');
Route::controller('admin/enderecos', 'Admin\EnderecosController');
Route::controller('admin/redessociais', 'Admin\RedesSociaisController');
Route::controller('admin/ativsemanais', 'Admin\AtivSemanaisController');
Route::controller('admin/avisos', 'Admin\AvisosController');
Route::controller('admin/contatos', 'Admin\ContatosController');
Route::controller('admin/igrejas', 'Admin\IgrejasController');
Route::controller('admin/mensagens', 'Admin\MensagensController');
Route::controller('admin/ministerios', 'Admin\MinisteriosController');
Route::controller('admin/oracoes', 'Admin\OracoesController');
Route::controller('admin/pastorais', 'Admin\PastoraisController');
Route::controller('admin/pastores', 'Admin\PastoresController');
Route::controller('admin/versiculos', 'Admin\VersiculosController');

Route::get('admin', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


/* Rotas site */
Route::get('/', 'IndexController@index');

Route::get('galeria/', 'GaleriaController@index');
Route::get('galeria/{id?}', 'GaleriaController@index');

Route::get('pastoral/', 'PastoralController@index');
Route::get('pastoral/{id?}', 'PastoralController@index');

Route::get('linkutil/', 'LinkUtilController@index');
Route::get('linkutil/{id?}', 'LinkUtilController@index');

Route::get('endereco/', 'EnderecoController@getEndereco');
Route::get('ministerio/', 'MinisterioController@getMinisterios');

Route::get('igreja/', 'IgrejaController@index');
Route::get('mensagem/', 'MensagemController@index');
Route::get('linkutil/', 'LinkUtilController@index');

Route::get('ministerio/{id?}', 'MinisterioController@index');
Route::get('calendario/', 'CalendarioController@index');

Route::get('contato/', 'ContatoController@index');
Route::post('contato/', 'ContatoController@save');

Route::get('aviso/', 'AvisoController@index');
Route::get('oracao/', 'OracaoController@index');