<?php 

use App\Extensions\ConvertVnToEn;


function convertNameURI($text) {
	$convert = new ConvertVnToEn($text);
	return urlencode( strtolower($convert->convert()) );
}