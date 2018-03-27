<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Ministerio;
use Request;
use Redirect;
use DB;
use Validator;
use Input;
use App\Library\Util;

class MinisteriosController extends Controller 
{
  protected $rules = array('nome' => 'required|min:3|max:200','descricao' => 'required');

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
    $ministerios = Ministerio::orderBy('id','desc')->paginate(8);
    return view('ministerio.lista',compact('ministerios'));
  }

  public function getAdicionar() 
  {
    
    return view('ministerio.cadastrar');
  }

  public function postAdicionar() 
  {

    $dadosForm = Request::all();
    $validator = Validator::make($dadosForm,$this->rules);
    if ($validator->fails()) {
      return Redirect::to('admin/ministerios/adicionar')->withErrors($validator)->withInput();
    }
    $ministerio = new Ministerio($dadosForm);
    $ministerio->dataescala = Util::dateDB(Request::input('dataescala'));
    $ministerio->save();
    return Redirect::to('admin/ministerios');
  }

  public function getEditar($id) 
  {
    $ministerio = Ministerio::find($id);
    return view('ministerio.cadastrar',compact('ministerio'));
  }

  public function postEditar($id) 
  {
    $dadosForm = Request::all();
    $validator = Validator::make($dadosForm,$this->rules);
    if ($validator->fails()) {
      return Redirect::to("admin/ministerios/editar/{$id}")->withErrors($validator)->withInput();
    }
    $ministerio = Ministerio::find($id);
    $ministerio->__construct($dadosForm);
    $ministerio->dataescala = Util::dateDB(Request::input('dataescala'));
    //dd($ministerio);  
    $ministerio->save();
    return Redirect::to('admin/ministerios');
  }

  public function getDeletar($id) 
  {
    $ministerio = Ministerio::find($id);
    $ministerio->delete();
    return Redirect::to('admin/ministerios');
  }

  public function MissingMethod($param = array()) 
  {
    return 'nao encontrado';
  }
}