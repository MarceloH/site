<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Versiculo;
use Request;
use Redirect;
use DB;
use Validator;
use Input;

class VersiculosController extends Controller 
{
  protected $rules = array('versiculo' => 'required|min:3');

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
    $versiculos = Versiculo::orderBy('id','desc')->paginate(8);
    //dd($versiculos);
    return view('versiculo.lista',compact('versiculos'));
  }

  public function getAdicionar() 
  {
    return view('versiculo.cadastrar');
  }

  public function postAdicionar() 
  {
    $dadosForm = Request::all();
    $validator = Validator::make($dadosForm,$this->rules);
    if ($validator->fails()) {
      return Redirect::to('admin/versiculos/adicionar')->withErrors($validator)->withInput();
    }
    $versiculo = new Versiculo($dadosForm);
    $versiculo->save();
    return Redirect::to('admin/versiculos');
  }

  public function getEditar($id) 
  {
    $versiculo = Versiculo::find($id);
    return view('versiculo.cadastrar',compact('versiculo'));
  }

  public function postEditar($id) 
  {
    $dadosForm = Request::all();
    $validator = Validator::make($dadosForm,$this->rules);
    if ($validator->fails()) {
      return Redirect::to("admin/versiculos/editar/{$id}")->withErrors($validator)->withInput();
    }
    $versiculo = Versiculo::find($id);
    $versiculo->__construct($dadosForm);
    //dd($versiculo);
    $versiculo->save();
    return Redirect::to('admin/versiculos');
  }

  public function getDeletar($id) 
  {
    $versiculo = Versiculo::find($id);
    $versiculo->delete();
    return Redirect::to('admin/versiculos');
  }

  public function MissingMethod($param = array()) 
  {
    return 'nao encontrado';
  }
}