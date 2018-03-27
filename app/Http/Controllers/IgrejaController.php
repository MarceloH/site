<?php namespace App\Http\Controllers;

use App\Igreja;
use App\Pastor;
use Request;
use Redirect;
use DB;
use Validator;

class IgrejaController extends Controller 
{

  public function index($id = null) 
  {

    $igrejas  = Igreja::orderBy('id')->get();
    $pastores = Pastor::orderBy('id')->get();
    //dd($igrejas);
    return view('igreja',compact('igrejas','pastores'));
  }

}