


<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="../css/tablas.css" type="text/css" />


<?php

$link = Conectarse();
$nick= desencripta($_GET['nick'],"rayedgard");
$td=$_GET['td'];
?>




<script>
//recojemos los parametros d=url enviado del boton elimiar y u=el nombre del elemento que se eliminara
//DONDE d=DIRECCION DEL PAQUETE
//      u=NOMBRE DEL PAQUETE
function direc(d,u)
{
var r=confirm("Esta seguro que desea eliminar este PAQUETE: "+u+" !!");
if (r==true)
  {
	window.location=d;//redirige la url
  }
else
  {
	window.location=document.location.href;//reguresa a la misma direccion
  }
}
//recojemos los parametros d=url enviado del boton elimiar y u=el nombre del elemento que se eliminara
//DONDE d=DIRECCION DEL PAQUETE
//      u=NOMBRE DEL PAQUETE

function direc1(d,u)
{
var r=confirm("Esta seguro que desea DESVINCULAR el Banner de este PAQUETE, si acepta eliminara la imagen de banner asociada al paquete: "+u+" !!");
if (r==true)
  {
	window.location=d;//redirige la url
  }
else
  {
	window.location=document.location.href;//reguresa a la misma direccion
  }
}



</script>


<?php
$p=$_GET[p]; //PARAMETRO P DE PAGINA
$ima=$_GET[im]; //capturamos el parametro im para borrar la imagen del paquete
$codPaquetes=$_GET['cod'];
$eliminado=$_GET['e'];


	if($eliminado=='2')
	{
//eliminando de la bd 

mysql_query("DELETE FROM paquetes WHERE idPaquete='$codPaquetes'",$link);


			//antes de enviar los caracteres que pasamos por la URL debemos ponerlo en buen recaudo encriptar
  	$nick1= encripta($nick,"rayedgard");


		
/** * Delete a file, or a folder and its contents * * @author Aidan Lister <aidan@php.net> * @version 1.0.0 * @param string $dirname The directory to delete * @return bool Returns true on success, false on failure */
function rmdirr($dirname)
{ // Simple delete for a file 
	if (is_file($dirname)) 
	{
	 	return unlink($dirname);
	} // Loop through the folder 
	$dir = dir($dirname); 
	while (false !== $entry = $dir->read()) 
	{ // Skip pointers 
		if ($entry == '.' || $entry == '..') 
		{ 
		continue; 
		} // Deep delete directories 
		if (is_dir("$dirname/$entry")) 
		{ 
			rmdirr("$dirname/$entry"); 
		} 
		else 
		{ 
		unlink("$dirname/$entry"); 
		} 
	} // Clean up 
	$dir->close();
	return rmdir($dirname);
}

rmdirr("../imagenes/paquetes/".$codPaquetes);//sabiendo que estos son los parametros para tu caso  
rmdirr("../imagenes/paquetes/".$ima);//sabiendo que estos son los parametros para tu caso


$my_error = mysql_error($link);
	}
	if($eliminado=='1')
	{
mysql_query("UPDATE paquetes SET  eliminar='1' WHERE idPaquete='$codPaquetes'",$link);
$my_error = mysql_error($link);
	}
	
	if($eliminado=='0')
	{
mysql_query("UPDATE paquetes SET  eliminar='0' WHERE idPaquete='$codPaquetes'",$link);
$my_error = mysql_error($link);
	}
	
	if($eliminado=='5')
	{
mysql_query("UPDATE paquetes SET  banner='0' WHERE idPaquete='$codPaquetes'",$link);
$my_error = mysql_error($link);
$consultaBanner = mysql_query("select imagen from banner where idPaquete='$cod'",$link);
$resultadoBanner = mysql_fetch_array($consultaBanner);

mysql_query("DELETE FROM banner WHERE idPaquete='$codPaquetes'",$link);
unlink("../imagenes/paquetes/".$resultadoBanner[0]);
	}

if(!empty($my_error ))
		{	
		

			
			echo "<meta http-equiv ='refresh' content='0;url=principal.php?q=4&p=".$p."&nick=".$nick1."&td=".$td."'>";
		}
		
		
		
		
		
		
		


?>














<form action="" method="post" enctype="multipart/form-data" name="form2" id="form2">
Búsqueda de PAQUETES:<p>
Cualquier caracter de nombre o código de PAQUETE 
 <input id="green" class="cajasTex" name="busqueda" value="" type="text" tabindex="2"  />
 <input class="button2" type="submit" value="BUSCAR" id="aceptar" name="aceptar" tabindex="5"/>

 

 
 
 <?php
 //CODIGO PARA MOSTRAR REGISTROS A BORRAR

 $busqueda= '';
 $buscar = "nombrePaquete LIKE '%$busqueda%' OR idPaquete LIKE '%$busqueda%'";
 
  if($_POST['aceptar'])
 { 
 $busqueda= $_POST['busqueda'];
 $buscar = "nombrePaquete LIKE '%$busqueda%' OR idPaquete LIKE '%$busqueda%'";
 }

 

