<?php include "header.php"; 
include "formatting.php"; 

$query_obras = "SELECT * FROM obras where id_categoria = 1 order by orden ";
$obras = mysqli_query($inesina, $query_obras) or die(mysqli_error());
$row_obras = mysqli_fetch_assoc($obras);
$totalRows_obras = mysqli_num_rows($obras);
 ?>
       
       
       
       <div class="cabobras">
	       <h1>OBRAS REALIZADAS</h1>
       </div>
       
       <div class="obras2">
	       <div class="container">
		       <h1><span>GRANDES</span> DESAROLLOS</h1>
			   <h2>Conozca nuestros grandes proyectos para importantes empresas en todo el país.</h2>
<?php
$query_servicios = "SELECT * FROM servicios where id_categoria = 1 order by nombre";
$servicios = mysqli_query($inesina, $query_servicios) or die(mysqli_error());
$row_servicios = mysqli_fetch_assoc($servicios);
$totalRows_servicios = mysqli_num_rows($servicios);
?>			   
			   <div class="cats">
				   <ul>
<?php do { ?>                   
					   <li class="grandes" id="<?php echo $row_servicios['Id']; ?>"><?php echo $row_servicios['nombre']; ?></li>
<?php } while ($row_servicios = mysqli_fetch_assoc($servicios)); ?>
					   <li class="grandes">TODOS</li>
				   </ul>
			   </div>
			   
			   <div class="principalesproyectos"><!-- principalesproyectos -->
               <div class="row" id="cont_grandes">
	<?php $i=0; $t=0; $x=0; do{ $i++;
		$url_linda = $row_obras['url'];
		if ($url_linda == ''){
			$url_linda = codifica_nombre_para_url( $row_obras['titulo']);
		}
	?>	       
			    
			       <div class="col-md-4 t<?php echo $t; ?>" <?php if($t>0){ echo ' style="display:none;" '; } ?> >
				       <div class="foto">
				       <img src="/img_obras/<?php echo $row_obras['foto']; ?>" alt="" class="img-responsive">
				       <div class="pop">
					       <h4><span><?php echo $row_obras['titulo']; ?></span></h4>					       
					       <a href="/obras_realizadas/<?php echo $url_linda; ?>/?id=<?php echo $row_obras['Id']; ?>" class="ver">SABER M&Aacute;S</a>
				       </div>
				       </div>
			       </div>

			     
                <?php if($i==3){echo'<div class="clear"></div>'; $i=0;}?>
<?php

$x++;
if($x==6){ $t++; $x=0; }
 } while ($row_obras = mysqli_fetch_assoc($obras)); ?>  
 
 <?php if($t>0){ ?>
		 <a href="javascript:muestra();" id="c1" class="vermas"> CARGAR M&Aacute;S</a>              
<?php } ?>         
         </div>         
			       <div class="clear"></div>
			       
		       
	       </div><!-- principalesproyectos -->
	       
	       </div>
       </div>
		       
		 <div class="frase2">PLENA EJECUCI&Oacute;N</div>
         <?php
$query_obras = "SELECT * FROM obras where id_categoria = 2 order by orden ";
$obras = mysqli_query($inesina, $query_obras) or die(mysqli_error());
$row_obras = mysqli_fetch_assoc($obras);
$totalRows_obras = mysqli_num_rows($obras);	
?>	 
		 <div class="obras2">
	       <div class="container">
		       <h1><span>DIVISION</span> HOGAR</h1>
			   <h2>Visite algunos de los cientos de proyectos realizados desde nuestra división hogar.</h2>

<?php
$query_servicios = "SELECT * FROM servicios where id_categoria = 2 order by nombre";
$servicios = mysqli_query($inesina, $query_servicios) or die(mysqli_error());
$row_servicios = mysqli_fetch_assoc($servicios);
$totalRows_servicios = mysqli_num_rows($servicios);
?>
			   
			   <div class="cats">
				   <ul>
