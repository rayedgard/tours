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



<!---incluimos la clase funciones--->
<?php
include("../funciones.php");
?>



<!----extensiones para el editor--->

<!-- place in header of your html document -->
<!-- TinyMCE -->
<script type="text/javascript" src="../../tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks,jfilebrowser",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect,jfilebrowser",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE -->



<!------fin extensiones del editor-------->




















<script language="JavaScript" type="text/javascript">
<!--
function banner(pagina){
var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=300, height=200, top=50, left=300%";
window.open(pagina,"",opciones);
}
//-->
</script>







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
		SISTEMA DE ADMINISTRACIÓN 
        </div>
	<div id="header-box">
		<div id="module-status">
 <?php
 //desecriptamos el nick para mostrar la cadena de caracteres
$nick= desencripta($_GET['nick'],"rayedgard");
$nivel=$_GET['td'];/*td=nivel*/
include("../../conexion.php");
$link = Conectarse();
$consultaUsuarios= mysql_query("SELECT nombres, apellidoP  FROM usuarios WHERE nicke='$nick'",$link);
$usuarios = mysql_fetch_array($consultaUsuarios);
//fin consulta producto
//if(isset($_SESSION['usu']))
$usu=$_SESSION['usu'];
$usu=$usuarios[0]." ".$usuarios[1];
?>
		<span class="logout">Bienvenido  <font color="#0066CC" size="3"> <?php echo  $usu;?></font></span>
        <span class="logout"><a href="../index.php">Cerrar sesión</a></span>
		</div>
		<div id="module-menu">
			<ul id="menu" >
            
	<?php
	//antes de enviar los caracteres que pasamos por la URL debemos ponerlo en buen recaudo encriptar
  	$nick1= encripta($nick,"rayedgard");
	?>
            
<li class="node"><a class="" href="principal.php?nick=<?php echo $nick1;?>&td=<?php echo $td;?>">Inicio</a>
</li>
<li class="node"><a>Elementos del sistema</a>
<ul>
<li><a class="" href="principal.php?p=1&td=<?php echo $td;?>&q=1&nick=<?php echo $nick1;?>">Gestión de Videos</a></li>
<li class="separator"><span></span></li>
<li><a class="" href="principal.php?p=2&td=<?php echo $td;?>&q=1&nick=<?php echo $nick1;?>">Gestión de Noticias</a></li>
<li class="separator"><span></span></li>
<li><a class="" href="principal.php?p=3&td=<?php echo $td;?>&q=1&nick=<?php echo $nick1;?>">Gestión de Publicidad</a></li>
<li class="separator"><span></span></li>

</ul>
</li>
<li class="node"><a>Personas</a>
<ul>
<li><a class="" href="principal.php?p=4&td=<?php echo $td;?>&q=1&nick=<?php echo $nick1;?>">Usuarios del Sistema</a></li>
<li class="separator"><span></span></li>
<li><a class="" href="principal.php?p=5&td=<?php echo $td;?>&q=1&nick=<?php echo $nick1;?>">Perfiles de los trabajadores</a></li>
<li class="separator"><span></span></li>

</ul>
</li>


<li class="node"><a>Paquetes Turisticos</a>
<ul>
<li><a class="" href="principal.php?p=6&td=<?php echo $td;?>&q=1&nick=<?php echo $nick1;?>">Gestión de Paquetes</a></li>
<li class="separator"><span></span></li>
<li><a class="" href="principal.php?p=7&td=<?php echo $td;?>&q=1&nick=<?php echo $nick1;?>">Gestión de Destinos</a></li>
<li class="separator"><span></span></li>
</ul>
</li>

<li class="node"><a>Fotografias</a>
<ul>
<li class="node"><a class="" href="principal.php?p=8&td=<?php echo $td;?>&q=1&nick=<?php echo $nick1;?>">Categorias Fotograficas</a></li>
<li class="separator"><span></span></li>
</ul>
</li>
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
		<p class="copyright">
		<a href="http://www.itdecsa.com" target="_blank">©itdecsa. itdecsa.com <br />
Apv Capac Mocco A-6<br />
Teléfonos:             +51 84 272650      ,RPC: 993026679 - 987789722, CORREO ELECTRONICO, informes@itdecsa.com</a>
	</p>
	</div>
</body>
</html>
