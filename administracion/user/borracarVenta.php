<?php
session_start();
//error_reporting(E_ALL);
//@ini_set('display_errors', '1');
//con session_start() creamos la sesión si no existe o la retomamos si ya ha sido creada
extract($_GET);
//Como antes, usamos extract() por comodidad, pero podemos no hacerlo tranquilamente
$carro1=$_SESSION['carro1'];
//Asignamos a la variable $carro los valores guardados en la sessión
unset($carro1[$id]);
//la función unset borra el elemento de un array que le pasemos por parámetro. En este
//caso la usamos para borrar el elemento cuyo id le pasemos a la página por la url 
$_SESSION['carro']=$carro1;
//Finalmente, actualizamos la sessión, como hicimos cuando agregamos un producto y volvemos al catálogo
$nick=$_GET['nick'];
$td=$_GET['td'];
$p=$_GET['p'];
$q=$_GET['q'];
header("Location:principal.php?q=2&p=".$p."&nick=".$nick."&td=".$td."&".SID);

?>