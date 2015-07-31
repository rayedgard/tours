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
$consultaVideo = mysql_query("SELECT nombre,linkvideo FROM video WHERE id='$id'",$link);
$video = mysql_fetch_array($consultaVideo);


?>




<!--Formulario de registro de Datos-->
<form action="" method="post" enctype="multipart/form-data" name="form2" id="form2">
    <p>
    Ingrese el nombre de la Video, para modificar:
<br />
  <input id="name2" name="nombre" value="<?php echo $video[0];?>" type="text" tabindex="2"  />
  </p>
   <p>
    cambie el enlace :
<br />
  <input id="name2" name="linkvideo" value="<?php echo $video[1];?>" type="text" tabindex="2"  />
 
  Recuerde el enlace del video se extrae de YOUTUBE.COM, solo los caracteres de V, ejemplo V=4DEASAS1G; Asi como muestra la imagen, los caracteres que estan dentro del recuadro azul.
 <p>
  <img src="../imagen/youtube.png" width="458" height="140" /> </p>
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
$linkear= $_POST['linkvideo'];
//$tipo= $_POST['tipo'];
 
$resultado = mysql_query("UPDATE video SET nombre='$nombre' , linkvideo='$linkear' WHERE id=$id",$link);
$my_error = mysql_error($link);
		if(!empty($my_error))
		{		
			echo "Ha habido un error al MODIFICAR los valores. $my_error";
		}
		 else 
		{
	
			echo "<meta http-equiv ='refresh' content='0;url=principal.php?q=1&p=".$p."&nick=".$nick1."'>";
			
		} 
	} 
	
//fin de condision foto

?>
      

      
      </form>      
      
      
      
      
      