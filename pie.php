<?php
$query_servicios = "SELECT * FROM servicios where id_categoria = 1 order by nombre";
$servicios = mysqli_query($inesina, $query_servicios) or die(mysqli_error());
$row_servicios = mysqli_fetch_assoc($servicios);

?>
<?php
$query_obras = "SELECT * FROM obras WHERE destacado = 'Y' order by orden asc LIMIT 4";
$obras = mysqli_query($inesina, $query_obras) or die(mysqli_error());
$row_obras = mysqli_fetch_assoc($obras);
?>
	  <div class="pie"><!--  -->
		  <div class="container">
			  <div class="col-md-3">
				  <h1>SERVICIOS GRANDES DESARROLLOS</h1>
				  <ul>
					  <?php do{ ?>
					  <li><a href="servicios_grandesdesarrollos_detalle.php?id=<?php echo $row_servicios['Id']; ?>"><?php echo $row_servicios['nombre']; ?></a></li>
					  <?php } while ($row_servicios = mysqli_fetch_assoc($servicios)); ?>
					  <!--<a href="grandesdesarrollos.php" class="ver">VER M&Aacute;S SERVICIOS</a>-->
				  </ul>
			  </div>
			  
			  <?php
$query_servicios = "SELECT * FROM servicios where id_categoria = 2 order by nombre";
$servicios = mysqli_query($inesina, $query_servicios) or die(mysqli_error());
$row_servicios = mysqli_fetch_assoc($servicios);

?>

			  <div class="col-md-3">
				  <h1>SERVICIOS DIVISION HOGAR</h1>
				  <ul>
					  <?php do{ ?>
					  <li><a href="servicios_divisionhogar_detalle.php?id=<?php echo $row_servicios['Id']; ?>"><?php echo $row_servicios['nombre']; ?></a></li>
					  <?php } while ($row_servicios = mysqli_fetch_assoc($servicios)); ?>
					  <!--<a href="divisionhogares.php" class="ver">VER M&Aacute;S SERVICIOS</a>-->
				  </ul>
			  </div>
			  <div class="col-md-2">
				  <h1>PROYECTOS</h1>
				  <ul>
					  <?php do{ ?>
					  <li><a href="grandesdesarrollos_detalle.php?id=<?php echo $row_obras['Id']; ?>"><?php echo $row_obras['titulo']; ?></a></li>
					  <?php } while ($row_obras = mysqli_fetch_assoc($obras)); ?>
					  <a href="obras.php" class="ver">VER M&Aacute;S PROYECTOS</a>
				  </ul>
			  </div>
			  <div class="col-md-3 datos">
				  <ul>
					  <li><i class="fa fa-phone" aria-hidden="true"></i></li><li> (5411) 4721 0855<br>(5411) 6091 9015</li>
				  </ul>
				  <ul>
					  <li><i class="fa fa-envelope" aria-hidden="true"></i></li><li> <a href="mailto:info@inesinasolar.com">info@inesinasolar.com</a></li>
				  </ul>
				  <ul>
					  <li><i class="fa fa-map-marker" aria-hidden="true"></i></li><li> Cazadores de Coquimbo 3345 Munro <br> Buenos Aires - Argentina</li>
				  </ul>
			  </div>
			  <div class="col-md-1"></div>
		  </div>
	  </div><!--  -->
	  
	  <div class="copy"><!--  -->
		  <div class="container">
			  <div class="col-md-6"><img src="/img/home/logo_inesina.svg"></div>
			  <div class="col-md-6"><div class="up"><i class="fa fa-chevron-up" aria-hidden="true"></i></div></div>
		  </div>
	  </div><!--  -->	
	  
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="/js/vendor/bootstrap.min.js"></script>
		<script src="/js/jquery.bxslider/jquery.bxslider.min.js"></script>
		<link href="/js/jquery.bxslider/jquery.bxslider.css" rel="stylesheet" />
        <script src="/js/main.js"></script>
		<link href="/js/owl.carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
		<link href="/js/owl.carousel/owl-carousel/owl.theme.css" rel="stylesheet">
		<script src="/js/owl.carousel/owl-carousel/owl.carousel.js"></script>
	    <script>
    

    $(document).ready(function() {
     
      var owl = $("#owl-demo, #owl-demo2");
     
      owl.owlCarousel({
         
          itemsCustom : [
            [0, 1],
            [450, 1],
            [600, 1],
            [700, 4],
            [1000, 5],
            [1200, 5],
            [1400, 5],
            [1600, 5]
          ],
          navigation : true,
          autoPlay : 3000
     
      });
     
    });


    </script>
    <script src="/js/wow/dist/wow.min.js"></script>
    <link rel="stylesheet" href="/js/animate.css">
<script>
 new WOW().init();
</script> 
<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>   
    </body>
</html>
