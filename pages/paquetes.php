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

		<script src="../js/jquery.js"></script>
		<script src="../js/jquery-migrate-1.2.1.js"></script>
		<script src="../js/script.js"></script>
		<script src="../js/superfish.js"></script>
		<script src="../js/jquery.ui.totop.js"></script>
		<script src="../js/jquery.equalheights.js"></script>
		<script src="../js/jquery.mobilemenu.js"></script>		
		<script src="../js/jquery.easing.1.3.js"></script>

		<!-- -->
		<script src="../js/owl.carousel.js"></script>
		<script src="../js/camera.js"></script>
		<script src="../js/jquery.mobile.customized.min.js"></script>	
		<script src="../js/booking.js"></script>
		<!-- -->
		
		<script>
		$(document).ready(function(){
			$().UItoTop({ easingType: 'easeOutQuart' });
		});
		</script>
		<!--[if lt IE 8]>
		<div style=' clear: both; text-align:center; position: relative;'>
			<a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
				<img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
			</a>
		</div>
		<![endif]-->
		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<link rel="stylesheet" media="screen" href="css/ie.css">
		<![endif]-->


			<!-- ppppppppppppppppppppppppcodigo animaciónppppppppppppppppppppppppppppppppppp-->	
<!---- start-smoth-scrolling---->
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


	<!-- pppppppppppppppppppppppppppfin de codigo de animaciónpppppppppppppppppppppppppppppppppp-->	

	</head>



	<body>
<!--==============================header=================================-->
		<header class="wow bounceInRight animated" data-wow-delay="0.3s" style="visibility: visible; -webkit-animation-delay: 0.4s;" >
			<div class="container_12">
				<div class="grid_12 wow bounceInLeft animated" data-wow-delay="0.8s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
					<div class="menu_block ">
						<nav class="horizontal-nav full-width horizontalNav-notprocessed">
							<ul class="sf-menu " >
							<li ><a href="../index.php">INICIO</a></li>
								<li class="current"><a href="paquetes.php">PAQUETES</a></li>
								<li><a href="multimedia.php">MULTIMEDIA</a></li>
								<li><a href="blog.php">BLOG</a></li>
								<li><a href="contactos.php">CONTACTOS</a></li>
							</ul>
						</nav>
						<div class="clear"></div>
					</div>
				</div>
				<div class="grid_12  wow bounceInLeft animated" data-wow-delay="0.6s" style="visibility: visible; -webkit-animation-delay: 0.4s;" >
					<h1>
						<a href="../index.php">
							<img src="../images/logo.png" alt="Your Happy Family">
						</a>
					</h1>
				</div>
			</div>
		</header>
<!--==============================Content=================================-->





     <!--------------para el idioma----------->
     
     <!--
		 <div class="info">
    	<a href="#" class="back">
        
         <div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'es', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
           
        </a>
    </div>
        -->
        
        <!-----------------fin idioma-------------->
        











<?php
	include_once("../conexion.php");
	$link = Conectarse();
	//conuslta para paquetes aleatorios
$paquetesAleatorios ="SELECT idPaquete, nombrePaquete, imagen, costo FROM `paquetes` WHERE eliminar='0'  ORDER BY RAND()"; 
$paquetesAle = mysql_query($paquetesAleatorios,$link);
	
		//nombre del titulo
	$idPaqueteAl=array();
	$nombrePaqueteAl=array();
	$imagenAl=array();
	$costoAl=array();

while($row2 = mysql_fetch_array($paquetesAle))
		{
		array_push($idPaqueteAl,$row2[0]);
		array_push($nombrePaqueteAl,$row2[1]);
		array_push($imagenAl,$row2[2]);
		array_push($costoAl,$row2[3]);
		}

		 //calculos para almacenar las transiciones
		 
		$transicion =array();
 		$count=0;		 
 		$div=count($idPaqueteAl)/4;
 		$mod=count($idPaqueteAl)%4;
 		if($mod>0)
 		{
 			 $div++;
		 } 
		  for($j=0;$j<$div;$j++)
 		{
   			 $transicion[$count] = "banner wow fadeInUpBig animated";
 			 $transicion[$count+1] = "banner wow fadeInDownBig animated";
 			 $transicion[$count+2] = "banner wow bounceInLeft animated";
 			 $transicion[$count+3] = "banner wow bounceInRight animated";

 			 $count=+4;
		 } 
	
	?>

		<div class="content" style="padding:15px; ">

			<div class="container_12">

			
				<div class="banners" style="padding-top:10px; ">
				<h1 style="text-align:center;font-size:37px;">PAQUETES</h1>


                
					   <?php

			  for($k=0;$k<count($idPaqueteAl);$k++)
			  {
			   ?>
                
                <div class="grid_4 <?php echo $transicion[$k];?>" data-wow-delay="0.2s" style="visibility: visible; -webkit-animation-delay: 0.4s;">

					<div class="banner">


						<img src="../administracion/imagenes/paquetes/
						<?php
							 echo $imagenAl[$k];
						 ?>" 
						 alt="">

						<div class="label">
							<div class="title">
							<?php
							 echo $nombrePaqueteAl[$k];
							 ?>
							 </div>
							<div class="price">FROM<span>$ <?php echo $costoAl[$k];?></span></div>
							<a href="paquetes/paquete.php?cod=<?php echo $idPaqueteAl[$k];?>">Leer más</a>
							
						</div>
					</div>
				</div>
				
				
                <?php  } ?>
				                	
				</div>
			</div>
			


		</div>
<!--==============================footer=================================-->
		<footer>
			<div class="container_12">
				<div class="grid_12 ">
					<div class="socials wow bounceInRight animated" data-wow-delay="0.2s" style="text-align:justify;visibility: visible; -webkit-animation-delay: 0.4s;">
						<a href="https://www.facebook.com/pages/Wayquistravel/753117348070173?fref=ts" class="fa fa-facebook" target="_blank"></a>
						<a href="#" class="fa fa-twitter"></a>
						<a href="#" class="fa fa-google-plus"></a>
					</div>
					<div class="copy wow bounceInLeft animated" data-wow-delay="0.2s" style="text-align:justify;visibility: visible; -webkit-animation-delay: 0.4s;">
						(c) 2014 | <a href="#">Pol&iacute;ticas de Privacidad</a>| <a href="http://wayquistravel.com:2095/" target="_blank">Correo Coorporativo</a>  | Diseño <a href="http://www.itdecsa.com/" rel="nofollow" target="_blank">itdecsa.com</a>
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