


<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="../css/tablas.css" type="text/css" />


<?php

$link = Conectarse();
$p= $_GET['p'];

//desecriptamos el nick para mostrar la cadena de caracteres
$nick= desencripta($_GET['nick'],"rayedgard");

$td=$_GET['td'];
?>


<script>
//recojemos los parametros d=url enviado del boton elimiar y u=el nombre del elemento que se eliminara
//DONDE u=DIRECCION DEL PAQUETE
//      d=NOMBRE DEL PAQUETE
function direc(d,u)
{
var r=confirm("Esta seguro que desea eliminar esta Publicidad: "+u+" !!");
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


//antes de enviar los caracteres que pasamos por la URL debemos ponerlo en buen recaudo encriptar
$nick1= encripta($nick,"rayedgard");


$codigoPublicidad=$_GET['cod'];
$eliminado=$_GET['e'];
// consulta para onçbtener el registro para eliminar la imagen de la noticia
$consultaPublicidad1 = mysql_query("select imagen from publicidad where id='$codigoPublicidad'",$link);
$publicidad1= mysql_fetch_array($consultaPublicidad1);

if($eliminado=='2')
	{
//eliminando de la bd 

mysql_query("DELETE FROM publicidad WHERE id='$codigoPublicidad' ",$link);
	unlink("../imagenes/publicidad/".$publicidad1[0]);
$my_error = mysql_error($link);
	}
	if($eliminado=='1')
	{
mysql_query("UPDATE publicidad SET  eliminar='1' WHERE id='$codigoPublicidad'",$link);
$my_error = mysql_error($link);
	}
	
	if($eliminado=='0')
	{
mysql_query("UPDATE publicidad SET  eliminar='0' WHERE id='$codigoPublicidad'",$link);
$my_error = mysql_error($link);
	}

if(!empty($my_error ))
		{		
			echo "<meta http-equiv ='refresh' content='0;url=principal.php?q=4&p=".$p."&nick=".$nick1."&td=".$td."'>";
		}
	

?>

 
 <?php
 //CODIGO PARA MOSTRAR REGISTROS A BORRAR

$consulta2 ="SELECT id,nombre,eliminar,enlace FROM publicidad ORDER BY nombre ASC"; 
$resultado2 = mysql_query($consulta2,$link);

	//nombre del titulo
	$id=array();
	$nombrePublicidad=array();
	$eliminar=array();
	$enlace=array();
while($row2 = mysql_fetch_array($resultado2))
		{
		array_push($id,$row2[0]);
		array_push($nombrePublicidad,$row2[1]);
		array_push($eliminar,$row2[2]);
		array_push($enlace,$row2[3]);
		}
		
///cuadro de los contenidos parte superior		
		echo '

<table width="100%" border="0">
  <tr border="1" bgcolor="#996600">
    <td width="10"><font color="#ffffff">Nº</font></td>
    <td width=""><font color="#ffffff">Nombre Publicidad</font></td>
	<td width="300"><font color="#ffffff">Dirección URL</font></td>
	<td width="100"><font color="#ffffff">Estado</font></td>
	<td width="32"><font color="#ffffff"><img src="../imagen/eliminar.png"></font></td>
	<td width="32"><font color="#ffffff"><img src="../imagen/elimina.png"></font></td>
	<td width="32"><font color="#ffffff"><img src="../imagen/activar.png"></font></td>
	<td width="32"><font color="#ffffff"><img src="../imagen/modificar.png"></font></td>
  </tr>

';
$cont=1;
		
		
 for($j=0;$j<count($nombrePublicidad);$j++)
{

?>

 
  <tr  <?php if($eliminar[$j]==1){echo 'class="minimo"';}?> >
  	<td><?php echo $cont; ?></td>
  	<td><?php echo $nombrePublicidad[$j]; ?></td>
	<td><?php echo $enlace[$j]; ?></td>
    <td><?php if($eliminar[$j]==1){echo 'Desactivo';} if($eliminar[$j]==0){echo 'Activo';} ?></td>	
    <td>
    
     <a href="#" onclick="javascript:
 direc('principal.php?q=1&p=<?php echo $p;?>&nick=<?php echo $nick1;?>&td=<?php echo $td;?>&e=2&im=<?php echo $imagen[$j];?>&cod=<?php echo $id[$j];?>','<?php echo $nombreNoticias[$j];?>');"  title="ELIMINAR" ><img src="../imagen/eliminar.png"></a>
    

    </td>
	<td>
    <a href="principal.php?q=1&p=<?php echo $p;?>&e=1&cod=<?php echo $id[$j];?>&nick=<?php echo $nick1;?>" title="DESACTIVAR"><img src="../imagen/elimina.png"></a>
    </td>
    <td>
    <a href="principal.php?q=1&p=<?php echo $p;?>&e=0&cod=<?php echo $id[$j];?>&nick=<?php echo $nick1;?>" title="ACTIVAR"><img src="../imagen/activar.png"></a>
    </td>
    <td>
    <a href="principal.php?p=<?php echo $p;?>&q=3&cod=<?php echo $id[$j];?>&nick=<?php echo $nick1;?>" title="MODIFICAR"><img src="../imagen/modificar.png"></a>
    </td>
  </tr>


 
 <?php
 $cont++;
}


echo "</table> ";

?> 

 
 
</form>
