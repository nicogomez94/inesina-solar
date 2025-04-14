<?php require_once('Connections/inesina.php'); 


$query_cesta = "update cesta set cantidad = ".intval($_GET['cantidad'])." where id_venta = 0 and id_session = '$id_session' and Id= ".intval($_GET['id']);
$cesta = mysqli_query($inesina, $query_cesta ) or die(mysqli_error());


/*
$query_cesta = "SELECT * FROM cesta where id_venta = 0 and id_session = '$id_session' and Id= ".intval($_GET['id']);
$cesta = mysqli_query($query_cesta, $inesina) or die(mysqli_error());
$row_cesta = mysqli_fetch_assoc($cesta);


             if($_SESSION['MM_User_Id']!=''){ 
	               $precio_oferta = consulta($inesina,"precio_mayorista","productos",$row_cesta['id_producto']); 
			 } else {   


$precio_oferta = consulta($inesina,"precio_oferta","productos",$row_cesta['id_producto']);

if(intval($precio_oferta)==0){
	$precio_oferta = consulta($inesina,"precio","productos",$row_cesta['id_producto']);	
}

			 }
			 
			 
			 echo formato($precio_oferta*intval($_GET['cantidad']));
*/
?>