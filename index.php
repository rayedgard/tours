<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

		<title>Bienvenidos a Tours, el portal de tus viajes</title>
		<meta charset="utf-8">
		<meta name="format-detection" content="telephone=no" />
		<link rel="icon" href="images/favicon.ico">
		<link rel="shortcut icon" href="images/favicon.ico" />
		<link rel="stylesheet" href="css/style.css">

		<link rel="stylesheet" href="booking/css/booking.css">				<!-- -->
		<link rel="stylesheet" href="css/camera.css">				<!-- -->
		<link rel="stylesheet" href="css/owl.carousel.css">			<!-- -->
						<!-- -->
		<script src="js/jquery.js"></script>
		<script src="js/jquery-migrate-1.2.1.js"></script>
		<script src="js/script.js"></script>
		<script src="js/superfish.js"></script>
		<script src="js/jquery.ui.totop.js"></script>
		<script src="js/jquery.equalheights.js"></script>
		<script src="js/jquery.mobilemenu.js"></script>
		<script src="js/jquery.easing.1.3.js"></script>


		<script src="js/owl.carousel.js"></script>
		<script src="js/camera.js"></script>
		<script src="js/jquery.mobile.customized.min.js"></script>
		<script src="booking/js/booking.js"></script>


		<script>
			$(document).ready(function(){
			jQuery('#camera_wrap').camera({
				loader: false,
				pagination: false ,
				minHeight: '444',
				thumbnails: false,
				height: '48.375%',
				caption: true,
				navigation: true,
				fx: 'mosaic'
			});
			/*carousel*/
			var owl=$("#owl");
				owl.owlCarousel({
				items : 2, //10 items above 1000px browser width
				itemsDesktop : [995,2], //5 items between 1000px and 901px
				itemsDesktopSmall : [767, 2], // betweem 900px and 601px
				itemsTablet: [700, 2], //2 items between 600 and 0
				itemsMobile : [479, 1], // itemsMobile disabled - inherit from itemsTablet option
				navigation : true,
				pagination : false
				});
			$().UItoTop({ easingType: 'easeOutQuart' });
			});
		</script>


	<!-- ppppppppppppppppppppppppcodigo animaciónppppppppppppppppppppppppppppppppppp-->	
<!---- start-smoth-scrolling---->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>

 <script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});
	</script>
<!---End-smoth-scrolling---->


<link rel="stylesheet" href="css/swipebox.css">

			<script src="js/jquery.swipebox.min.js"></script> 
			    <script type="text/javascript">
					jQuery(function($) {
						$(".swipebox").swipebox();
					});
				</script>

		<script src="js/wow.min.js"></script>
			<link href="css/animate.css" rel='stylesheet' type='text/css' />
			<script>
			new WOW().init();
		</script>


	<!-- pppppppppppppppppppppppppppfin de codigo de animaciónpppppppppppppppppppppppppppppppppp-->	


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
        
        
        <meta name="google-translate-customization" content="1d2a34a0b006213e-7669dda267d94f16-g74321c133231406c-15"></meta>
        
	</head>
	<body class="page1" id="top">



	<!--para los iconos de idioma-->    
    <a class='flotanteE' href='index.php?i=0' ><img src='images/esp.png' border="0"/></a>
    <a class='flotanteI' href='index.php?i=1' ><img src='images/ing.png' border="0"/></a>
	<!--fin idioma-->







    <!-- coneccion php -->
    <?php 
	include_once("conexion.php");
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
		$boton="READ MORE";
		$reservas="RESERVE";
		//etiquetas
		$precio="Cost";
		//titulos
		$titulo1="BOOKING FORM";
		$titulo2="WHO WE ARE";
		$titulo3="EVENTS";
		//fromulario de reservas
		$nombre="Name";
		$correo="Email";
		$pais="Country";
		$telefono="Phone";
		$llegada="Arrival";
		$retorno="Return";
		$hospedaje="Accommodation type";
		$economico="Economic";
		$estandar="Standard";
		$lujo="Luxury";
		$adultos="Adults";
		$ninos="Children";
		$habitaciones="Room";
		$mensaje="Message";
		//pie de pagina
		$politicas="PRIVACY POLICIES";
		$corporativo="CORPORATE MAIL";
		$diseno="DESIGN";


	}
	if($i==0)
	{
		//botones
		$boton="LEER MÁS";
		$reservas="RESERVAR";
		//etiquetas
		$precio="Costo";
			//titulos
		$titulo1="FORMULARIO DE RESERVAS";
		$titulo2="QUIENES SOMOS";
		$titulo3="EVENTOS";
			//fromulario de reservas
		$nombre="Nombre";
		$correo="Correo";
		$pais="Pais";
		$telefono="Teléfono";
		$llegada="Llegada";
		$retorno="Retorno";
		$hospedaje="Tipo de Hospedaje";
		$economico="Económico";
		$estandar="Estandar";
		$lujo="Lujo";
		$adultos="Adultos";
		$ninos="Niños";
		$habitaciones="Habitaciones";
		$mensaje="Mensaje";
		//pie de pagina
		$politicas="POLÍTICAS DE PRIVACIDAD";
		$corporativo="CORREO COORPORATIVO";
		$diseno="DISEÑO";
	}
	//fin discriminacion de idioma




	//conuslta 
	$consultaPaquetes ="SELECT paquetes.idPaquete, paquetes.nombrePaquete, banner.imagen, paquetes.costo FROM  banner, paquetes WHERE paquetes.eliminar='0' AND banner.idPaquete = paquetes.idPaquete  AND paquetes.idioma='$i' ORDER BY paquetes.idPaquete DESC LIMIT 5"; 
