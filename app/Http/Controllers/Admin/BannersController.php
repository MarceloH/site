<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Banner;
use Request;
use Redirect;
use DB;
use Validator;
use Input;
use App\Library\ImageResize;
use App\Library\Util;
use Illuminate\Support\Facades\Storage;

class BannersController extends Controller 
{
  protected $rules = array('titulo' => 'required|min:3|max:200','link' => 'required|min:1|max:250','foto' => 'required');
  protected $path = 'arquivos/banner/';

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
    $banners = Banner::orderBy('id','desc')->paginate(8);
    return view('banner.lista',compact('banners'));
  }

  public function getAdicionar() 
  {
    return view('banner.cadastrar');
  }

  public function postAdicionar() 
  {

    $dadosForm = Request::all();
    $validator = Validator::make($dadosForm,$this->rules);
    if ($validator->fails()) {
      return Redirect::to('admin/banners/adicionar')->withErrors($validator)->withInput();
    }
    $banner = new Banner($dadosForm);
    if (Request::file('foto')) {
      $sNomeArquivo = Request::file('foto')->getClientOriginalName();
      if (Util::validateImage($sNomeArquivo) == false) {
        return Redirect::to('admin/banners/adicionar')->withErrors("Tipo de arquivo inválido")->withInput();
      }
      $iCont = 1;
      while (file_exists($this->path.$sNomeArquivo)) {
        $sNomeArquivo = $iCont.Request::file('foto')->getClientOriginalName();
        $iCont++;
      }
      $banner->foto = $sNomeArquivo;
      $banner->save();
      Request::file('foto')->move($this->path,$sNomeArquivo);
      $image = new ImageResize($this->path.$sNomeArquivo);
      $image->resize(1690, 600, $allow_enlarge = True);
      $image->save($this->path.$sNomeArquivo);
    } else {
      $banner->save();
    }

    return Redirect::to('admin/banners');
  }

  public function getEditar($id) 
  {
    $banner = Banner::find($id);
    return view('banner.cadastrar',compact('banner'));
  }

  public function postEditar($id) 
  {
    $dadosForm = Request::all();
    $validator = Validator::make($dadosForm,$this->rules);
    if ($validator->fails()) {
      return Redirect::to("admin/banners/editar/{$id}")->withErrors($validator)->withInput();
    }
    $banner = Banner::find($id);
    $sNomeAnterior = $banner->foto;
    $banner->__construct($dadosForm);
    if (Request::file('foto')) {
      $sNomeArquivo = Request::file('foto')->getClientOriginalName();
      if (Util::validateImage($sNomeArquivo) == false) {
        return Redirect::to('admin/banners/adicionar')->withErrors("Tipo de arquivo inválido")->withInput();
      }
      $iCont = 1;
      while (file_exists($this->path.$sNomeArquivo)) {
        $sNomeArquivo = $iCont.Request::file('foto')->getClientOriginalName();
        $iCont++;
      }
      $banner->foto = $sNomeArquivo;
      $banner->save();
      Storage::delete($this->path.$sNomeAnterior);
      Request::file('foto')->move($this->path,$sNomeArquivo);
      $image = new ImageResize($this->path.$sNomeArquivo);
      $image->resize(1690, 600, $allow_enlarge = True);
      $image->save($this->path.$sNomeArquivo);
    } else {
      $banner->save();
    }
    return Redirect::to('admin/banners');
  }

  public function getDeletar($id) 
  {
    $banner = Banner::find($id);
    $sNomeArquivo = $banner->foto;
    $banner->delete();
    Storage::delete($this->path.$sNomeArquivo);
    return Redirect::to('admin/banners');
  }

  public function MissingMethod($param = array()) 
  {
    return 'nao encontrado';
  }
}