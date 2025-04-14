<?php include "header.php"; 

$query_carrito = " SELECT * FROM cesta where id_venta = 0 and id_session = '$id_session'  ";
$carrito = mysqli_query($inesina, $query_carrito) or die(mysqli_error());
$row_carrito = mysqli_fetch_assoc($carrito);

 ?>
       
       
       
       <div class="cabshop">
	       <h1>MI CARRITO</h1>
       </div>
       
       
		       
		       
	       <div class="carrito"><!-- carrito -->
			<div class="container"><!--  -->
				
				
					
    <div class="row tabla"><!-- row -->
        
        
        
        
        
        
        <div id="no-more-tables"><!-- table --> <?php if(mysqli_num_rows($carrito)){ ?>	
            <table class="col-md-12 table-bordered table-striped table-condensed cf">
        		<thead class="cf titulo">
        			<tr>
        				<th>PRODUCTOS</th>
        				<th></th>
        				<!--<th align="center">PRECIO</th>-->
        				<th>CANTIDAD</th>
        				<th></th>
        				<!--<th align="center">PRECIO FINAL</th>-->
        			</tr>
        		</thead>
        		<tbody>
				    
	     
          
          
          <?php do { 
$foto = consulta($inesina,"foto","productos",$row_carrito['id_producto']);
$cate = consulta($inesina,"nombre","categorias",consulta($inesina,"id_categoria","productos",$row_carrito['id_producto']));

		  ?>	  		
        			<tr><!--  -->
        				<td data-title=""><a href="detalle.php?id=1087"><img src="img_productos/<?php echo $foto; ?>" alt="" class="img-responsive"></a></td>
        				<td data-title="">
	        				<h1><?php echo $cate; ?></h1>
	        				<h2><?php echo $row_carrito['articulo']; ?> - <?php echo $row_carrito['producto']; ?>                            
                            <div class="item" style="background-color:; width:25px;">&nbsp;</div>
                            </h2>
        				</td>
        				<!--<td data-title="" class="precio">$53.00 <span class="hidden-lg hidden-sm hidden-md">(Precio x Unid.)</span></td>-->
        				<td data-title="" class="center"><input type="number" readodnly name="quantity" onChange="cambiar(this.value,<?php echo $row_carrito['Id']; ?>);" min="1" max="" value="<?php echo $row_carrito['cantidad']; ?>"></td>
        				<td data-title="" style="padding:20px;"><span class="hidden-lg hidden-sm hidden-md">Eliminar</span> 
                        <a href="javascript:eliminar(<?php echo $row_carrito['Id']; ?>);" class="tooltips3"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
        				<!--<td data-title="" class="precio3">$53.00 <span class="hidden-lg hidden-sm hidden-md">(Precio Final)</span></td>-->
        			</tr><!--  -->
        			
        			
 <?php  } while ($row_carrito = mysqli_fetch_assoc($carrito));   ?> 

        			  
    		
        		</tbody>
        	</table>
            
                <?php
		
		$m='Y';
		 }  else { echo '<strong>Tu carrito está vacio</strong>'; 		$m='N';} ?>	
        </div><!-- table -->
        
        
        <div class="clear"></div>
        
    </div><!-- row -->	
    
  
    
    

                   
                   

                    
                    
                    
                    
                          
                   
                   
            <div class="clear"></div>     
        
    
    <!-- terminos y subtotal -->
    
    <div class="totalapagar">
	  


					<div class="comprar"><!-- comprar -->
    <div class="">
	    <a href="shop.php" class="boton1">Continuar comprando</a>
        <?php if($m=='Y'){ ?>
	    <span id="comprar">
        <a href="javascript:finalizar();" class="boton2">COMPLETAR COMPRA</a>
        </span>
        <?php } ?>
	</div>
	<div class="clear"></div>
    </div><!-- comprar -->	




        	  </div><!-- -->	
    </div>
    <!-- terminos y subtotal -->
    
    
    <div class="clear"></div>
    
    
			</div></div>
	             
 <script>
 
 function finalizar(){
	<?php if(isset($_SESSION['MM_User_Id']) && $_SESSION['MM_User_Id']!=''){ ?>
	if(confirm('Desea finalizar el pedido')){
		location.replace('finalizar.php');	
	}
	<?php  } else { ?>
	 		location.replace('shop_login.php');	
    <?php } ?>
 }
 
 
 function eliminar(id){
if(confirm('Seguro que desea elimnar?')){
$.get("eliminar_cesta.php", { id: id },
  function(data){
	location.reload();
  });
}
}



function cambiar(cantidad, id){
//	$("#detalle_compra").hide();
//	$("#mi_compra").html('');
	$.get("cantidad_cesta.php", { id: id, cantidad:cantidad },
  function(data){
//	  alert(data);
//	$("#precio"+id).html("$"+data);
//	$("#mi_compra").load('mi_compra.php');
//	if($("#cp").val()!=''){ oca(); }
	location.reload();
  });
}

 </script>      
	  
	  
<?php include "pie.php"; ?>
