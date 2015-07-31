<?php 
session_start();
//error_reporting(E_ALL);
//@ini_set('display_errors', '1');
//con session_start() creamos la sesión si no existe o la retomamos si ya ha sido creada
extract($_REQUEST);
//la función extract toma las claves de una matriz asoiativa y las convierte en nombres de variable,
//asignándoles a esas variables valores iguales a los que tenía asociados en la matriz. Es decir, convierte a $_GET['id'] en $id,
//sin que tengamos que tomarnos el trabajo de escribir $id=$_GET['ID']; 
include('../conexion.php');
$link = Conectarse();
//incluímos la conexión a nuestra base de datos
if(!isset($cantidad)){$cantidad=1;}
//Como también vamos a usar este archivo para actualizar las cantidades,
//hacemos que cuando la misma no esté indicada sea igual a 1
$id=$_GET["id"];
$consulta = mysql_query("SELECT codProducto,precioCompra,nombre,codigo FROM t_producto WHERE codProducto='".$id."'",$link);
$row= mysql_fetch_array($consulta);
//Si ya hemos introducido algún producto en el carro lo tendremos guardado temporalmente
//en el array superglobal $_SESSION['carro'], de manera que rescatamos los valores de dicho array
//y se los asignamos a la variable $carro, previa comprobación con isset de que $_SESSION['carro']
//ya haya sido definida
if(isset($_SESSION['carro1']))
$carro1=$_SESSION['carro1'];
//Ahora introducimos el nuevo producto en la matriz $carro, utilizando como índice el id del producto
//en cuestión, encriptado con md5. Utilizamos md5 porque genera un valor alfanumérico que luego,
//cuando busquemos un producto en particular dentro de la matriz, no podrá ser confundido con la posición
//que ocupa dentro de dicha matriz, como podría ocurrir si fuera sólo numérico.
//Cabe aclarar que si el producto ya había sido agregado antes, los nuevos valores que le asignemos reemplazarán
//a los viejos. 
//Al mismo tiempo, y no porque sea estrictamente necesario sino a modo de ejemplo, guardamos más de un valor 
//en la variable $carro, valiéndonos de nuevo de la herramienta array.
$subtotal=$cantidad*$row[1];
$igv=$subtotal*0.18;
$total=$subtotal+$igv;
$carro1[$id]=array('codProducto'=>$id,'producto'=>$row[2],'cantidad'=>$cantidad,'precio'=>$row[1],'subtotal'=>$subtotal,'igv'=>$igv,'total'=>$total);
//Ahora dentro de la sesión ($_SESSION['carro']) tenemos sólo los valores que teníamos (si es que teníamos alguno) antes de ingresar
//a esta página y en la variable $carro tenemos esos mismos valores más el que acabamos de sumar. De manera que 
//tenemos que actualizar (reemplazar) la variable de sesión por la variable $carro.
$_SESSION['carro1']=$carro1;
//Y volvemos a nuestro catálogo de artículos. La cadena SID representa al identificador de la sesión, que, dependiendo 
//de la configuración del servidor y de si el usuario tiene o no activadas las cookies puede no ser necesario pasarla por la url.
//Pero para que nuestro carro funcione, independientemente de esos factores, conviene escribirla siempre.
//header("Location:mostrar.php?".SID);
$nick=$_GET['nick'];
$td=$_GET['td'];
$m=$_GET['m'];
$p=$_GET['p'];
if($m==1)
{header("Location:principal.php?q=2&nick=".$nick."&td=".$td."&p=".$p."&".SID);}
else if($m==0)
{echo "<script languaje='javascript' type='text/javascript'>window.close();</script>";}
?>