<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<title>CONTACTENOS</title>
		  <style type="text/css">
            /* Set a size for our map container, the Google Map will take up 100% of this container */
            #map {
                width: 500px;
                height: 300px;
            }
        </style>
			<meta charset="utf-8">
		<meta name="format-detection" content="telephone=no" />
		<link rel="icon" href="../images/favicon.ico">
		<link rel="shortcut icon" href="../images/favicon.ico" />
        <link rel="stylesheet" href="../css/form.css">
		<link rel="stylesheet" href="../css/style.css">

		<link rel="stylesheet" href="../css/booking.css">		<!-- -->
		<link rel="stylesheet" href="../css/camera.css">				<!-- -->
		<link rel="stylesheet" href="../css/owl.carousel.css">
		<link rel="stylesheet" href="../css/swipebox.css">


		<script src="../js/jquery.js"></script>
		<script src="../js/jquery-migrate-1.2.1.js"></script>
		<script src="../js/script.js"></script>
        <script src="../js/TMForm.js"></script>
		<script src="../js/superfish.js"></script>
		<script src="../js/jquery.ui.totop.js"></script>
		<script src="../js/jquery.equalheights.js"></script>
		<script src="../js/jquery.mobilemenu.js"></script>
		<script src="../js/jquery.easing.1.3.js"></script>

		<script src="../js/jquery.swipebox.min.js"></script> 			<!-- -->
		<script src="../js/owl.carousel.js"></script>
		<script src="../js/camera.js"></script>
		<script src="../js/jquery.mobile.customized.min.js"></script>	
		<script src="../js/booking.js"></script>
		<script src="../js/wow.min.js"></script>
		<script type="text/javascript" src="../js/move-top.js"></script>
		<script type="text/javascript" src="../js/easing.js"></script>

		<!-- -->



		 <script type="text/javascript">
			jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
				});
			});
		</script>




		<script>
		$(document).ready(function(){
			$().UItoTop({ easingType: 'easeOutQuart' });
			});
		</script>



	
			    <script type="text/javascript">
					jQuery(function($) {
						$(".swipebox").swipebox();
					});
				</script>

		<link href="../css/animate.css" rel='stylesheet' type='text/css' />
		<script>
			new WOW().init();
		</script>



		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
        
       			 <script type="text/javascript">
            	  // When the window has finished loading create our google map below
           			 google.maps.event.addDomListener(window, 'load', init);
        
            		function init() {
            	    // Basic options for a simple Google Map
            	    // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            	    //marcador con la ubicación de la Universidad
				

                var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 17,

                    // The latitude and longitude to center the map (always required)
                    center: new google.maps.LatLng(-13.522413, -71.962290), // New York

                    // How you would like to style the map. 
                    // This is where you would paste any style found on Snazzy Maps.
                    styles: [{featureType:"road",elementType:"geometry",stylers:[{lightness:100},{visibility:"simplified"}]},{"featureType":"water","elementType":"geometry","stylers":[{"visibility":"on"},{"color":"#C6E2FF",}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"color":"#C5E3BF"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"color":"#D1D1B8"}]}]
                };

                // Get the HTML DOM element that will contain your map 
                // We are using a div with id="map" seen below in the <body>
                var mapElement = document.getElementById('map');

                // Create the Google Map using our element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);

                // Let's also add a marker while we're at it
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(-13.522500, -71.962926),
                    map: map,
                    title: 'Snazzy!'

                     });

                var popup = new google.maps.InfoWindow({
  			    content: 'Tours Travel'});
   			    popup.open(map, marker);  

   			    //Imagen a mostrar con su ruta
				/*var image = new google.maps.MarkerImage(
     		   '../images/fachada.jpg'
      			, new google.maps.Size(300,300));*/

      			//Marcador con la imagen anterior como icono
				var place = new google.maps.LatLng(-13.522421, -71.962623);
				var marker = new google.maps.Marker({
     			   position: place
     	           , map: map
     			   , title: 'Cayo Los Pajaros, un clic para ver a tamaño completo'
                   , icon: image
                   , animation: google.maps.Animation.DROP,});
        
            }
        </script>

		   

	</head>
	<body>

	<!--para los iconos de idioma-->    
    <a class='flotanteE' href='contactos.php?i=0' ><img src='../images/esp.png' border="0"/></a>
    <a class='flotanteI' href='contactos.php?i=1' ><img src='../images/ing.png' border="0"/></a>
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
		$boton="Read More";
	
		
		//etiquetas
		
		//titulos
		$titulo1="CONTACTS";
		$titulo2="CONTACT US";
		$titulo3="Address";
		$titulo4="Phone";

			//formulario
		$titulo5="Name";
		$titulo6="Email";
		$titulo7="City";
		$titulo8="Message";
		$titulo9="Submit";

		// Descripción
		$descripcion1="At any time we are always at your service";
		$descripcion2="Locate us at the following addresses off , please consult we deliver 24 hours a day, 365 days a year";
		
			//pie de pagina
		$politicas="PRIVACY POLICIES";
		$corporativo="CORPORATE MAIL";
		$diseno="DESIGN";
	


	}
	if($i==0)
	{
	
		
		//etiquetas
		
			//titulos
		$titulo1="CONTACTOS";
		$titulo2="CONT&Aacute;CTANOS";
		$titulo3="Direcci&oacute;n";
		$titulo4="Tel&eacute;fono";

		//formulario
		$titulo5="Nombre";
		$titulo6="Correo";
		$titulo7="Ciudad";
		$titulo8="Mensaje";
		$titulo9="Enviar";

			// Descripción
		$descripcion1="En cualquier momento estamos siempre a su servicio";
		$descripcion2="Ub&iacute;quenos en las siguientes direciones, no dude en consultar con nosotros lo atenderemos las 24 horas del d&iacute;a, los 365 d&iacute;as del año";
		

		
		//pie de pagina
		$politicas="POLÍTICAS DE PRIVACIDAD";
		$corporativo="CORREO COORPORATIVO";
		$diseno="DISEÑO";

	}
	//fin discriminacion de idioma
