<?php require_once('Connections/inesina.php'); 

if ((isset($_POST["id_producto"])) && ($_POST["id_producto"] != "")) {


$query_carrito = "SELECT Id FROM cesta where id_venta=0 and id_session = '".$id_session."' and id_producto = ".intval($_POST['id_producto'])."  limit 1";
$carrito = mysqli_query($inesina, $query_carrito) or die(mysqli_error());
$row_carrito = mysqli_fetch_assoc($carrito);
if(mysqli_num_rows($carrito)){

	echo $sql = "update cesta set cantidad = cantidad + ".intval($_POST['cantidad'])." where Id = ".$row_carrito['Id'];
    mysqli_query($inesina, $sql) or die(mysqli_error());	

} else {
	
$producto = consulta($inesina,"nombre","productos",$_POST['id_producto']);
$articulo = consulta($inesina,"articulo","productos",$_POST['id_producto']);


  $insertSQL = sprintf("INSERT INTO cesta (fecha, id_session, id_producto, producto, articulo, color, marca, id_color, cantidad) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString(date('Y-m-d'), "date"),
                       GetSQLValueString($id_session, "text"),
                       GetSQLValueString($_POST['id_producto'], "int"),
                       GetSQLValueString($producto, "text"),
                       GetSQLValueString($articulo, "text"),					   
                       GetSQLValueString($color, "text"),					   					   
                       GetSQLValueString($marca, "text"),					   					   					   
                       GetSQLValueString($_POST['id_color'], "int"),					   
					   GetSQLValueString($_POST['cantidad'], "int"));
  mysqli_query($inesina, $insertSQL ) or die(mysqli_error());
}
}
?>