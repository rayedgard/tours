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
        
          <!-- para la galeria de fotos -->
  <link rel="stylesheet" href="../galeria/css/example.css">
  <link rel="stylesheet" href="../galeria/css/font-awesome.min.css">

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
     <!--fin galeria de fotos-->
     
     <!----para los videos----->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
<!------fin videos--->

     
     
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
<!--==============================header=================================-->
	<header class="wow bounceInRight animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;" >
			<div class="container_12">
				<div class="grid_12 wow bounceInLeft animated" data-wow-delay="0.6s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
					<div class="menu_block">
						<nav class="horizontal-nav full-width horizontalNav-notprocessed">
							<ul class="sf-menu">
								<li ><a href="../index.php">INICIO</a></li>
								<li><a href="paquetes.php">PAQUETES</a></li>
								<li class="current"><a href="multimedia.php">MULTIMEDIA</a></li>
								<li><a href="blog.php">BLOG</a></li>
								<li><a href="contactos.php">CONTACTOS</a></li>
							</ul>
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
        









<span class="block2">
<?php

include_once("../conexion.php");
	$link = Conectarse();
	
$id= $_GET['cod'];
if($id<=0)
{ $id=1;}	



// consulta para realizar el modificado de la tabla
$consulta = mysql_query("SELECT nombreCategoria FROM categoriafotos WHERE idCategoriaFoto='$id'",$link);
$row = mysql_fetch_array($consulta);


?>
</span>



		<div class="content">
        <div class="ic">More Website Templates @ itdecsa.com - February 10, 2014!</div>
			<div class="container_12">
				<div class="grid_8">
				  <h3><?php echo $row[0]; ?></h3>
	
    
                  <span class="content1">
                  <?php

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
                  </span>				
          
          
          
           <div class="block2">
				<div class="extra_wrapper">
                    
                   <!-- SlidesJS Required: Start Slides -->
                  <!-- The container is used to define the width of the slideshow -->
                  <div class="container wow bounceInLeft animated" data-wow-delay="1.0s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
                    <div id="slides">
                                            <?php
			  				for($j=0;$j<count($nombres);$j++)
			  				{
			   				?>
						      <img src="../administracion/imagenes/fotos/<?php echo $row[0]; ?>/<?php echo $nombrefoto[$j]; ?>" alt="">
   						 <?php  } ?>
                    </div>
                  </div>
				  <!-- End SlidesJS Required: Start Slides -->

                  <!-- SlidesJS Required: Link to jQuery -->
                  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
                  <!-- End SlidesJS Required -->

                  <!-- SlidesJS Required: Link to jquery.slides.js -->
                  <script src="../galeria/js/jquery.slides.min.js"></script>
                  <!-- End SlidesJS Required -->
                
                  <!-- SlidesJS Required: Initialize SlidesJS with a jQuery doc ready -->
                  <script>
                    $(function() {
                      $('#slides').slidesjs({
                        width: 620,
                        height: 400,
                        play: {
                          active: true,
                          auto: true,
                          interval: 4000,
                          swap: true
                        }
                      });
                    });
                  </script>
			  <!-- End SlidesJS Required -->
					
                
                
                
 <div class="clear"></div>               

<div id="videos"><!--VIDEOS-->

 <div class="video wow bounceInLeft animated" data-wow-delay="1.2s" style="visibility: visible; -webkit-animation-delay: 0.4s;">   <!--reprosuctor de video grande-->
    
<?php 

//CONESTA CONSULTA CAPTURAMOS EL MAXIMO Y ULTIMO DE LOS VIDEOS AGREGADOS 
$consulta5 = mysql_query("SELECT max(id)  FROM video",$link);
$id= mysql_fetch_array($consulta5);


$consulta4 = mysql_query("SELECT linkvideo  FROM video WHERE id='$id[0]' ",$link);
$row4= mysql_fetch_array($consulta4);
?>
    
 <div id="contenedorYT">Cargando ...</div>
 <script type="text/javascript">
  swfobject.embedSWF(
    'http://www.youtube.com/v/<?php echo $row4[0];?>&enablejsapi=1&rel=0&fs=1',
    'contenedorYT',
    '620','470', '8',null,null,
    {allowScriptAccess: 'always',allowFullScreen: 'true'},
    {id: 'reproductorYT'});

  function cargarVideo(id) {
    var o = document.getElementById( 'reproductorYT' );
    if( o ) {o.loadVideoById( id );}
  }
</script>


 </div> <!--fin video reproductor grande-->






<div class="miniaturas wow bounceInRight animated" data-wow-delay="1.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">

     <?php
$consulta3="SELECT nombre, linkvideo FROM video WHERE eliminar=0 ORDER BY id DESC LIMIT 3"; 
$resultado3 = mysql_query($consulta3,$link);
//nombre del titulo
	$titulo3=array();
	$link3=array();
	
while($row3=  mysql_fetch_array($resultado3))
		{
		array_push($titulo3,$row3[0]);
		array_push($link3,$row3[1]);
		}
for($k=0;$k<count($titulo3);$k++)
{
?>       
<a href="javascript:cargarVideo('<?php echo $link3[$k];?>');" title="<?php echo $titulo3[$k];?>"><img src="http://img.youtube.com/vi/<?php echo $link3[$k];?>/1.jpg"/></a>
 <?php
}

?>                
</div><!--FIM MINIATURAS-->





    </div><!--FIN VIDEOS-->     
        

                
             </div>
              </div>
                
            </div>           
                        
				<div class="grid_3 prefix_1 wow bounceInRight animated" data-wow-delay="1.6s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
					<h5>CATEGORIAS</h5>
					<ul class="list">
                    
                    	   <?php
			  				for($k=0;$k<count($nombres);$k++)
			  				{
			   				?>
								<li><a href="multimedia.php?cod=<?php echo $idcat[$k];?>"><?php echo $nombres[$k]; ?></a></li>
				
               				<?php  } ?>
                	</ul>

				</div>      
        
          </div>
                
                
                
               
	</div>
           
		
       
       

        
       				
        
        
        
<!--==============================footer=================================-->
		<footer>
			<div class="container_12">
				<div class="grid_12">
					<div class="socials wow bounceInRight animated" data-wow-delay="0.4s">
						<a href="https://www.facebook.com/pages/Wayquistravel/753117348070173?fref=ts" class="fa fa-facebook" target="_blank"></a>
						<a href="#" class="fa fa-twitter"></a>
						<a href="#" class="fa fa-google-plus"></a>
					</div>
					<div class="copy wow bounceInLeft animated" data-wow-delay="0.8">
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