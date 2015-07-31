

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>




</head>

<body>



<?php

/*<?php Devolver_Valor($_POST['txtDni'])?>*/

	//recuperacion de la VArible m (tipo de turismo)
	$link = Conectarse();
// el path sera el nombre de la empresa
$id=$_GET['cod'];
$nick=$_GET['nick'];
$td=$_GET['td'];

$codigoU= mysql_query("select codUsuario from t_usuarios where nick='$nick'",$link);
$codigoUs= mysql_fetch_array($codigoU);

$consulta1= mysql_query("select nombre,apellidos,nick,pass,direccion,telefono,correo,tipo,codUsuario,codTienda from t_usuarios where codUsuario='$codigoUs[0]'",$link);
$resultado1= mysql_fetch_array($consulta1);

$consultaT= mysql_query("select nombre from t_tienda where codTienda='$resultado1[9]'",$link);
$resultadoT= mysql_fetch_array($consultaT);

?>

<form action="" method="post"  name="form2" id="form2">
        <p>
          Ingrese el nombre de usuario:
          <br />
          <input id="name" name="nombre" value="<?php echo $resultado1[0]; ?> " type="text" tabindex="2" />
        </p>
        
             
        <p>Ingrese los apellidos del Usuario:<br />
          <input id="name" name="apellidos" value="<?php echo $resultado1[1]; ?>" type="text" tabindex="2" />
        
</p>
        
               
        <p>Ingrese el nick del Usuario:<br />
          <input id="name" name="nick" value="<?php echo $resultado1[2]; ?>" type="text" tabindex="2" />        </p> 
        
        <p>
          Ingrese la contraseña del Usuario, se desea Cambiarlo:
          <br />
          <input id="name" name="pass" value="<?php echo $resultado1[3]; ?>" type="password" tabindex="2" />         
        </p>
        
         <p>
          Ingrese la dirección del usuario:
          <br />
          <input id="name" name="direccion" value="<?php echo $resultado1[4]; ?>" type="text" tabindex="2" />         
        </p>
        
        <p>
          Ingrese el teléfono del Usuario:
          <br />
          <input id="name" name="telefono" value="<?php echo $resultado1[5]; ?>" type="text" tabindex="2" />         
        </p>
         
                <p>
          Ingrese el Correo del Usuario:
          <br />
          <input id="name" name="correo" value="<?php echo $resultado1[6]; ?>" type="text" tabindex="2" />         
        </p>
        
        <?php 
		if($resultado1[7]==0)
		$valor1="checked";
		if($resultado1[7]==1)
		$valor2="checked";
	
		?>
        
          
    
    

        
        
        <p>
          <input class="button" type="submit" value="Modificar" id="aceptar" name="aceptar" tabindex="5" />

        </p>
      </form>



<?php

//codigo para la bajada de imagenes	
$aceptar = $_POST['aceptar'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$nick= $_POST['nick'];
$pass= $_POST['pass'];
$direccion= $_POST['direccion'];
$telefono= $_POST['telefono'];
$correo= $_POST['correo'];


if($aceptar)
{

		
			$resultado = mysql_query("UPDATE t_usuarios SET nombre='$nombre', apellidos='$apellidos', nick='$nick', pass='$pass', direccion='$direccion', telefono='$telefono', correo='$correo'  WHERE codUsuario=$resultado1[8]",$link);

			$my_error = mysql_error($link);

			if(!empty($my_error))
			{		
				echo "Ha habido un error al modificar los datos. $my_error";
			}
		 	else 
			{
					echo "Los datos han sido Modificados con Exito";
			}
	


        
}
			


?>


</body>
</html>