<!--Establecemos la conexion-->
<?php

///...Nos conectamos y guardamos los datos en el link de conexion
$link = Conectarse();
$p=$_GET['p'];
//desecriptamos el nick para mostrar la cadena de caracteres
$nick= desencripta($_GET['nick'],"rayedgard");
$td=$_GET['td'];
?>





<!--Esta parte es para realizar que se auto incremente la id-->
<?php
// consulta para realizar el autoincremet de la tabla SECCION
$consultaPerfil = mysql_query("select max(id) from perfil",$link);
$perfill = mysql_fetch_array($consultaPerfil);
$idPerfil=$perfill[0];
$id=$idPerfil+1;
?>
<!--Fin de la auto incrementacion-->


<!--Fin-->
<!--Formulario de registro de Datos-->
<form action="" method="post" enctype="multipart/form-data" name="form2" id="form2">

    <p>
    Ingrese el nombre del TRABAJADOR:
<br />

<input name="nombre" type="text"  value="Agregue nombre del TRABAJDOR" onFocus="if(this.value == 'Agregue nombre del TRABAJDOR') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Agregue nombre del TRABAJDOR';}"/>
  </p>
  
  
  <p>
    Ingrese los apellidos del TRABAJADOR:
<br />

<input name="apellidos" type="text"  value="Apellidos del Trabajador" onFocus="if(this.value == 'Apellidos del Trabajador') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Apellidos del Trabajador';}"/>
  </p>
  
  
  <p>
    Ingrese el CARGO que ocupa el TRABAJADOR en la institución:
<br />

<input name="cargo" type="text"  value="Cargo del TRABAJADOR" onFocus="if(this.value == 'Cargo del TRABAJADOR') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Cargo del TRABAJADOR';}"/>
  </p>
  
  <p>
    Ingrese el número telefonico del TRABAJADOR:
<br />

<input name="telefono" type="text"  value="Número de telefono" onFocus="if(this.value == 'Número de telefono') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Número de telefono';}"/>
  </p>
  
  
    <p>
    Ingrese el Correo electronico del TRABAJADOR:
<br />

<input name="correo" type="text"  value="E-mail" onFocus="if(this.value == 'E-mail') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'E-mail';}"/>
  </p>
  
   <p>
    Agregue fotografia:
<br />
<input name="foto" type="file"/>
<input type="hidden" name="MAX_FILE_SIZE" value="900000">

  </p>
  
  
    <p>
    Agregue CURRICULUM en formato PDF:
<br />
<input name="curriculum" type="file"/>
<input type="hidden" name="MAX_FILE_SIZE" value="2000000">

  </p>
  
  
   <p>

 <textarea name="perfil2"  id="elm" onFocus="if(this.value == 'Descriva brevemente su PERFIL...') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Descriva brevemente su PERFIL...';}">Descriva brevemente su PERFIL...</textarea>
   </p>
  
      

         <p>
           <input class="button" type="submit" value="AGREGAR" id="aceptar" name="aceptar" tabindex="5"/>
		</p>
        
          <?php

$aceptar = $_POST['aceptar'];
if($aceptar)
{

$nombre= $_POST['nombre'];
$apellidos= $_POST['apellidos'];
$cargo=$_POST['cargo'];
$telefono=$_POST['telefono'];
$correo=$_POST['correo'];
$perfil2=$_POST['perfil2'];

$path1="../imagenes/perfil/";	 
$nombre_temporal1= $_FILES['foto']['tmp_name'];
$nombre_archivo1 =$_FILES['foto']['name'];
$tipo_archivo1 = $_FILES['foto']['type']; 
$tamano_archivo1 =$_FILES['foto']['size'];
 
$nombre_temporal2= $_FILES['curriculum']['tmp_name'];
$nombre_archivo2 =$_FILES['curriculum']['name'];
$tipo_archivo2 = $_FILES['curriculum']['type']; 
$tamano_archivo2 =$_FILES['curriculum']['size'];

if (!((strpos($tipo_archivo1, "gif") || strpos($tipo_archivo1, "png") || strpos($tipo_archivo1,"jpeg") || strpos($tipo_archivo1,"jpg")  && ($tamano_archivo1 < 900000)))) 

{ 
echo "La extensión o el tamaño del archivo de IMAGEN no es correcta. <br><br><table><tr><td><li>Se permiten archivos *.gif, *.png o *.jpg<br><li>se permiten archivos de 900 Kb maximo.</td></tr></table><br>";
}
else
{ 


$resultado = mysql_query("INSERT INTO perfil(id,nombres,apellidos,cargo,telefono,correo,foto, perfilDes,curriculum) VALUES ('$id','$nombre','$apellidos','$cargo','$telefono','$correo','$nombre_archivo1','$perfil2','$nombre_archivo2')",$link);

$my_error = mysql_error($link);

		if(!empty($my_error))
		{		
			echo "Ha habido un error al insertar los valores. $my_error";
		}
		 else 
		{
			
			//antes de enviar los caracteres que pasamos por la URL debemos ponerlo en buen recaudo encriptar
			$nick1= encripta($nick,"rayedgard");
			
			if(is_uploaded_file($nombre_temporal1) and is_uploaded_file($nombre_temporal2))
			{
				copy($nombre_temporal1, $path1.$nombre_archivo1);
				copy($nombre_temporal2, $path1.$nombre_archivo2);
				echo "<meta http-equiv ='refresh' content='0;url=principal.php?q=1&p=".$p."&nick=".$nick1."&td=".$td."'>";
			}
			else
			{
				echo "<br>Ocurrio un error al subir la foto. No pudo guardarse.";
			}
			
			

		} 

}

} 

?>
          <?php
// mysql_close($link);// cerramos la conexion
?>
        </p>
      </form>