<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-es" lang="es-es" dir="ltr" >
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Sistema de Ventas y Facturacion - Administración</title>
  <!--aqui es para cambiar la imagen con que se mostrara en un icono pekeño-->
  <link href="imagen/itdecsa-itdecsa" rel="shortcut icon" type="image/x-icon" />
 
<link rel="stylesheet" href="css/general1.css" type="text/css" />



	<link rel="stylesheet" type="text/css" href="css/rounded.css" />


</head>
<body>
<?php
include("funciones.php");
include("../conexion.php");
$link = Conectarse();
?>



	<div class="tituloPrincipal">
		
			SISTEMA DE ADMINISTRACIÓN
		
	</div>
	<div id="content-box1">
		<div class="padding">
			<div id="element-box" class="login">
				<div class="t">
					<div class="t">
						<div class="t"></div>
					</div>
				</div>
				<div class="m">

					<h1>Acceso al Sistema de Administración!</h1>
					
							<div id="section-box">
			<div class="t">
				<div class="t">
					<div class="t"></div>
		 		</div>
	 		</div>
			<div class="m">
       
				<form action="" method="post" name="login" id="form-login" style="clear: both;">
     <p id="combo">
		
        
        
        
        
        
        <!--<input id="name" name="usuario" value="" type="text" tabindex="2" />-->
        <label for="modlgn_username">Nombre de usuario</label>
		<input name="usuario" id="name" type="text" class="inputbox" size="15" />
        <!--<input id="name" name="usuario" value="" type="text" tabindex="2" />-->
	</p>

	<p id="form-login-password">
	  <label for="modlgn_passwd">Contraseña</label>
		<input name="pass" id="name" type="password" class="inputbox" size="15" />
      
	</p>
		<p id="form-login-lang" style="clear: both;">
			</p>

	<div style="text-align:right;">
    
    <input class="button" type="submit" value="Acceder" id="acceder" name="acceder" tabindex="5" />
    
    </div >

    <!-- Codigo del Php para la conexion a la base de datos  -->
  <div style="background:#F00; color:#FFF;">  
    <?php



$nick=$_POST['usuario'];
$pass=$_POST['pass'];

//aqui encriptamos el nombre
$nick1= encripta($nick,"rayedgard");

if($_POST['acceder'])
{
	
	if ((!isset($nick) || $nick == '')&&(!isset($pass) || $pass == '')) 
	{
		echo "Faltan completar los campos";
	} 
	else
	{
	$consulta = mysql_query("select pass from usuarios where nicke='$nick'",$link);
	$row = mysql_fetch_array($consulta);
			if($row[0]==$pass)
			{
				echo "<meta http-equiv ='refresh' content ='0;url=admin/principal.php?nick=".$nick1."'>";	
				
			}
			else 
			{
			   echo "Usuario o Contraseña incorrectos, por favor intentelo de nuevo";
			}	
	}

}

?>
   <!--  Fin de la conexion--> 
    </div>
	</form>
				<div class="clr"></div>
			</div>
			<div class="b">
				<div class="b">
		 			<div class="b"></div>
				</div>
			</div>
		</div>
        
        
        
        <div id="section-box">
			<div class="t">
				<div class="t">
					<div class="t"></div>
		 		</div>
	 		</div>
			<div class="m">
            <div id="lock1"></div>
		  </div>
			<div class="b">
				<div class="b">
		 			<div class="b"></div>
				</div>
			</div>
		</div>
        
       
		
					<p>Usa un nombre de usuario y contraseña válido para poder tener acceso a la administración.</p>
					<p>
						<a href="../">Regresar a la página de inicio</a>
					</p>
				  <div id="lock"></div>
					<div class="clr"></div>
				</div>
				<div class="b">
					<div class="b">
						<div class="b"></div>
					</div>
				</div>
			</div>
       
			
		</div>
	</div>
	<div id="border-bottom"><div><div></div></div>
</div>
<div id="footer">
	<p class="copyright">
		<a href="http://www.itdecsa.com" target="_blank">©itdecsa. itdecsa.com <br />
Apv Capac Mocco A-6<br />
Teléfonos:             +51 84 272650      , 993026679, CORREO ELECTRONICO, informes@itdecsa.com</a>
	</p>
</div>


</body>
</html>
