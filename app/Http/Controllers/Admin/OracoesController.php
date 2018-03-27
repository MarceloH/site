<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Oracao;
use Request;
use Redirect;
use DB;
use Validator;
use Input;

class OracoesController extends Controller 
{
  protected $rules = array('motivo' => 'required|min:3|max:255');

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
    $oracoes = Oracao::orderBy('id','desc')->paginate(8);
    //dd($oracoes);
    return view('oracao.lista',compact('oracoes'));
  }

  public function getAdicionar() 
  {
    return view('oracao.cadastrar');
  }

  public function postAdicionar() 
  {
    $dadosForm = Request::all();
    $validator = Validator::make($dadosForm,$this->rules);
    if ($validator->fails()) {
      return Redirect::to('admin/oracoes/adicionar')->withErrors($validator)->withInput();
    }
    $oracao = new Oracao($dadosForm);
    $oracao->save();
    return Redirect::to('admin/oracoes');
  }

  public function getEditar($id) 
  {
    $oracao = Oracao::find($id);
    return view('oracao.cadastrar',compact('oracao'));
  }

  public function postEditar($id) 
  {
    $dadosForm = Request::all();
    $validator = Validator::make($dadosForm,$this->rules);
    if ($validator->fails()) {
      return Redirect::to("admin/oracoes/editar/{$id}")->withErrors($validator)->withInput();
    }
    $oracao = Oracao::find($id);
    $oracao->__construct($dadosForm);
    //dd($oracao);
    $oracao->save();
    return Redirect::to('admin/oracoes');
  }

  public function getDeletar($id) 
  {
    $oracao = Oracao::find($id);
    $oracao->delete();
    return Redirect::to('admin/oracoes');
  }

  public function MissingMethod($param = array()) 
  {
    return 'nao encontrado';
  }
}