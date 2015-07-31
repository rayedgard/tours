<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="../css/tablas.css" type="text/css" />
<link rel="stylesheet" href="../css/general1.css" type="text/css" />

<!--Establecemos la conexion-->
<?php

///...Nos conectamos y guardamos los datos en el link de conexion
include("../conexion.php"); 
$link = Conectarse();
$p=$_GET['p'];
$nick=$_GET['nick'];
$td=$_GET['td'];
?>





<!--Esta parte es para realizar que se auto incremente la id-->
<?php
// consulta para realizar el autoincremet de la tabla SECCION
$consultaSeccion = mysql_query("select max(codCliente) from t_cliente ",$link);
$seccion = mysql_fetch_array($consultaSeccion);
$idSeccion=$seccion[0];
$id=$idSeccion+1;
?>
<!--Fin de la auto incrementacion-->

	<div class="header icon-48-addedit">
Gestor de CLIENTE Nuevo
</div>
<!--Fin-->
<!--Formulario de registro de Datos-->
<form action="" method="post" enctype="multipart/form-data" name="form2" id="form2">
    <p>
    Ingrese el Nombre o Razon Social del Cliente:
<br />
  <input id="name2" name="razon" value="Optilentes S.A." type="text" tabindex="2"  />
  </p>
  
     <p>
    Ingrese DNI o RUC del cliente:
<br />
  <input id="name2" name="ruc" value="2089346712" type="text" tabindex="2"  />
  </p>
  
       <p>
    Ingrese la dirección del cliente:
<br />
  <input id="name2" name="direccion" value="Calle Tullumayu N° 123" type="text" tabindex="2"  />
  </p>
  
         <p>
    Ingrese El Correo Electronico del Cliente:
<br />
  <input id="name2" name="correo" value="Optilacer@hotmail.com" type="text" tabindex="2"  />
  </p>
  
  
           <p>
    Ingrese El Teléfono de contacto del Cliente:
<br />
  <input id="name2" name="telefono" value="084 234566" type="text" tabindex="2"  />
  </p>
  
  
  <p>
<input class="button" type="submit" value="AGREGAR CLIENTE" id="aceptar" name="aceptar" tabindex="5"/>
		</p>
        
          <?php

$aceptar = $_POST['aceptar'];
if($aceptar)
{

$razon= $_POST['razon'];
$ruc= $_POST['ruc'];
$direccion= $_POST['direccion'];
$telefono= $_POST['telefono'];
$correo= $_POST['correo'];



 

$resultado = mysql_query("INSERT INTO t_cliente (codCliente,razon,ruc,direccion,correo,telefono) VALUES ('$id','$razon','$ruc','$direccion','$correo','$telefono')",$link);

$my_error = mysql_error($link);

		if(!empty($my_error))
		{		
			echo "Ha habido un error al insertar los valores. $my_error";
		}
		 else 
		{
		
	
echo "<script languaje='javascript' type='text/javascript'>window.close();</script>";}
	} 


?>
          <?php
// mysql_close($link);// cerramos la conexion
?>
        </p>
      </form>
      