$paquetes = mysql_query($consultaPaquetes,$link);

	//nombre del titulo
	$idPaquete=array();
	$nombrePaquete=array();
	$imagen=array();
	$costo=array();

while($row2 = mysql_fetch_array($paquetes))
		{
		array_push($idPaquete,$row2[0]);
		array_push($nombrePaquete,$row2[1]);
		array_push($imagen,$row2[2]);
		array_push($costo,$row2[3]);
		}
	
	//------------------------
	//conuslta para paquetes aleatorios
	$paquetesAleatorios ="SELECT idPaquete, nombrePaquete, imagen, costo FROM `paquetes` WHERE eliminar='0' AND idioma='$i'  ORDER BY RAND() LIMIT 3"; 
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

		//transiciones de paquetes
		//
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
<!--==============================header=================================-->
		
        <header>
     
     
     
     
     
     <!--para el idioma-->
     
     
	<!--	 <div class="info">
    	<a href="#" class="back">
        
         <div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'es', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
           
        </a>
    </div>
        -->
        
        <!--fin idioma-->
        
        
        
        
        
        
        
        
        
        	<div class="container_12">
                     
            
            
				<div class="grid_12 wow fadeInUpBig animated animated" data-wow-delay="0.2s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
					<div class="menu_block">
						<nav class="horizontal-nav full-width horizontalNav-notprocessed">
						
						<?php  if($i=='1'){echo ' 	
							<ul class="sf-menu">
								<li class="current"><a href="index.php?i='.$i.'">HOME</a></li>
								<li><a href="pages/paquetes.php?i='.$i.'">PACKAGES</a></li>
								<li><a href="pages/multimedia.php?i='.$i.'">MULTIMEDIA</a></li>
								<li><a href="pages/blog.php?i='.$i.'">BLOG</a></li>
								<li><a href="pages/contactos.php?i='.$i.'">CONTACTS</a></li>
                        	</ul>
                        	';}
                        	else
                        	{
                        		echo ' 	
							<ul class="sf-menu">
								<li class="current"><a href="index.php?i='.$i.'">INICIO</a></li>
								<li><a href="pages/paquetes.php?i='.$i.'">PAQUETES</a></li>
								<li><a href="pages/multimedia.php?i='.$i.'">MULTIMEDIA</a></li>
								<li><a href="pages/blog.php?i='.$i.'">BLOG</a></li>
								<li><a href="pages/contactos.php?i='.$i.'">CONTACTOS</a></li>
                        	</ul>
                        	';}
                        	?>
					
						</nav>
						<div class="clear"></div>
					</div>
				</div>


				<div class="grid_12  wow bounceInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
					<h1>
						<a href="index.php">
							<img src="images/logo.png" alt="TOURS TRAVEL">
						</a>
					</h1>
				</div>
			</div>

		</header>

		<div class="slider_wrapper wow fadeInUpBig animated animated"  data-wow-delay="0.0s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
			<div id="camera_wrap" class="">
				<!--slide01-->
              <?php
			  for($j=0;$j<count($idPaquete);$j++)
			  {
			   ?>
                <div data-src="administracion/imagenes/paquetes/<?php echo $imagen[$j];?>">

					<div class="caption fadeIn">
						<h2 class="wow bounceInRight animated" data-wow-delay="0.8s" style="visibility: visible; -webkit-animation-delay: 0.4s;""><?php echo $nombrePaquete[$j];?></h2>

						<div class="price wow bounceInLeft animated" data-wow-delay="1.0s" visibility: visible; -webkit-animation-delay: 0.4s;">
							
						</div>

						<a class="wow bounceInRight animated" data-wow-delay="1.2s" style="visibility: visible; -webkit-animation-delay:0.4s;" href="pages/paquetes/paquete.php?cod=<?php echo $idaPquete[$j];?>&i=<?php echo $i;?>" ><?php echo $boton; ?></a>
					</div>

				</div>
                <!--fin slide01-->
             <?php  } ?>
			</div>
		</div>
<!--==============================Content=================================-->
		<div class="content"><div class="ic">More Website Templates @ itdecsa.com - February 10, 2014!</div>
			<div class="container_12">
				
                
                
                
                
                 <?php
			for($k=0;$k<count($idPaqueteAl);$k++)
			  {
			   ?>
                
                
                <div class="grid_4">

					<div class="banner <?php echo $transicion[$k];?>" data-wow-delay="1.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
						<img src="administracion/imagenes/paquetes/<?php echo $imagenAl[$k];?>" alt="">

						<div class="label">
							<div class="title"><?php echo $nombrePaqueteAl[$k];?></div>
							<div class="price"><?php echo $precio;?><span>$ <?php echo $costoAl[$k];?></span></div>
							<a href="pages/paquetes/paquete.php?cod=<?php echo $idPaqueteAl[$k];?>&i=<?php echo $i;?> "><?php echo $boton; ?></a>
						</div>


					</div>
				</div>
				
				
                <?php  } ?>
                
                
                
                
                
                
                <div class="clear"></div>
				<div class="grid_6">
					<h3 class="about-grid wow bounceInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;"><?php echo $titulo1; ?></h3>
					<form id="bookingForm" method="post" class="about-grid wow bounceInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;" >
						<div class="fl1">
							<div class="tmInput">
								<input name="<?php echo $nombre;?>" placeHolder="<?php echo $nombre;?>:" type="text" data-constraints='@NotEmpty @Required @AlphaSpecial'>
							</div>
							<div class="tmInput">
								<input name="<?php echo $pais;?>" placeHolder="<?php echo $pais;?>:" type="text" data-constraints="@NotEmpty @Required">
							</div>
						</div>
						<div class="fl1">
							<div class="tmInput">
								<input name="<?php echo $correo;?>" placeHolder="<?php echo $correo;?>:" type="text" data-constraints="@NotEmpty @Required @Email">
							</div>
							<div class="tmInput mr0">
								<input name="<?php echo $telefono;?>" placeHolder="<?php echo $telefono;?>:" type="text" data-constraints="@NotEmpty @Required">
							</div>
						</div>
						<div class="clear"></div>
						<strong><?php echo $llegada;?></strong>
						<label class="tmDatepicker">
							<input type="text" name="llegada" placeHolder='10/05/2014' data-constraints="@NotEmpty @Required @Date">
						</label>
						<div class="clear"></div>
						<strong><?php echo $retorno;?></strong>
						<label class="tmDatepicker">
							<input type="text" name="retorno" placeHolder='20/05/2014' data-constraints="@NotEmpty @Required @Date">
						</label>
						<div class="clear"></div>
						<div class="tmRadio">
							<p><?php echo $hospedaje;?></p>
							<input name="hospedaje" type="radio" value="Barato" id="tmRadio0" data-constraints='@RadioGroupChecked(name="Comfort", groups=[RadioGroup])' checked/>
							<span><?php echo $economico;?></span>
							<input name="hospedaje" type="radio" value="Standart" id="tmRadio1" data-constraints='@RadioGroupChecked(name="Comfort", groups=[RadioGroup])' />
							<span><?php echo $estandar;?></span>
							<input name="hospedaje" type="radio" value="Lujo" id="tmRadio2" data-constraints='@RadioGroupChecked(name="Comfort", groups=[RadioGroup])' />
							<span><?php echo $lujo;?></span>
						</div>
						<div class="clear"></div>
						<div class="fl1 fl2">
							<em><?php echo $adultos;?></em>
							<select name="adultos" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="">
								<option>1</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                                <option>13</option>
                                <option>14</option>
                                <option>15</option>
							</select>
							<div class="clear"></div>
							<em><?php echo $habitaciones;?></em>
							<select name="habitaciones" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="">
								<option>1</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
							</select>
						</div>
						<div class="fl1 fl2">
							<em><?php echo $ninos;?></em>
							<select name="ninos" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="">
								<option>0</option>
								<option>0</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                                <option>13</option>
                                <option>14</option>
                                <option>15</option>
							</select>
						</div>
                        
                    
                        
						<div class="clear"></div>
						<div class="tmTextarea">
							<textarea name="<?php echo $mensaje;?>" placeHolder="<?php echo $mensaje;?>" data-constraints='@NotEmpty @Required @Length(min=20,max=999999)'></textarea>
						</div>
					<div class="formBoton">
                        <input  type="submit" value="<?php echo $reservas;?>"  name="enviar" />
					</div>
                    </form>
                    
                    
                    
      <?php

$enviar=$_POST['enviar'];
if($enviar)
{



$nombre = $_POST['nombre'];
$correo= $_POST['correo'];
$telefono = $_POST['telefono'];
$pais = $_POST['pais'];
$llegada = $_POST['llegada'];
$retorno = $_POST['retorno'];
$hospedaje = $_POST['hospedaje'];
$adultos= $_POST['adultos'];
$ninos = $_POST['ninos'];
$habitacion= $_POST['habitacion'];
$mensaje = $_POST['mensaje'];


 
 
 
 
 
$destinatario = "reservas@itdecsa.com"; 
$asunto = "RESERVAS";  
$cuerpo ='

<html>
<head>
<title>Reservaciones de WAYQUIS TRAVEL</title>
</head>

<body style="background:#F4F2EF; font-family:Verdana, Geneva, sans-serif; font-size:12px; color:#903;" >
<table width="800" border="0" bgcolor="#FFFFFFF" align="center" bordercolor="#F4F2EF" cellpadding="0" cellspacing="0" >
  
  <tr>
    <td height="23" colspan="2" bgcolor="#33CC00" align="center"><font color="#FF6600" size="+2" align="center">SISTEMA DE RERSERVAS</font></td>
  </tr>
  <tr>
    <td height="23" colspan="2" bgcolor="#990033" ><font color="#FFFFFF" size="+2">DATOS PERSONALES</font></td>
  </tr>
  <tr>
    <td width="216" height="23">Nombre:</td>
    <td ><font color="#FF6600">'.$nombre.'</font></td>
  </tr>

<tr>
    <td width="216" height="23">Teléfono:</td>
    <td ><font color="#FF6600">'.$telefono.'</font></td>
  </tr>
<tr>
    <td width="216" height="23">E-mail:</td>
    <td ><font color="#FF6600">'.$correo.'</font></td>
  </tr>
<tr>
    <td width="216" height="23">Pais:</td>
    <td ><font color="#FF6600">'.$pais.'</font></td>
  </tr>
 <tr>
    <td height="23" colspan="2" bgcolor="#990033" ><font color="#FFFFFF" size="+2">DATOS DE VIAJE</font></td>
  </tr>
  <tr>
    <td height="23">Fecha de llegada del pasajedo:</td>
    <td><font color="#FF6600">'.$llegada.'</font></td>
  </tr>
   <tr>
    <td height="23">Fecha de Retorno del pasajedo:</td>
    <td><font color="#FF6600">'.$retorno.'</font></td>
  </tr>
  <tr>
    <td height="23">Fecha que realizo la reservación:</td>
    <td><font color="#FF6600">'.date('d/m/Y', time()).'</font></td>
  </tr>
  <tr>
    <td height="23">Número de Pasajeros:</td>
    <td><font color="#FF6600">ADULTOS:'.$adultos.'  NIÑOS: '.$ninos.'</font></td>
  </tr>
  <tr>
    <td height="23">Tipo de Hospedaje:</td>
    <td><font color="#FF6600">'.$hospedaje.'</font></td>	

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
$headers .= "From: Sistema de reservas <reservas@itdecsa.com>\r\n"; 

//dirección de respuesta, si queremos que sea distinta que la del remitente 
$headers .= "Reply-To:".$correo."\r\n"; 

//ruta del mensaje desde origen a destino 
$headers .= "Return-path: reservas@itdecsa.com\r\n"; 

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
				</div>
				<div class="grid_5 prefix_1" >
					<h3 class="extra_wrapper wow bounceInRight animated" data-wow-delay="0.2s" style="text-align:justify;visibility: visible; -webkit-animation-delay: 0.4s;"><?php echo $titulo2; ?></h3>
					
					<div class="extra_wrapper wow bounceInRight animated" data-wow-delay="0.4s" style="text-align:justify;visibility: visible; -webkit-animation-delay: 0.4s;" >						
                        Somos una agencia de viajes dedicado a la ventas de paquetes turísticos donde usted podrá disfrutar de la maravilla y riqueza de nuestro País brindándole un servicio de excelencia, con el profesionalismo que nos caracteriza.                                               
					</div>					
                    <br>  

					<div class="col1  wow bounceInRight animated" data-wow-delay="0.8s" style="visibility: visible; -webkit-animation-delay: 0.4s;">MISI&Oacute;N</div>
                    <p class=" wow bounceInRight animated" data-wow-delay="1.0s" style="text-align:justify; visibility: visible; -webkit-animation-delay: 0.4s;">
                    Brindar a cada turista una experiencia memorable, sostenible. Satisfaciendo sus neecidades de acuerdo a las nuevas exigencias y avances tecnológicos.
					</p>
                    
                    <br>
                    <div class="col1 wow bounceInRight animated" data-wow-delay="1.2s" style="visibility: visible; -webkit-animation-delay: 0.4s;">VISI&Oacute;N</div>
                    <p class=" wow bounceInRight animated" data-wow-delay="1.4s" style="text-align:justify;visibility: visible; -webkit-animation-delay: 0.4s;">
                   Ser reconocidos como una empresa modelo de innovación con el crecimiento sostenible con la eficacia, calidez y el profesionalismo que nos caracteriza.
					</p>
                    
                    
                 
                    <!-- para el facebook -->
                    <div id="fb-root"></div>



				<script  >(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
 			      js = d.createElement(s); js.id = id;
 			      js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&appId=1558536181050639&version=v2.0";
 			      fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));
				</script>

						<div class="fb-like-box wow fadeInDownBig animated animated" data-href="https://www.facebook.com/pages/Informatic-Technology-Development-Corporation-SA/157087624356221" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="true" data-width="380" data-height="200" data-wow-delay="2.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;"></div>
                    
                    <!--FIN FACEBOOK-->
                    
				</div>




				<div class="grid_12 wow bounceInLeft animated"  data-wow-delay="1.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
					<h3 class="head1"><?php echo $titulo3; ?></h3>
				</div>
				<div class="grid_4 wow bounceInRight animated" data-wow-delay="1.6s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
					<div class="block1">
						<time datetime="2014-01-01">10<span>Jan</span></time>
						<div class="extra_wrapper">
							<div class="text1 col1"><a href="#">Aliquam nibh</a></div>
							Proin pharetra luctus diam, any scelerisque eros convallisumsan. Maecenas vehicula egestas
						</div>
					</div>
				</div>
				<div class="grid_4 wow bounceInRight animated" data-wow-delay="1.8s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
					<div class="block1">
						<time datetime="2014-01-01">21<span>Jan</span></time>
						<div class="extra_wrapper">
							<div class="text1 col1"><a href="#">Etiam dui eros</a></div>
							Any scelerisque eros vallisumsan. Maecenas vehicula egestas natis. Duis massa elit, auctor non
						</div>
					</div>
				</div>
				<div class="grid_4 wow bounceInRight animated" data-wow-delay="2.0s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
					<div class="block1">
						<time datetime="2014-01-01">15<span>Feb</span></time>
						<div class="extra_wrapper">
							<div class="text1 col1"><a href="#">uamnibh Edeto</a></div>
							Ros convallisumsan. Maecenas vehicula egestas venenatis. Duis massa elit, auctor non
						</div>
					</div>
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
			$(function() {
				$('#bookingForm input, #bookingForm textarea').placeholder();
			});
		</script>
        
        
        
        
        
        
         <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : 'your-app-id',
          xfbml      : true,
          version    : 'v2.1'
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>
        


	</body>
</html>

