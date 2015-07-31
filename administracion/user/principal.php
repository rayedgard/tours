<?php 
session_start(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es" dir="ltr" id="minwidth" >
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>Sistema de Ventas y Facturacion - Administración</title>
  <link href="" rel="shortcut icon" type="image/x-icon" />

  <script type="text/javascript" src="../js/joomla.javascript.js"></script>
  <script type="text/javascript" src="../js/mootools.js"></script>
  <script type="text/javascript">
		window.addEvent('domready', function(){ new Accordion($$('.panel h3.jpane-toggler'), $$('.panel div.jpane-slider'), {onActive: function(toggler, i) { toggler.addClass('jpane-toggler-down'); toggler.removeClass('jpane-toggler'); },onBackground: function(toggler, i) { toggler.addClass('jpane-toggler'); toggler.removeClass('jpane-toggler-down'); },duration: 300,opacity: false,alwaysHide: true}); });
  </script>


<link rel="stylesheet" href="../css/general1.css" type="text/css" />


<!--[if IE 7]>
<link href="" rel="stylesheet" type="text/css" />
<![endif]-->

<!--[if lte IE 6]>
<link href="templates/khepri/css/ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->



<script language="JavaScript" type="text/javascript">
<!--
function Abrir_ventana(pagina){
var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=600, height=500, top=100, left=300";
window.open(pagina,"",opciones);
}
//-->
</script>


<script language="JavaScript" type="text/javascript">
<!--
function Abrir_ventana1(pagina){
var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=850, height=400, top=100, left=300";
window.open(pagina,"",opciones);
}
//-->
</script>



	<script type="text/javascript" src="../js/menu.js"></script>
	<script type="text/javascript" src="../js/index.js"></script>
    <script type="text/javascript" src="../js/itdecsa.js"></script>
    <script type="text/javascript" src="../js/ga.js"></script>
    <script type="text/javascript" src="../js/mootools.js"></script>

</head>
<body id="minwidth-body">
	<div  class="tituloPrincipal">
		Sistema de control de Stock, OPTICAS LATINO
			
	</div>
	<div id="header-box">
		<div id="module-status">
 <?php
$nick=$_GET['nick'];
$td=$_GET['td'];
include("../conexion.php");
$link = Conectarse();
$consultaUsuarios= mysql_query("SELECT nombre, apellidos FROM t_usuarios WHERE nick='$nick'",$link);
$usuarios = mysql_fetch_array($consultaUsuarios);
//fin consulta producto
//if(isset($_SESSION['usu']))
$usu=$_SESSION['usu'];
$usu=$usuarios[0]." ".$usuarios[1];

//para la tienda
$consultaTienda= mysql_query("SELECT nombre FROM t_tienda WHERE codTienda='$td'",$link);
$tienda = mysql_fetch_array($consultaTienda);
$tien=$_SESSION['tien'];
$tien=$tienda[0];

?>
		<span class="logout">Tienda o Sucursal <font color="#0066CC" size="3"><?php echo  $tien;?></font></span>
        <span class="logout">Bienvenido  <font color="#0066CC" size="3"> <?php echo  $usu;?></font></span>
        <span class="logout"><a href="../index.php">Cerrar sesión</a></span>
		</div>
		<div id="module-menu">
			<ul id="menu" >
<li class="node"><a class="" href="principal.php?nick=<?php echo $nick;?>&td=<?php echo $td;?>">Inicio</a>
</li>

<li class="node"><a>Clientes</a>
<ul>
<li><a class="" href="principal.php?p=2&td=<?php echo $td;?>&q=1&nick=<?php echo $nick;?>">Listar Clientes</a></li>
<li class="separator"><span></span></li>
<li><a class="" href="principal.php?p=2&q=2&td=<?php echo $td;?>&nick=<?php echo $nick;?>">Añadir Clientes</a></li>
<li class="separator"><span></span></li>
</ul>
</li>

<li class="node"><a>Usuarios</a>
<ul>
<li><a class="" href="principal.php?p=4&td=<?php echo $td;?>&q=1&nick=<?php echo $nick;?>">Modificar datos de Usuario</a></li>
<li class="separator"><span></span></li>

</ul>
</li>
<li class="node"><a>Productos</a>
<ul>
<li><a class="" href="principal.php?p=5&td=<?php echo $td;?>&q=1&nick=<?php echo $nick;?>">Listar Productos</a></li>
<li class="separator"><span></span></li>

</ul>
</li>

<li class="node"><a>Ventas</a>

<ul>
<li><a class="" href="principal.php?p=7&td=<?php echo $td;?>&q=1&nick=<?php echo $nick;?>">Listar Ventas</a></li>
<li class="separator"><span></span></li>
<li><a class="" href="principal.php?p=7&td=<?php echo $td;?>&q=2&nick=<?php echo $nick;?>">Realizar Nueva Venta</a></li>
<li class="separator"><span></span></li>
</ul>
<li class="node"><a class="" href="principal.php?p=8&td=<?php echo $td;?>&q=1&nick=<?php echo $nick;?>">Reportes</a>
<?php

/*<li class="node"><a>Publicidad</a>
<ul>
<li><a class="" href="principal.php?p=8&q=1">Listar Publicidad</a></li>
<li class="separator"><span></span></li>
<li class="separator"><span></span></li>
<li><a class="" href="principal.php?p=8&q=2">Nueva Publicidad</a></li>
</ul>
</li>

<li class="node"><a>Documentos</a>
<ul>
<li><a class="" href="principal.php?p=9&q=1">Listar Documentos</a></li>
<li class="separator"><span></span></li>
<li class="separator"><span></span></li>
<li><a class="" href="principal.php?p=9&q=2">Nuevo Documento</a></li>
</ul>
</li>*/
?>
		  </ul>

	  </div>
		<div class="clr"></div>
	</div>
	<div id="content-box">
		
				<!---->
                <!--==============================content================================-->
<?php  // codigo para insertar las paginas 



$p=$_GET['p'];
if($p=="" or $p==" ")
{
include("portada.php");
}
else
{ include("cabeceraNuevo.php");}
//fin codigo para isertar paginas ?>
<!--==============================footer=================================-->         
                <!---->
			
	</div>
	<div id="border-bottom"><div><div></div></div></div>
	<div id="footer">
		<p class="copyright">© OPTICAS LATINO. optilatino.com<br />
Dirección APV. Ccapac Mocco A-6 San Sebastian, CUSCO-PERU<br />
Teléfonos:             +51 084 272650      , 984 216127, 984550800, 971454446 RPM: *633888, *776649</p>
	</div>
</body>
</html>