$consulta2 ="SELECT idPaquete,nombrePaquete,imagen,idioma,eliminar,banner FROM paquetes WHERE $buscar ORDER BY nombrePaquete ASC"; 
$resultado2 = mysql_query($consulta2,$link);

	//nombre del titulo
	$id=array();
	$nombrePaquete=array();
	$imagen=array();
	$idioma=array();
	$eliminar=array();
	$banner=array();
while($row2 = mysql_fetch_array($resultado2))
		{
		array_push($id,$row2[0]);
		array_push($nombrePaquete,$row2[1]);
		array_push($imagen,$row2[2]);
		array_push($idioma,$row2[3]);
		array_push($eliminar,$row2[4]);
		array_push($banner,$row2[5]);
		}
		
///cuadro de los contenidos parte superior		
		echo '

<table width="100%" border="0">
  <tr border="1" bgcolor="#996600">
    <td width="10"><font color="#ffffff">Nº</font></td>
    <td width=""><font color="#ffffff">Nombre Paquete</font></td>
	<td width="100"><font color="#ffffff">Idioma</font></td>
	
	<td width="100"><font color="#ffffff">Estado</font></td>
	<td width="100"><font color="#ffffff">Banner</font></td>
	<td width="32"><font color="#ffffff"><img src="../imagen/desvin.png"></font></td>
		<td width="32"><font color="#ffffff"><img src="../imagen/banner.png"></font></td>
	<td width="32"><font color="#ffffff"><img src="../imagen/eliminar.png"></font></td>
	<td width="32"><font color="#ffffff"><img src="../imagen/elimina.png"></font></td>
	<td width="32"><font color="#ffffff"><img src="../imagen/activar.png"></font></td>
	<td width="32"><font color="#ffffff"><img src="../imagen/modificar.png"></font></td>
	<td width="32"><font color="#ffffff"><img src="../imagen/asignar.png"></font></td>
  </tr>

';
$cont=1;
		
		
 for($j=0;$j<count($nombrePaquete);$j++)
{
	
?>

 
  <tr  <?php if($eliminar[$j]==1){echo 'class="minimo"';} if($banner[$j]==1){echo 'class="parabanner"';}?> >
  
  	<td ><?php echo $cont; ?></td>
    <td><?php echo $nombrePaquete[$j]; ?></td>
    
    <td><?php if($idioma[$j]==0){echo 'Español';} if($idioma[$j]==1){echo 'Ingles';} ?></td>
    <td><?php if($eliminar[$j]==1){echo 'Desactivo';} if($eliminar[$j]==0){echo 'Activo';} ?></td>	
    
    
     <td><?php if($banner[$j]==1){echo 'Banner OK';} if($banner[$j]==0){echo '-------';} ?></td>	
     
     <td>
  <a href="#" onclick="javascript:
 direc1('principal.php?q=1&p=<?php echo $p;?>&nick=<?php echo $nick1;?>&td=<?php echo $td;?>&e=5&im=<?php echo $imagen[$j];?>&cod=<?php echo $id[$j];?>','<?php echo $nombrePaquete[$j];?>');"  title="DESVINCULAR BANNER" ><img src="../imagen/desvin.png"></a>
    </td>
      <td>
    
 <a href="javascript:banner('asignaBanner.php?id=<?php echo $id[$j];?>&nick=<?php echo $nick1;?>&td=<?php echo $td;?>&n=<?php echo $nombrePaquete[$j];?>')" title="Asignación de BANNERS"><img src="../imagen/banner.png"></a>
    
    </td>      
     
     
    <td>
    
        <a href="#" onclick="javascript:
 direc('principal.php?q=1&p=<?php echo $p;?>&nick=<?php echo $nick1;?>&td=<?php echo $td;?>&e=2&im=<?php echo $imagen[$j];?>&cod=<?php echo $id[$j];?>','<?php echo $nombrePaquete[$j];?>');"  title="ELIMINAR" ><img src="../imagen/eliminar.png"></a>
    
    
    </td>
	<td>
    <a href="principal.php?q=1&p=<?php echo $p;?>&nick=<?php echo $nick1;?>&td=<?php echo $td;?>&e=1&cod=<?php echo $id[$j];?>" title="DESACTIVAR"><img src="../imagen/elimina.png"></a>
    </td>
    <td>
    <a href="principal.php?q=1&p=<?php echo $p;?>&nick=<?php echo $nick1;?>&td=<?php echo $td;?>&e=0&cod=<?php echo $id[$j];?>" title="ACTIVAR"><img src="../imagen/activar.png"></a>
    </td>
    <td>
    <a href="principal.php?p=<?php echo $p;?>&nick=<?php echo $nick1;?>&td=<?php echo $td;?>&q=3&cod=<?php echo $id[$j];?>" title="MODIFICAR"><img src="../imagen/modificar.png"></a>
    </td>
     <td>
        <a href="javascript:Abrir_ventana('asignaDestinos.php?id=<?php echo $id[$j];?>&nick=<?php echo $nick1;?>&td=<?php echo $td;?>&n=<?php echo $nombrePaquete[$j];?>&i=<?php echo $idioma[$j];?>')" title="Asignación de Destinos a Paquetes"><img src="../imagen/asignar.png"></a>
    </td>
  </tr>


 
 <?php
 $cont++;
}


echo "</table> ";

?> 

 
 
</form>
