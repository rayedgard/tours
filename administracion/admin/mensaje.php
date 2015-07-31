
<?php
  $p = $_GET['p'];


  if($p==1)
  {$titul=" VIDEO";}
  if($p==2)
  {$titul="a NOTICIA";}
  if($p==3)
  {$titul="a PUBLICIADAD";}
  if($p==5)
  {$titul=" PERFIL";}
  if($p==7)
  {$titul=" PAQUETE";}
  
?>
<div class="mensajePaginas">
<?php
echo "Este elemento no se puede eliminar porque se esta usando en algun".$titul;
?>

