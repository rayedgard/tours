

<!--Establecemos la conexion-->
<?php

///...Nos conectamos y guardamos los datos en el link de conexion
$link = Conectarse();
$p= $_GET['p'];
?>


<?php
$id= $_GET['cod'];
$nick=$_GET['nick'];
$td=$_GET['td'];
// consulta para realizar el modificado de la tabla

		
?>



<form action="" method="post" enctype="multipart/form-data" name="form2" id="form2">

   <p>
    Seleccione la RAZON SOCIAL O NOMBRE del CLIENTE:
<br />
  <select name="proveedor" >
           
    <?php 

$consulta2 ="SELECT razon ,codCliente FROM t_cliente ORDER BY razon ASC"; 
$resultado2 = mysql_query($consulta2,$link);

	//nombre del titulo
	$razon=array();
	$codCliente=array();

while($row2 = mysql_fetch_array($resultado2))
		{
		array_push($razon,$row2[0]);
		array_push($codCliente,$row2[1]);
		}
for($i=0;$i<count($codCliente);$i++)
{
echo ' <option value="'.$codCliente[$i].'">'.$razon[$i].'</option>';
}
?>
<!--Fin de la seleccion-->

            </select>
    
    
    <a href="javascript:Abrir_ventana('cliente.php?p=<?php echo $p;?>&nick=<?php echo $nick;?>&td=<?php echo $td;?>')" title="BUSQUEDA DE PRODUCTOS"><img src="../imagen/add.png" width="28" height="26" border="0"></a>
   </p>
   
   
   
     <p>
    Ingrese el Número de Factura: Ejm.
<br />
  <input id="name2" name="factura" value="001-00456" type="text" tabindex="2"  />
  </p>
  
  
  <p>
   Seleccione el estado del Producto: 
<br />
    <select  name="estado">
        <option value="1">Articulo Nuevo</option>
        <option value="2">Articulo Usado</option>
        <option value="3">Articulo Defectuoso</option>
      	
     </select>
  </p>
      <p>
    <input class="button" type="submit" value="ACTUALIZAR VENTA" id="aceptar" name="aceptar" tabindex="5"/>
  </p>
      
      
      <?php

//codigo para la bajada de imagenes	
$aceptar = $_POST['aceptar'];
$nick=$_GET['nick'];
if($aceptar)
{
$prove= $_POST['proveedor'];
$factura= $_POST['factura'];
$estado= $_POST['estado'];
 
 $link = Conectarse();
$consultaUsuarios= mysql_query("SELECT codUsuario FROM t_usuarios WHERE nick='$nick'",$link);
$usuarios = mysql_fetch_array($consultaUsuarios);
 
 
$resultado = mysql_query("UPDATE t_venta SET codCliente='$prove', codVendedor='$usuarios[0]', codTienda='$td', estado='$estado', nroFactura='$factura' WHERE codVenta=$id",$link);
$my_error = mysql_error($link);
		if(!empty($my_error))
		{		
			echo "Ha habido un error al ACTUALIZAR los valores DE LA VENTA. $my_error";
		}
		 else 
		{
	
			echo "<meta http-equiv ='refresh' content='0;url=principal.php?q=1&p=".$p."&nick=".$nick."&td=".$td."'";
		
	
			
		} 
	} 
	
//fin de condision foto

?>
      

      
      </form>      
      
      
      
      