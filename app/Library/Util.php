<?php namespace App\Library;

/**
 * Adicionar funcoes uteis para a aolicacao
 */
class Util
{
	
	function Util(){}

	static function dateDB($dateDB)
	{
		if (empty($dateDB)) {
			return null;
		}
		return implode("-",array_reverse(explode("/",$dateDB)));
	}

	static function dateBR($dateDB)
	{
		return implode("/",array_reverse(explode("-",$dateDB)));
	}

	static function getDiasSemana()
	{
		return $aDiasSemana = array(1 => 'Domingo',2 => 'Segunda-Feira',3 => 'Terça-Feira',4 => 'Quarta-Feira',5 => 'Quinta-Feira',6 => 'Sexta-Feira',7 => 'Sábado' );
	}

	static function validateImage($sNameImage) {
		$aExtensionAllowed = array('jpeg', 'jpg', 'png', 'gif');
		return self::validateTypeFile($sNameImage, $aExtensionAllowed);
	}	

	static function validateAudio($sNameAudio) {
		$aExtensionAllowed = array('mp3', 'acc', 'ogg', 'wma');
		return self::validateTypeFile($sNameAudio, $aExtensionAllowed);
	}

	static private function validateTypeFile($sName, $aExtensionAllowed) {
		$aExtension = explode('.', $sName);
		$aExtension = strtolower(end($aExtension));
		if (array_search($aExtension, $aExtensionAllowed) === false) {
			return false;
		}
		return true;
	}

}