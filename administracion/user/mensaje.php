
<?php
  $p = $_GET['p'];


  if($p==2)
  {$titul="Secciones";}
  if($p==3)
  {$titul="Categorias";}
  if($p==9)
  {$titul="Servicios o Productos";}
  
?>
<div class="mensajePaginas">
<?php
echo "PRIMERO CREE ".$titul;
?>

