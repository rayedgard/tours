
<?php

  include("../conexion.php"); 
///...Nos conectamos y guardamos los datos en el link de conexion
$link = Conectarse();
  $color=array("#ffffff","#F0F0F0");
  
  
 $id=$_GET["id"];
$consulta = mysql_query("SELECT subtotal,igv,total,fechaVenta,nroFactura,codTienda, codCliente, codVendedor FROM t_venta WHERE codVenta='".$id."'",$link);
$row= mysql_fetch_array($consulta); 



//hacemos consulta apra obtener el nombre del proveedor
				$consultaClien= mysql_query("SELECT razon FROM t_cliente WHERE codCliente='".$row[6]."'",$link);
				$clie = mysql_fetch_array($consultaClien);
				//fin consulta producto


//hacemos consulta apra obtener el nombre del vendedor
				$consultaUsuarios= mysql_query("SELECT nombre, apellidos FROM t_usuarios WHERE codUsuario='".$row[7]."'",$link);
				$usuario = mysql_fetch_array($consultaUsuarios);
				//fin consulta producto


//hacemos consulta apra obtener el nombre del proveedor
				$consultaTienda= mysql_query("SELECT nombre FROM t_tienda WHERE codTienda='".$row[5]."'",$link);
				$tien = mysql_fetch_array($consultaTienda);
				//fin consulta producto
?>

<dv>


<form name="" id="" enctype="multipart/form-data">
  <table width="800" border="0" cellspacing="0" cellpadding="0" align="center">
 <tr>
      <td colspan="7" style="font-size:30px;color:#F60;"> DETALLE DE VENTA Tienda o Sucursal: <?php echo $tien[0];?>  </td></tr>
      <tr >
      <td colspan="2" style="font-size:20px; color:#06C;">Fecha de Venta: <?php echo $row[3];?></td></tr>
      <tr>
        <td colspan="2" style="font-size:20px; color:#06C;" >Nro de Factura: <?php echo $row[4];?> </td>
      </tr>
       <tr>
        <td colspan="2" style="font-size:20px; color:#06C;" >Vendedor: <?php echo $usuario[0]." ".$usuario[1];?> </td>
        <td colspan="5" style="font-size:20px; color:#06C;" >Cliente: <?php echo $clie[0];?> </td>
      </tr>
      <tr bgcolor="#00CC00" class="tit">
        <td width="103">N°</td>
        <td width="300">Producto</td>
        <td width="83">Precio</td>
        <td width="83" >Cantidad </td>
        <td width="100" align="center">subtotal</td>
        <td width="100" align="center">igv</td>
        <td width="100" align="center">costo total</td>
      </tr>
      <?php

 $consulta2 ="SELECT p.nombre,d.cantidad, d.precioUnitario,d.subtotal, d.igv,d.total FROM t_detalleventa d INNER JOIN t_producto p ON p.codProducto=d.codProducto WHERE codVenta='".$id."'"; 
$resultado2 = mysql_query($consulta2,$link);

	//nombre del titulo
	$nombre=array();
	$cantidad=array();
	$precio=array();
	$subtotal=array();
	$igv=array();
	$total=array();
while($row2 = mysql_fetch_array($resultado2))
		{
		array_push($nombre,$row2[0]);
		array_push($cantidad,$row2[1]);
		array_push($precio,$row2[2]);
		array_push($subtotal,$row2[3]);
		array_push($igv,$row2[4]);
		array_push($total,$row2[5]);
		}
		$contador=1;
 for($j=0;$j<count($nombre);$j++)
{

    ?>
      <tr bgcolor="<?php echo $color[$contador%2]; ?>" >
        <td><?php echo $contador; ?></td>
        <td><?php echo $nombre[$j] ?></td>
        <td align="center"><?php echo $precio[$j] ?></td>
        <td align="center"><?php echo $cantidad[$j] ?></td>
        <td align="center"><?php echo number_format($subtotal[$j] ,2)?></td>
        <td align="center"><?php echo number_format($igv[$j] ,2) ?></td>
        <td align="center"><?php echo number_format($total[$j] ,2) ?></td>
      </tr>
      <?php
$contador=$contador+1;
 }?>
      <tr>
        <td colspan="4" style="text-align:right; padding-right:10px; color:#06C;" >SubTotal de Venta S/.</td>
        <td colspan="3"><?php echo number_format($row[0] ,2) ?></td>
      </tr>
      <tr>
        <td colspan="4" style="text-align:right; padding-right:10px; color:#06C;" >IGV de Venta S/.</td>
        <td colspan=""><?php echo number_format($row[1] ,2) ?></td>
      </tr>
      <tr>
        <td colspan="4" style="text-align:right; padding-right:10px; color:#06C;" >Total de Venta S/.</td>
        <td colspan="3"><?php echo number_format($row[2] ,2) ?></td>
      </tr>
    </table></td>
  </tr>
  </table>
</form>
 
 
 
 
