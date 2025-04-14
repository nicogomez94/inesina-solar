<?php require_once('Connections/inesina.php'); ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Inesina Solar - Energía Sustentable</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="/css/main.css?2">

        <script src="/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-128938797-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-128938797-1');
</script>
		
    </head>
    <body id="home">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <nav class="navbar navbar-inverse navbar-fixed-topz fondomenu2b" id="cab">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/index.php"><img src="/img/home/logo_inesina.svg"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
	      	 
          <ul class="nav navbar-nav">
            <li><a href="/grandesdesarrollos.php">GRANDES DESARROLLOS</a></li>
            <li><a href="/obras_realizadas/">OBRAS REALIZADAS</a></li>
            <li><a href="/divisionhogares.php">DIVISION HOGAR</a></li>
            
<?php
$query_categorias = "SELECT * FROM categorias order by orden ";
$categorias = mysqli_query( $inesina, $query_categorias) or die(mysqli_error());
$row_categorias = mysqli_fetch_assoc($categorias);
//$totalRows_categorias = mysqli_num_rows($categorias);
?>            
            
            
            <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">SHOP</a>
				<ul class="dropdown-menu">
<?php do{ 

$query_subcategorias = "SELECT * FROM subcategorias  where id_categoria = ".$row_categorias['Id']." order by orden asc ";
$subcategorias = mysqli_query($inesina, $query_subcategorias) or die(mysqli_error());
$row_subcategorias = mysqli_fetch_assoc($subcategorias);

?>	
				
					<li class="dropdown-submenu">
					<a class="test" tabindex="9" href="/shop.php?id_categoria=<?php echo $row_categorias['Id']; ?>"><?php echo $row_categorias['nombre']; ?> <span><img src="img/ico_mas-blanco.svg"></span></a>
                    <?php if(mysqli_num_rows($subcategorias)){ ?>
					<ul class="dropdown-menu">
                    <?php do{ ?>
                    <li><a tabindex="9" href="/shop.php?id_subcategoria=<?php echo $row_subcategorias['Id']; ?>"><?php echo $row_subcategorias['nombre']; ?></a></li>
                    <?php } while ($row_subcategorias = mysqli_fetch_assoc($subcategorias)); ?>
                    </ul>
                    <?php } ?>
					</li>
					

 <?php } while ($row_categorias = mysqli_fetch_assoc($categorias)); ?>	
 				<?php if($_SESSION['MM_User_Id']!=''){?>
 					
					<li style="color:#fff; padding-bottom:10px; border-top:solid 1px #fff; padding-top:15px; margin-left:15px;">Bienvenido <strong><?php echo $_SESSION['MM_User_Nombre']; ?></strong></li>
					<li style="color:#fff; margin-left:15px;"><a href="/shop_carrito.php">Mi carrito</a></li>
					<li style="color:#fff; margin-left:15px;"><a href="/logout.php">Salir</a></li>					               
                <?php } else { ?>    
					<li><a href="/shop_login.php"><strong>REGISTRO / LOGIN</strong></a></li>                
                <?php } 
				

				?>
				</ul>
            </li>
            
<?php //} ?>            
            
            <li><a href="/tecnologias.php">TECNOLOGIAS</a></li>
            <li><a href="/novedades.php">NOVEDADES</a></li>
            <li><a href="/index.php#contacto" class="linkcontacto">CONTACTO</a></li>
          </ul>
          </div>
        </div><!--/.nav-collapse -->
      
    </nav>
