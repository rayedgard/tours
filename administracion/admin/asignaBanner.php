<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Asignacion de Banner</title>
</head>

<body>
<?php
include("../../conexion.php"); 
$link = Conectarse();

?>

<?php

$cod=$_GET['id'];

// el path sera el nombre del banner
$consultaBanner = mysql_query("select imagen from banner where idPaquete='$cod'",$link);
$resultadoBanner = mysql_fetch_array($consultaBanner);

$numeroBanner = mysql_query("select count(imagen) from banner where idPaquete='$cod'",$link);
$numeroBan= mysql_fetch_array($numeroBanner);


?>

<!--Formulario de registro de Datos-->
<form action="" method="post" enctype="multipart/form-data" name="form2" id="form2">


  <p>

<br>ya Existe una imagen  <img src="../imagenes/paquetes/<?php echo $resultadoBanner[0];?>" height="30" width="30"/> , si desea remplazarla, seleccione otra imagen:<br> 
<input name="foto" type="file"/>
<input type="hidden" name="MAX_FILE_SIZE" value="40000000">
  </p>     
        
    <p>
           <input class="button" type="submit" value="AGREGAR BANNER" id="aceptar" name="aceptar" tabindex="5"/>
		</p>


<?php
$aceptar = $_POST['aceptar'];
if($aceptar)
{


$path1="../imagenes/paquetes/";	 
$nombre_temporal1= $_FILES['foto']['tmp_name'];
$nombre_archivo1 =$_FILES['foto']['name'];
$tipo_archivo1 = $_FILES['foto']['type']; 
$tamano_archivo1 =$_FILES['foto']['size'];



if (!((strpos($tipo_archivo1, "gif") || strpos($tipo_archivo1, "png") || strpos($tipo_archivo1,"jpeg") || strpos($tipo_archivo1,"jpg")  && ($tamano_archivo1 < 4000000)))) 

{ 
echo "La extensión o el tamaño del archivo de IMAGEN no es correcta. <br><br><table><tr><td><li>Se permiten archivos *.gif, *.png o *.jpg<br><li>se permiten archivos de 3.5 Mb maximo.</td></tr></table><br>";
 
}

else
{ 

$resultado = mysql_query("REPLACE INTO banner VALUES('$cod','$nombre_archivo1')",$link);
$my_error = mysql_error($link);
		if(!empty($my_error))
		{		
			echo "Ha habido un error al AGREGAR LOS DATOS. $my_error";
		}
		 else 
		{
			if(is_uploaded_file($nombre_temporal1))
			{
			
				copy($nombre_temporal1, $path1.$nombre_archivo1);
				if($numeroBan[0]!=0)
				{
				unlink("../imagenes/paquetes/".$resultadoBanner[0]);
				}
				$modificaPaq = mysql_query("UPDATE paquetes SET banner='1' WHERE idPaquete='$cod'",$link);
			
				
				echo "ELEMENTO AGREGADO";
			}
			else
			{
				echo "<br>Ocurriero un error AL CARGAR LA IMAGEN. No pudo guardarse.";
			}
			
			
		} 
		
	} 
	









  
 }   
 
 ?>   
</form>

</body>
</html>