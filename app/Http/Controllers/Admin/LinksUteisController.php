<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\LinkUtil;
use Request;
use Redirect;
use DB;
use Validator;
use Input;
use App\Library\ImageResize;
use App\Library\Util;
use Illuminate\Support\Facades\Storage;

class LinksUteisController extends Controller 
{
  protected $rules = array('nome' => 'required|min:3|max:50',
    'link' => 'required|min:3|max:200','imagem' => 'required');
  protected $path = 'arquivos/linkutil/';

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
    $linksuteis = LinkUtil::orderBy('id','desc')->paginate(8);
    //dd($linksuteis);
    return view('linkutil.lista',compact('linksuteis'));
  }

  public function getAdicionar() 
  {
    return view('linkutil.cadastrar');
  }

  public function postAdicionar() 
  {
    $dadosForm = Request::all();
    $validator = Validator::make($dadosForm,$this->rules);
    if ($validator->fails()) {
      return Redirect::to('admin/linksuteis/adicionar')->withErrors($validator)->withInput();
    }
    $linkutil = new LinkUtil($dadosForm);

    if (Request::file('imagem')) {
      $sNomeArquivo = Request::file('imagem')->getClientOriginalName();
      if (Util::validateImage($sNomeArquivo) == false) {
        return Redirect::to('admin/linksuteis/adicionar')->withErrors("Tipo de arquivo inválido")->withInput();
      }
      $iCont = 1;
      while (file_exists($this->path.$sNomeArquivo)) {
        $sNomeArquivo = $iCont.Request::file('imagem')->getClientOriginalName();
        $iCont++;
      }
      $linkutil->imagem = $sNomeArquivo;
      $linkutil->save();
      Request::file('imagem')->move($this->path,$sNomeArquivo);
      $image = new ImageResize($this->path.$sNomeArquivo);

      /* resolucao ideal para imagem*/
      $image->resize(262, 157, $allow_enlarge = True);
      $image->save($this->path.$sNomeArquivo);
    } else {
      $linkutil->save();
    }
    return Redirect::to('admin/linksuteis');
  }

  public function getEditar($id) 
  {
    $linkutil = LinkUtil::find($id);
    return view('linkutil.cadastrar',compact('linkutil'));
  }

  public function postEditar($id) 
  {
    $dadosForm = Request::all();
    $validator = Validator::make($dadosForm,$this->rules);
    if ($validator->fails()) {
      return Redirect::to("admin/linksuteis/editar/{$id}")->withErrors($validator)->withInput();
    }
    $linkutil = LinkUtil::find($id);
    $sNomeAnterior = $linkutil->imagem;
    $linkutil->__construct($dadosForm);
    //dd($linkutil);
    if (Request::file('imagem')) {
      $sNomeArquivo = Request::file('imagem')->getClientOriginalName();
      if (Util::validateImage($sNomeArquivo) == false) {
        return Redirect::to('admin/linksuteis/adicionar')->withErrors("Tipo de arquivo inválido")->withInput();
      }
      $iCont = 1;
      while (file_exists($this->path.$sNomeArquivo)) {
        $sNomeArquivo = $iCont.Request::file('imagem')->getClientOriginalName();
        $iCont++;
      }
      $linkutil->imagem = $sNomeArquivo;
      $linkutil->save();
      Storage::delete($this->path.$sNomeAnterior);
      Request::file('imagem')->move($this->path,$sNomeArquivo);
      $image = new ImageResize($this->path.$sNomeArquivo);

      /* resolucao ideal para imagem*/
      $image->resize(262, 157, $allow_enlarge = True);
      $image->save($this->path.$sNomeArquivo);
    } else {
      $linkutil->save();
    }
    return Redirect::to('admin/linksuteis');
  }

  public function getDeletar($id) 
  {
    $linkutil = LinkUtil::find($id);
    $linkutil->delete();
    return Redirect::to('admin/linksuteis');
  }

  public function MissingMethod($param = array()) 
  {
    return 'nao encontrado';
  }
}