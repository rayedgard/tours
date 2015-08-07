<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<title>PAQUETES TUR&Iacute;STICOS</title>
		<meta charset="utf-8">
		<meta name="format-detection" content="telephone=no" />
		<link rel="icon" href="../images/favicon.ico">
		<link rel="shortcut icon" href="../images/favicon.ico" />
		<link rel="stylesheet" href="../css/style.css">

		<link rel="stylesheet" href="../css/booking.css">		<!-- -->
		<link rel="stylesheet" href="../css/camera.css">				<!-- -->
		<link rel="stylesheet" href="../css/owl.carousel.css">



		<link rel="stylesheet" type="text/css" href="../menucssjs/css/default.css" />
		<link rel="stylesheet" type="text/css" href="../menucssjs/css/component.css" />
		<script src="../menucssjs/js/modernizr.custom.js"></script>
        
 
<!--para la galeria-->

 <link rel="stylesheet" type="text/css" href="../css/jquery.lightbox.css">

<!--fin galeria-->
     
    

		<script type="text/javascript" src="../js/move-top.js"></script>
<script type="text/javascript" src="../js/easing.js"></script>

 <script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});
	</script>
<!---End-smoth-scrolling---->


<link rel="stylesheet" href="../css/swipebox.css">

			<script src="../js/jquery.swipebox.min.js"></script> 
			    <script type="text/javascript">
					jQuery(function($) {
						$(".swipebox").swipebox();
					});
				</script>

		<script src="../js/wow.min.js"></script>
			<link href="../css/animate.css" rel='stylesheet' type='text/css' />
			<script>
			new WOW().init();
		</script>










	</head>

	<body>

	<!--para los iconos de idioma-->    
    <a class='flotanteE' href='multimedia.php?i=0' ><img src='../images/esp.png' border="0"/></a>
    <a class='flotanteI' href='multimedia.php?i=1' ><img src='../images/ing.png' border="0"/></a>
	<!--fin idioma-->

		 <?php 
	include_once("../conexion.php");
	$link = Conectarse();
	

	//Codigo para discriminar el idioma

	if( $_GET['i']=='' or $_GET['i']=='1')
	{
		$i='1';
	}
	else
	{
		$i='0';
	}

	
	if($i==1)
	{
		//botones
	
		
		//etiquetas
		
		//titulos
		$titulo1="PHOTO GALLERIES";
		
			//pie de pagina
		$politicas="PRIVACY POLICIES";
		$corporativo="CORPORATE MAIL";
		$diseno="DESIGN";
	


	}
	if($i==0)
	{
		//botones
		
		//etiquetas
		
			//titulos
		$titulo1="GALERIA DE FOTOS";
		
		//pie de pagina
		$politicas="POLÍTICAS DE PRIVACIDAD";
		$corporativo="CORREO COORPORATIVO";
		$diseno="DISEÑO";

	}
	//fin discriminacion de idioma
