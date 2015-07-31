<!--Establecemos la conexion-->
<?php

///...Nos conectamos y guardamos los datos en el link de conexion
$link = Conectarse();
$p=$_GET['p'];
$nick= desencripta($_GET['nick'],"rayedgard");
$td=$_GET['td'];
?>





<!--Esta parte es para realizar que se auto incremente la id-->
<?php
// consulta para realizar el autoincremet de la tabla SECCION
$consultaDestino = mysql_query("select max(idDestino) from destinos",$link);
$destino = mysql_fetch_array($consultaDestino);
$idDestinoo=$destino[0];
$id=$idDestinoo+1;
?>
<!--Fin de la auto incrementacion-->


<!--Fin-->
<!--Formulario de registro de Datos-->
<form action="" method="post" enctype="multipart/form-data" name="form2" id="form2">

       <p>
    Seleccione Idioma:
<br />
    <select name="idioma">
           	<option value="0">Español</option>
            <option value="1">Ingles</option>
        </select>
  </p>
 
  

    <p>
    Ingrese el nombre del Destino:
<br />

<input name="nombre" type="text"  value="Agregue nombre de Destino" onFocus="if(this.value == 'Agregue nombre de Destino') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Agregue nombre de Destino';}"/>
  </p>
  
  
   <p>
    Agregue fotografia:
<br />
<input name="foto" type="file"/>
<input type="hidden" name="MAX_FILE_SIZE" value="900000">

  </p>
  
  
  
   <p>

 <textarea name="descripcion"  id="elm" onFocus="if(this.value == 'Agregue descripción...') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Agregue descripción...';}">Agregue descripción...</textarea>
   </p>
  
      

         <p>
           <input class="button" type="submit" value="AGREGAR CLASE" id="aceptar" name="aceptar" tabindex="5"/>
		</p>
        
          <?php
//antes de enviar los caracteres que pasamos por la URL debemos ponerlo en buen recaudo encriptar
  	$nick1= encripta($nick,"rayedgard");
$aceptar = $_POST['aceptar'];
if($aceptar)
{

$nombre= $_POST['nombre'];
$descripcion= $_POST['descripcion'];
$idioma=$_POST['idioma'];
$path1="../imagenes/destinos/";	 
$nombre_temporal1= $_FILES['foto']['tmp_name'];
$nombre_archivo1 =$_FILES['foto']['name'];
$tipo_archivo1 = $_FILES['foto']['type']; 
$tamano_archivo1 =$_FILES['foto']['size'];



if (!((strpos($tipo_archivo1, "gif") || strpos($tipo_archivo1, "png") || strpos($tipo_archivo1,"jpeg") || strpos($tipo_archivo1,"jpg")  && ($tamano_archivo1 < 900000)))) 

{ 
echo "La extensión o el tamaño del archivo de IMAGEN no es correcta. <br><br><table><tr><td><li>Se permiten archivos *.gif, *.png o *.jpg<br><li>se permiten archivos de 900 Kb maximo.</td></tr></table><br>";
}
else
{ 


$resultado = mysql_query("INSERT INTO destinos (idDestino,imagenDestino,nombreDestino,descripcion,idioma) VALUES ('$id','$nombre_archivo1','$nombre','$descripcion','$idioma')",$link);

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