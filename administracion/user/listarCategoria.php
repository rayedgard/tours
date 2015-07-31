

<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="../css/tablas.css" type="text/css" />


<?php

///...Nos conectamos y guardamos los datos en el link de conexion
$link = Conectarse();
$nick=$_GET['nick'];
$td=$_GET['td'];
?>



<form action="" method="post" enctype="multipart/form-data" name="form2" id="form2">
 
 
 <?php
$p=$_GET[p];

$codigoCategoria=$_GET['cod'];
$eliminado=$_GET['e'];

	if($eliminado=='2')
	{
//eliminando de la bd 

mysql_query("DELETE FROM t_cliente WHERE codCliente='$codigoCategoria' ")or die(mysql_error());
	}
	if($eliminado=='1')
	{
mysql_query("UPDATE t_cliente SET  eliminar='1' WHERE codCliente='$codigoCategoria'")or die(mysql_error());
	}
	
	if($eliminado=='0')
	{
mysql_query("UPDATE t_cliente SET  eliminar='0' WHERE codCliente='$codigoCategoria'")or die(mysql_error());
	}

?>

 
 <?php
 //CODIGO PARA MOSTRAR REGISTROS A BORRAR

$consulta2 ="SELECT codCliente,razon,eliminar FROM t_cliente ORDER BY razon ASC"; 
$resultado2 = mysql_query($consulta2,$link);

	//nombre del titulo
	$id=array();
	$nombreCategoria=array();
	$eliminar=array();
while($row2 = mysql_fetch_array($resultado2))
		{
		array_push($id,$row2[0]);
		array_push($nombreCategoria,$row2[1]);
		array_push($eliminar,$row2[2]);
		}
		
///cuadro de los contenidos parte superior		
		echo '

<table width="100%" border="0">
  <tr border="1" bgcolor="#CCCCCC">
    <td width="10"><font color="#ffffff">Nº</font></td>
    <td width=""><font color="#ffffff">Nombre Cliente</font></td>
	<td width="100"><font color="#ffffff">Estado</font></td>
	<td width="32"><font color="#ffffff"><img src="../imagen/eliminar.png"></font></td>
	<td width="32"><font color="#ffffff"><img src="../imagen/elimina.png"></font></td>
	<td width="32"><font color="#ffffff"><img src="../imagen/activar.png"></font></td>
	<td width="32"><font color="#ffffff"><img src="../imagen/modificar.png"></font></td>
  </tr>

';
$cont=1;
		
		
 for($j=0;$j<count($nombreCategoria);$j++)
{

?>

 
  <tr bgcolor="<?php?>" >
  	<td><?php echo $cont; ?></td>
  	<td><?php echo $nombreCategoria[$j]; ?></td>
	<td><?php if($eliminar[$j]==1){echo 'Desactivo';} if($eliminar[$j]==0){echo 'Activo';} ?></td>	
    <td> <a href="principal.php?q=1&p=<?php echo $p;?>&nick=<?php echo $nick;?>&td=<?php echo $td;?>&e=2&cod=<?php echo $id[$j];?>&s=<?php echo $nombreCategoria[$j];?>" title="ELIMINAR"><img src="../imagen/eliminar.png"></a>
    </td>
	<td>
    <a href="principal.php?q=1&p=<?php echo $p;?>&nick=<?php echo $nick;?>&td=<?php echo $td;?>&e=1&cod=<?php echo $id[$j];?>" title="DESACTIVAR"><img src="../imagen/elimina.png"></a>
    </td>
    <td>
    <a href="principal.php?q=1&p=<?php echo $p;?>&nick=<?php echo $nick;?>&td=<?php echo $td;?>&e=0&cod=<?php echo $id[$j];?>" title="ACTIVAR"><img src="../imagen/activar.png"></a>
    </td>
    <td>
    <a href="principal.php?p=<?php echo $p;?>&nick=<?php echo $nick;?>&td=<?php echo $td;?>&q=3&cod=<?php echo $id[$j];?>" title="MODIFICAR"><img src="../imagen/modificar.png"></a>
    </td>
  </tr>


 
 <?php
 $cont++;
}


echo "</table> ";

?> 

 
 
</form>
