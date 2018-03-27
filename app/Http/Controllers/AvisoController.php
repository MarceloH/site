<?php namespace App\Http\Controllers;

use App\Aviso;
use Request;
use Redirect;
use DB;
use Validator;

class AvisoController extends Controller 
{

  public function index() 
  {

    $avisos = Aviso::orderBy('id','desc')->paginate(10);
    return view('aviso',compact('avisos'));
    
  }

}