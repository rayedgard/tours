

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/general1.css" rel="stylesheet" type="text/css" />


<title>ASIGNACIÓN DE DESTINOS A PAQUETES</title>




</head>

<body>

<form action="" method="post" enctype="multipart/form-data" name="form2" id="form2">
<div class="asignar">
<?php
$codigo=$_GET['id'];
$i=$_GET['i'];
$n=$_GET['n'];
?>

<h1>Asigne los destinos al PAQUETE:</h1>
 <h2><?php echo $n;?></h2>
 <?php 
 include("../../conexion.php"); 
 $link = Conectarse();     
 
 
 //para determinar los productos ya chekados 
$consultaCheck ="SELECT idDestino FROM destinosporpaquete WHERE idPaquete='$codigo'";
$check = mysql_query($consultaCheck,$link);

	//nombre del titulo
	$idDestino=array();

while($row = mysql_fetch_array($check))
		{
		array_push($idDestino,$row[0]);
		}
 
 //fin determinaciond e productos ya checados
 
 
 
 
$consultaDestino ="SELECT idDestino,nombreDestino FROM destinos WHERE eliminar='0' and idioma='$i' ORDER BY nombreDestino ASC "; 
$resultadoDestino = mysql_query($consultaDestino,$link);

	//nombre del titulo
	$id=array();
	$nombreDestino=array();
	
	$datos=array();//este arreglo es para almacenar datos de interseccion de los arreglos
	
while($row2 = mysql_fetch_array($resultadoDestino))
		{
		array_push($id,$row2[0]);
		array_push($nombreDestino,$row2[1]);
		}
		
		//qui comparamos y buscamos la interseccion de los arreglos
    $datos=array_intersect($id,$idDestino);   
	//fin 
        for($i=0;$i<count($id);$i++) 
		{
		
			if($id[$i] == $datos[$i])
			{
			?>
        <p>
      <input type="checkbox" value="<?php echo $id[$i];?>" name="checks[]" checked="checked" >
      <?php echo $nombreDestino[$i];?>
      </p>
                   
        <?php
			}
			else
			{
		?>
		  <p>
      <input type="checkbox" value="<?php echo $id[$i];?>" name="checks[]" >
      <?php echo $nombreDestino[$i];?>
      </p>
		 <?php } }?>
     
         
</div>
<div>


 
 <p><p>
 <p>
 
          <input class="button" type="submit" value="Agregar" id="aceptar" name="aceptar" tabindex="5" />
 </p>
          
<?php

//codigo para la bajada de imagenes	
$aceptar = $_POST['aceptar'];
$checks = $_POST['checks'];
if($aceptar and $checks)
{

mysql_query("DELETE FROM destinosporpaquete WHERE idPaquete='$codigo'")or die(mysql_error());

foreach($_POST['checks'] as $checks)
{
$resultado = mysql_query("INSERT INTO destinosporpaquete(idPaquete,idDestino) VALUES ('$codigo','$checks') ",$link);	  
}
$my_error = mysql_error($link);

		if(!empty($my_error))
		{		
			echo "Ha habido un error al ASIGNAR LOS DESTINOS. $my_error";
		}
		 else 
		{
			echo "<font size='+3'  color='#FF0000' >Los datos fueron actualizados con exito, para que pueda ver los cambios haga click en el boton \"ACTUALIZAR CAMBIOS\"</font>";	
		}
 
}
else
{echo "Seleccione al menos un Destino";}


?> 
<p>
<input type="button" value="ACTUELIZAR CAMBIOS" onClick="location.reload();"/>        
</div>
</form>
</body>



</html>