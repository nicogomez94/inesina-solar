<?php include "header.php";

$query_productos = "SELECT * FROM productos WHERE Id = ".intval($_GET['id']);
$productos = mysqli_query($inesina, $query_productos) ;
$row_productos = mysqli_fetch_assoc($productos);
if( mysqli_num_rows($productos)){
	
$query_obras_fotos = "SELECT * FROM productos_fotos where id_producto = ".intval($_GET['id']);
$query_obras_fotos .= " order by orden asc";
$obras_fotos = mysqli_query($inesina, $query_obras_fotos) or die(mysqli_error());
$row_obras_fotos = mysqli_fetch_assoc($obras_fotos);	


function saco_video($v){
	$p	= strpos($v,'=');
	return(substr($v,$p+1));	
}
 ?>
       
       
       
       <div class="cabshop">
	       <h1><?php echo $row_productos['nombre']; ?></h1>
       </div>
       
       
		       
		       
	       
	       <div class="desarrollosdetalle">
		       <div class="container">
			       <div class="path">
				       <ul>
					       <li><a href="shop.php?id_categoria=<?php echo $row_productos['id_categoria']; ?>"><?php echo consulta($inesina,"nombre","categorias",$row_productos['id_categoria']); ?></a></li>
                           <?php if($row_productos['id_subcategoria']!=''){ ?>
						       <li><a href="shop.php?id_subcategoria=<?php echo $row_productos['id_subcategoria']; ?>"><?php echo consulta($inesina,"nombre","subcategorias",$row_productos['id_subcategoria']); ?></a></li>
                           <?php } ?>
                           
				       </ul>
			       </div>
		       <div class="col-md-5">
			       
			       <h4>Marca: <strong><?php echo $row_productos['nombre']; ?></strong></h4>
				   <h5>Código: <strong><?php echo $row_productos['articulo']; ?></strong></h5>
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
                   <a href="javascript:agregar();" class="vermas">AGREGAR</a><br />
		       </div>
 <?php if(mysqli_num_rows($obras_fotos)){ ?>               
		       <div class="col-md-7">
			    <div id="owl-demo4" class="owl-carousel owl-theme fotoslide">
<?php do{ ?>          
		    	<div class="item"><img src="img_productos/<?php echo $row_obras_fotos['foto']; ?>"></div>
<?php } while ($row_obras_fotos = mysqli_fetch_assoc($obras_fotos)); ?>
		  		</div>
		  		
		  	   <?php if($row_productos['video1']!='' || $row_productos['video2']!='' || $row_productos['video3']!=''){?>
		  	   <div class="videos">
			       <h1>VIDEOS</h1>
			       <ul>
				       <li><a href="<?php echo $row_productos['video1']; ?>" class="popup-youtube1"><h2><?php echo $row_productos['titulo_video1'];?></h2><img src="https://img.youtube.com/vi/<?php echo saco_video($row_productos['video1']); ?>/0.jpg" width="150"></a></li>
				       <li><a href="<?php echo $row_productos['video2']; ?>" class="popup-youtube2"><h2><?php echo $row_productos['titulo_video2'];?></h2><img src="https://img.youtube.com/vi/<?php echo saco_video($row_productos['video2']); ?>/0.jpg" width="150"></a></li>
				       <li><a href="<?php echo $row_productos['video3']; ?>" class="popup-youtube3"><h2><?php echo $row_productos['titulo_video3'];?></h2><img src="https://img.youtube.com/vi/<?php echo saco_video($row_productos['video3']); ?>/0.jpg" width="150"></a></li>
			       </ul>
		       </div>
		       <?php } ?>
		       </div>
		       </div>
		       
		       
<?php } ?>               
                           
               
               
	       </div>
	       
	       
<?php
$query_productos = "SELECT * FROM productos where Id != ".intval($_GET['id'])." and id_categoria = ".$row_productos['id_categoria']." order by rand() LIMIT 6" ;
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
					       <h4><?php echo $row_productos['nombre']; ?></h4>					       
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


function agregar(){
//alert('funciona');

$.post("cesta_add.php", { id_producto: '<?php echo intval($_GET['id']); ?>' , cantidad:1  },
  function(data){
//alert(data);
	alert('Producto agregado al carrito');
	location.replace('shop_carrito.php');
		/*	$.get("cant_carrito.php", { id_marca: ''  },
				  function(data){
						$("#cant_carrito").html(data);
			 });	*/
  });
}



    </script>
    <link rel="stylesheet" href="/js/Magnific-Popup-master/dist/magnific-popup.css">

<!-- Magnific Popup core JS file -->
<script src="/js/Magnific-Popup-master/dist/jquery.magnific-popup.js"></script>
<script>
	$(document).ready(function() {
        $('.popup-youtube1').magnificPopup({
          disableOn: 700,
          type: 'iframe',
          mainClass: 'mfp-fade',
          removalDelay: 160,
          preloader: false,

          fixedContentPos: false,
          
        });
      });
$(document).ready(function() {
        $('.popup-youtube2').magnificPopup({
          disableOn: 700,
          type: 'iframe',
          mainClass: 'mfp-fade',
          removalDelay: 160,
          preloader: false,

          fixedContentPos: false
        });
      });
$(document).ready(function() {
        $('.popup-youtube3').magnificPopup({
          disableOn: 700,
          type: 'iframe',
          mainClass: 'mfp-fade',
          removalDelay: 160,
          preloader: false,

          fixedContentPos: false
        });
      });
      </script>
