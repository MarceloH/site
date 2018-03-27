<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Endereco;
use Request;
use Redirect;
use DB;
use Validator;
use Input;

class EnderecosController extends Controller 
{
  protected $rules = array('telefone' => 'required|max:20','numero' => 'required|max:200',
    'endereco' => 'required|min:3|max:200','bairro' => 'required|min:2|max:200',
    'cidade' => 'required|min:3|max:200','estado' => 'required|max:2','cep' => 'required|max:9','email' => 'required|email');

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
    $enderecos = Endereco::orderBy('id','desc')->paginate(8);
    //dd($enderecos);
    return view('endereco.lista',compact('enderecos'));
  }

  public function getAdicionar() 
  {
    return view('endereco.cadastrar');
  }

  public function postAdicionar() 
  {
    $dadosForm = Request::all();
    $validator = Validator::make($dadosForm,$this->rules);
    if ($validator->fails()) {
      return Redirect::to('admin/enderecos/adicionar')->withErrors($validator)->withInput();
    }
    $endereco = new Endereco($dadosForm);
    $endereco->save();
    return Redirect::to('admin/enderecos');
  }

  public function getEditar($id) 
  {
    $endereco = Endereco::find($id);
    return view('endereco.cadastrar',compact('endereco'));
  }

  public function postEditar($id) 
  {
    $dadosForm = Request::all();
    $validator = Validator::make($dadosForm,$this->rules);
    if ($validator->fails()) {
      return Redirect::to("admin/enderecos/editar/{$id}")->withErrors($validator)->withInput();
    }
    $endereco = Endereco::find($id);
    $endereco->__construct($dadosForm);
    //dd($endereco);
    $endereco->save();
    return Redirect::to('admin/enderecos');
  }

  public function getDeletar($id) 
  {
    $endereco = Endereco::find($id);
    $endereco->delete();
    return Redirect::to('admin/enderecos');
  }

  public function MissingMethod($param = array()) 
  {
    return 'nao encontrado';
  }
}