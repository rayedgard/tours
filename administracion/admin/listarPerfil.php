<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="../css/tablas.css" type="text/css" />


<?php

///...Nos conectamos y guardamos los datos en el link de conexion
$link = Conectarse();
//desecriptamos el nick para mostrar la cadena de caracteres
$nick= desencripta($_GET['nick'],"rayedgard");

$td=$_GET['td'];
?>


<script>
//recojemos los parametros d=url enviado del boton elimiar y u=el nombre del elemento que se eliminara
function direc(d,u)
{
var r=confirm("Esta seguro que desea eliminar este PERFIL: "+u+" !!");
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




<form action="" method="post" enctype="multipart/form-data" name="form2" id="form2">
 
 
 <?php
$p=$_GET[p];

$codigoPerfil=$_GET['cod'];
$eliminado=$_GET['e'];


//consulta para optener el registro para eliminar la imagen de la categiria
$consultaPerfil = mysql_query("select foto, curriculum from perfil where id='$codigoPerfil'",$link);
$perfil= mysql_fetch_array($consultaPerfil);

	if($eliminado=='2')
	{
//eliminando de la bd 
mysql_query("DELETE FROM perfil WHERE id='$codigoPerfil'",$link);
$my_error = mysql_error($link);
unlink("../imagenes/perfil/".$perfil[0]);//aqui eliminamos la imagen de la carpeta clases
unlink("../imagenes/perfil/".$perfil[1]);//aqui eliminamos el curriculum archivo
	}
	if($eliminado=='1')
	{
mysql_query("UPDATE perfil SET  eliminar='1' WHERE id='$codigoPerfil'",$link);
$my_error = mysql_error($link);
	}
	
	if($eliminado=='0')
	{
mysql_query("UPDATE perfil SET  eliminar='0' WHERE id='$codigoPerfil'",$link);
$my_error = mysql_error($link);
	}

	
	//antes de enviar los caracteres que pasamos por la URL debemos ponerlo en buen recaudo encriptar
	$nick1= encripta($nick,"rayedgard");
	if(!empty($my_error ))
		{		
			echo "<meta http-equiv ='refresh' content='0;url=principal.php?q=4&p=".$p."&nick=".$nick1."&td=".$td."'>";
		}

?>

 
 <?php
 //CODIGO PARA MOSTRAR REGISTROS A BORRAR

$consulta2 ="SELECT id,nombres,apellidos,cargo, eliminar FROM perfil ORDER BY nombres ASC"; 
$resultado2 = mysql_query($consulta2,$link);

	//nombre del titulo
	$id=array();
	$nombres=array();
	$apellidos=array();
	$cargo=array();
	$eliminado=array();
	
while($row2 = mysql_fetch_array($resultado2))
		{
		array_push($id,$row2[0]);
		array_push($nombres,$row2[1]);
		array_push($apellidos,$row2[2]);
		array_push($cargo,$row2[3]);
		array_push($eliminado,$row2[4]);
		}
		
///cuadro de los contenidos parte superior		
		echo '

<table width="100%" border="0">
  <tr border="1" bgcolor="#996600">
    <td width="10"><font color="#ffffff">Nº</font></td>
    <td width=""><font color="#ffffff">Nombres de los Trabajadores</font></td>
	<td width="200"><font color="#ffffff">Cargo </font></td>
	<td width="100"><font color="#ffffff">Estado</font></td>
	<td width="32"><font color="#ffffff"><img src="../imagen/eliminar.png"></font></td>
	<td width="32"><font color="#ffffff"><img src="../imagen/elimina.png"></font></td>
	<td width="32"><font color="#ffffff"><img src="../imagen/activar.png"></font></td>
	<td width="32"><font color="#ffffff"><img src="../imagen/modificar.png"></font></td>
  </tr>

';
$cont=1;
		
		
 for($j=0;$j<count($nombres);$j++)
{

?>

 
  <tr  <?php if($eliminado[$j]==1){echo 'class="minimo"';}?> >
  	<td><?php echo $cont; ?></td>
  	<td><?php echo $nombres[$j].' '.$apellidos[$j]; ?></td>
    <td><?php echo $cargo[$j]; ?></td>
	<td><?php if($eliminado[$j]==1){echo 'Desactivo';} if($eliminado[$j]==0){echo 'Activo';} ?></td>
    
  <td> 
    
    
    
     <a href="#" onclick="javascript:
 direc('principal.php?q=1&p=<?php echo $p;?>&nick=<?php echo $nick1;?>&td=<?php echo $td;?>&e=2&cod=<?php echo $id[$j];?>&s=<?php echo $nombre[$j];?>','<?php echo $nombres[$j];?>');"  title="ELIMINAR" ><img src="../imagen/eliminar.png"></a>
    
    
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
  </tr>


 
 <?php
 $cont++;
}


echo "</table> ";

?> 

 
 
</form>
