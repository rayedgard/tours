



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/general1.css" rel="stylesheet" type="text/css" />


<title>GALERIA DE IMAGENES</title>




</head>

<body>

<?php
include("../../conexion.php"); 
$link = Conectarse();

?>

<?php

$cod=$_GET['id'];

// el path sera el nombre del producto
$consultaCat = mysql_query("select nombreCategoria from categoriafotos where idCategoriaFoto='$cod'",$link);
$resultadoCat = mysql_fetch_array($consultaCat);

?>

<h2><a href="#">Administracion de la galeria de imagenes de la CATEGORIA: </a></h2><h1><?php  echo $resultadoCat[0];?></h1> 

<form action="" method="post" enctype="multipart/form-data" name="form2" id="form2">
       <p>
       Agregue una imagen, puedes agregar un maxima de 30 fotos 
        <br />
        <?php 
		///ESTE CODIGO VERIFICA SI EXISTEN ARCHIVOS EN LA CARPETA DIRECCIONADA Y LOS CUESTA
		$directorioLogo="../imagenes/fotos/".$resultadoCat[0];
		$contadorLogo=0;
		if ($handle = opendir( $directorioLogo))   
		{  
       $curDir = substr( $directorioLogo, (strrpos(dirname( $directorioLogo."/."),"/")+1));  
       while (false !== ($file = readdir($handle)))   
       {  
           if ($file != "." && $file != "..")   
           {  
               $fName = $file;  
               $file =  $directorioLogo.'/'.$file;  
               $contadorLogo=$contadorLogo+1;    
           }
	   }  
	   closedir($handle);  
	   }
		 
		 echo "N° de imagenes cargados: ".$contadorLogo." imagenes ";
		 //FIN VERIFICADOR DE ARCHIVOS
		 
		//CODIGO PARA FILTRAR EL UPLOAD DE IMAGENES 
		if($contadorLogo==30)  
   		{ 
		echo "Usted ya llego al limite de agregar imagenes, para que agregue mas imagenes elimine alguna de las imagenes y reemplaselos<br>";
		
		} 
		else
		{
		
		echo '
		 <input name="foto" type="file" />
    	<input type="hidden" name="MAX_FILE_SIZE" value="400000">
		';
		}
	   ?>
      </p>
     
         
        
        <p>
          <input class="button" type="submit" value="Agregar" id="aceptar" name="aceptar" tabindex="5" />
          <input class="button" type="reset" value="Cancelar" id="cancelar" name="cancelar" tabindex="6" />
        </p>
      </form>
      
   <?php
	 
	 
$path1="../imagenes/fotos/".$resultadoCat[0]."/";  
$nombre_archivo =$_FILES['foto']['name'];
$tipo_archivo = $_FILES['foto']['type']; 
$tamano_archivo =$_FILES['foto']['size'];


//codigo para la bajada de imagenes	
$aceptar = $_POST['aceptar'];
if($aceptar)
{
	
// CONDICION CUANDO NO EXISTE LOGO Y TIENE QUE AGREGAR UNO NUEVO
// CONDICION CUANDO EL USUARIO MODIFICA EL ARCHIVO DE LOGO
if (!((strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "png") || strpos($tipo_archivo,"jpeg") || strpos($tipo_archivo,"jpg")) && ($tamano_archivo < 400000))) 

{ 
echo "La extensión o el tamaño del archivo no es correcta. <br><br><table><tr><td><li>Se permiten archivos *.gif, *.png o *.jpg<br><li>se permiten archivos de 400 Kb maximo.</td></tr></table><br>"; 
}

else
{ 

//AQUI TENEMOS QUE CAMBIAR
$resultado = mysql_query("INSERT INTO fotos (nombreFoto,idCategoriaFoto) VALUES ('$nombre_archivo','$id') ",$link);

$my_error = mysql_error($link);

		if(!empty($my_error))
		{		
			echo "Ha habido un error al AGREGAR LAS IMAGENES. $my_error";
		}
		 else 
		{
			echo "Los datos han sido AGREGADOS satisfactoriamente";
			if (move_uploaded_file($_FILES['foto']['tmp_name'], $path1.$nombre_archivo))
				{ 
					
					echo "<br>LA IMAGEN ha sido cargado correctamente."; 
					
				}
			else{ 
				echo "Ocurrio un error al subir el fichero. No pudo guardarse."; 
				}

		} 
	} 



}

?>   
 
 
 
 
 
 <?php
 ///codigo para eliominar  archovos de fotos
$rc=$_GET['rc'];
$nombre=$_GET['n'];

// consulta para onçbtener el ultima registro
if($nombre!=null)
{
//eliminando de la bd 
echo 'Imagen Eliminado';
mysql_query("DELETE FROM fotos WHERE nombreFoto='$nombre' ")or die(mysql_error());
unlink("../imagenes/fotos/".$rc."/".$nombre);
}

//fin borrar fotos
 $directorio="../imagenes/fotos/".$resultadoCat[0]."/";
  // CODIGO PARA SABER LOS NOMBRES DEL ARCHIVO
  $contador=0;
   if(!isset($directorio))  
   {  
       echo  "No existe tal directorio";  
   }  
   if ($handle = opendir( $directorio))   
   {  
       $curDir = substr( $directorio, (strrpos(dirname( $directorio."/."),"/")+1));  
       print "Directorio Actual: ".dirname( $directorio."/.")."<br>************************<br>";  

       while (false !== ($file = readdir($handle)))   
       {  
           if ($file != "." && $file != "..")   
           {  
               $fName = $file;  
               $file =  $directorio.'/'.$file;  
               if(is_file($file))  
               {  
                   print "&nbsp;&nbsp;<a href='".$file."'>".$fName."</a>&nbsp;&nbsp;&nbsp; ".filesize($file)." bytes   "; 
				   echo '<a href="galeria.php?id='.$cod.'&n='.$fName.'&rc='.$resultadoCat[0].'">eliminar</a>'; 
				   echo '<br>';				   
               }  
             $contador=$contador+1;    
           }
		   
       }  

       closedir($handle);  
   }
 

 echo "Número de imágenes: ".$contador;

 
 ?>
  
 
      
</body>
</html>
