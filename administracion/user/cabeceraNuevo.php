<?php

//seccion= tienda
//categoria=clientes
//servicios = proveedores
//noticias=productos
//eventos= compras
//videos =ventas

$nick=$_GET['nick'];
$td=$_GET['td'];





  $p = $_GET['p'];

  if($p==1)
  {$titulo="Gestión de Tienda o Sucursales";}
  if($p==2)
  {$titulo="Gestión de Clientes";}
  if($p==3)
  {$titulo="Gestión de Proveedores";}
  if($p==4)
  {$titulo="Gestión de Usuarios";}
  if($p==5)
  {$titulo="Gestión de Productos";}
  if($p==6)
  {$titulo="Gestion de Compras del sistema";}
  if($p==7)
  {$titulo="Gestion de Ventas";}
  if($p==8)
  {$titulo="Reportes";}
  if($p==9)
  {$titulo="Documentos";}
    if($p==10)
  {$titulo="Perfil del Trabajador";}
?>


	<div id="content-box">
		<div class="border">
			<div class="padding">
				<div id="toolbar-box">
   			<div class="t">

<div class="t">
					<div class="t"></div>
				</div>
			</div>
			<div class="m">
				<div class="toolbar" id="toolbar">
<table class="toolbar"><tr>
<td class="button" id="toolbar-popup-Popup">
<a class="modal" href="" rel="{handler: 'iframe', size: {x: 640, y: 480}}">



</a>
</td>

<td class="button" id="toolbar-save">
<a href="principal.php?p=<?php echo $p;?>&q=1&nick=<?php echo $nick;?>&td=<?php echo $td;?>" onclick="javascript: submitbutton('guarda')" class="toolbar">
<span class="guarda" title="Guardar">
</span>
listar
</a>
</td>

<td class="button" id="toolbar-cancel">
<a href="principal.php?p=<?php echo $p;?>&q=2&nick=<?php echo $nick;?>&td=<?php echo $td;?>" onclick="javascript: submitbutton('nuevo')" class="toolbar">
<span class="nuevo" title="Nuevo">
</span>
Nuevo
</a>
</td>

<td class="button" id="toolbar-cancel">
<a href="principal.php?nick=<?php echo $nick;?>&td=<?php echo $td;?>" onclick="javascript: submitbutton('cancelar')" class="toolbar">
<span class="cancelar" title="Cancelar">
</span>
Cancelar
</a>
</td>




</tr></table>
</div>
				<div class="header icon-48-addedit">
<img src="../imagen/a.png" width="64" height="61" /><?php  echo $titulo; ?>
</div>

				<div class="clr"></div>
			</div>
            <!---para el borde inferior-->
			<div class="b">
			<div class="b">
			<div class="b">
            </div>
			</div>
			</div>
            <!----------->
      </div>
   		
        <div class="clr">
        </div>
		
        
               
        <div id="element-box">
		
        
        
        
        <div class="t">
		<div class="t">
		<div class="t"> 
        </div>
		</div>
		</div>
	

  

      <!---para el borde inferior-->
			<div class="b">
			<div class="b">
			<div class="b">
            </div>
			</div>
			</div>
            <!----------->

   		</div>
	
		<div class="clr"></div>
	</div>
	<div class="clr"></div>
</div>
</div>

<div class="divContenido">


 <?php  // codigo para insertar las paginas 

// consulta para la validacion del sistema
$link = Conectarse();
//$consultaSeccion = mysql_query("SELECT COUNT(id) FROM seccion",$link);
//$resulatadoSeccion = mysql_fetch_array($consultaSeccion);
//$consultaCategoria = mysql_query("SELECT COUNT(id) FROM categoria",$link);
//$resulatadoCategoria = mysql_fetch_array($consultaCategoria);
//$consultaProducto = mysql_query("SELECT COUNT(id) FROM producto",$link);
//$resulatadoProducto = mysql_fetch_array($consultaProducto);
//

//para los mensajes de eliminacion
	$s = $_GET['s'];
