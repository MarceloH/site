<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mensagem;
use Request;
use Redirect;
use DB;
use Validator;
use Input;
use App\Library\Util;
use Illuminate\Support\Facades\Storage;

class MensagensController extends Controller 
{
  protected $rules = array('titulo' => 'required|min:3|max:200','descricao' => 'required|min:3|max:255','data' => 'required','audio' => 'required');
  protected $path = 'arquivos/mensagem/';

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
    $mensagens = Mensagem::orderBy('id','desc')->paginate(8);
    return view('mensagem.lista',compact('mensagens'));
  }

  public function getAdicionar() 
  {
    
    return view('mensagem.cadastrar');
  }

  public function postAdicionar() 
  {

    $dadosForm = Request::all();
    $validator = Validator::make($dadosForm,$this->rules);
    if ($validator->fails()) {
      return Redirect::to('admin/mensagens/adicionar')->withErrors($validator)->withInput();
    }
    $mensagem = new Mensagem($dadosForm);
    $mensagem->data = Util::dateDB(Request::input('data'));
    if (Request::file('audio')) {
      $sNomeArquivo = Request::file('audio')->getClientOriginalName();
      if (Util::validateAudio($sNomeArquivo) == false) {
        return Redirect::to('admin/mensagens/adicionar')->withErrors("Tipo de arquivo inválido")->withInput();
      }
      $iCont = 1;
      while (file_exists($this->path.$sNomeArquivo)) {
        $sNomeArquivo = $iCont.Request::file('audio')->getClientOriginalName();
        $iCont++;
      }
      $mensagem->audio = $sNomeArquivo;
      $mensagem->save();
      Request::file('audio')->move($this->path,$sNomeArquivo);
    } else {
      $mensagem->save();
    }
    return Redirect::to('admin/mensagens');
  }

  public function getEditar($id) 
  {
    $mensagem = Mensagem::find($id);
    return view('mensagem.cadastrar',compact('mensagem'));
  }

  public function postEditar($id) 
  {
    $dadosForm = Request::all();
    $validator = Validator::make($dadosForm,$this->rules);
    if ($validator->fails()) {
      return Redirect::to("admin/mensagens/editar/{$id}")->withErrors($validator)->withInput();
    }
    $mensagem = Mensagem::find($id);
    $sNomeAnterior = $mensagem->audio;
    $mensagem->__construct($dadosForm);
    $mensagem->data = Util::dateDB(Request::input('data'));
    if (Request::file('audio')) {
      $sNomeArquivo = Request::file('audio')->getClientOriginalName();
      if (Util::validateAudio($sNomeArquivo) == false) {
        return Redirect::to('admin/mensagens/adicionar')->withErrors("Tipo de arquivo inválido")->withInput();
      }
      $iCont = 1;
      while (file_exists($this->path.$sNomeArquivo)) {
        $sNomeArquivo = $iCont.Request::file('audio')->getClientOriginalName();
        $iCont++;
      }
      $mensagem->audio = $sNomeArquivo;
      $mensagem->save();
      Storage::delete($this->path.$sNomeAnterior);
      Request::file('audio')->move($this->path,$sNomeArquivo);
    } else {
      $mensagem->save();
    }
    return Redirect::to('admin/mensagens');
  }

  public function getDeletar($id) 
  {
    $mensagem = Mensagem::find($id);
    $sNomeArquivo = $mensagem->audio;
    $mensagem->delete();
    Storage::delete($this->path.$sNomeArquivo);
    return Redirect::to('admin/mensagens');
  }

  public function MissingMethod($param = array()) 
  {
    return 'nao encontrado';
  }
}