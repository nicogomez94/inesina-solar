<?php
require_once('Connections/inesina.php');

if ((isset($_POST["email"])) && ($_POST["email"] != "")) {
  $insertSQL = sprintf("INSERT INTO registrados (nombre, razon, telefono, email, pass) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($_POST['razon'], "text"),
                       GetSQLValueString($_POST['telefono'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['pass'], "text"));
  mysqli_query($inesina, $insertSQL ) or die(mysqli_error());
  $smrIDcargado=mysqli_insert_id($inesina);
  
  		 $_SESSION['MM_User_Id'] = $smrIDcargado;
		 $_SESSION['MM_User_Nombre'] = $_POST['nombre'];		 
		 
		 
  
  header("Location: shop.php");
}


 include "header.php";

?>     
       
       <div class="cabshop">
	       <h1>SHOP</h1>
       </div>
       
        <div class="shop"><!--  -->
		  <div class="container">
			  
			  <div class="col-md-6">
				  <div class="login">
			        <h1>Login</h1>
                    <form action="log.php" method="post" name="form1" id="form1">
			        <input type="email" name="email" placeholder="E-Mail">
			        <input type="password" name="pass" placeholder="Contraseña">
			        <a href="shop_recordar.php">Olvide mi contraseña</a>
			        <input type="submit" value="INGRESAR">
                    <?php if(isset($_GET['error'])){ ?>
                    <div>Usuario/password erroneos</div>
                    <?php } ?>
                    </form>
		        </div>
			  </div>
			  
			  
			  <div class="col-md-6">
				  <div class="login">
			        <h1>Registro</h1>
                    <form action="shop_login.php" method="post" name="form1" id="form1">
			        <input type="text" name="nombre" placeholder="Nombre y Apellido" required>
			        <input type="text" name="razon" placeholder="Razón Social" required>
			        <input type="text" name="telefono" placeholder="Teléfono" required>
			        <input type="email" name="email" placeholder="E-Mail" required>
			        <input type="password" name="pass" placeholder="Contraseña" required>
			        <input type="submit" value="REGISTRARME">
                    </form>
				  </div>
			  </div>
              
			  <div class="clear"></div>
			  
		  </div>
	  </div><!-- -->	
       
       
       


	  
      	  
	  <?php include "pie.php"; ?>
