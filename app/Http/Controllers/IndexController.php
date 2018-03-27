<?php namespace App\Http\Controllers;

use App\Banner;
use App\Album;
use App\Foto;
use App\Pastoral;
use App\Aviso;
use App\RedeSocial;
use App\AtivSemanal;
use App\Versiculo;
use App\Library\Util;
use Request;
use Redirect;
use DB;
use Validator;

class IndexController extends Controller 
{

  public function index() 
  {
    $home = array();
    $home['versiculo'] = Versiculo::first();
    $home['banners']  = Banner::orderBy('id','desc')->limit(7)->get();
    foreach ($home['banners'] as $banner) {
        $banner->first = true;
        break;
    }

    $albuns   = Album::has('foto')->orderBy('id','desc')->limit(6)->get();
    $iQuantFotos = Foto::count();
    $iQuantFotos = $iQuantFotos > 6 ? 6 : $iQuantFotos;
    $aIdFotos = array();
    $home['fotos'] = array();
    /**
     * Buscar fotos de todos os albuns cadastrados
     */
    while (count($home['fotos']) < $iQuantFotos) {
        foreach ($albuns as $album) {
            $fotos = Foto::where('id_album','=',$album->id)->whereNotIn('id',$aIdFotos)->orderBy('id','desc')->limit(1)->get()->toArray();
            if (!isset($fotos[0]['id']))
                continue;
            $aIdFotos[] = $fotos[0]['id'];
            $home['fotos'][] = Foto::find($fotos[0]['id']);
            if(count($home['fotos']) == $iQuantFotos)
                break;
        }
    }
    //dd($home['fotos']);

    $home['pastorais']  = Pastoral::orderBy('id','desc')->first();
    $home['avisos']  = Aviso::orderBy('id','desc')->first();
    $home['redessociais']  = RedeSocial::orderBy('id')->get();
    
    $ativsemanais  = AtivSemanal::orderBy('dia')->get();
    $aDiasSemana = Util::getDiasSemana();
    $home['ativsemanais'] = array();
    foreach ($ativsemanais as $ativsemanal) {
        $app = app();
        $oAtividade = $app->make('stdClass');
        $oAtividade->hora      = date('H:i',strtotime($ativsemanal->hora));
        $oAtividade->atividade = $ativsemanal->atividade;
        $home['ativsemanais'][$aDiasSemana[$ativsemanal->dia]][] = $oAtividade;
    }

    //dd($home['ativsemanais']);
    return view('index',compact('home'));
  }

}