<?php namespace App\Http\Controllers;

use App\Pastoral;
use Request;
use Redirect;
use DB;
use Validator;

class PastoralController extends Controller 
{

  public function index($id = null) 
  {
  
    $voltar = false;
    if ($id == null) {
      $pastorais = Pastoral::orderBy('id','desc')->paginate(10);
      $id = 0;
      return view('pastoral',compact('pastorais','id','voltar'));
    } else {
      $voltar = true;
      $pastoral = Pastoral::find($id);
      return view('pastoral',compact('pastoral','id','voltar'));
    }
    
  }

}