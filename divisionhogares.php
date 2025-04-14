<?php include "header.php"; ?>
     
       
       
       
       <div class="cabhogar">
	       <h1>DIVISION HOGAR</h1>
       </div>
       
       <div class="hogar"><!-- hogar -->
	       <div class="container">
		       
		       <div class="mod">
			       <div class="col-md-6 borde"><h2><span>QU&Eacute; </span>SON?</h2></div>
			       <div class="col-md-6">
				       <p>Autoabastecerse de energía en el hogar, dejó de ser un sueño para convertirse en una realidad. La transformación hacia un sistema energético de tecnologías renovables tiene 
grandes ventajas no solo en el marco ambiental, sino también en el plano económico. Actualmente, nuestros sistemas brindan soluciones para iluminación, calentamiento y electricidad con la posibilidad de inyectar a la red eléctrica el excedente producido logrando un retorno económico.
</p>
			       </div>
		       </div>
		       
		       <div class="clear"></div>
		       
		       <div class="mod2">
			       <div class="col-md-6 borde2"><p>Con más de mil proyectos hogareños ejecutados a lo largo de todo el país, Inesina Solar pone su amplia experiencia a disposición de los clientes, con tecnologías, soluciones eficientes y servicios garantizados acordes a cada necesidad.</p></div>
			       <div class="col-md-6"><h2>EJECUCI&Oacute;N</h2></div>
			       <div class="clear"></div>
		       </div>
		       
		       <div class="clear"></div>
		       
		       <div class="mod">
			       <div class="col-md-6 borde"><h2><span>KNOW</span> HOW</h2></div>
			       <div class="col-md-6">
				       <p>Independientemente de su tamaño, cada proyecto se diseña y planifica cumpliendo con los más altos estándares de calidad de la industria y siguiendo procesos técnicos internacionales que aseguran la eficiencia de los resultados, a la vez que evitan errores costosos.
</p>
			       </div>
		       </div>
		       
	       </div>

<?php
$query_servicios = "SELECT * FROM servicios where id_categoria = 2  order by nombre";
$servicios = mysqli_query($inesina, $query_servicios) or die(mysqli_error());
$row_servicios = mysqli_fetch_assoc($servicios);
if(mysqli_num_rows($servicios)){
?>	       
	       <div class="serv"><!-- serv -->
		       <div class="container">
			       <h3>SERVICIOS</h3>
			       <div id="owlservicios" class="owl-carousel owl-theme">
<?php do{ ?>               
			       <div class="item">
				       <div class="foto">
				       <img src="img_servicios/<?php echo $row_servicios['foto']; ?>" alt="" class="img-responsive">
				       <div class="pop">
					       <h4><?php echo $row_servicios['nombre']; ?></h4>
					       <a href="servicios_divisionhogar_detalle.php?id=<?php echo $row_servicios['Id']; ?>" class="ver">SABER M&Aacute;S</a>
				       </div>
				       </div>
			       </div>
			       <?php if($i==3){echo '<div class="clear"></div>'; $i=0;}?>
<?php  } while ($row_servicios = mysqli_fetch_assoc($servicios)); ?>
 
  
 
 
			       </div>
		       </div>
	       </div><!-- serv -->
<?php } ?>	       


<?php
$query_obras = "SELECT * FROM obras WHERE id_categoria = 2 and destacado = 'Y' order by orden asc LIMIT 3";
$obras = mysqli_query($inesina, $query_obras) or die(mysqli_error());
$row_obras = mysqli_fetch_assoc($obras);
if(mysqli_num_rows($obras)){
?>
	       
	       <div class="principalesproyectos"><!-- principalesproyectos -->
		       <div class="container">
			       <h3><span>PRINCIPALES</span> PROYECTOS</h3>
                   
<?php $i=0; $t=0; $x=0; do{ $i++;?>	               
			       <div class="col-md-4 t<?php echo $t; ?>" <?php if($t>0){ echo ' style="display:none;" '; } ?> >
				       <div class="foto">
				       <img src="img_obras/<?php echo $row_obras['foto']; ?>" alt="" class="img-responsive">
				       <div class="pop">
					       <h4><?php echo $row_obras['titulo']; ?></h4>					       
					       <a href="servicios_divisionhogar_detalle.php?id=<?php echo $row_obras['Id']; ?>" class="ver">SABER M&Aacute;S</a>
				       </div>
				       </div>
			       </div>
			       <?php if($i==3){echo '<div class="clear"></div>'; $i=0;}?>
<?php 

$x++;
if($x==6){ $t++; $x=0; }
} while ($row_obras = mysqli_fetch_assoc($obras)); ?>
                   
<?php if($t>0){ ?>
		 <a href="javascript:muestra();" id="c1" class="vermas"> CARGAR M&Aacute;S</a>              
<?php } ?>                   
                   
			       
			       <div class="clear"></div>
			    <!--   <a href="obras.php" class="vermas">VER M&Aacute;S PROYECTOS</a>-->
		       </div>
	       </div><!-- principalesproyectos -->
<?php } ?>           
       </div><!-- hogar -->	
       
       
<?php include "clientes.php"; ?>
	  
<?php include "pie.php"; ?>
<script>
    

    $(document).ready(function() {
     
      var owl = $("#owlservicios");
     
      owl.owlCarousel({
         
          itemsCustom : [
            [0, 1],
            [450, 1],
            [600, 3],
            [700, 3],
            [1000, 3],
            [1200, 3],
            [1400, 3],
            [1600, 3]
          ],
          navigation : true,
          autoPlay : 3000
     
      });
     
    });
	
 var t = 0;
 var ft= <?php echo $t; ?>;
 function muestra(){
	 t++;
	 $(".t"+t).show();
	 if(t==ft){  $("#c1").hide(); } 
	 
	 var u=0;
	 var tr = t+1;
	 $(".t"+tr).each(function(){
		 u++;
	 });
	 
	 if(u==0){ $("#c1").hide(); }	 
 }
 	
</script>