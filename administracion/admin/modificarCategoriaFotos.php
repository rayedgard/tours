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
$consultaCat = mysql_query("SELECT nombreCategoria FROM categoriafotos WHERE idCategoriaFoto='$id'",$link);
$cat = mysql_fetch_array($consultaCat);


?>




<!--Formulario de registro de Datos-->
<form action="" method="post" enctype="multipart/form-data" name="form2" id="form2">
    <p>
    Ingrese el nombre de la CATEGORIA DE FOTOS, para modificar:
<br />
  <input id="name2" name="nombre" value="<?php echo $cat[0];?>" type="text" tabindex="2"  />
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
//$tipo= $_POST['tipo'];
 
$resultado = mysql_query("UPDATE categoriaFotos SET nombreCategoria='$nombre' WHERE idCategoriaFoto=$id",$link);
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
      
      
      
      
      