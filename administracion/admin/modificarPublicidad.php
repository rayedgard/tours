<!--Establecemos la conexion-->
<?php

///...Nos conectamos y guardamos los datos en el link de conexion
$link = Conectarse();
$p= $_GET['p'];


//desecriptamos el nick para mostrar la cadena de caracteres
$nick= desencripta($_GET['nick'],"rayedgard");


?>


<?php
$id= $_GET['cod'];

// consulta para realizar el modificado de la tabla
$consultaPublicidad = mysql_query("SELECT nombre,imagen,enlace FROM publicidad WHERE id='$id'",$link);
$publicidad = mysql_fetch_array($consultaPublicidad);

?>



<!--Formulario de registro de Datos-->
<form action="" method="post" enctype="multipart/form-data" name="form2" id="form2">
 


    <p>
    Ingrese el nombre de la Publicidad, para modificar:
<br />
  <input id="name2" name="nombre" value="<?php echo $publicidad[0];?>" type="text" tabindex="2"  />
  </p>
   <p>
    cambie el enlace de la Publicidad:
<br />
  <input id="name2" name="linkear" value="<?php echo $publicidad[2];?>" type="text" tabindex="2"  />
  </p>
  <p>
<br>ya Existe una imagen  <img src="../imagenes/publicidad/<?php echo $publicidad[1];?>" height="30" width="30"/> , si desea remplazarla seleccione otra imagen:<br> 
<input name="foto" type="file"/>
<input type="hidden" name="MAX_FILE_SIZE" value="400000">
  </p>     
  

         <p>
           <input class="button" type="submit" value="MODIFICAR" id="aceptar" name="aceptar" tabindex="5"/>
		</p>
        </p>
      
      
      <?php
	  
	  
	  
//antes de enviar los caracteres que pasamos por la URL debemos ponerlo en buen recaudo encriptar
$nick1= encripta($nick,"rayedgard");

//codigo para la bajada de imagenes	
$aceptar = $_POST['aceptar'];
if($aceptar)
{
$nombre= $_POST['nombre'];
$linkear= $_POST['linkear'];

if($_FILES['foto']['name']=="")
{
	$nombre_archivo1 =$noticias[2];
}

if($_FILES['foto']['name']!="")
{
$path1="../imagenes/publicidad/";	 
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
$resultado = mysql_query("UPDATE publicidad SET nombre='$nombre' ,imagen='$nombre_archivo1', enlace='$linkear'  WHERE id=$id",$link);
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
					unlink("../imagenes/publicidad/".$publicidad[1]);
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
	
	$resultado = mysql_query("UPDATE publicidad SET nombre='$nombre' , enlace='$linkear' WHERE id=$id",$link);
	
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
      
      
      
      
      