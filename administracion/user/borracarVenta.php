<?php
session_start();
//error_reporting(E_ALL);
//@ini_set('display_errors', '1');
//con session_start() creamos la sesi�n si no existe o la retomamos si ya ha sido creada
extract($_GET);
//Como antes, usamos extract() por comodidad, pero podemos no hacerlo tranquilamente
$carro1=$_SESSION['carro1'];
//Asignamos a la variable $carro los valores guardados en la sessi�n
unset($carro1[$id]);
//la funci�n unset borra el elemento de un array que le pasemos por par�metro. En este
//caso la usamos para borrar el elemento cuyo id le pasemos a la p�gina por la url 
$_SESSION['carro']=$carro1;
//Finalmente, actualizamos la sessi�n, como hicimos cuando agregamos un producto y volvemos al cat�logo
$nick=$_GET['nick'];
$td=$_GET['td'];
$p=$_GET['p'];
$q=$_GET['q'];
header("Location:principal.php?q=2&p=".$p."&nick=".$nick."&td=".$td."&".SID);

?>