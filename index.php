<?php include "header.php"; ?>
    
<?php
$query_sliders = "SELECT * FROM sliders order by orden asc";
$sliders = mysqli_query($inesina, $query_sliders ) or die(mysqli_error());
$row_sliders = mysqli_fetch_assoc($sliders);
if(mysqli_num_rows($sliders)){
?>     
     
       <div id="slider-wrapper">
	       
           
          
           
	  <div class="bx-wrapperz">
  		<ul class="bxslider" id="bx1">
<?php  do{ ?>        
	  	<li style="background-image:url(img_sliders/<?php echo $row_sliders['foto']; ?>); cursor:pointer;">
	  		<div class="texto">
		       <div class="container">
		       <h1><?php echo $row_sliders['titulo']; ?></h1>
			   <p><?php echo $row_sliders['copete']; ?></p>
               <?php if($row_sliders['url']!=''){ ?>
			   <a href="<?php echo $row_sliders['url']; ?>" class="ver">VER M&Aacute;S</a>
               <?php } ?>
			</div>
	       </div>
	  	</li>
<?php } while ($row_sliders = mysqli_fetch_assoc($sliders)); ?>
		</ul>
	  </div>
      
<?php } ?>      
      
	  </div><!-- slider -->
	  
	  
	  <div class="mod1"><!--  -->
		  <div class="container">
			  <div class="col-md-6 wow fadeInDown">
				  <img src="/img/home/inesina%20solar.jpg" alt="inesina%20solar" class="img-responsive">
			  </div>
			  <div class="col-md-6 col wow fadeInDown">
				  Fundada en el año 2002, en Buenos Aires, Inesina Solar opera como un proveedor especializado en soluciones para la autogeneración de energía renovable, vinculado con socios regionales y globales en más de 10 países y en 4 continentes.
			  </div>
		  </div>
	  </div><!--  -->
	  
	  <div class="especialistas"><!--  -->
		  <div class="container">
		  <h1 class="wow fadeInDown"><span>ESPECIALISTA</span> EN EL <span>SECTOR</span></h1>
		  <div class="col-md-4 wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.4s">
			  <h2>420+</h2>
			  <h3><span>PROYECTOS</span> EJECUTADOS</h3>
		  </div>
		  <div class="col-md-4 wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.6s">
			  <h2>1500</h2>
			  <h3><span>Mwh</span> GENERADOS</h3>
		  </div>
		  <div class="col-md-4 wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.8s">
			  <h2>52734 Tn</h2>
			  <h3><span>DE CO2</span> NO EMITIDAS</h3>
		  </div>
		  </div>
	  </div><!--  -->
      
<?php
$query_obras = "SELECT * FROM obras where id_categoria = 1 and destacado_home = 'Y' order by orden asc limit 3";
$obras = mysqli_query($inesina, $query_obras) or die(mysqli_error());
$row_obras = mysqli_fetch_assoc($obras);
if(mysqli_num_rows($obras)){
?>      
	  
	  <div class="obras padobras"><!--  -->
		  <div class="container">
			  <div class="col-md-12 wow fadeInDown">
			  <h1>OBRAS REALIZADAS</h1>
			  <h2><span>GRANDES</span> DESAROLLOS</h2>
			  </div>
<?php do{ ?>              
              
			  <div class="col-md-4">
				  <a href="grandesdesarrollos_detalle.php?id=<?php echo $row_obras['Id']; ?>">
                  <img src="img_obras/<?php echo $row_obras['foto']; ?>" alt="" class="img-responsive">
                  </a>
				  <p><?php echo $row_obras['titulo']; ?></p>
			  </div>
              
<?php } while ($row_obras = mysqli_fetch_assoc($obras)); ?>

			  <div class="clear"></div>
			  <a href="obras.php" class="ver">VER M&Aacute;S PROYECTOS</a>
		  </div>
	  </div><!-- -->
      
<?php } ?>      
	  
<?php include "clientes.php"; ?>

<?php
$query_satisfechos = "SELECT * FROM satisfechos order by orden asc";
$satisfechos = mysqli_query($inesina, $query_satisfechos) or die(mysqli_error());
$row_satisfechos = mysqli_fetch_assoc($satisfechos);
if(mysqli_num_rows($satisfechos)){
?>	  
	  <div class="clientes2"><!--  -->
		  <div class="container">
			  <div class="col-md-5 wow fadeInDown">
				  <h1><span>CLIENTES</span>
				  SATISFECHOS
				  </h1>
				  <p>Hablan por nosotros quienes depositan su confianza en Inesina Solar.</p>
			  </div>
			  <div class="col-md-7">
				  <div class="bx-wrapperz">
				  <ul class="bxslider" id="bx2">
				  <?php do{ ?>
				  <li>
				  	<img src="img_clientes/<?php echo $row_satisfechos['foto']; ?>" alt="clientes" width="248" height="180">
				  	<p><span><?php echo $row_satisfechos['texto']; ?></span></p>
				  	<h1><?php echo $row_satisfechos['nomape']; ?></h1>
				  	<h2><?php echo $row_satisfechos['cargo']; ?></h2>
				  </li>
				  <?php } while ($row_satisfechos = mysqli_fetch_assoc($satisfechos)); ?>
				  </ul>
	  </div>
			  </div>
		  </div>
	  </div><!--  -->
<?php } ?>      
      
