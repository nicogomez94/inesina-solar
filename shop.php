<?php
include "header.php";
$query_productos = "SELECT * FROM productos where Id > 0 ";

if(isset($_GET['id_categoria'])){
	$query_productos .= "  and id_categoria =  ".intval($_GET['id_categoria']); 	
}

if(isset($_GET['id_subcategoria'])){
	$query_productos .= "  and id_subcategoria =  ".intval($_GET['id_subcategoria']); 	
}

$query_productos .= "  order by orden  "; 

$productos = mysqli_query($inesina, $query_productos) ;
$row_productos = mysqli_fetch_assoc($productos);
if( mysqli_num_rows($productos)){



?>     
       
       <div class="cabshop">
	       <h1>SHOP</h1>
       </div>
       
        <div class="shop"><!--  -->
		  <div class="container">
			  
			  <div class="path">
				       <ul>
					       <li>
                           <?php if(isset($_GET['id_categoria'])){ ?>
                           <a href="shop.php?id_categoria=<?php echo $_GET['id_categoria']; ?>"><?php echo consulta($inesina,"nombre","categorias",$_GET['id_categoria']); ?></a>
                           <?php  } ?>
                           <?php if($_GET['id_subcategoria']!=''){ 
						   $id_cat = consulta($inesina,"id_categoria","subcategorias",$_GET['id_subcategoria']);
						   ?>
                           
                           <a href="shop.php?id_categoria=<?php echo $id_cat; ?>"><?php echo consulta($inesina,"nombre","categorias",$id_cat); ?></a>                            
						   <a href="shop.php?id_subcategoria=<?php echo intval($_GET['id_subcategoria']); ?>"><?php echo consulta($inesina,"nombre","subcategorias",$_GET['id_subcategoria']); ?></a>
                           <?php } ?>
                           </li>
				       </ul>
			       </div>
			  
			  <div class="prods">
              
<?php $i=0; do{ $i++;?>            
				  
				  <div class="col-md-4">
					  <a href="shop_detalle.php?id=<?php echo $row_productos['Id']; ?>">
					  <img src="img_productos/<?php echo $row_productos['foto']; ?>" alt="" class="img-responsive" />
					  <h1><?php echo $row_productos['nombre']; ?></h1>
					  </a>
					  <h2><?php echo consulta($inesina,"nombre","marcas",$row_productos['id_marca']); ?></h2>
					  <h3>Código: <?php echo $row_productos['articulo']; ?></h3>
				  </div>
				<?php if($i==3){echo '<div class="clear"></div>'; $i=0;}?> 
<?php } while ($row_productos = mysqli_fetch_assoc($productos)); ?>
				  
				  <div class="clear"></div>
			  </div>
              
			  <div class="clear"></div>
			  
		  </div>
	  </div><!-- -->	
       
       
       


	  
      	  
	  <?php } include "pie.php"; ?>
