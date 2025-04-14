<?php require_once('Connections/inesina.php'); 



if (isset($_POST['email'])) {
  $loginUsername=$_POST['email'];
  $password=$_POST['pass'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "shop.php";
  $MM_redirectLoginFailed = "shop_login.php?error";
  $MM_redirecttoReferrer = false;
 // mysqli_select_db($database_inesina, $inesina);
  
  $LoginRS__query=sprintf("SELECT email, pass FROM registrados WHERE email=%s AND pass=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysqli_query($inesina, $LoginRS__query) or die(mysqli_error());
  $loginFoundUser = mysqli_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    //$_SESSION['MM_Username'] = $loginUsername;
	
	$query_productos = "SELECT * FROM registrados where email = '$loginUsername' and pass = '$password' limit 1";
	$productos = mysqli_query($inesina, $query_productos) ;
	$row_productos = mysqli_fetch_assoc($productos);

	//echo mysqli_num_rows($productos);
	if( mysqli_num_rows($productos)){
		 $_SESSION['MM_User_Id'] = $row_productos['Id'];
		 $_SESSION['MM_User_Nombre'] = $row_productos['nombre'];		 
	}
	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>