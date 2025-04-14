<?php 

require_once('Connections/inesina.php'); 

$query_obras = "SELECT * FROM obras where id_categoria = 1 order by orden ";
$obras = mysqli_query($inesina, $query_obras) or die(mysqli_error());

 
while ($row_obras  = mysqli_fetch_assoc($obras)){
	$url_base =  $row_obras['url'];
	$titulo =  $row_obras['titulo'];
	if ($url_base == ''){
		$url_linda = codifica_nombre_para_url( $row_obras['titulo']);
	}
	echo $titulo." => ".$url_base." => ".$url_linda."<br>";
}


function codifica_nombre_para_url($url){
$url = trim($url);
$url = preg_replace('( +)', " ",$url);
$url = html_entity_decode(strtolower($url));

$url = str_replace(array("á","é","í","ó","ú","ñ"," "),array("a","e","i","o","u","n","-"),$url);
return preg_replace('(([^0-9a-zA-Z_])+)', "-",$url);
}
?>	       
