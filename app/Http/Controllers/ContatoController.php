<?php namespace App\Http\Controllers;

use App\Contato;
use App\Endereco;
use App\RedeSocial;
use Request;
use Redirect;
use DB;
use Validator;

class ContatoController extends Controller 
{
	  protected $rules = array('nome' => 'required|min:3|max:255','telefone' => 'required|max:20','email' => 'required|email','mensagem' => 'required|min:3');

  public function index($id = null) 
  {

    $endereco = Endereco::first();
    $redessociais = RedeSocial::orderBy('id')->get();
    
    return view('contato',compact('endereco','redessociais'));
  }

  public function save()
  {
  	$dadosForm = Request::all();
  	$validator = Validator::make($dadosForm,$this->rules);
  	if ($validator->fails()) {
  		return response()->json(['error' => 'true','errors' => $validator->errors()->all()]);
    }
    $contato = new Contato($dadosForm);
    $contato->save();
    $aEmail = array(
      'name' => $contato->nome,
      'email' => $contato->email,
      'tel' => $contato->telefone,
      'subject' => "Contato Site",
      'msg' => $contato->mensagem
      );
    /*Mail::send('email',$aEmail, function($message)
    {
      $message->to('ibressurreicao@gmail.com', 'Contato')->subject('Contato Site');
    });*/
    return response()->json(['error' => 'false']);
  }

}