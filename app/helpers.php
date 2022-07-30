<?php 

use App\Extensions\ConvertVnToEn;


function convertNameURI($text) {
	$convert = new ConvertVnToEn($text);
	return urlencode( strtolower($convert->convert()) );
}

function searchForId($id, $array) {
   foreach ($array as $key => $val) {
       if ($val['id'] === $id) {
           return $val;
       }
   }
   return null;
}