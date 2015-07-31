



<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="../css/tablas.css" type="text/css" />


<?php

///...Nos conectamos y guardamos los datos en el link de conexion
$link=Conectarse();


//desecriptamos el nick para mostrar la cadena de caracteres
$nick= desencripta($_GET['nick'],"rayedgard");
$temporal=desencripta($_GET['nick'],"rayedgard");//para la filtracion del usuario
//desecriptamos el nick para mostrar la cadena de caracteres
$n= desencripta($_GET['n'],"rayedgard");
$m= desencripta($_GET['m'],"rayedgard");
$o= desencripta($_GET['o'],"rayedgard");



$td=$_GET['td'];


?>
<script>
//recojemos los parametros d=url enviado del boton elimiar y u=el nombre del elemento que se eliminara
function direc(d,u)
{
var r=confirm("Esta seguro que desea eliminar este USUARIO: "+u+" !!");
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

$codigoUsuario=$_GET['cod'];
$eliminado=$_GET['e'];

//cosulta para obtener si es o no superadministrador del sistema para habilitar todo
$super1 = mysql_query("select tipo from usuarios where nicke='$nick'",$link);
$super= mysql_fetch_array($super1);

// consulta para onçbtener el registro para eliminar la imagen de la categiria

	$consultaUsuario1 = mysql_query("select nicke from usuarios where id='$codigoUsuario'",$link);
	$usuario1= mysql_fetch_array($consultaUsuario1);


//antes de enviar los caracteres que pasamos por la URL debemos ponerlo en buen recaudo encriptar
$nick1= encripta($nick,"rayedgard");


if($temporal==$usuario1[0])
{
	echo "<meta http-equiv ='refresh' content='0;url=principal.php?q=4&p=".$p."&nick=".$nick1."&que=".$temporal."'>";
}
else
{
	if($eliminado=='2' )
	{
//eliminando de la bd 
mysql_query("DELETE FROM usuarios WHERE id='$codigoUsuario' ",$link);
$my_error = mysql_error($link);
	}
	else
	
	if($eliminado=='1')
	{
mysql_query("UPDATE usuarios SET  eliminar='1' WHERE id='$codigoUsuario'",$link);
$my_error = mysql_error($link);
	}
	
	if($eliminado=='0')
	{
mysql_query("UPDATE usuarios SET  eliminar='0' WHERE id='$codigoUsuario'",$link);
$my_error = mysql_error($link);
	}

if(!empty($my_error ))
		{		
			echo "<meta http-equiv ='refresh' content='0;url=principal.php?q=4&p=".$p."&nick=".$nick1."&td=".$td."'>";
		}
	
	
	
	
}



?>

 
 <?php
 //CODIGO PARA MOSTRAR REGISTROS A BORRAR

$consulta2 ="SELECT id,nombres, apellidoP,apellidoM,tipo,eliminar, nicke FROM usuarios ORDER BY nombres ASC"; 
$resultado2 = mysql_query($consulta2,$link);

	//nombre del titulo
	$id=array();
	$nombres=array();
	$paterno=array();
	$materno=array();
	$tipo=array();
	$eliminar=array();
	$nicke=array();
while($row2 = mysql_fetch_array($resultado2))
		{
		array_push($id,$row2[0]);
		array_push($nombres,$row2[1]);
		array_push($paterno,$row2[2]);
		array_push($materno,$row2[3]);
		array_push($tipo,$row2[4]);
		array_push($eliminar,$row2[5]);
		array_push($nicke,$row2[6]);
		}
		
///cuadro de los contenidos parte superior		
		echo '

<table width="100%" border="0">
  <tr border="1" bgcolor="#996600">
    <td width="10"><font color="#ffffff">Nº</font></td>
    <td width=""><font color="#ffffff">Nombre Usuario</font></td>
	<td width=""><font color="#ffffff">Nivel de Usuario</font></td>
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
	
$nive="";
if($tipo[$j]==1)
{$nive='Super-Administrador';}
if($tipo[$j]==0)
{$nive='Administrador';}
if($tipo[$j]==2)
{$nive='Usuario';}

?>



 
  <tr  <?php if($eliminar[$j]==1){echo 'class="minimo"';}?>  >
  	<td><?php echo $cont; ?></td>
  	<td><?php echo $nombres[$j].' '.$paterno[$j].' '.$materno[$j] ; ?></td>
    <td><?php echo $nive; ?></td>
	<td><?php if($eliminar[$j]==1){echo 'Desactivo';} if($eliminar[$j]==0){echo 'Activo';} ?></td>	
    <td>
    <?php
    $n=encripta($nombres[$j],"rayedgard");
	$m=encripta($paterno[$j],"rayedgard");
	$o=encripta($materno[$j],"rayedgard");
	
	
	//desecriptamos el nick para mostrar la cadena de caracteres
$nick= desencripta($_GET['nick'],"rayedgard");
	if($nick==$nicke[$j] or $super[0]==1)
	{
		//antes de enviar los caracteres que pasamos por la URL debemos ponerlo en buen recaudo encriptar
$nick1= encripta($nick,"rayedgard");
	
	?>
     <a href="#" onclick="javascript:
 direc('principal.php?q=1&p=<?php echo $p;?>&nick=<?php echo $nick1;?>&td=<?php echo $td;?>&e=2&cod=<?php echo $id[$j];?>&n=<?php echo $n;?>&m=<?php echo $m;?>&o=<?php echo $o;?>','<?php echo$nombres[$j].' '.$paterno[$j].' '.$materno[$j] ;?>');"  title="ELIMINAR" ><img src="../imagen/eliminar.png"></a>
    <?php
	}
	
	?>
    </td>
	<td>
    <?php
    //desecriptamos el nick para mostrar la cadena de caracteres
$nick= desencripta($_GET['nick'],"rayedgard");
	if($nick==$nicke[$j] or $super[0]==1)
	{
		//antes de enviar los caracteres que pasamos por la URL debemos ponerlo en buen recaudo encriptar
$nick1= encripta($nick,"rayedgard");
	
	?>
    
    <a href="principal.php?q=1&p=<?php echo $p;?>&nick=<?php echo $nick1;?>&td=<?php echo $td;?>&e=1&cod=<?php echo $id[$j];?>&n=<?php echo $n;?>&m=<?php echo $m;?>&o=<?php echo $o;?>" title="DESACTIVAR"><img src="../imagen/elimina.png"></a>
    
       <?php
	}
	
	?>
    </td>
    <td>
     <?php
    //desecriptamos el nick para mostrar la cadena de caracteres
$nick= desencripta($_GET['nick'],"rayedgard");
	if($nick==$nicke[$j] or $super[0]==1)
	{
		//antes de enviar los caracteres que pasamos por la URL debemos ponerlo en buen recaudo encriptar
$nick1= encripta($nick,"rayedgard");
	
	?>
    <a href="principal.php?q=1&p=<?php echo $p;?>&nick=<?php echo $nick1;?>&td=<?php echo $td;?>&e=0&cod=<?php echo $id[$j];?>&n=<?php echo $n;?>&m=<?php echo $m;?>&o=<?php echo $o;?>" title="ACTIVAR"><img src="../imagen/activar.png"></a>
     <?php } ?>
    </td>
    <td>
    <?php
	
	//desecriptamos el nick para mostrar la cadena de caracteres
$nick= desencripta($_GET['nick'],"rayedgard");
	if($nick==$nicke[$j])
	{
		//antes de enviar los caracteres que pasamos por la URL debemos ponerlo en buen recaudo encriptar
$nick1= encripta($nick,"rayedgard");
	?>
      
    <a href="principal.php?p=<?php echo $p;?>&nick=<?php echo $nick1;?>&td=<?php echo $td;?>&q=3&cod=<?php echo $id[$j];?>" title="MODIFICAR"><img src="../imagen/modificar.png"></a>
    <?php
	}
	
	?>
    
    </td>
  </tr>


 
 <?php
 $cont++;
}


echo "</table> ";

?> 

 
 
</form>