?>
<!--==============================header=================================-->
	<header class="wow bounceInRight animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;" >
			<div class="container_12">
				<div class="grid_12 wow bounceInLeft animated" data-wow-delay="0.6s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
					<div class="menu_block">


						<nav class="horizontal-nav full-width horizontalNav-notprocessed">
						<?php  if($i=='1'){echo ' 	
							<ul class="sf-menu">
								<li><a href="../index.php?i='.$i.'">HOME</a></li>
								<li><a href="paquetes.php?i='.$i.'">PACKAGES</a></li>
								<li class="current"><a href="multimedia.php?i='.$i.'">MULTIMEDIA</a></li>
								<li><a href="blog.php?i='.$i.'">BLOG</a></li>
								<li><a href="contactos.php?i='.$i.'">CONTACTS</a></li>
                        	</ul>
                        	';}
                        	else
                        	{
                        		echo ' 	
							<ul class="sf-menu">
								<li ><a href="../index.php?i='.$i.'">INICIO</a></li>
								<li><a href="paquetes.php?i='.$i.'">PAQUETES</a></li>
								<li class="current"><a href="multimedia.php?i='.$i.'">MULTIMEDIA</a></li>
								<li><a href="blog.php?i='.$i.'">BLOG</a></li>
								<li><a href="contactos.php?i='.$i.'">CONTACTOS</a></li>
                        	</ul>
                        	';}
                        	?>	


						</nav>




						<div class="clear"></div>
					</div>
				</div>
				<div class="grid_12  wow bounceInRight animated" data-wow-delay="0.8s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
					<h1>
						<a href="../index.php">
							<img src="../images/logo.png" alt="Your Happy Family">
						</a>
					</h1>
				</div>
			</div>
		</header>
<!--==============================Content=================================-->


<?php

include_once("../conexion.php");
	$link = Conectarse();
	
$id = $_GET['cod'];
if($id<=0)
{ $id=1;}	



// consulta para realizar el modificado de la tabla
$consulta = mysql_query("SELECT nombreCategoria FROM categoriafotos WHERE idCategoriaFoto ='$id'",$link);
$row = mysql_fetch_array($consulta);






//conuslta para paquetes aleatorios
$fotos ="SELECT  nombreFoto FROM fotos WHERE idCategoriafoto='$id' ORDER BY RAND()"; 
$rfotos = mysql_query($fotos,$link);
	
//nombre del titulo
$nombrefoto=array();

while($row2 = mysql_fetch_array($rfotos))
		{
		array_push($nombrefoto,$row2[0]);
		}
	

	




//conuslta para las categoria de fotos
$catego ="SELECT  idCategoriaFoto, nombreCategoria FROM categoriafotos ORDER BY RAND()"; 
$cat = mysql_query($catego,$link);
	
//nombre del titulo
$idcat=array();
$nombres=array();

while($row1 = mysql_fetch_array($cat))
		{
		array_push($idcat,$row1[0]);	
		array_push($nombres,$row1[1]);
		}
	
?>












<div class="content" style="width=100%;">
	<div class="container_13" style="width=100%;">
	<h3 style="text-align:center;"><?php echo $titulo1;?></h3>
   
	  
	    <div class="container">	
	    <div class="main clearfix" >

				<nav id="menu" class="nav">	

					<ul>
				 	<?php
						for($k=0;$k<count($nombres);$k++)
						{
						?>
							<li>
								<a href="multimedia.php?cod=<?php echo $idcat[$k];?>&i=<?php echo $i;?>" >

								<span>
									<?php echo $nombres[$k]; ?>
								</span>

								</a>
							</li>

						<?php  } ?>	
					</ul>


					<ul>
					<li>
					 <a href="multimedia.php?cod=100"> 
					 	<span>
					 		VIDEOS
					 	</span>
					 </a>
					</li>

					</ul>



				</nav>


			</div>

			</div>
		



		<script>
			//  The function to change the class
			var changeClass = function (r,className1,className2) {
				var regex = new RegExp("(?:^|\\s+)" + className1 + "(?:\\s+|$)");
				if( regex.test(r.className) ) {
					r.className = r.className.replace(regex,' '+className2+' ');
			    }
			    else{
					r.className = r.className.replace(new RegExp("(?:^|\\s+)" + className2 + "(?:\\s+|$)"),' '+className1+' ');
			    }
			    return r.className;
			};	

			//  Creating our button in JS for smaller screens
			var menuElements = document.getElementById('menu');
			menuElements.insertAdjacentHTML('afterBegin','<button type="button" id="menutoggle" class="navtoogle" aria-hidden="true"><i aria-hidden="true" class="icon-menu"> </i> Menu</button>');

			//  Toggle the class on click to show / hide the menu
			document.getElementById('menutoggle').onclick = function() {
				changeClass(this, 'navtoogle active', 'navtoogle');
			}

			// http://tympanus.net/codrops/2013/05/08/responsive-retina-ready-menu/comment-page-2/#comment-438918
			document.onclick = function(e) {
				var mobileButton = document.getElementById('menutoggle'),
					buttonStyle =  mobileButton.currentStyle ? mobileButton.currentStyle.display : getComputedStyle(mobileButton, null).display;

				if(buttonStyle === 'block' && e.target !== mobileButton && new RegExp(' ' + 'active' + ' ').test(' ' + mobileButton.className + ' ')) {
					changeClass(mobileButton, 'navtoogle active', 'navtoogle');
				}
			}
		</script>
	   























    <!--bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb-->
	
			<h3 style="text-align:center; font-size:25px;"><?php echo $row[0]; ?></h3>
			</br>
    	<div id="container"><!--para las fotos-->
    	

			<ul class="gallery">
		    	<?php
		        for($j=0;$j<count($nombres);$j++)
				{
		        ?>
		          	 <li>
		        	   	<a href="../administracion/imagenes/fotos/<?php echo $row[0]; ?>/<?php echo $nombrefoto[$j]; ?>"> <img src="../administracion/imagenes/fotos/<?php echo $row[0]; ?>/<?php echo $nombrefoto[$j]; ?>">
		           		</a>
		             </li>
		         <?php  } ?>
			</ul> 


			<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
			</script>

			<script src="../js/jquery.lightbox.js">
			</script>

			<script>
			  // Initiate Lightbox
			  $(function() {
			    $('.gallery a').lightbox(); 
			  });
			</script>

    	</div>  


     </div> 				
        
 </div>
        
<!--==============================footer=================================-->
			<footer>
			<div class="container_12">
				<div class="grid_12">
					<div class="socials wow bounceInRight animated " data-wow-delay="0.2s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
						<a href="https://www.facebook.com/pages/Wayquistravel/753117348070173?fref=ts" class="fa fa-facebook" target="_blank"></a>
						<a href="#" class="fa fa-twitter"></a>
						<a href="#" class="fa fa-google-plus"></a>
					</div>
					<div class="copy wow bounceInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
						(c) 2014 | <a href="#"><?php echo $politicas;?></a>| <a href="http://itdecsa.com:2095/" target="_blank"><?php echo $corporativo;?></a> | <?php echo $diseno;?> <a href="http://www.itdecsa.com/" rel="nofollow" target="_blank">itdecsa.com</a>
					</div>
				</div>
			</div>
		</footer>


		<script>
		$(function (){
			$('#bookingForm').bookingForm({
				ownerEmail: '#'
			});
		})
		</script>
        
	</body>
</html>