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
$consultaPaquetes= mysql_query("select max(idPaquete) from paquetes",$link);
$paquetes = mysql_fetch_array($consultaPaquetes);
$idPaquete=$paquetes[0];
$id=$idPaquete+1;
?>
<!--Fin de la auto incrementacion-->








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
    Ingrese el Nombre del PAQUETE:
<br />
  
   <input name="nombre" type="text"  value="Cusco Clasico 2D/3N" onFocus="if(this.value == 'Cusco Clasico 2D/3N') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Cusco Clasico 2D/3N';}"/>
  
 
  </p>
  
       <p>
    Ingrese el costo del PAQUETE en Dolares:
<br />
  
   <input name="costo" type="text"  value="350" onFocus="if(this.value == '350') {this.value = '';}" onBlur="if (this.value == '') {this.value = '350';}"/>
  
 
  </p> 

  <p>
          Agregue una Foto o Imagen 
<br />
<input name="foto" type="file"/>
<input type="hidden" name="MAX_FILE_SIZE" value="400000">
  </p>     
        

    <p>

      
      <textarea name="descripcion"  onFocus="if(this.value == 'Texto aqui...') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Texto aqui...';}">Descripción del Paquete...</textarea>

  </p>



            <p>
           <input class="button" type="submit" value="AGREGAR PRODUCTO" id="aceptar" name="aceptar" tabindex="5"/>
		</p>
        
 <?php
//antes de enviar los caracteres que pasamos por la URL debemos ponerlo en buen recaudo encriptar
  	$nick1= encripta($nick,"rayedgard");
$aceptar = $_POST['aceptar'];
if($aceptar)
{
	echo "entro";
$nombre= $_POST['nombre'];
$fecha= date("Y:m:d H:i:s"); 
$idioma= $_POST['idioma'];
$des=$_POST['descripcion'];
$costo=$_POST['costo'];

$path1="../imagenes/paquetes/";	 
$nombre_temporal1= $_FILES['foto']['tmp_name'];
$nombre_archivo1 =$_FILES['foto']['name'];
$tipo_archivo1 = $_FILES['foto']['type']; 
$tamano_archivo1 =$_FILES['foto']['size'];





if (!((strpos($tipo_archivo1, "gif") || strpos($tipo_archivo1, "png") || strpos($tipo_archivo1,"jpeg") || strpos($tipo_archivo1,"jpg")  && ($tamano_archivo1 < 400000)))) 

{ 
echo "La extensión o el tamaño del archivo de IMAGEN no es correcta. <br><br><table><tr><td><li>Se permiten archivos *.gif, *.png o *.jpg<br><li>se permiten archivos de 400 Kb maximo.</td></tr></table><br>";
}
else
{ 

$resultado = mysql_query("INSERT INTO paquetes (idPaquete,nombrePaquete,imagen,fechaPublicacion,descripcion,idioma,costo) VALUES ('$id','$nombre','$nombre_archivo1','$fecha','$des','$idioma','$costo')",$link);

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
			mkdir($path1.$id, 0777);
			echo "<meta http-equiv ='refresh' content='0;url=principal.php?q=1&p=".$p."&nick=".$nick1."'>";
		
		}
		else
		{
			echo "<br>Ocurriero un error al subir la foto. No pudo guardarse.";
		}

		} 
	} 

}
if($cancelar)
{
echo "<script languaje='javascript' type='text/javascript'>window.close();</script>";
}
?>
          <?php
// mysql_close($link);// cerramos la conexion
?>
        </p>
      </form>