


<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="../css/tablas.css" type="text/css" />


<?php

$link = Conectarse();
$nick=$_GET['nick'];
$td=$_GET['td'];
?>



<form action="" method="post" enctype="multipart/form-data" name="form2" id="form2">
 
 
 <?php
$p=$_GET[p];

$codigoNoticias=$_GET['cod'];
$eliminado=$_GET['e'];


	if($eliminado=='2')
	{
//eliminando de la bd 

mysql_query("DELETE FROM t_producto WHERE codProducto='$codigoNoticias' ")or die(mysql_error());
	}
	if($eliminado=='1')
	{
mysql_query("UPDATE t_producto SET  eliminar='1' WHERE codProducto='$codigoNoticias'")or die(mysql_error());
	}
	
	if($eliminado=='0')
	{
mysql_query("UPDATE t_producto SET  eliminar='0' WHERE codProducto='$codigoNoticias'")or die(mysql_error());
	}

?>

 
 <?php
 //CODIGO PARA MOSTRAR REGISTROS A BORRAR

$consulta2 ="SELECT codProducto,nombre,precioCompra,precioVenta,stock,eliminar FROM t_producto ORDER BY nombre ASC"; 
$resultado2 = mysql_query($consulta2,$link);

	//nombre del titulo
	$id=array();
	$nombreNoticias=array();
	$precioCompra=array();
	$precioVenta=array();
	$stock=array();
	$eliminar=array();
while($row2 = mysql_fetch_array($resultado2))
		{
		array_push($id,$row2[0]);
		array_push($nombreNoticias,$row2[1]);
		array_push($precioCompra,$row2[2]);
		array_push($precioVenta,$row2[3]);
		array_push($stock,$row2[4]);
		array_push($eliminar,$row2[5]);
		}
		
///cuadro de los contenidos parte superior		
		echo '

<table width="100%" border="0">
  <tr border="1" bgcolor="#CCCCCC">
    <td width="10"><font color="#ffffff">Nº</font></td>
    <td width=""><font color="#ffffff">Nombre Producto</font></td>
    <td width=""><font color="#ffffff">Precio Compra </font></td>
	<td width=""><font color="#ffffff">Precio Venta</font></td>
	<td width=""><font color="#ffffff">STOCK Almacen de Tienda o Sucursal</font></td>

	<td width="100"><font color="#ffffff">Estado</font></td>
	<td width="32"><font color="#ffffff"><img src="../imagen/eliminar.png"></font></td>
	<td width="32"><font color="#ffffff"><img src="../imagen/elimina.png"></font></td>
	<td width="32"><font color="#ffffff"><img src="../imagen/activar.png"></font></td>
	<td width="32"><font color="#ffffff"><img src="../imagen/modificar.png"></font></td>

  </tr>

';
$cont=1;
		
		
 for($j=0;$j<count($nombreNoticias);$j++)
{

	$consultaStock= mysql_query("select stock from t_stoptienda where codProducto='$id[$j]' AND codTienda='$td'",$link);
	$stockTienda = mysql_fetch_array($consultaStock);
?>

 
  <tr bgcolor="<?php?>" >
  	<td><?php echo $cont; ?></td>
  	<td><?php echo $nombreNoticias[$j]; ?></td>
    <td><?php echo $precioCompra[$j]; ?></td>
    <td><?php echo $precioVenta[$j]; ?></td>
	<td><?php if($stockTienda[0]>0){echo $stockTienda[0];} if($stockTienda[0]==0){echo '0';} ?></td>
    <td><?php if($eliminar[$j]==1){echo 'Desactivo';} if($eliminar[$j]==0){echo 'Activo';} ?></td>	
    <td> <a href="principal.php?q=1&p=<?php echo $p;?>&nick=<?php echo $nick;?>&td=<?php echo $td;?>&e=2&cod=<?php echo $id[$j];?>" title="ELIMINAR"><img src="../imagen/eliminar.png"></a>
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