//$consultaCategoria1 = mysql_query("SELECT COUNT(id) FROM categoria WHERE seccion='$s'",$link);
//$resulatadoCategoria1 = mysql_fetch_array($consultaCategoria1);
//$consultaProducto1 = mysql_query("SELECT COUNT(id) FROM producto WHERE categoria='$s'",$link);
//$resulatadoProducto1 = mysql_fetch_array($consultaProducto1);


	$e = $_GET['e'];
  $q = $_GET['q'];
  if ($p) {
	  switch ($p) {
		  //
		  case 1:
			  if($q==1)
			  {
				  
				  
			  		include("listarSeccion.php");
			  		
			  }
			  if($q==2)
			  {
				 
			  	  include("nuevaSeccion.php");
				  
			  }
			  if($q==3)
			  {
			  	  include("modificarSeccion.php");
			  }
		  break;
		  case 2:
		    if($q==1)
			  {
				  
				  
				 
				  		include("listarCategoria.php");
			  	  
			  
			  }
			  if($q==2)
			  {
			
			  		include("nuevaCategoria.php");
			  	 
			  }
			  if($q==3)
			  {
			  	  include("modificaCategoria.php");
			  }
		  
		  break;
		  case 3:
			  if($q==1)
			  {
			  include("listarProducto.php");
			  }
			  if($q==2)
			  {
			  
			
			  		include("nuevoProducto.php");
			  
			  }
			  if($q==3)
			  {
			  	  include("modificarProducto.php");
			  }
		  
		  break;
		  case 4:
			  if($q==1)
			  {
			  include("modificarUsuario.php");
			  }
			  if($q==2)
			  {
			  
			  include("modificarUsuario.php");
			  }
			  if($q==3)
			  {
			  	  include("modificarUsuario.php");
			  }
		  
		  break;
		  
		 case 5:
			  if($q==1)
			  {
			  include("listarNoticias.php");
			  }
			  if($q==2)
			  {
			  
			  include("listarNoticias.php");
			  }
			  if($q==3)
			  {
			  	  include("listarNoticias.php");
			  }
		  
		  break;
		  case 6:
			  if($q==1)
			  {
			  include("listarEventos.php");
			  }
			  if($q==2)
			  {
			  
			  include("nuevoEventos.php");
			  }
			  if($q==3)
			  {
			  	  include("actualizaCompra.php");
			  }
			 
		  
		  break;
		  case 7:
			  if($q==1)
			  {
			  include("listarVenta.php");
			  }
			  if($q==2)
			  {
			  
			  include("nuevoVenta.php");
			  }
			  if($q==3)
			  {
			  	  include("actualizarVenta.php");
			  }
		  break;
					
		  case 8:
			  if($q==1)
			  {
			  include("reporte.php");
			  }
			  if($q==2)
			  {
			  
			  include("reporte.php");
			  }
			  if($q==3)
			  {
			  	  include("reporte.php");
			  }
		  
		  break;  
		  /*  case 9:
			  if($q==1)
			  {
			  include("listarDocumentos.php");
			  }
			  if($q==2)
			  {
			  
			  		include("nuevoDocumento.php");
			  	  
			  }
			  if($q==3)
			  {
			  	  include("modificarDocumento.php");
			  }
		  
		  break;  
		  
		  case 10:
			  if($q==1)
			  {
			  include("listarPerfil.php");
			  }
			  if($q==2)
			  {
			   	include("nuevoPerfil.php");
			  }
			  if($q==3)
			  {
			  	  include("modificarPerfil.php");
			  }
		  
		  break;
		
		  
		  
		     
		 case 8:
			  include("paginas/mapa1.php");
			  break;
		  case 9:
			  include("paginas/mapa2.php");
			  break;
		  case 10:
			  include("paginas/mapa3.php");
			  break;
		  case 11:
			  include("paginas/proyecto1.php");
			  break;
		  case 12:
			  include("paginas/proyecto2.php");
			  break;
		  case 13:
			  include("paginas/proyecto3.php");
			  break;*/
  } }
  else {
	  include("portada.php");
  }
  //fin codigo para isertar paginas ?>

</div>>>