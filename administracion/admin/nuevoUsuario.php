

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
$consultaUsuario = mysql_query("select max(id) from usuarios",$link);
$usuarios = mysql_fetch_array($consultaUsuario);
$idUser=$usuarios[0];
$id=$idUser+1;
?>
<!--Fin de la auto incrementacion-->


<!--Fin-->
<!--Formulario de registro de Datos-->
<form action="" method="post" enctype="multipart/form-data" name="form2" id="form2">
    <p>
    Ingrese el nombre del USUARIO:
<br />

   <input name="nombre" type="text"  value="Nombre de USUARIO..." onFocus="if(this.value == 'Nombre de USUARIO...') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Nombre de USUARIO...';}"/>


  </p>
  
  <p>
    Ingrese el apellido Paterno del USUARIO:
<br />
 
  
   <input id="name2" name="paterno" type="text"  value="Apellido Paterno" onFocus="if(this.value == 'Apellido Paterno') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Apellido Paterno';}"/>
   <p>
   
   
    <p>
    Ingrese el apellido Materno del USUARIO:
<br />
 
  
   <input id="name2" name="materno" type="text"  value="Apellido Materno" onFocus="if(this.value == 'Apellido Materno') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Apellido Materno';}"/>
   <p>
   
     <p>
    Ingrese el correo del USUARIO: ( * ) Este dato es importante para habilitar al USUARIO: 
<br />
 
  
   <input id="name2" name="correo" type="text"  value="E-mail" onFocus="if(this.value == 'E-mail') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'E-mail';}"/>
   <p>
   
   
  <input class="button" type="submit" value="AGREGAR USUARIO" id="aceptar" name="aceptar" tabindex="5"/>
  </p>
        
          <?php

$aceptar = $_POST['aceptar'];
if($aceptar)
{



//antes de enviar los caracteres que pasamos por la URL debemos ponerlo en buen recaudo encriptar
$nick1= encripta($nick,"rayedgard");

$nombre= $_POST['nombre'];
$paterno= $_POST['paterno'];
$materno= $_POST['materno'];
$correo=$_POST['correo'];
$pass=generarCodigo(15);
// TIPO=0 PARA DESHABILITAR CIERTAS FUNSIONES


//$tipo= $_POST['tipo'];

$resultado = mysql_query("INSERT INTO usuarios (id,nombres,apellidoP,apellidoM,nicke, pass, correo) VALUES ('$id','$nombre','$paterno','$materno','$nombre','$pass','$correo')",$link);

$my_error = mysql_error($link);

		if(!empty($my_error))
		{		
			echo "Ha habido un error al insertar los valores. $my_error";
		}
		 else 
		{
		
		
		
		
		
		
		
$destinatario = $correo; 
$asunto = "Activación de Registro de USUARIOS del sistema ";  
$cuerpo ='

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
#apDiv1 {
	position:absolute;
	width:586px;
	height:423px;
	z-index:1;
	left: 35px;
	top: 15px;
	background-color: #009966;
}
#apDiv2 {
	position:absolute;
	width:240px;
	height:153px;
	z-index:1;
	top: 7px;
	left: 0px;
}
#apDiv3 {
	position:absolute;
	width:564px;
	height:205px;
	z-index:2;
	left: 10px;
	top: 170px;
}
#apDiv4 {
	position:absolute;
	width:321px;
	height:133px;
	z-index:3;
	left: 247px;
	top: 25px;
}
#apDiv1 #apDiv4 div {
	font-family: Tahoma, Geneva, sans-serif;
	color: #000;
	font-weight: bold;
	font-size: 20px;
}
</style>
</head>



<body>
<div id="apDiv1">
  <div id="apDiv2"><img src="http://www.huaynapicchucusco.com/images/logo.png" width="200" height="184" /></div>
  <div id="apDiv3">
    <p>'.$nombre.' '.$paterno.',</p>
    <p>Gracias por registrarse con nosotros, su cuenta de acceso a nuestra area de USUARIOS al sistema de administración de huaynapicchucusco.com ha sido creada, ahora puede ingresar al area de administración con los siguientes datos:</p>
    <p>Usuario: '.$nombre.'<br />
      Contraseña: '.$pass.'</p>
    <p>Para ingresar, visite <a href="http://www.huaynapicchucusco.com/administracion/index.php" target="_blank">http://www.huaynapicchucusco.com/administracion/index.php</a><br />
    </p>
</div>
  <div id="apDiv4"> 
    <div align="center">
      <p>&nbsp;</p>
      <p>SISTEMA DE CONFIRMACION DE REGISTRO A HUAYNAPUCCHUCUSCO.COM</p>
    </div>
  </div>
</div>
</body>
</html>


';

//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

//dirección del remitente 
$headers .= "From: Sistema de registro de USUARIOS  <huaynapicchucusco.com>\r\n"; 

//dirección de respuesta, si queremos que sea distinta que la del remitente 
$headers .= "Reply-To: info@huaynapicchucusco.com \r\n"; 

//ruta del mensaje desde origen a destino 
$headers .= "Return-path: info@huaynapicchucusco.com\r\n"; 

//direcciones que recibián copia 
//$headers .= "Cc: maria@desarrolloweb.com\r\n"; 

//direcciones que recibirán copia oculta 
//$headers .= "Bcc: pepe@pepe.com,juan@juan.com\r\n"; 

mail($destinatario,$asunto,$cuerpo,$headers); 


echo '<font color="#009900" size="+2">Su registro se realizo satisfactoriamente, por favor reavise su correo electronico para activar su cuenta</font>';


			echo "<meta http-equiv ='refresh' content='10;url=principal.php?q=1&p=".$p."&nick=".$nick1."'>";
		
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