<?php
$query_tecnologias = "SELECT * FROM tecnologias where destacado_home = 'Y' order by Id desc limit 3";
$tecnologias = mysqli_query($inesina, $query_tecnologias) or die(mysqli_error());
$row_tecnologias = mysqli_fetch_assoc($tecnologias);
if(mysqli_num_rows($tecnologias)){
?>	  
	  <div class="tecnologias"><!--  -->
		  <div class="container">
			  <div class="col-md-12 wow fadeInDown">
			  <h1>TECNOLOG&Iacute;AS</h1>
			  <h2><span>“¿CU&Aacute;L ES LA FORMA M&Aacute;S RENTABLE</span> Y LOS REQUISITOS PARA LA APLICACI&Oacute;N?”</h2>
			  </div>
              <?php do{ ?>
			  <div class="col-md-4">
				  <a href="tecnologias_detalle.php?id=<?php echo $row_tecnologias['Id']; ?>">
                  <img src="img_tecnologias/<?php echo $row_tecnologias['foto']; ?>" alt="" class="img-responsive">
                  </a>
				  <p><?php echo $row_tecnologias['titulo']; ?></p>
			  </div>
			  <?php } while ($row_tecnologias = mysqli_fetch_assoc($tecnologias)); ?>
              
              
			  <div class="clear"></div>
			  <a href="tecnologias.php" class="ver">VER M&Aacute;S</a>
		  </div>
	  </div><!-- -->
<?php } ?>      
	  
<?php include "proveedores.php"; ?>
<script src='https://www.google.com/recaptcha/api.js'></script>
	<form name="form_contacto" id="form_contacto" method="post" action="enviar.php">  
	  <div class="contacto" id="contacto"><!--  -->
		  <div class="container">
			  <div class="col-md-6"></div>
			  <div class="col-md-6">
				  <h1><span class="bold">CONTACTE</span> HOY<span class="br"></span>
				  CONSULTE SIN COMPROMISO</h1>
				  <div class="formulario">
					  <div class="col-md-6">
						  <label>TU NOMBRE</label>
						  <input type="text" required name="nombre">
					  </div>
					  <div class="col-md-6">
						  <label>TU MAIL</label>
						  <input name="email" type="email" required>
					  </div>
					  <div class="col-md-6">
						  <label>ASUNTO</label>
						  <input name="asunto" type="text" required>
					  </div>
					  <div class="col-md-6">
						  <label>TEL&Eacute;FONO</label>
						  <input name="tel" type="text" >
					  </div>
					  <div class="col-md-6">
						  <label>LOCALIDAD</label>
						  <input name="localidad" type="text">
					  </div>
					<!--  <div class="col-md-6">
						  <label>QU&Eacute; PODEMOS AYUDAR?</label>
						  <select>
							  <option>Seleccione</option>
						  </select>
					  </div>-->
                      <div class="col-md-6"></div>
					  <div class="col-md-12"><div class="g-recaptcha" data-sitekey="6Lfjt3MUAAAAAFt9alP7MJ2wXkWU_yWbeqSPBD9e"></div></div>
                      
					  <div class="col-md-6">
                      <?php if(isset($_GET['gracias'])){ ?>
                      <div>Gracias nos pondremos en contacto</div>
                      <?php } ?>
						  <label>&nbsp;</label>
						  <input type="submit" value="ENVIAR">
					  </div>
					 <!-- <div class="col-md-12"><img src="/img/captcha.png" alt="captcha" class="img-responsive"></div>-->
					  <div class="clear"></div>
				  </div>
			  </div>
		  </div>
	  </div><!--  -->
      </form>
	  
	  
<?php include "pie.php"; ?>
<script>   
    
$(document).ready(function(){
	$('#form_contacto').submit(function(e){ e.preventDefault();
			var values = {};

			$.each($( "#form_contacto :input" ).serializeArray(), function(i, field) {
		    	values[field.name] = field.value;
			});
			
			
	var response = grecaptcha.getResponse();
	if(response.length == 0){
										 alert('captcha erroneo');							  
								  } else {

			$.post("enviar.php", { data: values ,g:$("#g-recaptcha-response").val() },
				  function(data){
			location.replace('gracias.php');
			//alert(data);
				  });
								  }				
			
			
			
	});	
});  			
	    
</script>
