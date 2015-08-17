<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>PAQUETE</title>
		<meta charset="utf-8">
		<meta name="format-detection" content="telephone=no" />
		<link rel="icon" href="../images/favicon.ico">
		<link rel="shortcut icon" href="../images/favicon.ico" />
		<link rel="stylesheet" href="../css/style.css">

		<link rel="stylesheet" href="../booking/css/booking.css">				<!-- -->
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

		<script src="../js/owl.carousel.js"></script>
		<script src="../js/camera.js"></script>
		<script src="../js/jquery.mobile.customized.min.js"></script>
		<script src="../booking/js/booking.js"></script>

		<script>
		$(document).ready(function(){
			$().UItoTop({ easingType: 'easeOutQuart' });
			});
		</script>



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
		$boton="Read More";
		
		//etiquetas
		
		//titulos
		$titulo1="PACKAGES";
		$titulo2="OTHERS PACKAGES";
		$titulo3="ASSOCIATED DESTINATIONS";
				
			//pie de pagina
		$politicas="PRIVACY POLICIES";
		$corporativo="CORPORATE MAIL";
		$diseno="DESIGN";

	}
	if($i==0)
	{
	
		//etiquetas
		
			//titulos
		$titulo1="PAQUETES";
		$titulo2="OTROS EVENTOS";
		$titulo3="DESTINOS ASOCIADOS";
		
		//pie de pagina
		$politicas="POLÍTICAS DE PRIVACIDAD";
		$corporativo="CORREO COORPORATIVO";
		$diseno="DISEÑO";

	}
	//evento

$consultaEventos = mysql_query("SELECT id,nombre,descripcion,MONTHNAME(fecha),DAY(fecha),imagen FROM eventos WHERE id='$idEv' AND eliminar='0' AND idioma='$i' ",$link);
$eventos = mysql_fetch_array($consultaEventos);


// listar eventos
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

<!--==============================header=================================-->
		<header class="wow bounceInRight animated" data-wow-delay="0.3s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
			
		</header>
<!--==============================Content=================================-->


		<div class="content">
			<div class="container_12">
				<div class="grid_8">
					<h3 class="wow bounceInLeft" data-wow-delay="0.4s">EVENTOS</h3>	
		
                    
                    <div class="block2">
						<div class="extra_wrapper wow bounceInLeft animated" data-wow-delay="0.6s">
                        	<div class="blog">
                       		<time datetime="2014-01-01"><?php echo $eventos[4];?><span><?php echo substr($eventos[3],0,3);?></span></time>
                         		<br>
                       			<div class="text1 col1 wow bounceInLeft animated" data-wow-delay="0.8s"><a href="#"><?php echo $eventos[1]; ?></a></div>
								<img src="../administracion/imagenes/eventos/<?php echo  $eventos[5];?>" alt="" class="img_inner fleft wow bounceInLeft" data-wow-delay="1.0s" style="width:300px; height:123px;">
                        		<?php echo $eventos[2]; ?>
                        
                        	</div>		
						</div>
					</div>

									
                </div>
				<div class="grid_3 prefix_1">
					<h5 class=" wow bounceInRight animated" data-wow-delay="0.4s"><?php echo $titulo2;?></h5>
					<ul class="list">
                    
                    	   <?php
			  				for($k=0;$k<count($idEvento1);$k++)
			  				{
			   				?>
								<li class=" wow bounceInRight animated" data-wow-delay="0.4s"><a href="eventos.php?id=<?php echo $idEvento1[$k];?>&i=0"><?php echo $nombreEvento1[$k];?></a></li>
				
               				<?php  } ?>
                	</ul>
					
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
		</script>
	</body>

</html>