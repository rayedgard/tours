

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
$consultaSeccion = mysql_query("select max(id) from video",$link);
$seccion = mysql_fetch_array($consultaSeccion);
$idSeccion=$seccion[0];
$id=$idSeccion+1;
?>
<!--Fin de la auto incrementacion-->


<!--Fin-->
<!--Formulario de registro de Datos-->
<form action="" method="post" enctype="multipart/form-data" name="form2" id="form2">
    <p>
    Ingrese el nombre del Video:
<br />

   <input name="nombre" type="text"  value="Nombre de video..." onFocus="if(this.value == 'Nombre de video...') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Nombre de video...';}"/>


  </p>
  
  <p>
    Ingrese el enlace del Video:
<br />
 
  
   <input id="name2" name="linkvideo" type="text"  value="4DEASAS1G" onFocus="if(this.value == '4DEASAS1G') {this.value = '';}" onBlur="if (this.value == '') {this.value = '4DEASAS1G';}"/>
  
  
  Recuerde el enlace del video se extrae de YOUTUBE.COM, solo los caracteres de V, ejemplo V=4DEASAS1G; Asi como muestra la imagen, los caracteres que estan dentro del recuadro azul.<p>
  <img src="../imagen/youtube.png" width="458" height="140" /> </p>
  
 <p>
  <input class="button" type="submit" value="AGREGAR VIDEO" id="aceptar" name="aceptar" tabindex="5"/>
  </p>
        
          <?php

$aceptar = $_POST['aceptar'];
if($aceptar)
{



//antes de enviar los caracteres que pasamos por la URL debemos ponerlo en buen recaudo encriptar
$nick1= encripta($nick,"rayedgard");

$nombre= $_POST['nombre'];
$linkear= $_POST['linkvideo'];
//$tipo= $_POST['tipo'];

$resultado = mysql_query("INSERT INTO video (id,nombre,linkvideo) VALUES ('$id','$nombre','$linkear')",$link);

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