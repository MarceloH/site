<?php namespace App\Http\Controllers;

use App\LinkUtil;
use Request;
use Redirect;
use DB;
use Validator;

class LinkUtilController extends Controller 
{

  public function index($id = null) 
  {

    $linksuteis  = LinkUtil::paginate(12);
    $aLinksGeral = array();
    $aLinks      = array();
    foreach ($linksuteis as $link) {
    	$aLinks[] = $link;
    	if (count($aLinks) == 4) {
    		$aLinksGeral[] = $aLinks;
    		$aLinks = array();
    	}
    }
    if (count($aLinks) > 0) {
    	$aLinksGeral[] = $aLinks;
    }
    return view('linkutil',compact('linksuteis','aLinksGeral'));
  }

}