<?php 
ob_start("ob_gzhandler");
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link href="../css/general1.css" rel="stylesheet" type="text/css" />
<title>Busqueda de Productos</title>

<link rel="stylesheet" href="css/general1.css" type="text/css" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="../css/tablas.css" type="text/css" />

</head>

<body>

<?php
if(isset($_SESSION['carro1']))
$carro1=$_SESSION['carro1'];else $carro1=false;
include("../conexion.php"); 
$link = Conectarse();

?>

<?php
$nick=$_GET['nick'];
$p=$_GET['p'];
$td=$_GET['td'];
$cod=$_GET['id'];

// el path sera el nombre del producto
$consultaProducto = mysql_query("select codProducto,codigo,nombre,color,marca,precioVenta,stock from t_producto ",$link);
$resultadoProducto = mysql_fetch_array($consultaProducto);

?>




<div class="divContenido">




<form action="" method="post" enctype="multipart/form-data" name="form2" id="form2">

<h1>
   Escriba el nombre del PRODUCTO: Las busquedas pueden ser por nombre y filtra por cualquier caracter: </h1>
<p>
  <input id="name2" name="busqueda" value="" type="text" tabindex="2"  />
  <input class="button" type="submit" value="BUSCAR PRODUCTO" id="aceptar" name="aceptar" tabindex="5"/>
		</p>
   
</form>






<?php
$aceptar = $_POST['aceptar'];
if($aceptar)
{
	
$busqueda= $_POST['busqueda'];
 //CODIGO PARA MOSTRAR REGISTROS A BORRAR
// el path sera el nombre del producto
$consulta= "select codProducto,codigo,nombre,color,marca,precioVenta,stock from t_producto WHERE nombre LIKE '%$busqueda%' OR codigo LIKE '%$busqueda%' OR marca LIKE '%$busqueda%'";
$resultado = mysql_query($consulta,$link);

	//nombre del titulo
	$codProducto=array();
	$codigo=array();
	$nombre=array();
	$color=array();
	$marca=array();
	$precioVenta=array();
	$stock=array();
while($row2 = mysql_fetch_array($resultado))
		{
			array_push($codProducto,$row2[0]);
			array_push($codigo,$row2[1]);
			array_push($nombre,$row2[2]);
			array_push($color,$row2[3]);
			array_push($marca,$row2[4]);
			array_push($precioVenta,$row2[5]);
			array_push($stock,$row2[6]);
		}
		
///cuadro de los contenidos parte superior		
		echo '

<table width="100%" border="0">
  <tr border="1" bgcolor="#CCCCCC">
    <td width="10"><font color="#ffffff">Nº</font></td>
    <td width=""><font color="#ffffff">Codigo</font></td>
	<td width=""><font color="#ffffff">Nombre Producto</font></td>
	<td width=""><font color="#ffffff">Precio</font></td>
	<td width=""><font color="#ffffff">STOCK</font></td>
	<td width=""><font color="#ffffff">Color</font></td>
	<td width=""><font color="#ffffff">Marca</font></td>
	
	<td width="32"><font color="#ffffff"><img src="../imagen/activar.png"></font></td>
  </tr>

';
$cont=1;
		
		
 for($j=0;$j<count($codProducto);$j++)
{

	$consultaStock= mysql_query("select stock from t_stoptienda where codProducto='$codProducto[$j]' AND codTienda='$td'",$link);
	$stockTienda = mysql_fetch_array($consultaStock);
?>

 
  <tr bgcolor="<?php?>" >
  	<td><?php echo $cont; ?></td>
  	<td><?php echo $codigo[$j]; ?></td>
    <td><?php echo $nombre[$j]; ?></td>
    <td><?php echo $precioVenta[$j]; ?></td>
    <td><?php if($stockTienda[0]>0){echo $stockTienda[0];} if($stockTienda[0]==0){echo '0';} ?></td>
    <td><?php echo $color[$j]; ?></td>
    <td><?php echo $marca[$j]; ?></td>
    
		
   
    <td>
     <a href="agregaVenta.php?<?php echo SID ?>&m=0&nick=<?php echo $nick;?>&td=<?php echo $td;?>&p=<?php echo $p;?>&id=<?php echo $codProducto[$j];?>" title="AGREGAR A LA CESTA"><img src="../imagen/activar.png"></a>
    </td>

  </tr>


 
 <?php
 $cont++;
}


echo "</table> ";


}
?> 







</div>




</body>