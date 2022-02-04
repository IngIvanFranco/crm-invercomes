<?php
require'funcionesphp/seguridad.php';
require'funcionesphp/conex.php';
if (!isset($_REQUEST['id'])) {
  header("location: buscarorden.php");
}
?>
<!DOCTYPE html>
<html lang="esp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/verorden.css">
    <link rel="stylesheet" href="css/generales.css">
    <link rel="stylesheet" href="css/grid.css">    
    <link rel="stylesheet" href="iconos/styles.css">
    
    <title>CRM-INVERCOMES</title>
</head>
<body>
<div class="container">
  <div class="trabajo">
    
 



  <h2>Proveedor</h2>

<table class="blueTable">
<thead>
<tr>
<th>Proveedor</th>
<th>Nit</th>
<th>Correo</th>
<th>Telefono</th>
<th>Web</th>
<th>Ciudad</th>
</tr>
</thead>
<tbody>
 
<?php
$id= $_REQUEST['id'];







$sql1 = $db->query("SELECT * FROM ordenesdecompra,proveedores
WHERE ordenesdecompra.id_ordenescompra= $id 
AND ordenesdecompra.id_proveedor = proveedores.id_proveedor");
while ($row = $sql1->fetch_assoc()) {
  $valortotalorden = $row['valor_total'];

   
?>
<tr>
<td><?php  echo $row['nombre_proveedor'] ?></td>
<td><?php  echo $row['nit_proveedor'] ?></td>
<td><?php  echo $row['Correo_proveedor'] ?></td>
<td><?php  echo $row['telefono_proveedor'] ?></td>
<td><?php  echo $row['web_proveedor'] ?></td>
<td><?php  echo $row['ciudad'] ?></td>
</tr>
<?php
}
?>


</tbody>
</table>

<h2>Productos</h2>

<table class="blueTable">
<thead>
<tr>
<th>Bien o servicio</th>
<th>Descripcion</th>
<th>Cantidad</th>
<th>Valor total</th>

</tr>
</thead>
<tfoot>
  <td> </td>
  <td> </td>
  <td>Total</td>
  <td>$ <?php echo number_format($valortotalorden) ?></td>
</tfoot>
<tbody>


<?php



$sql = $db->query("SELECT productos.nombre_producto,productos.descripcion_producto,detalle_ordencompra.cantidad,detalle_ordencompra.valor FROM `ordenesdecompra`, detalle_ordencompra, productos 
WHERE ordenesdecompra.id_ordenescompra= $id
AND ordenesdecompra.id_ordenescompra = detalle_ordencompra.id_ordencompra
AND productos.id_producto = detalle_ordencompra.producto_id ");
while ($row = $sql->fetch_assoc()) {
$valortotal=$row['valor'] * $row['cantidad'];

 


?>
<tr>
<td><?php  echo $row['nombre_producto'] ?></td>
<td><?php  echo $row['descripcion_producto'] ?></td>
<td><?php  echo $row['cantidad'] ?></td>
<td>$ <?php  echo number_format( $valortotal) ?></td></tr>
<?php
}
?>


</tbody>
</table>

<h2>Anticipos</h2>

<table class="blueTable">
<thead>
<tr>
<th>Fecha</th>
<th>Estado</th>
<th>Forma de pago</th>
<th>Valor total</th>

</tr>
</thead>

<tbody>


<?php




$sql = $db->query("SELECT * FROM anticipos 
WHERE anticipos.id_ordencompra= $id ");
while ($row = $sql->fetch_assoc()) {


 




?>
<tr>
<td><?php  echo $row['fecha_registro'] ?></td>
<td><?php  echo $row['estado'] ?></td>
<td><?php  echo $row['forma_pago'] ?></td>
<td>$ <?php  echo number_format( $row['valor']) ?></td>
</tr>
<?php
}

$sql = $db->query("SELECT sum(valor) FROM anticipos 
WHERE anticipos.id_ordencompra= $id ");
while ($row = $sql->fetch_assoc()) {
  $totalanticipos=$row['sum(valor)'];
}
  ?>

</tbody>
<tfoot>
  <td> </td>
  <td> </td>
  <td>Total</td>
  <td>$ <?php echo number_format($totalanticipos) ?></td>
</tfoot>
</table>


<div class="contenedorbtn">
<a href="buscarorden.php" class="btn_volver">Volver</a>

<?php
if (($valortotalorden-$totalanticipos)>0) {
 
?>
<a href="generaranticipo.php?id=<?php echo $id ?>" class="btn_guardar">Generar Anticipo</a>

<?php
}
?>
  <a href="imprimiblespdf/ordenencompra.php?id=<?php echo $id ?>" class="btn_add">Generar Pdf</a>
</div>

  </div>
  <div class="cabecera">
<h1>orden de compra</h1>
  </div>
  <div class="menu">
     
        <?php
        include'vistas/menu.php';
        ?>
  </div>
</div>
</body>
</html>