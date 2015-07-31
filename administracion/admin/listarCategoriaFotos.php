<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="../css/tablas.css" type="text/css" />


<?php

///...Nos conectamos y guardamos los datos en el link de conexion
$link = Conectarse();
$nick= desencripta($_GET['nick'],"rayedgard");
$td=$_GET['td'];
?>

<script>
//recojemos los parametros d=url enviado del boton elimiar y u=el nombre del elemento que se eliminara
//DONDE u=DIRECCION DEL PAQUETE
//      d=NOMBRE DEL PAQUETE
function direc(d,u)
{
var r=confirm("Esta seguro que desea eliminar esta CATEGORIA FOTOGRAFICA: "+u+" !!");
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

$id=$_GET['cod'];
$eliminado=$_GET['e'];
$nn=$_GET['nn'];

	if($eliminado=='2')
	{

//AQUI ELIMINAMOS EL NOMBRE DE LA CATEGORIA
mysql_query("DELETE FROM categoriafotos WHERE idCategoriaFoto='$id' ")or die(mysql_error());

//aqui borramos las imkagenes de toda la carpeta de CATEGORIA SELECCIONADA
mysql_query("DELETE FROM fotos WHERE idCategoriaFoto='$id' ")or die(mysql_error());


/** * Delete a file, or a folder and its contents * * @author Aidan Lister <aidan@php.net> * @version 1.0.0 * @param string $dirname The directory to delete * @return bool Returns true on success, false on failure */
	function rmdirr($dirname)
	{ // Simple delete for a file 
		if (is_file($dirname)) 
		{
			return unlink($dirname);
		} // Loop through the folder 
		$dir = dir($dirname); 
		while (false !== $entry = $dir->read()) 
		{ // Skip pointers 
			if ($entry == '.' || $entry == '..') 
			{ 
			continue; 
			} // Deep delete directories 
			if (is_dir("$dirname/$entry")) 
			{ 
				rmdirr("$dirname/$entry"); 
			} 
			else 
			{ 
			unlink("$dirname/$entry"); 
			} 
		} // Clean up 
		$dir->close();
		return rmdir($dirname);
	}

	rmdirr("../imagenes/fotos/".$nn);//sabiendo que estos son los parametros para tu caso  


	
	
	}
	if($eliminado=='1')
	{
mysql_query("UPDATE categoriaFotos SET  eliminar='1' WHERE idCategoriaFoto='$id'")or die(mysql_error());
	}
	
	if($eliminado=='0')
	{
mysql_query("UPDATE categoriaFotos SET  eliminar='0' WHERE idCategoriaFoto='$id'")or die(mysql_error());
	}

?>

 
 <?php
 //CODIGO PARA MOSTRAR REGISTROS A BORRAR

$consulta2 ="SELECT idCategoriaFoto,nombreCategoria,eliminar FROM categoriafotos ORDER BY nombreCategoria ASC"; 
$resultado2 = mysql_query($consulta2,$link);

	//nombre del titulo
	$id=array();
	$nombre=array();
	$eliminar=array();

while($row2 = mysql_fetch_array($resultado2))
		{
		array_push($id,$row2[0]);
		array_push($nombre,$row2[1]);
		array_push($eliminar,$row2[2]);

		}
		
///cuadro de los contenidos parte superior		
		echo '

<table width="100%" border="0" >
  <tr border="1" bgcolor="#996600">
    <td width="10"><font color="#ffffff">Nº</font></td>
    <td width=""><font color="#ffffff">Nombre de Categotia de Fotos</font></td>

	<td width="100"><font color="#ffffff">Estado</font></td>
	<td width="32"><font color="#ffffff"><img src="../imagen/eliminar.png"></font></td>
	<td width="32"><font color="#ffffff"><img src="../imagen/elimina.png"></font></td>
	<td width="32"><font color="#ffffff"><img src="../imagen/activar.png"></font></td>
	<td width="32"><font color="#ffffff"><img src="../imagen/modificar.png"></font></td>
	<td width="32"><font color="#ffffff"><img src="../imagen/asignar.png"></font></td>
  </tr>

';
$cont=1;
		
		
 for($j=0;$j<count($nombre);$j++)
{

?>


 
  <tr  <?php if($eliminar[$j]==1){echo 'class="minimo"';}?> >
  	<td><?php echo $cont; ?></td>
  	<td><?php echo $nombre[$j]; ?></td>

	<td><?php if($eliminar[$j]==1){echo 'Desactivo';} if($eliminar[$j]==0){echo 'Activo';} ?></td>	
    
    <?php
	//antes de enviar los caracteres que pasamos por la URL debemos ponerlo en buen recaudo encriptar
  	$nick1= encripta($nick,"rayedgard");
	?>
    
    <td>
    
     <a href="#" onclick="javascript:
 direc('principal.php?q=1&p=<?php echo $p;?>&e=2&nick=<?php echo $nick1;?>&cod=<?php echo $id[$j];?>&nn=<?php echo $nombre[$j];?>','<?php echo $nombre[$j];?>')"  title="ELIMINAR" ><img src="../imagen/eliminar.png"></a>

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
       <td>
        <a href="javascript:Abrir_ventana('galeria.php?id=<?php echo $id[$j];?>&nick=<?php echo $nick1;?>&td=<?php echo $td;?>')" title="Asignación de FOTOGRAFIAS"><img src="../imagen/asignar.png"></a>
    </td>
    
  </tr>


 
 <?php
 $cont++;
}


echo "</table> ";

?> 

 
 
</form>
