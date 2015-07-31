<meta http-equiv="refresh" content="5;URL=./principal.php?p=7&nick=<?php echo $nick;?>&td=<?php echo $td;?>&q=2" >
<div class="compras" align="center">
<H1>LISTA DE PRODUCTOS AGREGADOS A LA CESTA
<a href="javascript:Abrir_ventana('buscarVenta.php?p=<?php echo $p;?>&nick=<?php echo $nick;?>&td=<?php echo $td;?>')" title="BUSQUEDA DE PRODUCTOS"><img src="../imagen/Find.png" width="58" height="51" border="0"></a></h1>

<?php 
$nick=$_GET['nick'];
$td=$_GET['td'];
$p=$_GET['p'];
if($carro1){
?>

<table width="800" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr bgcolor="#00CC00" class="tit">
   <td width="103">N°</td> 
    <td width="300">Producto</td>
    <td width="83">Precio</td>
    <td colspan="2" align="center">Cantidad de Unidades</td>
    <td width="100" align="center">subtotal</td>
    <td width="100" align="center">igv</td>
    <td width="100" align="center">costo total</td>
    <td width="83" align="center">Borrar</td>
    <td width="135" align="center">Actualizar</td>
  </tr>
  <?php
  $color=array("#ffffff","#F0F0F0");
  $contador=0;
  $igvTotal=0;
  $subTotal=0;
  $Total=0;
  
   foreach($carro1 as $k => $v){
	$contador++;
	$igvTotal=$igvTotal + $v['igv'];
  	$subTotal=$subTotal + $v['subtotal'];
  	$Total=$Total + $v['total'];
    ?>
<form name="a<?php echo $v['codProducto'] ?>" method="post" action="agregaVenta.php?m=1&p=<?php echo $p; ?>&nick=<?php echo $nick; ?>&td=<?php echo $td; ?>&id=<?php echo $v['codProducto'] ?>&<?php echo SID ?>" id="a<?php echo $v['codProducto'] ?>" enctype="multipart/form-data">
    <tr bgcolor="<?php echo $color[$contador%2]; ?>" > 
      <td><?php echo $contador; ?></td>
      <td><?php echo $v['producto'] ?></td>
      <td align="center"><?php echo $v['precio'] ?></td>
      <td align="center"><?php echo $v['cantidad'] ?></td>
      <td width="112" align="center"> 
        <input name="cantidad" type="text" id="cantidad" value="<?php echo $v['cantidad'] ?>" size="8">
        <input name="id" type="hidden" id="id" value="<?php echo $v['codProducto'] ?>"> </td>
        
        <td align="center"> <?php echo number_format($v['subtotal'] ,2)?></td> 
        <td align="center"><?php echo number_format($v['igv'] ,2) ?></td>
        <td align="center"><?php echo number_format($v['total'] ,2) ?></td>
      <td align="center"><a href="borracarVenta.php?&id=<?php echo $v['codProducto']?>&p=<?php echo $p;?>&nick=<?php echo $nick;?>&td=<?php echo $td;?>"><img src="../imagen/bor.png" width="30" height="30" border="0" title="Eliminar de la lista"></a></td>
      <td align="center"> 
       
        <input name="imageField" type="image" src="../imagen/act.png" width="20" height="30" border="0" title="Actualizar Lista" ></td>
  </tr>
  </form>
  

<?php }?>
</table>

<div align="center"><span class="prod">Total de Productos Pedidos: <?php echo count($carro1); ?></span> 
</div><br>
<div align="center"><span class="prod">Sub-Total: S/.<?php echo number_format($subTotal,2); ?></span> 
</div><br>
<div align="center"><span class="prod">IGV: S/.<?php echo number_format($igvTotal,2); ?></span> 
</div><br>

<div align="center"><span class="prod">Costo Total: S/.<?php echo number_format($Total,2); ?></span> 

</div><br>


<?php }else{ ?>
<p align="center"> <span class="prod">No hay productos seleccionados</span> <a href="javascript:Abrir_ventana('buscarVenta.php?p=<?php echo $p;?>')" title="BUSQUEDA DE PRODUCTOS"><img src="../imagen/Find.png" width="58" height="51" border="0"></a> 
  <?php }?>
</p>


</div> 


<div style="background:#CCC;" align="center">
<form action="almacenaVenta.php?p=<?php echo $p; ?>&nick=<?php echo $nick; ?>&td=<?php echo $td; ?>&cod=<?php echo $v['codProducto']?>&sub=<?php echo $subTotal; ?>&igv=<?php echo $igvTotal; ?>&t=<?php echo $Total; ?>" method="post" enctype="multipart/form-data" name="form2" id="form2">
 <p>
           <input class="button" type="submit" value="REALIZAR VENTA" id="aceptar" name="aceptar" tabindex="5"/>
		</p>
         <p>
           <input class="button" type="submit" value="ELIMINAR VENTA" id="elimina" name="elimina" tabindex="5"/>
		</p>
  </form>     
<?php
$elimina = $_POST['elimina'];
if($elimina)
{
	session_destroy();
}
?>
<div>
