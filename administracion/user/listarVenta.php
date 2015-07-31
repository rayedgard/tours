


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

$codigoVentas=$_GET['cod'];
$eliminado=$_GET['e'];
// consulta para onçbtener el registro para eliminar la imagen de la categiria
	if($eliminado=='2')
	{
//eliminando de la bd 
mysql_query("DELETE FROM t_venta WHERE codVenta='$codigoVentas' ")or die(mysql_error());
	}
	if($eliminado=='1')
	{
mysql_query("UPDATE t_venta SET  eliminar='1' WHERE codVenta='$codigoVentas'")or die(mysql_error());
	}
	
	if($eliminado=='0')
	{
mysql_query("UPDATE t_venta SET  eliminar='0' WHERE codVenta='$codigoVentas'")or die(mysql_error());
	}

?>

 
 <?php
 //CODIGO PARA MOSTRAR REGISTROS A BORRAR

$consulta2 ="SELECT codVenta,codCliente,codVendedor,fechaVenta,subtotal,igv,total,eliminar FROM t_venta WHERE codTienda='$td' ORDER BY fechaVenta ASC"; 
$resultado2 = mysql_query($consulta2,$link);

	//nombre del titulo
	$codVenta=array();
	$codCliente=array();
	$codVendedor=array();
	$fechaVenta=array();
	$subtotal=array();
	$igv=array();
	$total=array();
	$eliminar=array();
while($row2 = mysql_fetch_array($resultado2))
		{
		array_push($codVenta,$row2[0]);
		array_push($codCliente,$row2[1]);
		array_push($codVendedor,$row2[2]);
		array_push($fechaVenta,$row2[3]);
		array_push($subtotal,$row2[4]);
		array_push($igv,$row2[5]);
		array_push($total,$row2[6]);
		array_push($eliminar,$row2[7]);
		}
		
///cuadro de los contenidos parte superior		
		echo '

<table width="100%" border="0">
  <tr border="1" bgcolor="#CCCCCC">
    <td width="10"><font color="#ffffff">Nº</font></td>
    <td width="150"><font color="#ffffff">Fecha</font></td>
	<td width="100"><font color="#ffffff">Clientes</font></td>
	<td width="250"><font color="#ffffff">Vendedor</font></td>
	<td width="100"><font color="#ffffff">Subtotal</font></td>
	<td width="100"><font color="#ffffff">IGV</font></td>
	<td width=""><font color="#ffffff">Total</font></td>
	<td width="100"><font color="#ffffff">Estado</font></td>
	<td width="32"><font color="#ffffff"><img src="../imagen/eliminar.png"></font></td>
	<td width="32"><font color="#ffffff"><img src="../imagen/elimina.png"></font></td>
	<td width="32"><font color="#ffffff"><img src="../imagen/activar.png"></font></td>
		<td width="32"><font color="#ffffff"><img src="../imagen/detalle.png"></font></td>
	
  </tr>

';
$cont=1;
		
		
 for($j=0;$j<count($codVenta);$j++)
{

//hacemos consulta apra obtener el nombre del proveedor
				$consultaClien= mysql_query("SELECT razon FROM t_cliente WHERE codCliente=$codCliente[$j]",$link);
				$clie = mysql_fetch_array($consultaClien);
				//fin consulta producto


//hacemos consulta apra obtener el nombre del vendedor
				$consultaUsuarios= mysql_query("SELECT nombre, apellidos FROM t_usuarios WHERE codUsuario=$codVendedor[$j]",$link);
				$usuarios = mysql_fetch_array($consultaUsuarios);
				//fin consulta producto

?>

 
  <tr bgcolor="<?php?>" >
  	<td><?php echo $cont; ?></td>
  	<td><?php echo $fechaVenta[$j]; ?></td>
    <td><?php echo $clie[0]; ?></td>
    <td><?php echo $usuarios[0]." ".$usuarios[1]; ?></td>
    <td><?php echo $subtotal[$j]; ?></td>
    <td><?php echo $igv[$j]; ?></td>
    <td><?php echo $total[$j]; ?></td>
     
	<td><?php if($eliminar[$j]==1){echo 'Desactivo';} if($eliminar[$j]==0){echo 'Activo';} ?></td>	
    <td> <a href="principal.php?q=1&p=<?php echo $p;?>&nick=<?php echo $nick;?>&td=<?php echo $td;?>&e=2&cod=<?php echo $codVenta[$j];?>" title="ELIMINAR"><img src="../imagen/eliminar.png"></a>
    </td>
	<td>
    <a href="principal.php?q=1&p=<?php echo $p;?>&nick=<?php echo $nick;?>&td=<?php echo $td;?>&e=1&cod=<?php echo $codVenta[$j];?>" title="DESACTIVAR"><img src="../imagen/elimina.png"></a>
    </td>
    <td>
    <a href="principal.php?q=1&p=<?php echo $p;?>&nick=<?php echo $nick;?>&td=<?php echo $td;?>&e=0&cod=<?php echo $codVenta[$j];?>" title="ACTIVAR"><img src="../imagen/activar.png"></a>
    </td>
     <td>
     <a href="javascript:Abrir_ventana1('detalleVenta.php?id=<?php echo $codVenta[$j];?>&nick=<?php echo $nick;?>&td=<?php echo $td;?>')" title="DETALLE DE VENTA"><img src="../imagen/detalle.png"></a>
     
    </td>
    
   </tr>


 
 <?php
 $cont++;
}


echo "</table> ";

?> 

 
 
</form>
