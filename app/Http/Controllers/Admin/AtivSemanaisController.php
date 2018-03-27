<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\AtivSemanal;
use Request;
use Redirect;
use DB;
use Validator;
use Input;
use App\Library\Util;

class AtivSemanaisController extends Controller 
{
  protected $rules = array('dia' => 'required',
    'atividade' => 'required|min:3|max:300','hora' => 'required');
  protected $aDiasSemana;

/**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
    $this->aDiasSemana = Util::getDiasSemana();
  }

  public function getIndex() 
  {
    $ativsemanais = AtivSemanal::orderBy('id','desc')->paginate(8);
    foreach ($ativsemanais as $ativsemanal) {
      $ativsemanal->dia = $this->aDiasSemana[$ativsemanal->dia];
    }
    //dd($ativsemanais);
    return view('ativsemanal.lista',compact('ativsemanais'));
  }

  public function getAdicionar() 
  {
    return view('ativsemanal.cadastrar');
  }

  public function postAdicionar() 
  {
    $dadosForm = Request::all();
    $validator = Validator::make($dadosForm,$this->rules);
    if ($validator->fails()) {
      return Redirect::to('admin/ativsemanais/adicionar')->withErrors($validator)->withInput();
    }
    $ativsemanal = new AtivSemanal($dadosForm);
    $ativsemanal->save();
    return Redirect::to('admin/ativsemanais');
  }

  public function getEditar($id) 
  {
    $ativsemanal = AtivSemanal::find($id);
    return view('ativsemanal.cadastrar',compact('ativsemanal'));
  }

  public function postEditar($id) 
  {
    $dadosForm = Request::all();
    $validator = Validator::make($dadosForm,$this->rules);
    if ($validator->fails()) {
      return Redirect::to("admin/ativsemanais/editar/{$id}")->withErrors($validator)->withInput();
    }
    $ativsemanal = AtivSemanal::find($id);
    $ativsemanal->__construct($dadosForm);
    //dd($ativsemanal);
    $ativsemanal->save();
    return Redirect::to('admin/ativsemanais');
  }

  public function getDeletar($id) 
  {
    $ativsemanal = AtivSemanal::find($id);
    $ativsemanal->delete();
    return Redirect::to('admin/ativsemanais');
  }

  public function MissingMethod($param = array()) 
  {
    return 'nao encontrado';
  }
}