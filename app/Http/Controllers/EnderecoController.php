<?php namespace App\Http\Controllers;

use App\Endereco;
use Request;
use Redirect;
use DB;
use Validator;

class EnderecoController extends Controller 
{

  public function index() 
  {
  
  }

  public function getEndereco()
  {
    $endereco  = Endereco::first();
    $app = app();
    $retorno = $app->make('stdClass');
    $retorno->endereco = "IBRessureição ".date("Y")." - {$endereco->endereco}, {$endereco->numero} - {$endereco->bairro}. {$endereco->cidade} - {$endereco->estado}. Fones: {$endereco->telefone} - vivo-fixo / {$endereco->celular} - Tim";
    return response()->json($retorno);
  }

}