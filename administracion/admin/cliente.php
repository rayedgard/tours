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
  
   <input name="razon" type="text"  value="Municipalidad distrital de..." onFocus="if(this.value == 'Municipalidad distrital de...') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Municipalidad distrital de...';}"/>
  
  
  </p>
  
     <p>
    Ingrese DNI o RUC del cliente:
<br />
   <input name="ruc" type="text"  value="2089346712" onFocus="if(this.value == '2089346712') {this.value = '';}" onBlur="if (this.value == '') {this.value = '2089346712';}"/>

  </p>
  
       <p>
    Ingrese la dirección del cliente:
<br />

   <input name="direccion" type="text"  value="Calle Julio C. Tello S/N" onFocus="if(this.value == 'Calle Julio C. Tello S/N') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Calle Julio C. Tello S/N';}"/>
   

  </p>
  
       <p>
    Seleccione el departamento del Cliente:
<br />
<select name="ciudad">
        <option value="	AMAZONAS	">	AMAZONAS	</option>
        <option value="	ANCASH	">	ANCASH	</option>
        <option value="	APURIMAC	">	APURIMAC	</option>
        <option value="	AREQUIPA	">	AREQUIPA	</option>
        <option value="	AYACUCHO	">	AYACUCHO	</option>
        <option value="	CAJAMARCA	">	CAJAMARCA	</option>
        <option value="	CUSCO	">	CUSCO	</option>
        <option value="	HUANCAVELICA	">	HUANCAVELICA	</option>
        <option value="	HUANUCO	">	HUANUCO	</option>
        <option value="	ICA	">	ICA	</option>
        <option value="	JUNIN	">	JUNIN	</option>
        <option value="	LA LIBERTAD	">	LA LIBERTAD	</option>
        <option value="	LAMBAYEQUE	">	LAMBAYEQUE	</option>
        <option value="	LIMA	">	LIMA	</option>
        <option value="	LIMA-PROVINCIAS	">	LIMA-PROVINCIAS	</option>
        <option value="	LORETO	">	LORETO	</option>
        <option value="	MADRE DE DIOS	">	MADRE DE DIOS	</option>
        <option value="	MOQUEGUA	">	MOQUEGUA	</option>
        <option value="	PASCO	">	PASCO	</option>
        <option value="	PIURA	">	PIURA	</option>
        <option value="	PUNO	">	PUNO	</option>
        <option value="	SAN MARTIN	">	SAN MARTIN	</option>
        <option value="	TACNA	">	TACNA	</option>
        <option value="	TUMBES	">	TUMBES	</option>
        <option value="	UCAYALI	">	UCAYALI	</option>

</select>


  </p>
  
  
         <p>
    Ingrese El Correo Electronico del Cliente:
<br />
   <input name="correo" type="text"  value="ester04@hotmail.com" onFocus="if(this.value == 'ester04@hotmail.com') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'ester04@hotmail.com';}"/>
   

  </p>
  
  
           <p>
    Ingrese El Teléfono de contacto del Cliente:
<br />

   <input name="telefono" type="text"  value="084 234566" onFocus="if(this.value == '084 234566') {this.value = '';}" onBlur="if (this.value == '') {this.value = '084 234566';}"/>
   

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

$ciudad= $_POST['ciudad'];
$fecha=date("Y-m-d"); 

 

$resultado = mysql_query("INSERT INTO t_cliente (codCliente,razon,ruc,direccion,correo,telefono, fechaRegistro,ciudad) VALUES ('$id','$razon','$ruc','$direccion','$correo','$telefono','$fecha','$ciudad')",$link);

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
      
