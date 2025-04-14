<?php include "header.php";


if(isset($_POST['email'])){ 

	$query_novedades = "SELECT * FROM registrados where email = '".escape($_POST['email'])."' limit 1 ";
	$novedades = mysqli_query($inesina, $query_novedades) or die(mysqli_error());
	$row_novedades = mysqli_fetch_assoc($novedades);
	if(mysqli_num_rows($novedades)){
		  //////////////////////// Mando con mail
    $cabeceras = "MIME-Version: 1.0\n";
	$cabeceras .= "Content-type: text/html; charset=iso-8859-1\n";
	$cabeceras .=  "From:Inesina <shop@inesina.com.ar>";
	$cabeceras .= "\n";
    
  	$html='Tu pass es: '.$row_novedades['pass'];
  
    mail( $row_novedades['email'], "Inesina pass", $html,  $cabeceras );	

	
} else {
	$html='N';	
}

}

 ?>     
       
       <div class="cabshop">
	       <h1>SHOP</h1>
       </div>
       
        <div class="shop"><!--  -->
		  <div class="container">
			  
			  <div class="col-md-12">
				  <div class="login">
			        <h1>Recordar Contraseña</h1>
                    <form action="shop_recordar.php" method="post" name="form1" id="form1">
			        <input type="email" name="email" required placeholder="E-Mail">
			        <input type="submit" value="ENVIAR">
                    <?php if(isset($html)){ 
						if($html=='N'){
							?>
                            
					<div >Email no encontrado</div>
					
					<?php } else { ?>
					<div >Te enviamos un email con tu password</div>                    
                    <?php } } ?>
                    </form>
		        </div>
			  </div>
			  
			  
			  
              
			  <div class="clear"></div>
			  
		  </div>
	  </div><!-- -->	
       
       
       


	  
      	  
	  <?php include "pie.php"; ?>
