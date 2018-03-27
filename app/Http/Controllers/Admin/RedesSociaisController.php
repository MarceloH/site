<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\RedeSocial;
use Request;
use Redirect;
use DB;
use Validator;
use Input;

class RedesSociaisController extends Controller 
{
  protected $rules = array('nome' => 'required|min:3|max:200',
    'link' => 'required|min:3|max:300');

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
    $redessociais = RedeSocial::orderBy('id','desc')->paginate(8);
    //dd($redessociais);
    return view('redesocial.lista',compact('redessociais'));
  }

  public function getAdicionar() 
  {
    return view('redesocial.cadastrar');
  }

  public function postAdicionar() 
  {
    $dadosForm = Request::all();
    $validator = Validator::make($dadosForm,$this->rules);
    if ($validator->fails()) {
      return Redirect::to('admin/redessociais/adicionar')->withErrors($validator)->withInput();
    }
    $redesocial = new RedeSocial($dadosForm);
    $redesocial->save();
    return Redirect::to('admin/redessociais');
  }

  public function getEditar($id) 
  {
    $redesocial = RedeSocial::find($id);
    return view('redesocial.cadastrar',compact('redesocial'));
  }

  public function postEditar($id) 
  {
    $dadosForm = Request::all();
    $validator = Validator::make($dadosForm,$this->rules);
    if ($validator->fails()) {
      return Redirect::to("admin/redessociais/editar/{$id}")->withErrors($validator)->withInput();
    }
    $redesocial = RedeSocial::find($id);
    $redesocial->__construct($dadosForm);
    //dd($redesocial);
    $redesocial->save();
    return Redirect::to('admin/redessociais');
  }

  public function getDeletar($id) 
  {
    $redesocial = RedeSocial::find($id);
    $redesocial->delete();
    return Redirect::to('admin/redessociais');
  }

  public function MissingMethod($param = array()) 
  {
    return 'nao encontrado';
  }
}