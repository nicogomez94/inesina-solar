<?php 
require_once('Connections/inesina.php');



$cabeceras = "MIME-Version: 1.0\r\n";
$cabeceras .= "Content-type: text/html; charset=iso-8859-1\r\n";
$cabeceras .=  "From:info@inesinasolar.com";
$cabeceras .= "\r\n";
$cabeceras .=  'Reply-To:'.$_POST['data']['email'];
$cabeceras .= "\r\n";

if($_POST['data']['nombre']!=''){

$asunto="Inesina Solar - Contacto"; 



$html='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<table width="100%" border="0">
  <tr>
    <td width="20%">Nombre y apellido</td>
    <td width="80%">'.$_POST['data']['nombre'].'</td>
  </tr>
  <tr>
    <td>Email</td>
    <td>'.$_POST['data']['email'].'</td>
  </tr>
  
  
    <tr>
    <td>Asunto</td>
    <td>'.$_POST['data']['asunto'].'</td>
  </tr>
    <tr>
    <td>Telefono</td>
    <td>'.$_POST['data']['tel'].'</td>
  </tr>
    <tr>
    <td>Localidad</td>
    <td>'.$_POST['data']['localidad'].'</td>
  </tr>



</table>

</body>
</html>
';	

//mail( 'emauri@gmail.com', $asunto, $html,  $cabeceras );


    $userIP = $_SERVER["REMOTE_ADDR"];
    $recaptchaResponse = $_REQUEST['g'];
    $secretKey = "6Lfjt3MUAAAAACkr6c-ZFWf4RVv0kgneRDvBjTRZ";
 $request = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$recaptchaResponse}&remoteip={$userIP}");
if(strstr($request, "true")){

mail( 'info@inesinasolar.com', $asunto, $html,  $cabeceras );
//mail( 'emauri@gmail.com', $asunto, $html,  $cabeceras );
//mail( 'infobas@gmail.com', $asunto, $html,  $cabeceras );
}

//header("Location: gracias.php");
}

?>