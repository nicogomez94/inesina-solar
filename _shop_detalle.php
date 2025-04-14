<?php include "header.php";

$query_productos = "SELECT * FROM productos WHERE Id = ".$_GET['id'];
$productos = mysqli_query($inesina, $query_productos) ;
$row_productos = mysqli_fetch_assoc($productos);
if( mysqli_num_rows($productos)){

 ?>
       
       
       
       <div class="cabshop">
	       <h1><?php echo $row_productos['nombre']; ?></h1>
       </div>
       
       
		       
		       
	       
	       <div class="desarrollosdetalle">
		       <div class="container">
			       <div class="path">
				       <ul>
					       <li><?php echo consulta($inesina,"nombre","categorias",$row_productos['id_categoria']); ?></li>
                           <?php if($row_productos['id_subcategoria']!=''){ ?>
						       <li><a href="shop.php?id_subcategoria=<?php echo $row_productos['id_subcategoria']; ?>"><?php echo consulta($inesina,"nombre","subcategorias",$row_productos['id_subcategoria']); ?></a></li>
                           <?php } ?>
                           
				       </ul>
			       </div>
		       <div class="col-md-5">
			       
			       <h4>Marca: <strong><?php echo $row_productos['nombre']; ?></strong></h4>
				   <h5>Código: <strong>123456</strong></h5>
			       <p><?php echo smrFormatStr($row_productos['descripcion']); ?></p>
				   <div class="clear"></div>
                   <div class="pdfs">
	                   <ul>
						<?php for($i=1;$i<4;$i++){
							if($row_productos['titulo_pdf'.$i]!=''){
							 ?>                       
		                   <li>
                           	<a href="img_productos/<?php echo $row_productos['pdf'.$i]; ?>" target="_blank">
                           		<span>
                                	<i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                </span> <?php echo $row_productos['titulo_pdf'.$i]; ?>
                            </a>
                           </li>
                        <?php } } ?>   
                           
                           
          
	                   </ul>
                   </div>
                   <a href="carrito.php" class="vermas">AGREGAR</a><br />
		       </div>
             
               
               
	       </div>
	       
	       
<?php
$query_productos = "SELECT * FROM productos where Id != ".intval($_GET['id']);
$productos = mysqli_query($inesina, $query_productos) or die(mysqli_error());
$row_productos = mysqli_fetch_assoc($productos);
if( mysqli_num_rows($productos)){
?>	       
	       <div class="principalesproyectos"><!-- relacionados -->
		       <div class="container">
			       <h3><span>PRODUCTOS</span> RELACIONADOS</h3>
 <?php do{ ?>                  
			       <div class="col-md-4">
				       <div class="foto">
				       <img src="img_productos/<?php echo $row_productos['foto']; ?>" alt="" class="img-responsive">
				       <div class="pop">
					       <h4><?php echo $row_productos['titulo']; ?></h4>					       
					       <a href="shop_detalle.php?id=<?php echo $row_productos['Id']; ?>" class="ver">SABER M&Aacute;S</a>
				       </div>
				       </div>
			       </div>
                   
<?php } while ($row_productos = mysqli_fetch_assoc($productos)); ?>
			       
			       <div class="clear"></div>
			       <a href="#" class="vermas">VER M&Aacute;S PRODUCTOS</a>
		       </div>
	       </div><!-- relacionados -->
       </div><!-- desarrollos -->	
  <?php } ?>
       
	  
	  
<?php } include "pie.php"; ?>
<script>
    

    $(document).ready(function() {
     
      var owl = $("#owl-demo4");
     
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
          autoPlay : false
     
      });
     
    });


    </script>