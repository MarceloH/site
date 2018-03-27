<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Aviso;
use Request;
use Redirect;
use DB;
use Validator;
use Input;

class AvisosController extends Controller 
{
  protected $rules = array('titulo' => 'required|min:3|max:255',
    'descricao' => 'required|min:3|max:300');

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
    $avisos = Aviso::orderBy('id','desc')->paginate(8);
    //dd($avisos);
    return view('aviso.lista',compact('avisos'));
  }

  public function getAdicionar() 
  {
    return view('aviso.cadastrar');
  }

  public function postAdicionar() 
  {
    $dadosForm = Request::all();
    $validator = Validator::make($dadosForm,$this->rules);
    if ($validator->fails()) {
      return Redirect::to('admin/avisos/adicionar')->withErrors($validator)->withInput();
    }
    $aviso = new Aviso($dadosForm);
    $aviso->save();
    return Redirect::to('admin/avisos');
  }

  public function getEditar($id) 
  {
    $aviso = Aviso::find($id);
    return view('aviso.cadastrar',compact('aviso'));
  }

  public function postEditar($id) 
  {
    $dadosForm = Request::all();
    $validator = Validator::make($dadosForm,$this->rules);
    if ($validator->fails()) {
      return Redirect::to("admin/avisos/editar/{$id}")->withErrors($validator)->withInput();
    }
    $aviso = Aviso::find($id);
    $aviso->__construct($dadosForm);
    //dd($aviso);
    $aviso->save();
    return Redirect::to('admin/avisos');
  }

  public function getDeletar($id) 
  {
    $aviso = Aviso::find($id);
    $aviso->delete();
    return Redirect::to('admin/avisos');
  }

  public function MissingMethod($param = array()) 
  {
    return 'nao encontrado';
  }
}