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
$consultaEvento = mysql_query("SELECT nombre,linkeventos,imagen,descripcion,fecha,idioma FROM eventos WHERE id='$id'",$link);
$evento = mysql_fetch_array($consultaEvento);

?>



<!--Formulario de registro de Datos-->
<form action="" method="post" enctype="multipart/form-data" name="form2" id="form2">
       <p>
    Seleccione Idioma:
<br />
    <select name="idioma">
    
            <option value="<?php echo $evento[5];?>"><?php if($evento[5]==1){echo "Ingles";}if($evento[5]==0){echo "Español";} ?></option>
           	<option value="0">Español</option>
            <option value="1">Ingles</option>
        </select>
  </p>
    


    <p>
    Ingrese el nombre del Evento, para modificar:
<br />
  <input id="name2" name="nombre" value="<?php echo $evento[0];?>" type="text" tabindex="2"  />
  </p>
   <p>
    cambie el enlace:
<br />
  <input id="name2" name="linkear" value="<?php echo $evento[1];?>" type="text" tabindex="2"  />
  </p>

<p>
    <label for="date">Fecha del Evento</label>
    <input id="date" name="fecha" type="date" value="<?php echo $evento[4];?>">
</p>


  <p>
<br>ya Existe una imagen  <img src="../imagenes/eventos/<?php echo $evento[2];?>" height="30" width="30"/> , si desea remplazarla seleccione otra imagen:<br> 
<input name="foto" type="file"/>
<input type="hidden" name="MAX_FILE_SIZE" value="400000">
  </p>     
  
         <p>
   
<textarea id="elm1" name="descripcion"><?php echo $evento[3];?> </textarea> 
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
$fecha= $_POST['fecha'];
$idioma= $_POST['idioma'];
$des=$_POST['descripcion'];
if($_FILES['foto']['name']=="")
{
	$nombre_archivo1 =$evento[2];
}

if($_FILES['foto']['name']!="")
{
$path1="../imagenes/eventos/";	 
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
$resultado = mysql_query("UPDATE eventos SET nombre='$nombre' , linkeventos='$linkear' ,imagen='$nombre_archivo1', descripcion='$des', fecha='$fecha', idioma='$idioma' WHERE id=$id",$link);
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
					unlink("../imagenes/eventos/".$evento[2]);
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
	
	$resultado = mysql_query("UPDATE eventos SET nombre='$nombre' , linkeventos='$linkear' , descripcion='$des', fecha='$fecha', idioma='$idioma' WHERE id=$id",$link);
	
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
      
      
      
      
      