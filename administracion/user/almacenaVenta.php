<?php 
session_start();
extract($_REQUEST);
?>
<?php
$nick=$_GET['nick'];
$td=$_GET['td'];
$p=$_GET['p'];
$cod=$_GET['cod'];
//para los totales
$subTotal=$_GET['sub'];
$igvTotal=$_GET['igv'];
$Total=$_GET['t'];
 
 include("../Conexion.php");
$link = Conectarse();
$consultadetalle = mysql_query("SELECT MAX(codDetalle) FROM t_detalleventa",$link);
$seccion = mysql_fetch_array($consultadetalle);
$iddeta=$seccion[0];
$idDetalle=$iddeta+1;



//siguiente codigo para tabla compras
$consultadeventa = mysql_query("SELECT MAX(codVenta) FROM t_Venta",$link);
$vent = mysql_fetch_array($consultadeventa);
$idventa=$vent[0];
$idVent=$idventa+1;

 $fecha = date('Y-m-d h:i:s');
	
	$resultadoVenta = mysql_query("INSERT INTO t_venta(codVenta,fechaVenta,estado,nroFactura,subtotal, igv,total) VALUES ('$idVent','$fecha','1','0','$subTotal','$igvTotal','$Total')",$link);
$my_error = mysql_error($link);
	if(!empty($my_error))
	{	
		echo "<br>Ocurriero un error inesperado al realizar la Venta de los productos".$my_error;
			
	}
	else
	{
		
		foreach($carro1 as $k => $v)
			{
				$codig=$v['codProducto'];
				//hacemos consulta de productos para modificar recuperar el stock atual
					$consultaStock= mysql_query("select stock from t_stoptienda where codProducto='$codig' AND codTienda='$td'",$link);
	$stockProduct = mysql_fetch_array($consultaStock);
				
				//fin consulta producto

				
				$canti=$v['cantidad'];
				$prec=$v['precio'];
				$sub=$v['subtotal'];
				$ig=$v['igv'];
				$tota=$v['total'];
			$resultado = mysql_query("INSERT INTO t_detalleventa (codDetalle,codVenta,codProducto,cantidad,precioUnitario,subtotal, igv,total) VALUES ('$idDetalle','$idVent','$codig','$canti','$prec','$sub','$ig','$tota')",$link);
				
			//modificamos stock de producto
			$nuevoStock=$stockProduct[0] - $canti;
			$resultado = mysql_query("UPDATE t_stoptienda SET stock='$nuevoStock' WHERE codProducto=$codig  AND codTienda='$td'",$link);
			$idDetalle++;
			} 
		
			
	session_destroy();
		
	}
	
	header("Location:principal.php?q=3&nick=".$nick."&td=".$td."&p=".$p."&cod=".$idVent."&".SID);

?>