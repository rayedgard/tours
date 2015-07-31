<!--Establecemos la conexion-->
<?php

///...Nos conectamos y guardamos los datos en el link de conexion
$link = Conectarse();
$p= $_GET['p'];
$nick=$_GET['nick'];
$td=$_GET['td'];
?>


<?php
$id= $_GET['cod'];

// consulta para realizar el modificado de la tabla
$consultaCategoria = mysql_query("SELECT razon,ruc,direccion,correo,telefono FROM t_cliente WHERE codCliente='$id'",$link);
$categoria = mysql_fetch_array($consultaCategoria);

?>




<form action="" method="post" enctype="multipart/form-data" name="form2" id="form2">





    <p>
    Ingrese el Nombre o Razon Social del Cliente:
<br />
  <input id="name2" name="razon" value="<?php echo $categoria[0]; ?>" type="text" tabindex="2"  />
  </p>
  
     <p>
    Ingrese DNI o RUC del cliente:
<br />
  <input id="name2" name="ruc" value="<?php echo $categoria[1]; ?>" type="text" tabindex="2"  />
  </p>
  
       <p>
    Ingrese la dirección del cliente:
<br />
  <input id="name2" name="direccion" value="<?php echo $categoria[2]; ?>" type="text" tabindex="2"  />
  </p>
  
         <p>
    Ingrese El Correo Electronico del Cliente:
<br />
  <input id="name2" name="correo" value="<?php echo $categoria[2]; ?>" type="text" tabindex="2"  />
  </p>
  
  
           <p>
    Ingrese El Teléfono de contacto del Cliente:
<br />
  <input id="name2" name="telefono" value="<?php echo $categoria[3]; ?>" type="text" tabindex="2"  />
  </p>





    <p>
    <input class="button" type="submit" value="MODIFICAR" id="aceptar" name="aceptar" tabindex="5"/>
		</p>
        </p>
      
      
      <?php

//codigo para la bajada de imagenes	
$aceptar = $_POST['aceptar'];
if($aceptar)
{

$razon= $_POST['razon'];
$ruc= $_POST['ruc'];
$direccion= $_POST['direccion'];
$telefono= $_POST['telefono'];
$correo= $_POST['correo'];

$resultado = mysql_query("UPDATE t_cliente SET razon='$razon' ,ruc='$ruc',direccion='$direccion',correo='$correo',telefono='$telefono' WHERE codCliente=$id",$link);

$my_error = mysql_error($link);

		if(!empty($my_error))
		{		
			echo "Ha habido un error al insertar los valores. $my_error";
		}
		 else 
		{
			
echo "<meta http-equiv ='refresh' content='0;url=principal.php?q=1&p=".$p."&nick=".$nick."&td=".$td."'>";
		} 
	

	
}
	
	

?>
      
      
      </form>
      
      
      
      
      
      