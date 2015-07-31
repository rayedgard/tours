<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="../css/tablas.css" type="text/css" />


			<div class="header icon-48-addedit">
Formulario de Reportes
</div>


<?php
$nick=$_GET['nick'];
$td=$_GET['td'];
?>
<form action="" method="post" enctype="multipart/form-data" name="form2" id="form2">




    <p>
    Seleccione el filtro para el reporte:
<br />
<select id="subject" name="tipo" tabindex="1">
 <option value="0"<?php if($_POST['tipo']==0) echo 'selected="selected" ';?>>Familia</option>
  <option value="1" <?php if($_POST['tipo']==1) echo 'selected="selected" ';?>>Sub-Familia</option>
   <option value="2" <?php if($_POST['tipo']==2) echo 'selected="selected" ';?>>Color</option>
   <option value="3" <?php if($_POST['tipo']==3) echo 'selected="selected" ';?>>Codigo de Producto</option>
 </select>

  </p>
  
  <p>
<input class="button" type="submit" value="FILTRAR" id="filtrar" name="filtrar" tabindex="5"/>
		</p>


<?php
$link = Conectarse();
$filtrar=$_POST['filtrar'];
$tipo=$_POST['tipo'];
		if($tipo==0)
	{
		$filtro="familia";
	}
	if($tipo==1)
	{
		$filtro="subfamilia";
	}
	if($tipo==2)
	{
		$filtro="color";
	}
	if($tipo==3)
	{
		$filtro="codigo";
	}

if($filtrar)
{
	

	
echo
'
   <p>
    Seleccione la opción para ver el reporte:
<br />
	<select id="subject" name="tipo2" tabindex="1">
';	

$consulta ="SELECT $filtro FROM t_producto GROUP BY($filtro)"; 
$res = mysql_query($consulta ,$link);

	$nombre=array();
while($row1= mysql_fetch_array($res))
		{
		array_push($nombre,$row1[0]);
		}
for($i=0;$i<count($nombre);$i++)
{
echo ' <option value="'.$nombre[$i].'">'.$nombre[$i].'</option>';
}

echo
'
	</select>
	
  </p>
  
  <p>
<input class="button" type="submit" value="VERIFICAR REPORTE" id="ver" name="ver" tabindex="5"/>
		</p>
';	







}//fin if principal


$tipo2=$_POST['tipo2'];
$ver=$_POST['ver'];
if($ver)
{
	
 //CODIGO PARA MOSTRAR REGISTROS A BORRAR

$consulta2 ="SELECT codigo,nombre,familia,subfamilia,marca,color,precioCompra,precioVenta,codProducto FROM t_producto WHERE $filtro='$tipo2' ORDER BY nombre ASC"; 
$resultado2 = mysql_query($consulta2,$link);

	//nombre del titulo
	$codigo=array();
	$nombre=array();
	$familia=array();
	$subfamilia=array();
	$marca=array();
	$color=array();
	$precioCompra=array();
	$precioVenta=array();
	$codProducto=array();
	
while($row2 = mysql_fetch_array($resultado2))
		{
		array_push($codigo,$row2[0]);
		array_push($nombre,$row2[1]);
		array_push($familia,$row2[2]);
		array_push($subfamilia,$row2[3]);
		array_push($marca,$row2[4]);
		array_push($color,$row2[5]);
		array_push($precioCompra,$row2[6]);
		array_push($precioVenta,$row2[7]);
		array_push($codProducto,$row2[8]);
		}
		
///cuadro de los contenidos parte superior		
		echo '

<table width="100%" border="0">
  <tr border="1" bgcolor="#CCCCCC">
    <td width="10"><font color="#ffffff">Nº</font></td>
	<td width=""><font color="#ffffff">Código de Producto</font></td>
    <td width=""><font color="#ffffff">Stock</font></td>
	<td width=""><font color="#ffffff">Nombre Producto</font></td>
	<td width="200"><font color="#ffffff">Familia</font></td>
	<td width="100"><font color="#ffffff">Subfamilia</font></td>
	<td width=""><font color="#ffffff">Marca</font></td>
    <td width=""><font color="#ffffff">Color</font></td>
	<td width=""><font color="#ffffff">Precio Compra</font></td>
	<td width="200"><font color="#ffffff">Precio Venta</font></td>
	
  </tr>

';
$cont=1;
		
		
 for($j=0;$j<count($codigo);$j++)
{
	
		$consultaStock= mysql_query("select stock from t_stoptienda where codProducto='$codProducto[$j]' AND codTienda='$td'",$link);
	$stockTienda = mysql_fetch_array($consultaStock);
	
	 if($stockTienda[0]>0){$valor=$stockTienda[0];} if($stockTienda[0]==0){$valor='No Asisnado';}
echo
'
  <tr >
  	<td>'.$cont.' </td>
	<td>'.$codigo[$j].'</td>
  	<td>'.$valor.'</td>
    <td>'.$nombre[$j].'</td>
  	<td>'.$familia[$j].' </td>
  	<td>'.$subfamilia[$j].' </td>
    <td>'.$marca[$j].'</td>
  	<td>'.$color[$j].' </td>
  	<td>'.$precioCompra[$j].' </td>
    <td>'.$precioVenta[$j].'</td>

</tr>
';
	$cont=$cont+1;
}
echo '</table>';
	

}




?>
</form>

