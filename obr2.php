<?php
require_once('Connections/inesina.php');
$query_obras = "SELECT *, obras.Id as Id FROM obras inner join trans_obras_servicios on obras.Id = trans_obras_servicios.id_obra where obras.id_categoria = 2 ";

if(intval(substr($_GET['id_servicio'],1,1))!=0){
	$query_obras .= " and trans_obras_servicios.id_servicio = ".intval(substr($_GET['id_servicio'],1,1));
}

//$query_obras .= " group by obras.Id order by orden "; 
//echo $query_obras;
$obras = mysqli_query($inesina, $query_obras) or die(mysqli_error());
$row_obras = mysqli_fetch_assoc($obras);
if(mysqli_num_rows($obras)){
	  $i=0; $ts=0; $xs=0; 

	  $idobra='';
	  do{ 
	  
	  if($idobra!=$row_obras['Id']){$i++;
	  ?>	         
			    
			       <div class="col-md-4 ts<?php echo $ts; ?>" <?php if($ts>0){ echo ' style="display:none;" '; } ?> >
				       <div class="foto">
				       <img src="img_obras/<?php echo $row_obras['foto']; ?>" alt="" class="img-responsive">
				       <div class="pop">
					       <h4><span><?php echo $row_obras['titulo']; ?></span></h4>					       
					       <a href="detalle.php?id=<?php echo $row_obras['Id']; ?>" class="ver">SABER M&Aacute;S</a>
				       </div>
				       </div>
			       </div>

			     
                <?php if($i==3){echo '<div class="clear"></div>'; $i=0;   }?>
<?php 
$xs++;
if($xs==6){ $ts++; $xs=0; }

$idobra=$row_obras['Id'];
	  }//fin idobra

} while ($row_obras = mysqli_fetch_assoc($obras)); 


} else { 

	echo 'No hay datos';

}?>
<?php if($ts>0){ ?>
		 <a href="javascript:muestras();" id="cls" class="vermas clsx"> CARGAR M&Aacute;S</a>              
<?php } ?>  
<script>

  ts = 0;
  fts= <?php echo $ts; ?>;
 
 
 </script>