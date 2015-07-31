<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>DESTINOS</title>
		<meta charset="utf-8">
		<meta name="format-detection" content="telephone=no" />
		<link rel="icon" href="../../images/favicon.ico">
		<link rel="shortcut icon" href="../../images/favicon.ico" />
		<link rel="stylesheet" href="../../css/style.css">

		<link rel="stylesheet" href="../../booking/css/booking.css">				<!-- -->
		<link rel="stylesheet" href="../../css/camera.css">				<!-- -->
		<link rel="stylesheet" href="../../css/owl.carousel.css">


		<script src="../../js/jquery.js"></script>
		<script src="../../js/jquery-migrate-1.2.1.js"></script>
		<script src="../../js/script.js"></script>
		<script src="../../js/superfish.js"></script>
		<script src="../../js/jquery.ui.totop.js"></script>
		<script src="../../js/jquery.equalheights.js"></script>
		<script src="../../js/jquery.mobilemenu.js"></script>
		<script src="../../js/jquery.easing.1.3.js"></script>

		<script src="../../js/owl.carousel.js"></script>
		<script src="../../js/camera.js"></script>
		<script src="../../js/jquery.mobile.customized.min.js"></script>
		<script src="../../booking/js/booking.js"></script>



		<script>
		$(document).ready(function(){
			$().UItoTop({ easingType: 'easeOutQuart' });
			});
		</script>

		<script type="text/javascript" src="../../js/move-top.js"></script>
		<script type="text/javascript" src="../../js/easing.js"></script>

	     <script type="text/javascript">
			jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
				});
			});
		</script>
		<!---End-smoth-scrolling---->


		<link rel="stylesheet" href="../../css/swipebox.css">

			<script src="../../js/jquery.swipebox.min.js"></script> 
			    <script type="text/javascript">
					jQuery(function($) {
						$(".swipebox").swipebox();
					});
				</script>

		<script src="../../js/wow.min.js"></script>
			<link href="../../css/animate.css" rel='stylesheet' type='text/css' />
			<script>
			new WOW().init();
		</script>



	</head>
	<body>
<!--==============================header=================================-->
		<header class="wow bounceInRight animated" data-wow-delay="0.3s">
			<div class="container_12">
				<div class="grid_12 wow fadeInUpBig animated animated" data-wow-delay="0.2s">
					<div class="menu_block">
						<nav class="horizontal-nav full-width horizontalNav-notprocessed">
							<ul class="sf-menu">
								<li ><a href="../../index.php">INICIO</a></li>
								<li class="current"><a href="../paquetes.php">PAQUETES</a></li>
								<li><a href="../multimedia.php">MULTIMEDIA</a></li>
								<li><a href="../blog.php">BLOG</a></li>
								<li><a href="../contactos.php">CONTACTOS</a></li>
							</ul>
						</nav>
						<div class="clear"></div>
					</div>
				</div>
				<div class="grid_12 wow bounceInLeft animated" data-wow-delay="0.4s">
					<h1>
						<a href="../../index.php">
							<img src="../../images/logo.png" alt="Your Happy Family">
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
        








		<div class="content"><div class="ic">More Website Templates @ itdecsa.com - February 10, 2014!</div>
			<div class="container_12">
				<div class="grid_8">
					<h3 class="wow bounceInLeft" data-wow-delay="0.4s">DESTINOS</h3>
	
    
    <?php
	
	include_once("../../conexion.php");
	$link = Conectarse();
$id= $_GET['cod'];



	//conuslta para paquetes aleatorios
$paquetesAleatorios ="SELECT idPaquete, nombrePaquete FROM `paquetes` WHERE eliminar='0'  ORDER BY RAND()"; 
$paquetesAle = mysql_query($paquetesAleatorios,$link);
	
		//nombre del titulo
	$idPaqueteAl=array();
	$nombrePaqueteAl=array();

while($row2 = mysql_fetch_array($paquetesAle))
		{
		array_push($idPaqueteAl,$row2[0]);
		array_push($nombrePaqueteAl,$row2[1]);
		}
	
	




