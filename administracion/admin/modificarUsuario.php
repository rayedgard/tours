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
$consultaUser = mysql_query("SELECT nombres,apellidoP,apellidoM,nicke,pass,correo,telefono FROM usuarios WHERE id='$id'",$link);
$user = mysql_fetch_array($consultaUser);


?>




<!--Formulario de registro de Datos-->
<form action="" method="post" enctype="multipart/form-data" name="form2" id="form2">
    <p>
    Ingrese el nombre del Usuario, para modificar:
<br />
  <input id="name2" name="nombre" value="<?php echo $user[0];?>" type="text" tabindex="2"  />
  </p>
   <p>
    Ingrese el apellido Paterno para modificar:
<br />
  <input id="name2" name="paterno" value="<?php echo $user[1];?>" type="text" tabindex="2"  />
 
  </p>
  
   <p>
    Ingrese el apellido Materno para modificar:
<br />
  <input id="name2" name="materno" value="<?php echo $user[2];?>" type="text" tabindex="2"  />
   </p>
 
   <p>
    Ingrese el Usuario del sistema:
<br />
  <input id="name2" name="nickk" value="<?php echo $user[3];?>" type="text" tabindex="2"  />
   </p>
    <p>
    Ingrese la contraseña nueva si quiere modificar:
<br />
  <input id="name2" name="pass" value="<?php echo $user[4];?>" type="password" tabindex="2"  />
   </p>
      <p>
    Ingrese el correo electronico si quiere modificar:
<br />
  <input id="name2" name="email" value="<?php echo $user[5];?>" type="text" tabindex="2"  />
   </p>
     <p>
    Ingrese teléfono de contacto:
<br />
  <input id="name2" name="telefono" value="<?php echo $user[6];?>" type="text" tabindex="2"  />
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
$paterno= $_POST['paterno'];
$materno= $_POST['materno'];
$nickk= $_POST['nickk'];
$pass= $_POST['pass'];
$correo= $_POST['email'];
$telefono= $_POST['telefono'];
//$tipo= $_POST['tipo'];
 
$resultado = mysql_query("UPDATE usuarios SET nombres='$nombre',apellidoP='$paterno',apellidoM='$materno',nicke='$nickk',pass='$pass',correo='$correo' , telefono='$telefono' WHERE id=$id",$link);
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
      
      
      
      
      