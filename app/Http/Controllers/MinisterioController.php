<?php namespace App\Http\Controllers;

use App\Ministerio;
use Request;
use Redirect;
use DB;
use Validator;

class MinisterioController extends Controller 
{

  public function index($id = null) 
  {
    $ministerio = Ministerio::find($id);
    return view('ministerio',compact('ministerio'));
  }

  public function getMinisterios()
  {
    $ministerios  = Ministerio::orderBy('nome')->get();
    $app = app();
    $retorno = $app->make('stdClass');
    $retorno->ministerios = "";
    foreach ($ministerios as $ministerio) {
      $link = url("ministerio/{$ministerio->id}");
      $retorno->ministerios .= "
      <li>
         <a href='$link'>{$ministerio->nome}</a>
      </li>";
    }
    return response()->json($retorno);
  }

}