<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pastoral;
use Request;
use Redirect;
use DB;
use Validator;
use Input;

class PastoraisController extends Controller 
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
    $pastorais = Pastoral::orderBy('id','desc')->paginate(8);
    //dd($pastorais);
    return view('pastoral.lista',compact('pastorais'));
  }

  public function getAdicionar() 
  {
    return view('pastoral.cadastrar');
  }

  public function postAdicionar() 
  {
    $dadosForm = Request::all();
    $validator = Validator::make($dadosForm,$this->rules);
    if ($validator->fails()) {
      return Redirect::to('admin/pastorais/adicionar')->withErrors($validator)->withInput();
    }
    $pastoral = new Pastoral($dadosForm);
    $pastoral->save();
    return Redirect::to('admin/pastorais');
  }

  public function getEditar($id) 
  {
    $pastoral = Pastoral::find($id);
    return view('pastoral.cadastrar',compact('pastoral'));
  }

  public function postEditar($id) 
  {
    $dadosForm = Request::all();
    $validator = Validator::make($dadosForm,$this->rules);
    if ($validator->fails()) {
      return Redirect::to("admin/pastorais/editar/{$id}")->withErrors($validator)->withInput();
    }
    $pastoral = Pastoral::find($id);
    $pastoral->__construct($dadosForm);
    //dd($pastoral);
    $pastoral->save();
    return Redirect::to('admin/pastorais');
  }

  public function getDeletar($id) 
  {
    $pastoral = Pastoral::find($id);
    $pastoral->delete();
    return Redirect::to('admin/pastorais');
  }

  public function MissingMethod($param = array()) 
  {
    return 'nao encontrado';
  }
}