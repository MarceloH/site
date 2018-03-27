<?php namespace App\Http\Controllers;

use App\Oracao;
use Request;
use Redirect;
use DB;
use Validator;

class OracaoController extends Controller 
{

  public function index() 
  {

    $oracoes = Oracao::orderBy('id','desc')->paginate(10);
    return view('oracao',compact('oracoes'));
    
  }

}