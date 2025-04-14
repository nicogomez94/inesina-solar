<?php include "header.php";
$query_novedades = "SELECT * FROM novedades order by fecha desc";
$novedades = mysqli_query($inesina, $query_novedades) or die(mysqli_error());
$row_novedades = mysqli_fetch_assoc($novedades);
$totalRows_novedades = mysqli_num_rows($novedades);
?>     
       
       <div class="cabnovedades">
	       <h1>NOVEDADES</h1>
       </div>
       
        <div class="novedades"><!--  -->
		  <div class="container">
			  <?php do { ?>
              <div class="item">
	              <div class="col-md-4">
		              <a href=""><img src="img_novedades/<?php echo $row_novedades['foto']; ?>" class="img-responsive"></a>
	              </div>
	              <div class="col-md-8">
		              <h1><?php echo $row_novedades['titulo']; ?></h1>
					  <h2><?php echo espanol($row_novedades['fecha']); ?></h2>
					  <p><?php echo smrFormatStr($row_novedades['copete']); ?></p>
					  <p><?php echo smrFormatStr($row_novedades['texto']); ?></p>
					  <a href="<?php echo $row_novedades['link']; ?>" class="mas" target="_blank">LEER M&Aacute;S</a>
	              </div>
	              <div class="clear"></div>
              </div>
              <?php } while ($row_novedades = mysqli_fetch_assoc($novedades)); ?>
              
			  <div class="clear"></div>
			  
		  </div>
	  </div><!-- -->	
       
       
       


	  
      	  
	  <?php include "pie.php"; ?>
