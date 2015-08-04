<!--Establecemos la conexion-->
<?php

///...Nos conectamos y guardamos los datos en el link de conexion
$link = Conectarse();
$p=$_GET['p'];


//desecriptamos el nick para mostrar la cadena de caracteres
$nick= desencripta($_GET['nick'],"rayedgard");

?>




<!--Esta parte es para realizar que se auto incremente la id-->
<?php
// consulta para realizar el autoincremet de la tabla SECCION
$consultaEvento = mysql_query("select max(id) from eventos",$link);
$evento = mysql_fetch_array($consultaEvento);
$idSeccion=$evento[0];
$id=$idSeccion+1;
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
    Ingrese el nombre del Evento:
<br />

     <input name="nombre" type="text"  value="Machu Picchu: Restricción de acceso de buses a ciudadela no afecta visitas" onFocus="if(this.value == 'Machu Picchu: Restricción de acceso de buses a ciudadela no afecta visitas') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Machu Picchu: Restricción de acceso de buses a ciudadela no afecta visitas';}"/>
  </p>
  
   <p>
    Ingrese el enlace del Evento:
<br />

  <input name="linkear" type="text"  value="http://peru21.pe/actualidad/machu-picchu-restriccion-acceso-buses-ciudadela-no-afecta-visitas-2165977" onFocus="if(this.value == 'http://peru21.pe/actualidad/machu-picchu-restriccion-acceso-buses-ciudadela-no-afecta-visitas-2165977') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'http://peru21.pe/actualidad/machu-picchu-restriccion-acceso-buses-ciudadela-no-afecta-visitas-2165977';}"/>
  
  
  </p>



<p>
    <label for="date">Fecha del Evento</label>
    <input id="date" name="fecha" type="date" >
</p>


  
<p>
          Agregue una Foto 
<br />
<input name="foto" type="file"/>
<input type="hidden" name="MAX_FILE_SIZE" value="400000">
  </p>
  <p>
         
             <textarea name="descripcion"  onFocus="if(this.value == 'Texto aqui...') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Texto aqui...';}">Descripción del Evento...</textarea>
         

         </p>

         <p>
           <input class="button" type="submit" value="AGREGAR EVENTO" id="aceptar" name="aceptar" tabindex="5"/>
           
           
           
           
		</p>
        
          <?php

//antes de enviar los caracteres que pasamos por la URL debemos ponerlo en buen recaudo encriptar
$nick1= encripta($nick,"rayedgard");


$aceptar = $_POST['aceptar'];
if($aceptar)
{

$nombre= $_POST['nombre'];
$linkear= $_POST['linkear'];
$fecha= $_POST['fecha'];
$idioma= $_POST['idioma'];
$des= $_POST['descripcion'];

$path1="../imagenes/eventos/";	 
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

$resultado = mysql_query("INSERT INTO eventos (id,nombre,linkeventos,imagen,descripcion,fecha,idioma) VALUES ('$id','$nombre','$linkear','$nombre_archivo1','$des','$fecha','$idioma')",$link);

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