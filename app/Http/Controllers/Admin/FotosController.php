<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Foto;
use App\Album;
use Request;
use Redirect;
use DB;
use Validator;
use Input;
use App\Library\ImageResize;
use Illuminate\Support\Facades\Storage;
use App\Library\Util;

class FotosController extends Controller 
{
  protected $rules = array('titulo' => 'required|min:3|max:200','id_album' => 'required','foto' => 'required');
  protected $path = 'arquivos/foto/';

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
    $fotos = DB::table('fotos')->join('albuns','fotos.id_album','=','albuns.id')
    ->select('fotos.*','albuns.titulo as album')->paginate(8);
    //dd($fotos);
    return view('foto.lista',compact('fotos'));
  }

  public function getAdicionar() 
  { 
   $albuns = Album::orderBy('id','desc')->get();
    $aAlbum = array(null => "Selecione o album");
    foreach ($albuns as $album) {
      $aAlbum[$album->id] = $album->titulo;
    } 
    return view('foto.cadastrar',compact('aAlbum'));
  }

  public function postAdicionar() 
  {

    $dadosForm = Request::all();
    $validator = Validator::make($dadosForm,$this->rules);
    if ($validator->fails()) {
      return Redirect::to('admin/fotos/adicionar')->withErrors($validator)->withInput();
    }
    $foto = new Foto($dadosForm);
    
    if (Request::file('foto')) {
      $sNomeArquivo = Request::file('foto')->getClientOriginalName();
      if (Util::validateImage($sNomeArquivo) == false) {
        return Redirect::to('admin/fotos/adicionar')->withErrors("Tipo de arquivo inválido")->withInput();
      }
      $iCont = 1;
      while (file_exists($this->path.$sNomeArquivo)) {
        $sNomeArquivo = $iCont.Request::file('foto')->getClientOriginalName();
        $iCont++;
      }
      $foto->foto = $sNomeArquivo;
      $foto->save();
      Request::file('foto')->move($this->path,$sNomeArquivo);
      $image = new ImageResize($this->path.$sNomeArquivo);

      /* resolucao ideal para imagem na galeria */
      $image->resize(1140, 475, $allow_enlarge = True);
      $image->save($this->path.$sNomeArquivo);

      /* imagem mini para galeria */
      $image->resize(270, 162, $allow_enlarge = True);
      $image->save($this->path.'mini_'.$sNomeArquivo);
    } else {
      $foto->save();
    }
    return Redirect::to('admin/fotos');
  }

  public function getEditar($id) 
  {
    $albuns = Album::orderBy('id','desc')->get();
    $aAlbum = array(null => "Selecione o album");
    foreach ($albuns as $album) {
      $aAlbum[$album->id] = $album->titulo;
    } 
    $foto = Foto::find($id);
    return view('foto.cadastrar',compact('foto','aAlbum'));
  }

  public function postEditar($id) 
  {
    $dadosForm = Request::all();
    $validator = Validator::make($dadosForm,$this->rules);
    if ($validator->fails()) {
      return Redirect::to("admin/fotos/editar/{$id}")->withErrors($validator)->withInput();
    }
    $foto = Foto::find($id);
    $sNomeAnterior = $foto->foto;
    $foto->__construct($dadosForm);

    if (Request::file('foto')) {
      $sNomeArquivo = Request::file('foto')->getClientOriginalName();
      if (Util::validateImage($sNomeArquivo) == false) {
        return Redirect::to('admin/fotos/adicionar')->withErrors("Tipo de arquivo inválido")->withInput();
      }
      $iCont = 1;
      while (file_exists($this->path.$sNomeArquivo)) {
        $sNomeArquivo = $iCont.Request::file('foto')->getClientOriginalName();
        $iCont++;
      }
      $foto->foto = $sNomeArquivo;
      $foto->save();
      Storage::delete($this->path.$sNomeAnterior);
      Request::file('foto')->move($this->path,$sNomeArquivo);
      $image = new ImageResize($this->path.$sNomeArquivo);

      /* resolucao ideal para imagem na galeria */
      $image->resize(1140, 475, $allow_enlarge = True);
      $image->save($this->path.$sNomeArquivo);

      /* imagem mini para galeria */
      $image->resize(270, 162, $allow_enlarge = True);
      $image->save($this->path.'mini_'.$sNomeArquivo);
    } else {
      $foto->save();
    }
    return Redirect::to('admin/fotos');
  }

  public function getDeletar($id) 
  {
    $foto = Foto::find($id);
    $sNomeArquivo = $foto->foto;
    $foto->delete();
    Storage::delete($this->path.$sNomeArquivo);
    Storage::delete($this->path.'mini_'.$sNomeArquivo);
    return Redirect::to('admin/fotos');
  }

  public function MissingMethod($param = array()) 
  {
    return 'nao encontrado';
  }
}