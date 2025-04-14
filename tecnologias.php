<?php include "header.php";

$query_tecnologias = "SELECT * FROM tecnologias order by titulo";
$tecnologias = mysqli_query($inesina, $query_tecnologias) or die(mysqli_error());
$row_tecnologias = mysqli_fetch_assoc($tecnologias);
if(mysqli_num_rows($tecnologias)){ 
?>
       
       
       <div class="cabtecno">
	       <h1>TECNOLOG&Iacute;AS</h1>
       </div>
       
        <div class="tecnologias"><!--  -->
		  <div class="container">
			  <div class="col-md-12">
			  <h2><span>“¿CU&Aacute;L ES LA FORMA M&Aacute;S RENTABLE</span> Y LOS REQUISITOS PARA LA APLICACI&Oacute;N?”</h2>
			  </div>
<?php do{ ?>              
			  <div class="col-md-4">
				  <a href="tecnologias_detalle.php?id=<?php echo $row_tecnologias['Id']; ?>"><img src="img_tecnologias/<?php echo $row_tecnologias['foto']; ?>" alt="" class="img-responsive"></a>
				  <p><?php echo $row_tecnologias['titulo']; ?></p>
			  </div>
<?php } while ($row_tecnologias = mysqli_fetch_assoc($tecnologias)); ?>
              
			  <div class="clear"></div>
			  
		  </div>
	  </div><!-- -->	
 <?php } ?>      
       
       
<?php include "clientes.php"; ?>
	  
<?php include "pie.php"; ?>
