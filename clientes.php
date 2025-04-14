<?php
$query_clientes = "SELECT * FROM clientes order by orden asc";
$clientes = mysqli_query($inesina, $query_clientes ) or die(mysqli_error());
$row_clientes = mysqli_fetch_assoc($clientes);
if(mysqli_num_rows($clientes)){
?>


	  <div class="clientes"><!--  -->
	      <div class="container">
		  <h1 class="wow fadeInDown"><span>NUESTROS</span> CLIENTES</h1>
		  <div class="col-md-12">
		  <div id="owl-demo" class="owl-carousel owl-theme">
<?php do{ ?>          
		    	<div class="item"><img src="img_clientes/<?php echo $row_clientes['logo']; ?>"></div>
<?php } while ($row_clientes = mysqli_fetch_assoc($clientes)); ?>
		  </div>
		  </div>
		  </div>
	  </div><!--  -->
<?php } ?>      