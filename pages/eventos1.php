<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>KUNTUR TRAVEL AGENCY</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:300,700,100,400' rel='stylesheet' type='text/css'>
<!-- js -->
<script src="../js/jquery.min.js"></script>
<!-- //js -->
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Eco Travel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="../js/move-top.js"></script>
<script type="text/javascript" src="../js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<!-- pop-up -->
<link rel="stylesheet" href="../css/touchTouch.css" type="text/css" media="all" />
<script type="text/javascript" src="../js/jquery.fancybox.js"></script>
	   <script type="text/javascript">
			$(document).ready(function() {
				/*
				 *  Simple image gallery. Uses default settings
				 */

				$('.fancybox').fancybox();

			});
		</script>
<!-- pop-up -->
</head>
	
<body>

	<!--para los iconos de idioma-->    
 
	<!--fin idioma-->



<?php 


include_once("../conexion.php");
	$link = Conectarse();
	$idEv = $_GET['id'];


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
		$boton="MORE INFO";
		$boton1="MORE";
		$reservas="RESERVE";
		//etiquetas
		$precio="Cost";
		//titulos
		$titulo1="EVENTS";

		//footer
		$titulo2="About Eco Travel";
		$titulo3="Connect With Us";
		$titulo4="Other Events";
		$titulo5="WELCOME TO KUNTUR TRAVEL AGENCY";
		$titulo6="Enjoy an unforgettable journey with our tours Cusco";
		$titulo7="Kuntur Travel is a travel agency that has been created by Mr. Victor Hugo Torres Saravia, who has over 12 years experience in tourism; during this time he has worked in prestigious tourist agencies, where he has served as Guide Selva (Tambopata National Reserve, Manu National Park, and others), adventure guide (Inca Trail, Machu Picchu, choquequirao, and others), guide Traditional (Cusco city as Sacred Valley Area, Tipon, Maras Moray and others), has exerted university teaching and conducted graduate studies in tourism.

The aim of Kuntur Travel, is to provide high quality tourism services very seriously and experience with ethical principles that ensure customer satisfaction, for which we maintain contacts with experimientados service providers (hotels, restaurants, mobility, experienced guides bilingual and other) local, regional and national level allowing us to offer high-level tour packages.";
		$titulo8="We offer walking tours, tours Machu Picchu and Cusco vacation travel";
		
	
	


	}
	if($i==0)
	{
		//botones
		$boton="MÁS INFO...";
		$boton1="MÁS";
		$reservas="RESERVAR";
		//etiquetas
		$precio="Costo";
			//titulos
		$titulo1="EVENTOS";
	
			//footer
		$titulo2="Acerca de Kuntur Travel";
		$titulo3="Redes Sociales";
		$titulo4="Otros Eventos";
		$titulo5="BIENVENIDO A KUNTUR TRAVEL AGENCY";
		$titulo6="Disfruta de un viaje inolvidable con nuestros tours Cusco";
		$titulo7="Kuntur Travel es una agencia de turismo que ha sido creada por el Licenciado  Víctor Hugo Torres Saravia, quien cuenta con mas de 12 años de experiencia en la actividad turística; durante este tiempo ha trabajado en prestigiosas agencias de turismo, donde se ha desempeñado como: Guía de Selva (reserva nacional tambopata, parque nacional Manú, y otros), guía de aventura (camino inka, machupicchu, salkantay, choquequirao y otros), guía tradicional (Cusco ciudad y alrededores como Valle sagrado, Tipón, Maras Moray y otros) , ha ejercido docencia universitaria y realizado estudios de diplomado en turismo.

El objetivo de Kuntur Travel, es brindar servicios turísticos de alta calidad con mucha seriedad y experiencia, con principios éticos que garantizará la satisfacción de los usuarios, para lo cual mantenemos contactos con prestadores de servicios experimientados (hoteles, restaurantes, movilidad, guías con experiencia bilingüe y otros) a nivel local, regional y nacional lo que nos permite ofrecer paquetes turísticos de alto nivel.";
		$titulo8="Ofrecemos tours caminatas, tours Machu Picchu y viajes cusco vacaciones";

	}
	//fin discriminacion de idiom
	
	// EVENTOS
	//$consultaEventos ="SELECT id,nombre,descripcion,MONTHNAME(fecha),DAY(fecha),imagen FROM eventos WHERE id='$idEv' AND eliminar='0' AND idioma='$i' "; 
//$eventos = mysql_query($consultaEventos,$link);
	
$consultaEventos = mysql_query("SELECT id,nombre,descripcion,MONTHNAME(fecha),DAY(fecha),imagen FROM eventos WHERE id='$idEv' AND eliminar='0' AND idioma='$i' ",$link);
$eventos = mysql_fetch_array($consultaEventos);



//Listar eventos

$consulta = "SELECT id,nombre,descripcion,MONTHNAME(fecha),DAY(fecha) FROM eventos WHERE eliminar='0' AND idioma='$i'";
	$even = mysql_query($consulta,$link);
		//nombre del titulo
	$idEvento1=array();
	$nombreEvento1=array();
	$descEvento1=array();
	$mes1=array();
	$dia1=array();

		while($row2 = mysql_fetch_array($even))
		{
			array_push($idEvento1,$row2[0]);
			array_push($nombreEvento1,$row2[1]);
			array_push($descEvento1,$row2[2]);
			array_push($mes1,$row2[3]);
			array_push($dia1,$row2[4]);
		}	

	

	


?>



<!-- //header -->


<!-- events -->
	<div class="banner-bdy eve">
		<div class="container">
			<div class="events">
				<h3><?php echo $titulo1;?></h3>

				<div class="event-grids">
					
				
				<div class="featured-events">

					<h4 style="text-align: center;"><?php echo $eventos[1];?></h4>

					<div class="col-md-4 featured-events-right">
						<img src="../administracion/imagenes/eventos/<?php echo  $eventos[5];?>" alt=" " />
					</div>


					<div class="col-md-8 featured-events-left" style="text-align:justify;" >
					
						<p style="text-align:justify;"><?php echo  $eventos[2];?>.</p>

						
					</div>


					<div class="clearfix"> </div>

					<h3><?php echo $titulo4; ?></h3>
				</div>



				<div class="col-md-4 footer-top-grid" style="width:100%">


					<?php
					  for($k=0;$k<count($idEvento1);$k++)
						  {
					   ?>
							<ul class="last" >
									<li >
									<a  href="eventos.php?id=<?php echo $idEvento1[$k];?>&i=0"><?php echo $nombreEvento1[$k];?>
									</a>
									</li>
					
							</ul>

					<?php 
						}?>

					

			</div>
			<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!-- //events -->	


<!-- footer -->
	<div class="footer-top">

		<div class="container">
		<div class="footer-top-grids">
	
			<div class="clearfix"> </div>
		</div>
	</div>

		<div class="footer">
			<p>Copyright © 2015 Eco Travel. All Rights Reserved | Design by<a href="http://w3layouts.com/"> W3layouts</a></p>
		</div>
	</div>
<!-- //footer -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
</body>
</html>