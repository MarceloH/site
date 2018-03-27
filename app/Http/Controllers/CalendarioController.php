<?php namespace App\Http\Controllers;

use Request;
use Redirect;
use DB;
use Validator;

class CalendarioController extends Controller 
{

  public function index() 
  {
    return view('calendario');
  }

}