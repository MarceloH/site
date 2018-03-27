<?php namespace App\Http\Controllers;

use App\Album;
use App\Foto;
use Request;
use Redirect;
use DB;
use Validator;

class GaleriaController extends Controller 
{

  public function index($id = null) 
  {
  
    $voltar = false;
    if ($id == null) {
      $fotos = Album::orderBy('id','desc')->paginate(10);
      $id = 0;
    } else {
      $fotos = DB::table('fotos')->join('albuns','fotos.id_album','=','albuns.id')
      ->select('fotos.*','albuns.titulo as album','albuns.data as data')->where('albuns.id','=',$id)->get();
      $voltar = true;
      $aFotosGeral = array();
      $aFotos = array();
      foreach ($fotos as $foto) {
        $aFotos[] = $foto;
        if (count($aFotos) == 3) {
          $aFotosGeral[] = $aFotos;
          $aFotos = array();
        }
      }
      if (count($aFotos) > 0) {
        $aFotosGeral[] = $aFotos;
      }
    }
    //dd($fotos);
    return view('galeria',compact('fotos','aFotosGeral','id','voltar'));
  }

}