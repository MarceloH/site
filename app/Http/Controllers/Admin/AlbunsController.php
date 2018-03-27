<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Album;
use Request;
use Redirect;
use DB;
use Validator;
use Input;
use App\Library\Util;

class AlbunsController extends Controller 
{
  protected $rules = array('titulo' => 'required|min:3|max:200','data' => 'required');

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
    $albuns = Album::orderBy('id','desc')->paginate(8);
    return view('album.lista',compact('albuns'));
  }

  public function getAdicionar() 
  {
    
    return view('album.cadastrar');
  }

  public function postAdicionar() 
  {

    $dadosForm = Request::all();
    $validator = Validator::make($dadosForm,$this->rules);
    if ($validator->fails()) {
      return Redirect::to('admin/albuns/adicionar')->withErrors($validator)->withInput();
    }
    $album = new Album($dadosForm);
    $album->data = Util::dateDB(Request::input('data'));
    $album->save();
    return Redirect::to('admin/albuns');
  }

  public function getEditar($id) 
  {
    $album = Album::find($id);
    return view('album.cadastrar',compact('album'));
  }

  public function postEditar($id) 
  {
    $dadosForm = Request::all();
    $validator = Validator::make($dadosForm,$this->rules);
    if ($validator->fails()) {
      return Redirect::to("admin/albuns/editar/{$id}")->withErrors($validator)->withInput();
    }
    $album = Album::find($id);
    $album->__construct($dadosForm);
    $album->data = Util::dateDB(Request::input('data'));
    //dd($album);  
    $album->save();
    return Redirect::to('admin/albuns');
  }

  public function getDeletar($id) 
  {
    $album = Album::find($id);
    $album->delete();
    return Redirect::to('admin/albuns');
  }

  public function MissingMethod($param = array()) 
  {
    return 'nao encontrado';
  }
}