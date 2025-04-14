<?php require_once('Connections/inesina.php'); 
$query_cesta = "DELETE FROM cesta where id_venta = 0 and id_session = '$id_session' and Id= ".intval($_GET['id']);
$cesta = mysqli_query($inesina, $query_cesta) or die(mysqli_error());
//echo  mysqli_num_rows($cesta);
?>