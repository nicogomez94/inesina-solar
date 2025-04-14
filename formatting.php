<?php 
function codifica_nombre_para_url($url){

$url = trim($url);
$url = preg_replace ('(\ +)', " ",$url);
$url = html_entity_decode(strtolower($url));

$url = str_replace(array("á","é","í","ó","ú","ñ"," "),array("a","e","i","o","u","n","-"),$url);
return preg_replace('(([^0-9a-zA-Z_])+)', "-",$url);
}


?>