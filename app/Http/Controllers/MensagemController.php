<?php namespace App\Http\Controllers;

use App\Mensagem;
use Request;
use Redirect;
use DB;
use Validator;

class MensagemController extends Controller 
{

  public function index() 
  {

    $mensagens = Mensagem::orderBy('id','desc')->paginate(8);
    $aMensagensGeral = array();
    $aMensagens = array();
    foreach ($mensagens as $mensagem) {
      $aMensagens[] = $mensagem;
      if (count($aMensagens) == 2) {
        $aMensagensGeral[] = $aMensagens;
        $aMensagens = array();
      }
    }
    if (count($aMensagens) > 0) {
      $aMensagensGeral[] = $aMensagens;
    }
    return view('mensagem',compact('mensagens','aMensagensGeral'));
    
  }

}