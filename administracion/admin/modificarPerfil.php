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
$consultaPerfil = mysql_query("SELECT nombres,apellidos, cargo, telefono, correo, foto, PerfilDes,curriculum FROM perfil WHERE id='$id'",$link);
$perfil = mysql_fetch_array($consultaPerfil);


?>




<!--Formulario de registro de Datos-->
<form action="" method="post" enctype="multipart/form-data" name="form2" id="form2">
    <p>
    Ingrese el nombre del TRABAJADOR, para modificar:
<br />
  <input id="name2" name="nombre" value="<?php echo $perfil[0];?>" type="text" tabindex="2"  />
  </p>
   <p>
    Ingrese los apellidos del TRABAJADOR, para modificar  :
<br />
  <input id="name2" name="apellidos" value="<?php echo $perfil[1];?>" type="text" tabindex="2"  />
 
  </p>
  
   <p>
    Ingrese el cargo del TRABAJADOR, para modificar  :
<br />
  <input id="name2" name="cargo" value="<?php echo $perfil[2];?>" type="text" tabindex="2"  />
 
  </p>
   <p>
    Ingrese el telefono del TRABAJADOR, para modificar  :
<br />
  <input id="name2" name="telefono" value="<?php echo $perfil[3];?>" type="text" tabindex="2"  />
 
  </p>

   <p>
    Ingrese el correo del TRABAJADOR, para modificar  :
<br />
  <input id="name2" name="correo" value="<?php echo $perfil[4];?>" type="text" tabindex="2"  />
 
  </p>
  <p>
<br>ya Existe una imagen  <img src="../imagenes/perfil/<?php echo $perfil[5];?>" height="30" width="30"/> , si desea remplazarla seleccione otra imagen:<br> 
<input name="foto" type="file"/>
<input type="hidden" name="MAX_FILE_SIZE" value="900000">
  </p>  
  
  
  
      <p>
<br>ya Existe un CURRICULUM ADJUNTO:  <?php echo $perfil[7];?>, si desea remplazarla seleccione otro ARCHIVO:<br> 
<input name="curriculum" type="file"/>
<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
  </p>  
  
     <p>
   
<textarea id="elm1" name="perfilDes"><?php echo $perfil[6];?> </textarea> 
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
$apellidos= $_POST['apellidos'];
$cargo= $_POST['cargo'];
$telefono=$_POST['telefono'];
$correo=$_POST['correo'];
$perfilDes=$_POST['perfilDes'];

if($_FILES['foto']['name']=="")
{
	$nombre_archivo1 =$perfil[5];
}

if($_FILES['foto']['name']!="")
{
$path1="../imagenes/perfil/";	 
$nombre_temporal1= $_FILES['foto']['tmp_name'];
$nombre_archivo1 =$_FILES['foto']['name'];
$tipo_archivo1 = $_FILES['foto']['type']; 
$tamano_archivo1 =$_FILES['foto']['size'];
}


if($_FILES['curriculum']['name']=="")
{
	$nombre_archivo2 =$perfil[7];
}

if($_FILES['curriculum']['name']!="")
{
$path1="../imagenes/perfil/";	 
$nombre_temporal2= $_FILES['curriculum']['tmp_name'];
$nombre_archivo2 =$_FILES['curriculum']['name'];
$tipo_archivo2 = $_FILES['curriculum']['type']; 
$tamano_archivo2 =$_FILES['curriculum']['size'];
}




