<?php include "header.php"; 
$query_serv = "SELECT * FROM servicios where Id = ".intval($_GET['id']);
$serv = mysqli_query($inesina, $query_serv) or die(mysqli_error());
$row_serv = mysqli_fetch_assoc($serv);

$query_serv2 = "SELECT * FROM servicios where id_categoria = 2";
$serv2 = mysqli_query($inesina, $query_serv2) or die(mysqli_error());
$row_serv2 = mysqli_fetch_assoc($serv2);


$query_serv3 = "SELECT * FROM servicios_fotos where id_servicio = ".intval($_GET['id']);
$serv3 = mysqli_query($inesina, $query_serv3) or die(mysqli_error());
$row_serv3 = mysqli_fetch_assoc($serv3);
?>
     
       
       
       
       <div class="cabservhogar">
	       <h1>SERVICIOS DIVISION HOGAR</h1>
       </div>
       
       
		       
		       
	       
	       <div class="desarrollosdetalle sgd">
		       <div class="container">
			       
			       <div class="cats col-md-12">
				   <ul>
					   <?php do{ ?>
					   <li><a href="servicios_divisionhogar_detalle.php?id=<?php echo $row_serv2['Id']; ?>" <?php if($row_serv2['Id']==$_GET['id']){echo 'class="active"';}?>><?php echo $row_serv2['nombre']; ?></a></li>
					   <?php } while ($row_serv2 = mysqli_fetch_assoc($serv2)); ?>
				   </ul>
				   <div class="clear"></div>
			   	   </div>
			   	   
			   	   <div class="clear"></div>
			   
		       <div class="col-md-5">
			       <h3><?php echo $row_serv['nombre']; ?></h3>
			       <p><?php echo $row_serv['texto']; ?></p>
		       </div>
		       <div class="col-md-7">
			    <div id="owl-demo3" class="owl-carousel owl-theme fotoslide">
                <?php do{ ?>
		    	<div class="item"><img src="img_servicios/<?php echo $row_serv3['foto']; ?>"></div>
				<?php } while ($row_serv3 = mysqli_fetch_assoc($serv3)); ?>
		  		</div>
		       </div>
		       </div>
	       </div>
	       
	       <div class="container"><div class="barrita1"></div></div>
	       
	       <?php
$query_obras = "SELECT * FROM servicios order by rand() limit 3";
$obras = mysqli_query($inesina, $query_obras) or die(mysqli_error());
$row_obras = mysqli_fetch_assoc($obras);
$totalRows_obras = mysqli_num_rows($obras);
?>	       
	       
	       <div class="principalesproyectos"><!-- principalesproyectos -->
		       <div class="container">
			       <h3><span>PRINCIPALES</span> PROYECTOS</h3>
                   
 <?php do{ ?>                  
			       <div class="col-md-4">
				       <div class="foto">
				       <img src="img_servicios/<?php echo $row_obras['foto']; ?>" alt="" class="img-responsive">
				       <div class="pop">
					       <h4><?php echo $row_obras['nombre']; ?></h4>					       
					       <a href="servicios_divisionhogar_detalle.php?id=<?php echo $row_obras['Id']; ?>" class="ver">SABER M&Aacute;S</a>
				       </div>
				       </div>
			       </div>
                   
<?php } while ($row_obras = mysqli_fetch_assoc($obras)); ?>
			       
			       <div class="clear"></div>
			       <a href="obras.php" class="vermas">VER M&Aacute;S PROYECTOS</a>
		       </div>
	       </div><!-- principalesproyectos -->
       </div><!-- desarrollos -->	
       
<?php include "clientes.php"; ?>
	  
<?php include "pie.php"; ?>
	    <script>
    

    $(document).ready(function() {
     
      var owl = $("#owl-demo3");
     
      owl.owlCarousel({
         
          itemsCustom : [
            [0, 1],
            [450, 1],
            [600, 1],
            [700, 1],
            [1000, 1],
            [1200, 1],
            [1400, 1],
            [1600, 1]
          ],
          navigation : true,
          autoPlay : 3000
     
      });
     
    });


    </script>