<?php
require_once('Connections/inesina.php');




$query_obras = "SELECT *, obras.Id as Id FROM obras inner join trans_obras_servicios on obras.Id = trans_obras_servicios.id_obra where obras.id_categoria = 1 ";

if(intval($_GET['id_servicio'])!=0){
	$query_obras .= " and trans_obras_servicios.id_servicio = ".intval($_GET['id_servicio']);
}

//$query_obras .= " group by obras.Id order by orden "; 
$query_obras .= " order by orden "; 

$obras = mysqli_query($inesina, $query_obras) or die(mysqli_error($inesina));
$row_obras = mysqli_fetch_assoc($obras);
if(mysqli_num_rows($obras)){
	  $i=0; $t=0; $x=0; 
	  $idobra='';
	  do{ $i++;
	  
	  
	   if($idobra!=$row_obras['Id']){
		   ?>	      
			    
			       <div class="col-md-4 t<?php echo $t; ?>" <?php if($t>0){ echo ' style="display:none;" '; } ?> >
				       <div class="foto">
				       <img src="img_obras/<?php echo $row_obras['foto']; ?>" alt="" class="img-responsive">
				       <div class="pop">
					       <h4><span><?php echo $row_obras['titulo']; ?></span></h4>					       
					       <a href="detalle.php?id=<?php echo $row_obras['Id']; ?>" class="ver">SABER M&Aacute;S</a>
				       </div>
				       </div>
			       </div>

			     <?php if($i==3){echo'<div class="clear"></div>'; $i=0; $i--;}?>
                
<?php 
$x++;
if($x==6){ $t++; $x=0; }

$idobra=$row_obras['Id'];
	  }//fin idobra

} while ($row_obras = mysqli_fetch_assoc($obras)); 


} else { 

	echo 'No hay datos';

}?>

<?php if($t>0){ ?>
		 <a href="javascript:muestra();" id="c1" class="vermas"> CARGAR M&Aacute;S</a>              
<?php } ?>  
<script>
 var t = 0;
 var ft= <?php echo $t; ?>;

</script>