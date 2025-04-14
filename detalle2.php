<?php include "header.php"; 
$url_param = $_GET['url_param'];
$url_param = str_replace('/', "",$url_param);

 $query_obras = "SELECT * FROM obras where url = '".$url_param."' AND id_categoria = ".intval($_GET['categoria']);
$obras = mysqli_query($inesina, $query_obras) or die(mysqli_error());
$row_obras = mysqli_fetch_assoc($obras);

if(mysqli_num_rows($obras)){
	$id_obra = $row_obras['Id'];
$query_obras_fotos = "SELECT * FROM obras_fotos where id_obra = ".intval($id_obra);
$query_obras_fotos .= " order by orden asc";


$obras_fotos = mysqli_query($inesina, $query_obras_fotos) or die(mysqli_error());
$row_obras_fotos = mysqli_fetch_assoc($obras_fotos);

 ?>
       
       
       
       <div class="cabgrandes">
	       <h1><?php if($row_obras['id_categoria']==1){echo 'GRANDES DESARROLLOS';} else {echo 'DIVISION HOGAR';}?></h1>
       </div>
       
       			       <?php if($row_obras['id_categoria']==1){$path_obras="/obras_realizadas/";} else {$path_obras="/division_hogar/";}?>
		       
		       
	       
	       <div class="desarrollosdetalle">
		       <div class="container">
		       <div class="col-md-5">
			       <h1><?php echo $row_obras['titulo']; ?></h1>
			       
			       <p><?php echo smrFormatStr($row_obras['texto']); ?></p>
<?php
$query_ico = "SELECT iconos.* FROM trans_iconos inner join iconos on trans_iconos.id_icono = iconos.Id where id_obra = ".intval($id_obra)." order by iconos.orden ";
$ico = mysqli_query($inesina, $query_ico ) or die(mysqli_error());
$row_ico = mysqli_fetch_assoc($ico);
if(mysqli_num_rows($ico)){  
?>                  
                   
			       <ul class="iconos">
<?php do{ ?>                   
				       <li>
                       <img src="/img_iconos/<?php echo $row_ico['icono']; ?>" width="50"  data-toggle="tooltip" data-placement="top" title="<?php echo $row_ico['titulo']; ?>"/>
                       </i></li>
<?php } while ($row_ico = mysqli_fetch_assoc($ico)); ?>
			       </ul>
<?php } ?>                  
                   
		       </div>
<?php if(mysqli_num_rows($obras_fotos)){ ?>               
		       <div class="col-md-7">
			    <div id="owl-demo4" class="owl-carousel owl-theme fotoslide">
<?php do{ ?>          
				<?php if($row_obras_fotos['video']=='') {?>
		    	<div class="item"><img src="/img_obras/<?php echo $row_obras_fotos['foto']; ?>"></div>
		    	<?php } else { ?>
		    	<div class="item"><iframe width="100%" height="465" src="https://www.youtube.com/embed/<?php echo $row_obras_fotos['video']; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>
		    	<?php } ?>
<?php } while ($row_obras_fotos = mysqli_fetch_assoc($obras_fotos)); ?>
		  		</div>
		  		<a href="<?php echo $path_obras; ?>" class="vermas">VER M&Aacute;S PROYECTOS</a>
		       </div>
		       </div>
<?php } ?>               
               
               
	       </div>
	       
	       <div class="frase1">RECURSOS INFINITOS</div>
<?php
$query_obras = "SELECT * FROM obras where Id != ".intval($id_obra)." and destacado = 'Y' order by orden asc limit 3";


$obras = mysqli_query($inesina, $query_obras) or die(mysqli_error());
$row_obras = mysqli_fetch_assoc($obras);
if(mysqli_num_rows($obras)){
?>	       
	       <div class="principalesproyectos"><!-- principalesproyectos -->
		       <div class="container">
			       <h3><span>PROYECTOS</span> RELACIONADOS</h3>

 <?php do{ ?>                  
			       <div class="col-md-4">
				       <div class="foto">
				       <img src="/img_obras/<?php echo $row_obras['foto']; ?>" alt="" class="img-responsive">
				       <div class="pop">
					       <h4><?php echo $row_obras['titulo']; ?></h4>					       
					       <a href="<?php echo $path_obras.$row_obras['url']; ?>/" class="ver">SABER M&Aacute;S</a>
				       </div>
				       </div>
			       </div>
                   
<?php } while ($row_obras = mysqli_fetch_assoc($obras)); ?>
			       
			       <div class="clear"></div>
			       <a href="<?php echo $path_obras ?>" class="vermas">VER M&Aacute;S PROYECTOS</a>
		       </div>
	       </div><!-- principalesproyectos -->
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