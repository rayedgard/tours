

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
$consultaCat = mysql_query("select max(idCategoriaFoto) from categoriaFotos",$link);
$catt = mysql_fetch_array($consultaCat);
$idcat=$catt[0];
$id=$idcat+1;
?>
<!--Fin de la auto incrementacion-->


<!--Fin-->
<!--Formulario de registro de Datos-->
<form action="" method="post" enctype="multipart/form-data" name="form2" id="form2">
    <p>
    Ingrese el nombre de la CATEGORIA DE FOTOS:
<br />

   <input name="nombre" type="text"  value="Nombre de categoria..." onFocus="if(this.value == 'Nombre de categoria...') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Nombre de categoria...';}"/>


  </p>
  
  
 <p>
  <input class="button" type="submit" value="AGREGAR" id="aceptar" name="aceptar" tabindex="5"/>
  </p>
        
          <?php

$aceptar = $_POST['aceptar'];
if($aceptar)
{



//antes de enviar los caracteres que pasamos por la URL debemos ponerlo en buen recaudo encriptar
$nick1= encripta($nick,"rayedgard");

$nombre= $_POST['nombre'];
$path1="../imagenes/fotos/";	
//$tipo= $_POST['tipo'];

$resultado = mysql_query("INSERT INTO categoriaFotos (idCategoriaFoto,nombreCategoria) VALUES ('$id','$nombre')",$link);

$my_error = mysql_error($link);

		if(!empty($my_error))
		{		
			echo "Ha habido un error al insertar los valores. $my_error";
		}
		 else 
		{
			mkdir($path1.$nombre, 7777);
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