



<!--Establecemos la conexion-->
<?php

///...Nos conectamos y guardamos los datos en el link de conexion
$link = Conectarse();
$p= $_GET['p'];
$nick= desencripta($_GET['nick'],"rayedgard");
$td=$_GET['td'];
?>


<?php
$id= $_GET['cod'];

// consulta para realizar el modificado de la tabla
$consultaDestino = mysql_query("SELECT imagenDestino,nombreDestino,descripcion,idioma FROM destinos WHERE idDestino='$id'",$link);
$destinos = mysql_fetch_array($consultaDestino);

?>















<!--Formulario de registro de Datos-->
<form action="" method="post" enctype="multipart/form-data" name="form2" id="form2">
  
      <p>
    Seleccione Idioma:
<br />
    <select name="idioma">
    		<option value="<?php echo $destinos[3];?>"><?php if($destinos[3]==0){echo "Español";}else{ echo "Ingles";}?></option>
           	<option value="0">Español</option>
            <option value="1">Ingles</option>
        </select>
  </p>
  
    <p>
    Ingrese el nombre de DESTINO:
<br />
  <input  name="nombre" value="<?php echo $destinos[1];?>" type="text" tabindex="2"  />
  </p>
     
     
  <p>
<br>Ya existe una imagen  <img src="../imagenes/destinos/<?php echo $destinos[0];?>" height="30" width="30"/> , si desea remplazarla seleccione otra imagen:<br> 
<input name="foto" type="file"/>
<input type="hidden" name="MAX_FILE_SIZE" value="900000">
  </p>
     
     
    
    
    
    
    
     <p>
    Ingrese la descripción del Destino:
<br/>
     <textarea name="descripcion"><?php echo $destinos[2];?></textarea> 
   </p>

         <p>
           <input class="button" type="submit" value="MODIFICAR" id="aceptar" name="aceptar" tabindex="5"/>
		</p>
    
      
      <?php
//antes de enviar los caracteres que pasamos por la URL debemos ponerlo en buen recaudo encriptar
  	$nick1= encripta($nick,"rayedgard");

//codigo para la bajada de imagenes	
$aceptar = $_POST['aceptar'];
if($aceptar)
{


$nombre= $_POST['nombre'];
$descripcion= $_POST['descripcion'];
$idioma= $_POST['idioma'];
		
	if($_FILES['foto']['name']=="")
	{
		$nombre_archivo1 =$seccion[1];
	}
	
	if($_FILES['foto']['name']!="")
	{
		$path1="../imagenes/destinos/";	 
		$nombre_temporal1= $_FILES['foto']['tmp_name'];
		$nombre_archivo1 =$_FILES['foto']['name'];
		$tipo_archivo1 = $_FILES['foto']['type']; 
		$tamano_archivo1 =$_FILES['foto']['size'];
	}	
	

	if($_FILES['foto']['name']!="")
	{	

		if(!((strpos($tipo_archivo1, "gif") || strpos($tipo_archivo1, "png") || strpos($tipo_archivo1,"jpeg") || strpos($tipo_archivo1,"jpg")  && ($tamano_archivo1 < 900000)))) 

		{ 
echo "La extensión o el tamaño del archivo de IMAGEN no es correcta. <br><br><table><tr><td><li>Se permiten archivos *.gif, *.png o *.jpg<br><li>se permiten archivos de 900 Kb maximo.</td></tr></table><br>";
 
		}

		else
		{ 
$resultado = mysql_query("UPDATE destinos SET imagenDestino='$nombre_archivo1', nombreDestino='$nombre', descripcion='$descripcion',idioma='$idioma' WHERE idDestino=$id",$link);
$my_error = mysql_error($link);
			if(!empty($my_error))
			{		
				echo "Ha habido un error al MODIFICAR los valores. $my_error";
			}
		 	else 
			{
			
				if(is_uploaded_file($nombre_temporal1))
				{
					copy($nombre_temporal1, $path1.$nombre_archivo1);
					unlink("../imagenes/destinos/".$destinos[0]);
					echo "<meta http-equiv ='refresh' content='0;url=principal.php?q=1&p=".$p."&nick=".$nick1."&td=".$td."'>";
				}
				else
				{
					echo "<br>Ocurrio un error AL CARGAR LA FOTO. No pudo guardarse.";
				}
			} 
		} 
	
	}//fin de condision foto

//cuando no se modifica la foto 
	if($_FILES['foto']['name']=="")
	{
		$resultado = mysql_query("UPDATE destinos SET nombreDestino='$nombre',descripcion='$descripcion',idioma='$idioma' WHERE idDestino=$id",$link);
		$my_error = mysql_error($link);

		if(!empty($my_error))
		{		
			echo "Ha ocurrido un error a insertar los valores. $my_error";
		}
		 else 
		{
			echo "<meta http-equiv ='refresh' content='0;url=principal.php?q=1&p=".$p."&nick=".$nick1."&td=".$td."'>";
		} 
	}//FIN MODIFICACION SIN FOTOS

}//fin boton aceptar
?>
      
      
      </form>
      
      
      
      
      
      