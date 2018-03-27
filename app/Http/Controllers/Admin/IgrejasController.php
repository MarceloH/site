<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Igreja;
use Request;
use Redirect;
use DB;
use Validator;
use Input;

class IgrejasController extends Controller 
{
  protected $rules = array('titulo' => 'required|min:3|max:255',
    'texto' => 'required|min:3');

/**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function getIndex() 
  {
    $igrejas = Igreja::orderBy('id','desc')->paginate(8);
    //dd($igrejas);
    return view('igreja.lista',compact('igrejas'));
  }

  public function getAdicionar() 
  {
    return view('igreja.cadastrar');
  }

  public function postAdicionar() 
  {
    $dadosForm = Request::all();
    $validator = Validator::make($dadosForm,$this->rules);
    if ($validator->fails()) {
      return Redirect::to('admin/igrejas/adicionar')->withErrors($validator)->withInput();
    }
    $igreja = new Igreja($dadosForm);
    $igreja->save();
    return Redirect::to('admin/igrejas');
  }

  public function getEditar($id) 
  {
    $igreja = Igreja::find($id);
    return view('igreja.cadastrar',compact('igreja'));
  }

  public function postEditar($id) 
  {
    $dadosForm = Request::all();
    $validator = Validator::make($dadosForm,$this->rules);
    if ($validator->fails()) {
      return Redirect::to("admin/igrejas/editar/{$id}")->withErrors($validator)->withInput();
    }
    $igreja = Igreja::find($id);
    $igreja->__construct($dadosForm);
    //dd($igreja);
    $igreja->save();
    return Redirect::to('admin/igrejas');
  }

  public function getDeletar($id) 
  {
    $igreja = Igreja::find($id);
    $igreja->delete();
    return Redirect::to('admin/igrejas');
  }

  public function MissingMethod($param = array()) 
  {
    return 'nao encontrado';
  }
}