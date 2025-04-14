<?php
include "header.php";
$query_productos = "SELECT * FROM productos where Id > 0 ";

if(isset($_GET['id_subcategoria'])){
	$query_productos .= "  and id_subcategoria =  ".intval($_GET['id_subcategoria']); 	
}

$query_productos .= "  order by nombre "; 

$productos = mysqli_query($inesina, $query_productos) ;
$row_productos = mysqli_fetch_assoc($productos);
if( mysqli_num_rows($productos)){



?>     
       
       <div class="cabshop">
	       <h1>SHOP</h1>
       </div>
       
        <div class="shop"><!--  -->
		  <div class="container">
			  

			  
			  <div class="prods gracias">
              
<p>Gracias por tu pedido!<br /> Nos pondremos en contacto a la brevedad.</p>
				  
				  <div class="clear"></div>
			  </div>
              
			  <div class="clear"></div>
			  
		  </div>
	  </div><!-- -->	
       
       
       


	  
      	  
	  <?php } include "pie.php"; ?>
