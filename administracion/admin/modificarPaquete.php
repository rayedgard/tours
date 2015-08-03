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
$consultaPaquete = mysql_query("SELECT nombrePaquete,imagen,descripcion,idioma,costo FROM paquetes WHERE idPaquete='$id'",$link);
$paquete = mysql_fetch_array($consultaPaquete);

?>



<!--Formulario de registro de Datos-->
<form action="" method="post" enctype="multipart/form-data" name="form2" id="form2">
   
   
     <p>
    Seleccione Idioma:
<br />
    <select name="idioma">
    		<option value="<?php echo $paquete[3];?>"><?php if($paquete[3]==0){echo "Español";}else{ echo "Ingles";}?></option>
           	<option value="0">Español</option>
            <option value="1">Ingles</option>
        </select>
  </p>   
   
    <p>
    Ingrese nombre del PAQUETE:
<br />
  <input id="name2" name="nombre" value="<?php echo $paquete[0];?>" type="text" tabindex="2"  />
  </p>
   <p>
    Ingrese costo del PAQUETE en dolares:
<br />
  <input id="name2" name="costo" value="<?php echo $paquete[4];?>" type="text" tabindex="2"  />
  </p>
  
    <p>
<br>ya Existe una imagen  <img src="../imagenes/paquetes/<?php echo $paquete[1];?>" height="30" width="30"/> , si desea remplazarla, seleccione otra imagen:<br> 
<input name="foto" type="file"/>
<input type="hidden" name="MAX_FILE_SIZE" value="400000">
  </p> 
  
  
  

   
      <p>
 
      <textarea name="descripcion"  onFocus="if(this.value == 'Texto aqui...') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Texto aqui...';}"><?php echo $paquete[2]; ?> </textarea>

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
$costo= $_POST['costo'];
$idioma= $_POST['idioma'];
$descripcion= $_POST['descripcion'];
if($_FILES['foto']['name']=="")
{
	$nombre_archivo1 =$paquete[1];
}

if($_FILES['foto']['name']!="")
{
$path1="../imagenes/paquetes/";	 
$nombre_temporal1= $_FILES['foto']['tmp_name'];
$nombre_archivo1 =$_FILES['foto']['name'];
$tipo_archivo1 = $_FILES['foto']['type']; 
$tamano_archivo1 =$_FILES['foto']['size'];
}

if($_FILES['foto']['name']!="")
{
if (!((strpos($tipo_archivo1, "gif") || strpos($tipo_archivo1, "png") || strpos($tipo_archivo1,"jpeg") || strpos($tipo_archivo1,"jpg")  && ($tamano_archivo1 < 400000)))) 

{ 
echo "La extensión o el tamaño del archivo de IMAGEN no es correcta. <br><br><table><tr><td><li>Se permiten archivos *.gif, *.png o *.jpg<br><li>se permiten archivos de 400 Kb maximo.</td></tr></table><br>";
 
}

else
{ 
$resultado = mysql_query("UPDATE paquetes SET nombrePaquete='$nombre',imagen='$nombre_archivo1', descripcion='$descripcion', idioma='$idioma', costo='$costo' WHERE idPaquete=$id",$link);
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
				
					unlink("../imagenes/paquetes/".$paquete[2]);
			echo "<meta http-equiv ='refresh' content='0;url=principal.php?q=1&p=".$p."&nick=".$nick1."'>";
					}
					else
					{
						echo "<br>Ocurriero un error AL CARGAR LA FOTO. No pudo guardarse.";
					}
		} 
	} 
	
}//fin de condision foto

if($_FILES['foto']['name']=="")
{
	
$resultado = mysql_query("UPDATE paquetes SET nombrePaquete='$nombre',descripcion='$descripcion', idioma='$idioma',costo='$costo' WHERE idPaquete=$id",$link);

$my_error = mysql_error($link);

		if(!empty($my_error))
		{		
			echo "Ha habido un error al insertar los valores. $my_error";
		}
		 else 
		{
					
echo "<meta http-equiv ='refresh' content='0;url=principal.php?q=1&p=".$p."&nick=".$nick1."'>";
		} 
	

	
}
	
	
	

}
?>
      
      
      </form>      
      
      
      
      
      