<?php do { ?>                   
					   <li  class="hogar" id="h<?php echo $row_servicios['Id']; ?>"><?php echo $row_servicios['nombre']; ?></li>
<?php } while ($row_servicios = mysqli_fetch_assoc($servicios)); ?>
					   <li class="hogar">TODOS</li>
				   </ul>
			   </div>
			   
			   <div class="principalesproyectos"><!-- principalesproyectos -->
		       
			    <div class="row " id="cont_hogar" >
				<?php $i=0; $ts=0; $xs=0; do{ $i++;?>	       
			    
			       <div class="col-md-4 ts<?php echo $ts; ?>" <?php if($ts>0){ echo ' style="display:none;" '; } ?> > 
				       <div class="foto">
				       <img src="/img_obras/<?php echo $row_obras['foto']; ?>" alt="" class="img-responsive">
				       <div class="pop">
					       <h4><span><?php echo $row_obras['titulo']; ?></span></h4>					       
					       <a href="/obras_realizadas/?id=<?php echo $row_obras['Id']; ?>&url=<?php echo $row_obras['url']; ?>" class="ver">SABER M&Aacute;S</a>
				       </div>
				       </div>
			       </div>

			     
                <?php if($i==3){echo'<div class="clear"></div>'; $i=0;}?>
<?php

$xs++;
if($xs==6){ $ts++; $xs=0; }
 } while ($row_obras = mysqli_fetch_assoc($obras)); ?>

 <?php if($ts>0){ ?>
		 <a href="javascript:muestras();" id="c1s" class="vermas"> CARGAR M&Aacute;S</a>              
<?php } ?>  
			    </div>   
			       <div class="clear"></div>
			       
		       
	       </div><!-- principalesproyectos -->
	       
	       </div>
       </div>      
	       
	       	
<?php include "proveedores.php"; ?>
       
	  
	  
<?php include "pie.php"; ?>


<script type="text/JavaScript">
$(document).ready(function() {
	$(".grandes").click(function(){
		var id_servicio = $(this).attr("id");
		$(".grandes").removeClass('active');		
		$(this).addClass('active');
		$.get("obr.php", { id_servicio: id_servicio },
 			 function(data){
		   $("#cont_grandes").html(data);
		   
		   
		   
		   

jQuery(".serv .col-md-4, .principalesproyectos .col-md-4").hover(function(){
   jQuery(this).find(".pop").fadeIn();
  }, function (){
   jQuery(this).find(".pop").fadeOut();
  });		   
		   
		   
		   
		   
		   
		   
 		});
	});
	
	
	$(".hogar").click(function(){


		var id_servicio = $(this).attr("id");
		$(".hogar").removeClass('active');		
		$(this).addClass('active');
				
		$.get("obr2.php", { id_servicio: id_servicio },
 			 function(data){

		   $("#cont_hogar").html(data);

		   jQuery(".serv .col-md-4, .principalesproyectos .col-md-4").hover(function(){
   jQuery(this).find(".pop").fadeIn();
  }, function (){
   jQuery(this).find(".pop").fadeOut();
  });		
 		});
	});	
	
 });
 
 var t = 0;
 var ft= <?php echo $t; ?>;
 function muestra(){
	 t++;
	 $(".t"+t).show();
	 if(t==ft){  $("#c1").hide(); } 
	 
	 var u=0;
	 var tr = t+1;
	 $(".t"+tr).each(function(){
		 u++;
	 });
	 
	 if(u==0){ $("#c1").hide(); }	 
 }
 
 
 var ts = 0;
 var fts= <?php echo $ts; ?>;
 function muestras(){
	 
	 ts++;
	 $(".ts"+ts).show();
	 if(ts==fts){  $("#c1s").hide(); } 
	 
	 var u=0;
	 var tr = ts+1;
	 $(".ts"+tr).each(function(){
		 u++;
	 });
	 
	 if(u==0){ $("#c1s").hide(); $(".c1sx").hide(); document.getElementById("cls").style.display = "none"; } 
	 
 }

</script>