$id1= $_GET['cod1'];


// consulta para realizar el modificado de la tabla
$consulta = mysql_query("SELECT nombreDestino, imagenDestino , descripcion FROM destinos WHERE eliminar=0 AND idDestino='$id1'",$link);
$row = mysql_fetch_array($consulta);


?>				
                    
                    <div class="block2">
						<div class="extra_wrapper wow bounceInLeft animated" data-wow-delay="0.2s">
                        		<br>
                       			<div class="text1 col1 wow bounceInLeft animated" data-wow-delay="0.5s"><a href="#"><?php echo $row[0]; ?></a></div>
                                <div>
								<img src="../../administracion/imagenes/destinos/<?php echo $row[1];?>" alt="" class="img_inner fleft wow bounceInLeft animated" data-wow-delay="0.7s">
                        		</div>
								<?php echo $row[2]; ?>
						</div>
					</div>
                
                </div>
				<div class="grid_3 prefix_1">
					<h5 class="wow bounceInRight" data-wow-delay="0.4s">OTROS PAQUETES</h5>
					<ul class="list">
                    
                    	   <?php
			  				for($k=0;$k<count($idPaqueteAl);$k++)
			  				{
			   				?>
								<li class="wow bounceInRight animated" data-wow-delay="0.6s"><a href="paquete.php?cod=<?php echo $idPaqueteAl[$k];?>"><?php echo $nombrePaqueteAl[$k]; ?></a></li>
				
               				<?php  } ?>
                	</ul>
					<a href="../paquetes.php" class="link1 wow bounceInRight animated" data-wow-delay="0.6s">VIEW A<span class="low">ll</span></a>
				</div>
                
             
                
                <!--====================para los destinos===================================---->       
          <div class="grid_3 prefix_1">
					<h5 class"wow fadeInUpBig animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">DESTINOS ASOCIADOS</h5>
                
					   <?php
					   
					   
					   	//conuslta para paquetes aleatorios
$destinos ="SELECT a.idDestino, a.imagenDestino, a.nombreDestino FROM destinos a 
INNER JOIN destinosporpaquete b ON a.idDestino=b.idDestino WHERE b.idPaquete='$id' AND eliminar='0'  ORDER BY RAND()"; 
$rdestinos = mysql_query($destinos,$link);
	
		//nombre del titulo
	$idDestino=array();
	$imagenDestino=array();
	$nombreDestino=array();

while($row2 = mysql_fetch_array($rdestinos))
		{
		array_push($idDestino,$row2[0]);
		array_push($imagenDestino,$row2[1]);
		array_push($nombreDestino,$row2[2]);
		}
					   
					   
					   
			  for($k=0;$k<count($idDestino);$k++)
			  {
			   ?>
                
             
						<a href="destino.php?cod=<?php echo $id; ?>&cod1=<?php echo $idDestino[$k]; ?>"> <img class="destinos wow bounceInLeft animated" data-wow-delay="0.5s" src="../../administracion/imagenes/destinos/<?php echo $imagenDestino[$k];?>" alt=""></a>
							<div class="title wow bounceInLeft animated" data-wow-delay="0.5s"><?php echo $nombreDestino[$k];?></div>
					<br/>
				
                <?php  } ?>
				
                
<!--====================fin destinos=================-->       
        
                </div>
                
                
                
               
			</div>
           
		</div>
        
        
       
       
       

        
       				
        
        
        
<!--==============================footer=================================-->
		<footer>
			<div class="container_12">
				<div class="grid_12">
					<div class="socials  wow bounceInRight animated" data-wow-delay="0.2s">
						<a href="https://www.facebook.com/pages/Wayquistravel/753117348070173?fref=ts" class="fa fa-facebook" target="_blank"></a>
						<a href="#" class="fa fa-twitter"></a>
						<a href="#" class="fa fa-google-plus"></a>
					</div>
					<div class="copy wow bounceInLeft animated" data-wow-delay="0.2s">
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