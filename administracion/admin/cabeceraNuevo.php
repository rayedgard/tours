
<?php
//seccion= tienda
//categoria=clientes
//servicios = proveedores
//noticias=productos
//eventos= compras
//videos =ventas
//desecriptamos el nick para mostrar la cadena de caracteres
$nick= desencripta($_GET['nick'],"rayedgard");
$td=$_GET['td'];





  $p = $_GET['p'];

  if($p==1)
  {$titulo="Gestión de Videos";}
  if($p==2)
  {$titulo="Gestión de Noticias";}
  if($p==3)
  {$titulo="Gestión de Publicidad";}
  if($p==4)
  {$titulo="Gestión de Usuarios del Sistema";}
  if($p==5)
  {$titulo="Gestión de Perfiles del Personal";}
  if($p==6)
  {$titulo="Gestión de Paquetes Turísticos";}
  if($p==7)
  {$titulo="Gestión de Destinos Turísticos";}
  if($p==8)
  {$titulo="Gestion de Fotografias";}
  if($p==9)
  {$titulo="Gestión de Eventos";}

 
  
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

<?php
//antes de enviar los caracteres que pasamos por la URL debemos ponerlo en buen recaudo encriptar
$nick1= encripta($nick,"rayedgard");
?>



<td class="button" id="toolbar-save">
<a href="principal.php?p=<?php echo $p;?>&q=1&nick=<?php echo $nick1;?>&td=<?php echo $td;?>" onclick="javascript: submitbutton('guarda')" class="toolbar">
<span class="guarda" title="Guardar">
</span>
listar
</a>
</td>


<?php
$nick= desencripta($_GET['nick'],"rayedgard");
$super1 = mysql_query("select tipo from usuarios where nicke='$nick'",$link);
$super= mysql_fetch_array($super1);
$nick1= encripta($nick,"rayedgard");
if($super[0]==0 and $p==4)
{
	echo ".";
}
else
{
?>
<td class="button" id="toolbar-cancel">
<a href="principal.php?p=<?php echo $p;?>&q=2&nick=<?php echo $nick1;?>&td=<?php echo $td;?>" onclick="javascript: submitbutton('nuevo')" class="toolbar">
<span class="nuevo" title="Nuevo">
</span>
Nuevo
</a>
</td>
<?php
}
?>
<td class="button" id="toolbar-cancel">
<a href="principal.php?nick=<?php echo $nick1;?>&td=<?php echo $td;?>" onclick="javascript: submitbutton('cancelar')" class="toolbar">
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
            <!--para el borde inferior-->
			<div class="b">
			<div class="b">
			<div class="b">
            </div>
			</div>
			</div>
          
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
	

  

      <!--para el borde inferior-->
			<div class="b">
			<div class="b">
			<div class="b">
            </div>
			</div>
			</div>
         

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

//para los mensajes de eliminacion
	$s = $_GET['s'];


	$e = $_GET['e'];
  $q = $_GET['q'];
  if ($p) {
	  switch ($p) {
		  //
		  case 1:
			  if($q==1)
			  {
			  		include("listarVideo.php");
			  }
			  if($q==2)
			  {
				  	  include("nuevoVideo.php");
			  }
			  if($q==3)
			  {
			  	  include("modificarVideo.php");
			  }
			    if($q==4)
			  {
			  	  include("mensaje.php");
			  }
		  break;
		  case 2:
		    if($q==1)
			  {
				  	include("listarNoticias.php");
			  }
			  if($q==2)
			  {
			  		include("nuevoNoticias.php");
			  }
			  if($q==3)
			  {
			  	  include("modificarNoticias.php");
			  }
			   if($q==4)
			  {
			  	  include("mensaje.php");
			  }
		  
		  break;
		  case 3:
			  if($q==1)
			  {
			  include("listarPublicidad.php");
			  }
			  if($q==2)
			  {
			 		include("nuevoPublicidad.php");
			  }
			  if($q==3)
			  {
			  	  include("modificarPublicidad.php");
			  }
			    if($q==4)
			  {
			  	  include("mensaje.php");
			  }
			 
		  
		  break;
		  case 4:
			  if($q==1)
			  {
			  include("listarUsuarios.php");
			  }
			  if($q==2)
			  {
			  
			  include("nuevoUsuario.php");
			  }
			  if($q==3)
			  {
			  	  include("modificarUsuario.php");
			  }
			    if($q==4)
			  {
			  	  include("mensaje1.php");
			  }
		  
		  break;
		  
		 case 5:
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
			    if($q==4)
			  {
			  	  include("mensaje.php");
			  }
		  
		  break;
		  case 6:
			  if($q==1)
			  {
			  include("listarPaquete.php");
			  }
			  if($q==2)
			  {
			  
			  include("nuevoPaquete.php");
			  }
			  if($q==3)
			  {
			  	  include("modificarPaquete.php");
			  }
			   if($q==4)
			  {
			  	  include("mensaje.php");
			  }
			 
		  
		  break;
		  case 7:
			  if($q==1)
			  {
			  include("listarDestino.php");
			  }
			  if($q==2)
			  {
			  
			  include("nuevoDestino.php");
			  }
			  if($q==3)
			  {
			  	  include("modificarDestino.php");
			  }
			   if($q==4)
			  {
			  	  include("mensaje.php");
			  }
		  break;
					
		  case 8:
			  if($q==1)
			  {
			  include("listarCategoriaFotos.php");
			  }
			  if($q==2)
			  {
			  
			  include("nuevoCategoriaFotos.php");
			  }
			  if($q==3)
			  {
			  	  include("modificarCategoriaFotos.php");
			  }
			  if($q==4)
			  {
			  	  include("mensaje.php");
			  }
		  
		  break;  
		  
		   case 9:
			  if($q==1)
			  {
			  include("listarEvento.php");
			  }
			  if($q==2)
			  {
			  
			  include("nuevoEvento.php");
			  }
			  if($q==3)
			  {
			  	  include("modificarEvento.php");
			  }
			  if($q==4)
			  {
			  	  include("mensaje.php");
			  }
		  
		  break;  
		  
	
  } }
  else {
	  include("portada.php");
  }
  //fin codigo para isertar paginas
?>
</div>