if($_FILES['foto']['name']!="")
{
if (!((strpos($tipo_archivo1, "gif") || strpos($tipo_archivo1, "png") || strpos($tipo_archivo1,"jpeg") || strpos($tipo_archivo1,"jpg")  && ($tamano_archivo1 < 400000)))) 

{ 
echo "La extensión o el tamaño del archivo de IMAGEN no es correcta. <br><br><table><tr><td><li>Se permiten archivos *.gif, *.png o *.jpg<br><li>se permiten archivos de 400 Kb maximo.</td></tr></table><br>";
 
}

else
{ 

	if($_FILES['curriculum']['name']!="")
	{

$resultado = mysql_query("UPDATE perfil SET nombres='$nombre', apellidos='$apellidos',cargo='$cargo',telefono='$telefono',correo='$correo',foto='$nombre_archivo1', perfilDes='$perfilDes',curriculum='$nombre_archivo2' WHERE id=$id",$link);
$my_error = mysql_error($link);
		if(!empty($my_error))
		{		
			echo "Ha habido un error al MODIFICAR los valores. $my_error";
		}
		 else 
		{
			
		if(is_uploaded_file($nombre_temporal1) and is_uploaded_file($nombre_temporal2))
					{
					copy($nombre_temporal1, $path1.$nombre_archivo1);
					unlink("../imagenes/perfil/".$perfil[5]);
					copy($nombre_temporal2, $path1.$nombre_archivo2);
					unlink("../imagenes/perfil/".$perfil[7]);
			echo "<meta http-equiv ='refresh' content='0;url=principal.php?q=1&p=".$p."&nick=".$nick1."'>";
					
								
					}
					else
					{
						echo "<br>Ocurriero un error AL CARGAR LA FOTO o ARCHIVO. No pudo guardarse.";
					}
			
			
		} 
	}//fin de la condicion curriculum
	 else//cuando el curriculum esta lleno y foto vacia
	 {
$resultado = mysql_query("UPDATE perfil SET nombres='$nombre' , apellidos='$apellidos',cargo='$cargo',telefono='$telefono',correo='$correo',foto='$nombre_archivo1', perfilDes='$perfilDes' WHERE id=$id",$link);
	
$my_error = mysql_error($link);

		if(!empty($my_error))
		{		
			echo "Ha habido un error al insertar los valores. $my_error";
		}
		 else 
		{


if(is_uploaded_file($nombre_temporal1))
					{
					copy($nombre_temporal1, $path1.$nombre_archivo1);
					unlink("../imagenes/perfil/".$perfil[5]);
					
			echo "<meta http-equiv ='refresh' content='0;url=principal.php?q=1&p=".$p."&nick=".$nick1."'>";
					
								
					}
					else
					{
						echo "<br>Ocurriero un error AL CARGAR LA FOTO. No pudo guardarse.";
					}


		} 
	
	 }//cerramos el else
	
}//fin else  de condision foto


	
}//fin condicion foto





if($_FILES['foto']['name']=="")
{

	if($_FILES['curriculum']['name']=="")
	{

$resultado = mysql_query("UPDATE perfil SET nombres='$nombre', apellidos='$apellidos',cargo='$cargo',telefono='$telefono',correo='$correo', perfilDes='$perfilDes' WHERE id=$id",$link);
$my_error = mysql_error($link);
		if(!empty($my_error))
		{		
			echo "Ha habido un error al MODIFICAR los valores. $my_error";
		}
		 else 
		{
			
		
					
			echo "<meta http-equiv ='refresh' content='0;url=principal.php?q=1&p=".$p."&nick=".$nick1."'>";
					
	
			
		} 
	}//fin de la condicion curriculum
	 else//cuando el curriculum esta lleno y foto vacia
	 {
$resultado = mysql_query("UPDATE perfil SET nombres='$nombre' , apellidos='$apellidos',cargo='$cargo',telefono='$telefono',correo='$correo', perfilDes='$perfilDes',curriculum='$nombre_archivo2' WHERE id=$id",$link);
	
$my_error = mysql_error($link);

		if(!empty($my_error))
		{		
			echo "Ha habido un error al insertar los valores. $my_error";
		}
		 else 
		{


if(is_uploaded_file($nombre_temporal2))
					{
					copy($nombre_temporal2, $path1.$nombre_archivo2);
					unlink("../imagenes/perfil/".$perfil[7]);
					
			echo "<meta http-equiv ='refresh' content='0;url=principal.php?q=1&p=".$p."&nick=".$nick1."'>";
					
								
					}
					else
					{
						echo "<br>Ocurriero un error AL CARGAR LA FOTO. No pudo guardarse.";
					}



		} 
	
	 }//cerramos el else


	
}//fin condicion foto














}//cerramos el aceptar
?>
      
    
      </form>      
      
      
      
      
      