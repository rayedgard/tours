<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<title>PAQUETES TUR&Iacute;STICOS</title>
		<meta charset="utf-8">
		 <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="format-detection" content="telephone=no" />
		<link rel="icon" href="../images/favicon.ico">
		<link rel="shortcut icon" href="../images/favicon.ico" />




    





		<link rel="stylesheet" href="../css/style.css">	
		<link rel="stylesheet" href="../css/booking.css">		
		<link rel="stylesheet" href="../css/camera.css">			
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

<script>
    
    $(window).load(function() {  
    var $container = $('#container');
    //Run to initialise column sizes
    updateSize();

    //Load masonry when images all loaded
    $container.imagesLoaded( function(){

        $container.isotope({
            // options
            itemSelector : '.element',	
            layoutMode : 'masonry',
            transformsEnabled: true,
            columnWidth: function( containerWidth ) {
                containerWidth = $browserWidth;
                return Math.floor(containerWidth / $cols);
              }
        });
    });
    
	    // update columnWidth on window resize
    $(window).smartresize(function(){  
        updateSize();
        $container.isotope( 'reLayout' );
    });
	
    //Set item size
    function updateSize() {
        $browserWidth = $container.width();
        $cols = 4;

        if ($browserWidth >= 1170) {
            $cols = 4;
        }
        else if ($browserWidth >= 800 && $browserWidth < 1170) {
            $cols = 3;
        }
        else if ($browserWidth >= 480 && $browserWidth < 800) {
            $cols = 2;
        }
        else if ($browserWidth >= 320 && $browserWidth < 480) {
            $cols = 1;
        }
        else if ($browserWidth < 401) {
            $cols = 1;
        }
        //console.log("Browser width is:" + $browserWidth);
        //console.log("Cols is:" + $cols);

        // $gutterTotal = $cols * 20;
		$browserWidth = $browserWidth; // - $gutterTotal;
        $itemWidth = $browserWidth / $cols;
        $itemWidth = Math.floor($itemWidth);

        $(".element").each(function(index){
            $(this).css({"width":$itemWidth+"px"});             
        });
			

    
	  var $optionSets = $('#options .option-set'),
	      $optionLinks = $optionSets.find('a');

	  $optionLinks.click(function(){
	    var $this = $(this);
	    // don't proceed if already selected
	    if ( $this.hasClass('selected') ) {
	      return false;
	    }
	    var $optionSet = $this.parents('.option-set');
	    $optionSet.find('.selected').removeClass('selected');
	    $this.addClass('selected');

	    // make option object dynamically, i.e. { filter: '.my-filter-class' }
	    var options = {},
	        key = $optionSet.attr('data-option-key'),
	        value = $this.attr('data-option-value');
	    // parse 'false' as false boolean
	    value = value === 'false' ? false : value;
	    options[ key ] = value;
	    if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
	      // changes in layout modes need extra logic
	      changeLayoutMode( $this, options )
	    } else {
	      // otherwise, apply new options
	      $container.isotope( options );
	    }
	    
	    return false;
	  });		

    };

        // Initialize the gallery
        $('.thumb').touchTouch();
    
    });
    
  </script>



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


<span class="block2" >

</span>
		<div class="content" >
       
			<div class="container_12">

			

            <div class="row1">

        		<div class="col-lg-12 col-md-12 col-sm-12">




                  <div id="options" class="clearfix">

                      <ul id="filters" class="pagination option-set clearfix" data-option-key="filter">
                          <?php
			  				for($k=0;$k<count($nombres);$k++)
			  				{
			   				?>
								<li><a href="multimedia.php?cod=<?php echo $idcat[$k];?>"><?php echo $nombres[$k]; ?></a></li>
				
               				<?php  } ?>
                      </ul>

                  </div><!-- #options -->




                  <div class="containerExtra">
                  <div id="container" class="clearfix">
                   <h3 style="padding-top:15px"><?php echo $row[0]; ?></h3>

                  <?php
                  for($j=0;$j<count($nombres);$j++)
			  				{
                  ?>
                   
                    <div class="element transition people" data-category="transition">
                    	<a href="img/page3_bigimg1.jpg" class="thumb"><figure class="img-polaroid"><img src="../administracion/imagenes/fotos/<?php echo $row[0]; ?>/<?php echo $nombrefoto[$j]; ?>" alt=""></figure></a><span class="description">quia non numquam</span>
                    </div>

                     <?php  } ?>

    		       </div>
               </div>




	        </div>


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