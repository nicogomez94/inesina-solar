<?php include "header.php"; 


?>
       
       
       
       <div class="cabgrandes">
	       <h1>GRANDES DESARROLLOS</h1>
       </div>
       
       <div class="desarrollos"><!-- desarrollos -->
	       <div class="container">
		       
		       <div class="mod">
			       <div class="col-md-6 borde"><h2><span>QU&Eacute; </span>SON?</h2></div>
			       <div class="col-md-6">
				       <p>La planificación, ejecución y puesta en marcha de una instalación para la autogeneración de energía renovable implica el conocimiento y gestión de una amplia gama de factores a lo largo de todo el ciclo de vida del proyecto. En Inesina Solar, trabajamos en estrecha colaboración con los clientes, aportando nuestra experiencia asesorando integralmente en cada una de las fases, 
</p>
			       </div>
		       </div>
		       
		       <div class="clear"></div>
		       
		       <div class="mod2">
			       <div class="col-md-6 borde2"><p>Estamos particularmente especializados en empresas que quieren producir parte o toda la energía  que utilizan  (los grandes proyectos que empresas y servicios públicos llevan adelante para producir la energía que utilizan) . Con nuestra amplia experiencia, ofrecemos a nuestros clientes procesos probados, equipamiento confiable y soluciones eficientes que reflejan la alta calidad de nuestro trabajo.
</p></div>
			       <div class="col-md-6"><h2>EJECUCI&Oacute;N</h2></div>
			       <div class="clear"></div>
		       </div>
		       
		       <div class="clear"></div>
		       
		       <div class="mod">
			       <div class="col-md-6 borde"><h2><span>KNOW</span> HOW</h2></div>
			       <div class="col-md-6">
				       <p>Todos los proyectos ejecutados por Inesina Solar están controlados y supervisados por el Sr. Fernando Collini, Proyectista Instalador de Energìa Solar egresado del Censolar de España y cumplimentando con todas las altas exigencias que la CEE demanda. Contamos con el respaldo, asesoramiento y garantías de todos nuestros proveedores, empresas con vasta trayectoria en Energia solar;  De esta manera, ponemos a disposición de los clientes la experiencia necesaria para que se beneficien con nuestro extenso know-how y eviten errores que significan grandes sumas de dinero, tiempo y excusas.
</p>
			       </div>
		       </div>
		       
	       </div>
<?php
$query_servicios = "SELECT * FROM servicios where id_categoria = 1 order by nombre";
$servicios = mysqli_query($inesina, $query_servicios) or die(mysqli_error());
$row_servicios = mysqli_fetch_assoc($servicios);
if(mysqli_num_rows($servicios)){
?>	       
	       
	       <div class="serv"><!-- serv -->
		       <div class="container">
			       <h3>SERVICIOS</h3>
			       <div id="owlservicios" class="owl-carousel owl-theme">
<?php $i=0; do{ $i++;?>                   
                   
			       <div class="item">
				       <div class="foto">
				       <img src="img_servicios/<?php echo $row_servicios['foto']; ?>" alt="" class="img-responsive">
				       <div class="pop">
					       <h4><?php echo $row_servicios['nombre']; ?></h4>
					       <a href="servicios_grandesdesarrollos_detalle.php?id=<?php echo $row_servicios['Id']; ?>" class="ver">SABER M&Aacute;S</a>
				       </div>
				       </div>
			       </div>
                   
                   
<?php } while ($row_servicios = mysqli_fetch_assoc($servicios)); ?>
</div>
		       </div>
	       </div><!-- serv -->
<?php } ?>           
           
<?php
$query_obras = "SELECT * FROM obras  WHERE id_categoria = 1  and destacado = 'Y' order by orden asc limit 3";
$obras = mysqli_query($inesina, $query_obras) or die(mysqli_error());
$row_obras = mysqli_fetch_assoc($obras);
$totalRows_obras = mysqli_num_rows($obras);
?>	       
	       
	       <div class="principalesproyectos"><!-- principalesproyectos -->
		       <div class="container">
			       <h3><span>PRINCIPALES</span> PROYECTOS</h3>
                   
<?php $i=0; $t=0; $x=0; do{ $i++;?>                  
			       <div class="col-md-4">
				       <div class="foto">
				       <img src="img_obras/<?php echo $row_obras['foto']; ?>" alt="" class="img-responsive">
				       <div class="pop">
					       <h4><?php echo $row_obras['titulo']; ?></h4>					       
					       <a href="detalle.php?id=<?php echo $row_obras['Id']; ?>" class="ver">SABER M&Aacute;S</a>
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
		       </div>
	       </div><!-- principalesproyectos -->
       </div><!-- desarrollos -->	
       
       
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


    </script>