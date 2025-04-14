<?php
require_once('Connections/inesina.php');


$query_carrito = " SELECT id_producto, cantidad FROM cesta where id_venta = 0 and id_session = '$id_session'  ";
$carrito = mysqli_query($inesina, $query_carrito) or die(mysqli_error());
$row_carrito = mysqli_fetch_assoc($carrito);

if(mysqli_num_rows($carrito)){ 



   $insertSQL = sprintf("INSERT INTO ventas (fecha, id_registrado) VALUES (%s, %s)",
                       GetSQLValueString(date('Y-m-d'), "date"),
                       GetSQLValueString($_SESSION['MM_User_Id'], "text"));
  mysqli_query($inesina, $insertSQL) or die(mysqli_error());
  $id=$smrIDcargado=mysqli_insert_id($inesina);
  
  /*------------ LIMPIO EL CARRITO -----------*/
  	$SQL="update cesta set id_venta = $smrIDcargado where id_venta = 0 and id_session = '$id_session'";
	mysqli_query($inesina, $SQL) or die(mysqli_error());  
	
 $id_venta = $id;
 include "mail_carrito.php";



header("Location: shop_gracias.php"  );

   


} else { echo ' Tu carrito está vacio. <br><a href="index.php">Volver</a>'; }?>

