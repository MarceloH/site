<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Pastor;
use Request;
use Redirect;
use DB;
use Validator;
use Input;
use App\Library\Util;
use App\Library\ImageResize;
use Illuminate\Support\Facades\Storage;

class PastoresController extends Controller 
{
  protected $rules = array('nome' => 'required|min:3|max:200','categoria' => 'required|min:3|max:255','observacao' => 'required|min:3|max:255','foto' => 'required');
  protected $path = 'arquivos/pastor/';

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
    $pastores = Pastor::orderBy('id','desc')->paginate(8);
    return view('pastor.lista',compact('pastores'));
  }

  public function getAdicionar() 
  {
    
    return view('pastor.cadastrar');
  }

  public function postAdicionar() 
  {

    $dadosForm = Request::all();
    $validator = Validator::make($dadosForm,$this->rules);
    if ($validator->fails()) {
      return Redirect::to('admin/pastores/adicionar')->withErrors($validator)->withInput();
    }
    $pastor = new Pastor($dadosForm);
    
    if (Request::file('foto')) {
      $sNomeArquivo = Request::file('foto')->getClientOriginalName();
      if (Util::validateImage($sNomeArquivo) == false) {
        return Redirect::to('admin/pastores/adicionar')->withErrors("Tipo de arquivo inválido")->withInput();
      }
      $iCont = 1;
      while (file_exists($this->path.$sNomeArquivo)) {
        $sNomeArquivo = $iCont.Request::file('foto')->getClientOriginalName();
        $iCont++;
      }
      $pastor->foto = $sNomeArquivo;
      $pastor->save();
      Request::file('foto')->move($this->path,$sNomeArquivo);
      $image = new ImageResize($this->path.$sNomeArquivo);

      /* resolucao ideal para imagem na pagina */
      $image->resize(350, 210, $allow_enlarge = True);
      $image->save($this->path.$sNomeArquivo);
    } else {
      $pastor->save();
    }
    return Redirect::to('admin/pastores');
  }

  public function getEditar($id) 
  {
    $pastor = Pastor::find($id);
    //dd($pastor);
    return view('pastor.cadastrar',compact('pastor'));
  }

  public function postEditar($id) 
  {
    $dadosForm = Request::all();
    $validator = Validator::make($dadosForm,$this->rules);
    if ($validator->fails()) {
      return Redirect::to("admin/pastores/editar/{$id}")->withErrors($validator)->withInput();
    }
    $pastor = Pastor::find($id);
    $sNomeAnterior = $pastor->foto;
    $pastor->__construct($dadosForm);
    //dd($pastor);  
    if (Request::file('foto')) {
      $sNomeArquivo = Request::file('foto')->getClientOriginalName();
      if (Util::validateImage($sNomeArquivo) == false) {
        return Redirect::to('admin/pastores/adicionar')->withErrors("Tipo de arquivo inválido")->withInput();
      }
      $iCont = 1;
      while (file_exists($this->path.$sNomeArquivo)) {
        $sNomeArquivo = $iCont.Request::file('foto')->getClientOriginalName();
        $iCont++;
      }
      $pastor->foto = $sNomeArquivo;
      $pastor->save();
      Storage::delete($this->path.$sNomeAnterior);
      Request::file('foto')->move($this->path,$sNomeArquivo);
      $image = new ImageResize($this->path.$sNomeArquivo);

      /* resolucao ideal para imagem na pagina */
      $image->resize(350, 210, $allow_enlarge = True);
      $image->save($this->path.$sNomeArquivo);
    } else {
      $pastor->save();
    }
    return Redirect::to('admin/pastores');
  }

  public function getDeletar($id) 
  {
    $pastor = Pastor::find($id);
    $sNomeArquivo = $pastor->foto;
    $pastor->delete();
    Storage::delete($this->path.$sNomeArquivo);
    return Redirect::to('admin/pastores');
  }

  public function MissingMethod($param = array()) 
  {
    return 'nao encontrado';
  }
}