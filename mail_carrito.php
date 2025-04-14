<?php require_once('Connections/inesina.php');



if(isset($_GET['id_venta'])){ $id_venta=intval($_GET['id_venta']); }

$query_carrito = " SELECT * FROM cesta where id_venta =   $id_venta";
$carrito = mysqli_query($inesina, $query_carrito) or die(mysqli_error());
$row_carrito = mysqli_fetch_assoc($carrito);
if(mysqli_num_rows($carrito)){
	
	
$query_ventas = "SELECT * FROM ventas WHERE Id = $id_venta";
$ventas = mysqli_query($inesina, $query_ventas) or die(mysqli_error());
$row_ventas = mysqli_fetch_assoc($ventas);
$totalRows_ventas = mysqli_num_rows($ventas);	


$query_registrados = "SELECT * FROM registrados where Id = ".$row_ventas['id_registrado'];
$registrados = mysqli_query($inesina, $query_registrados ) or die(mysqli_error());
$row_registrados = mysqli_fetch_assoc($registrados);
$totalRows_registrados = mysqli_num_rows($registrados);

$html='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>inesina Web</title>
</head>

<body><br>
<table width="600" border="0" cellspacing="0" cellpadding="0"  style="margin:0 auto; font-family:Arial, Helvetica, sans-serif; background-color:#e8e8e8;">
  <tr>
    <td bgcolor="#242b5c" height="46" align="center" style="color:#FFF; font-size:22px;">&nbsp;
	<!--<img src="http://inesinasolar.com/mail_compra/01_mail_header.jpg" width="600" height="96" />-->
	</td>
  </tr>
  <tr>
    <td align="center">
	<!--
	<img src="http://inesinasolar.com/img/home/logo_inesina.svg" width="157" height="157" style="padding:44px 0" />
	-->
	</td>
  </tr>
  <tr>
    <td align="center" style="font-size:20px; color:#363636; padding-bottom:30px;"><div style="font-size:34px; color:#1a2889; padding-bottom:12px;">Tu pedido se realizó con éxito!</div>
      Muchas gracias.<br />
      Nos comunicaremos con vos a la brevedad para coordinar<br />
    la entrega de tu pedido.</td>
  </tr>
  
   <tr>
  <td style="padding:0px 40px 70px 40px;"><div style="font-size:22px; line-height:20px; color:#FF5824; text-transform:uppercase; padding-bottom:20px; font-weight:bold};"><b>datos de tu<br />
    pedido<br />
    _</b></div>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:40px; font-size:14px; color:#31596D;">
      <tr>
        <td width="50%" height="26"><strong>Fecha de compra:</strong> '.espanol($row_ventas['fecha']).'</td>
        <td height="26"><strong>Nombre:</strong> '.$row_registrados['nombre'].'</td>
      </tr>
      <tr>
        <td height="26"><strong>Razón social: </strong>'.$row_registrados['razon'].'</td>
        <td height="26"><strong>E-mail:</strong> '.$row_registrados['email'].'</td>
      </tr>
      <tr>
        <td height="26" colspan="2"><strong>Teléfono:</strong> '.$row_registrados['telefono'].'</td>
      </tr>
    </table></td>
  </tr>  
 
  
  <tr>
    <td style="padding:20px 40px;">
    	<div style="font-size:20px; color:#1a2889; text-transform:uppercase; padding-bottom:20px;">Detalle de tu compra</div>
        
      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:15px;">
      
   <tr style="font-weight:bold; color:333333;">
    <td height="36px" style="border-bottom:1px solid #bababa;">Cant.</td>
    <td style="border-bottom:1px solid #bababa;">Producto</td>
    <td align="right" style="border-bottom:1px solid #bababa;">Art.</td>
  </tr>
     ';
     

		
				    do{ 
					
				/*	$codigo_color = consulta($inesina,"color","colores",$row_carrito['id_color']);*/

					
		$html.='
  
  
    <tr style="color:636363; height:36px;">
    <td style="border-bottom:1px solid #bababa; padding:14px 0;">'.$row_carrito['cantidad'].'</td>
    <td style="border-bottom:1px solid #bababa;">'. $row_carrito['producto'].'</td>
    <td align="right" style="border-bottom:1px solid #bababa;">'. $row_carrito['articulo'].'</td>
  </tr>
 ';
 			        } while ($row_carrito = mysqli_fetch_assoc($carrito));   
 
 $html.='
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

    </td>
  </tr>
  <tr>
    <td align="center" style="font-size:28px; padding-bottom:32px;">
	<br />
      Muchas gracias <br />
    </td>
  </tr>
  <tr>
    <td bgcolor="#242b5c" height="46" align="center" style="color:#FFF; font-size:22px;"><a href="http://inesinasolar.com" style="color:#fff; font-size:14px;">inesinasolar.com</a></td>
  </tr>
</table>
</body>
</html>';
//echo $html;
  //////////////////////// Mando con mail
    $cabeceras = "MIME-Version: 1.0\n";
	$cabeceras .= "Content-type: text/html; charset=iso-8859-1\n";
	$cabeceras .=  "From:Inesina Solar <info@inesinasolar.com>";
	$cabeceras .= "\n";
if(isset($_GET['id_venta'])){
 echo $html;
}

	$html=utf8_decode($html);
    mail( "info@inesinasolar.com", "Nuevo pedido", $html,  $cabeceras );
	

	
   $email_cliente=consulta($inesina,"email","registrados",$row_registrados['Id']);
	mail( $email_cliente, "Nuevo pedido", $html,  $cabeceras );

}