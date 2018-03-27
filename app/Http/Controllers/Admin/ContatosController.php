<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Contato;
use Request;
use Redirect;
use DB;
use Validator;
use Input;

class ContatosController extends Controller 
{
  protected $rules = array('telefone' => 'required|max:20',
    'nome' => 'required|min:3|max:255','email' => 'required|email','mensagem' => 'required|min:3');

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
    $contatos = Contato::orderBy('id','desc')->paginate(8);
    //dd($contatos);
    return view('contato.lista',compact('contatos'));
  }

  public function getAdicionar() 
  {
    return view('contato.cadastrar');
  }

  public function postAdicionar() 
  {
    $dadosForm = Request::all();
    $validator = Validator::make($dadosForm,$this->rules);
    if ($validator->fails()) {
      return Redirect::to('admin/contatos/adicionar')->withErrors($validator)->withInput();
    }
    $contato = new Contato($dadosForm);
    $contato->save();
    $aEmail = array(
      'name' => $contato->nome,
      'email' => $contato->email,
      'subject' => "Contato Site",
      'msg' => $contato->mensagem
      );
    /*Mail::send('email',$aEmail, function($message)
    {
      $message->to('robson.djsilva@gmail.com', 'Robson')->subject('Teste Site!');
    });*/
    $mensagem = 'Mensagem Enviada com Sucesso!';
    return Redirect::to('admin/contatos');
  }

  public function getEditar($id) 
  {
    $contato = Contato::find($id);
    return view('contato.cadastrar',compact('contato'));
  }

  public function postEditar($id) 
  {
    $dadosForm = Request::all();
    $validator = Validator::make($dadosForm,$this->rules);
    if ($validator->fails()) {
      return Redirect::to("admin/contatos/editar/{$id}")->withErrors($validator)->withInput();
    }
    $contato = Contato::find($id);
    $contato->__construct($dadosForm);
    //dd($contato);
    $contato->save();
    return Redirect::to('admin/contatos');
  }

  public function getDeletar($id) 
  {
    $contato = Contato::find($id);
    $contato->delete();
    return Redirect::to('admin/contatos');
  }

  public function MissingMethod($param = array()) 
  {
    return 'nao encontrado';
  }
}