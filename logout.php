<?php
session_start();
$_SESSION['MM_User_Id'] = NULL;
$_SESSION['MM_User_Nombre'] = NULL;
unset($_SESSION['MM_User_Id']);
unset($_SESSION['MM_User_Nombre']);
header("Location: index.php" );
?>