?>
<!--==============================header=================================-->
		<header class="wow bounceInRight animated" data-wow-delay="0.3s" style="visibility: visible; -webkit-animation-delay: 0.4s;" >
			<div class="container_12">
				<div class="grid_12 wow bounceInLeft animated" data-wow-delay="0.6s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
					<div class="menu_block">


<nav class="horizontal-nav full-width horizontalNav-notprocessed">
				<?php  if($i=='1'){echo ' 	
							<ul class="nav1">
								<li ><a href="../index.php?i='.$i.'">HOME</a></li>
								<li><a href="events.php?i='.$i.'">ABOUT US</a></li>
								<li><a href="gallery.php?i='.$i.'">MULTIMEDIA</a></li>
								<li><a href="blog.php?i='.$i.'">PACKAGES</a></li>
								<li class="cap"><a href="contact.php?i='.$i.'">CONTACTS</a></li>
                        	</ul>
                        	';}
                        	else
                        	{
                        		echo ' 	
							<ul class="sf-menu">
								<li ><a href="../index.php?i='.$i.'">INICIO</a></li>
								<li><a href="events.php?i='.$i.'">QUIENES SOMOS</a></li>
								<li><a href="gallery.php?i='.$i.'">MULTIMEDIA</a></li>
								<li><a href="blog.php?i='.$i.'">PAQUETES</a></li>
								<li class="cap"><a href="contact.php?i='.$i.'">CONTACTOS</a></li>
                        	</ul>
                        	';}
                        	?>


						</nav>




						<div class="clear"></div>
					</div>
				</div>
				<div class="grid_12 wow bounceInRight animated" data-wow-delay="0.9s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
					<h1>
						<a href="../index.php">
							<img src="../images/logo.png" alt="Your Happy Family">
						</a>
					</h1>
				</div>
			</div>
		</header>
<!--==============================Content=================================-->

		<div class="content"><div class="ic">More Website Templates @ itdecsa.com - February 10, 2014!</div>
			<div class="container_12">


			<div>
				<div class="grid_5">
					<h3 class="wow bounceInLeft animated" data-wow-delay="1.1s"><?php echo $titulo1;?></h3>
					<div>
						<p class="wow bounceInLeft animated" data-wow-delay="1.3s"><?php echo $descripcion1;?> <span class="col1"></p>
						<p class="wow bounceInLeft animated" data-wow-delay="1.5s"><?php echo $descripcion2;?> </p>
						<div class="clear"></div>
						
						<address>
							<dl class="wow bounceInLeft animated" data-wow-delay="1.7s">
								<dt>TOURSTRAVEL <br>
									<?php echo $titulo3;?> ...<br>
									Cusco - Per&uacute;.
								</dt>
								<dd><span><?php echo $titulo4;?>:</span>+1 800 559 6580</dd>
								<dd><span>M&oacute;vil:</span>+1 800 603 6035</dd>
								<dd><span>FAX:</span>+1 800 889 9898</dd>
								<dd>E-mail: <a href="#" class="col1">contactos@tourstravel.com</a></dd>
							</dl>
						</address>
					</div>
				</div>


				<div class="grid_6 prefix_1 wow bounceInRight animated" data-wow-delay="1.9s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
					<h3 ><?php echo $titulo2;?></h3>
					<form id="form">
						<div class="success_wrapper">
							<div class="success-message">Contact form submitted</div>
						</div>
						<label class="name">
							<input type="text" name="nombre"  placeholder="<?php echo $titulo5;?>:" data-constraints="@Required @JustLetters" />
							<span class="empty-message">*This field is required.</span>
							<span class="error-message">*This is not a valid name.</span>
						</label>
						<label class="email">
							<input type="text" name="email" placeholder="<?php echo $titulo6;?>:" data-constraints="@Required @Email" />
							<span class="empty-message">*This field is required.</span>
							<span class="error-message">*This is not a valid email.</span>
						</label>
						<label class="country">
							<input type="text" name="ciudad" placeholder="<?php echo $titulo7;?>:" data-constraints="@Required @JustLetters"/>
							<span class="empty-message">*This field is required.</span>
							<span class="error-message">*This is not a valid phone.</span>
						</label>
						<label class="message">
							<textarea name="mensaje" placeholder="<?php echo $titulo8;?>:" data-constraints='@Required @Length(min=20,max=999999)'></textarea>
							<span class="empty-message">*This field is required.</span>
							<span class="error-message">*The message is too short.</span>
						</label>
						<div class="clear"></div>
						<div class="btns">
								<div class="formBoton">
                        			<input  type="submit" value="<?php echo $titulo9;?>"  name="enviar" />
								</div>
						</div>
					</form>
				</div>
				</div>
				

				<div  class="wow bounceInLeft animated" data-wow-delay="1.4" style="position:relative;"  >
					 
					<figure >
							<!-- <iframe src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Brooklyn,+New+York,+NY,+United+States&amp;aq=0&amp;sll=37.0625,-95.677068&amp;sspn=61.282355,146.513672&amp;ie=UTF8&amp;hq=&amp;hnear=Brooklyn,+Kings,+New+York&amp;ll=40.649974,-73.950005&amp;spn=0.01628,0.025663&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>-->
							<div id="map" style="width:100%;top:40px;"></div>					 
					</figure>
				</div>



			</div>
		</div>
        
        
        
        
        
    <?php

$enviar=$_POST['enviar'];
if($enviar)
{



$nombre = $_POST['nombre'];
$correo= $_POST['email'];
$ciudad= $_POST['ciudad'];
$mensaje = $_POST['mensaje'];


 
 
 
 
 
$destinatario = "contactos@wayquistravel.com"; 
$asunto = "CONTACTOS";  
$cuerpo ='

<html>
<head>
<title>CONTACTOS DESDE TOURS TRAVEL</title>
</head>

<body style="background:#F4F2EF; font-family:Verdana, Geneva, sans-serif; font-size:12px; color:#903;">
<table width="800" border="0" bgcolor="#FFFFFFF" align="center" bordercolor="#F4F2EF" cellpadding="0" cellspacing="0">
  
  <tr>
    <td height="23" colspan="2" bgcolor="#33CC00" align="center"><font color="#FF6600" size="+2" align="center">SISTEMA DE RERSERVAS</font></td>
  </tr>
  <tr>
    <td height="23" colspan="2" bgcolor="#990033" ><font color="#FFFFFF" size="+2">CONTACTO DESDE TOURSTRAVEL</font></td>
  </tr>
  <tr>
    <td width="216" height="23">Nombre:</td>
    <td ><font color="#FF6600">'.$nombre.'</font></td>
  </tr>

<tr>
    <td width="216" height="23">E-mail:</td>
    <td ><font color="#FF6600">'.$correo.'</font></td>
  </tr>
<tr>
    <td width="216" height="23">Ciudad:</td>
    <td ><font color="#FF6600">'.$ciudad.'</font></td>
  </tr>
 
  <tr>
    <td height="23">Mensaje:</td>
    <td ><font color="#FF6600">'.$mensaje.'</font></td>
  </tr>
  
   
</table>
</body>
</html>
';



//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

//dirección del remitente 
$headers .= "From: Sistema de contactos <contactos@wayquistravel.com>\r\n"; 

//dirección de respuesta, si queremos que sea distinta que la del remitente 
$headers .= "Reply-To:".$correo."\r\n"; 

//ruta del mensaje desde origen a destino 
$headers .= "Return-path: contactos@wayquistravel.com\r\n"; 

//direcciones que recibián copia 
//$headers .= "Cc: maria@desarrolloweb.com\r\n"; 

//direcciones que recibirán copia oculta 
//$headers .= "Bcc: pepe@pepe.com,juan@juan.com\r\n"; 

mail($destinatario,$asunto,$cuerpo,$headers); 
	  
	  
    echo "<font color='#000000' >Los datos fueron enviados correctamente, en breve nos pondremos en contacto con Ud.</fontt>
	<br>

	";
}


?>    
        
        
        
        
        
        
        
        
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