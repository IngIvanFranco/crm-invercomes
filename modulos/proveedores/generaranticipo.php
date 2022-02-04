<?php
require'funcionesphp/seguridad.php';
require'funcionesphp/conex.php';
if (empty($_REQUEST['id'])) {
   header("location: buscarorden.php");
}


?>
<!DOCTYPE html>
<html lang="esp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/generales.css">
    <link rel="stylesheet" href="css/generaranticipo.css">
    <link rel="stylesheet" href="css/grid.css">    
    <link rel="stylesheet" href="iconos/styles.css">
    

    
    <title>CRM-INVERCOMES</title>
</head>


<body>
<div class="container">
  <div class="trabajo">
   
  <h3>Orden de compra</h1>

  <table class="blueTable">
<thead>
<tr>
<th>Proveedor</th>
<th>Fecha</th>
<th>Valor</th>

</tr>
</thead>

<tbody>
 
<?php
$id= $_REQUEST['id'];

$sql = $db->query("SELECT sum(valor) FROM anticipos 
WHERE anticipos.id_ordencompra= $id ");
while ($row = $sql->fetch_assoc()) {
  $totalanticipos=$row['sum(valor)'];
}




$sql1 = $db->query("SELECT * FROM ordenesdecompra,proveedores
WHERE ordenesdecompra.id_ordenescompra= $id 
AND ordenesdecompra.id_proveedor = proveedores.id_proveedor");
while ($row = $sql1->fetch_assoc()) {
 
$valortotal= $row['valor_total'];


?>
<tr>
<td><?php  echo $row['nombre_proveedor'] ?></td>
<td><?php  echo $row['fecha_registro'] ?></td>
<td>$ <?php  echo number_format( $row['valor_total']) ?></td>

</tr>
<?php
}
?>


</tbody>
</table>

<h3>Anticipos</h1>
<table class="blueTable">
<thead>
<tr>
<th>Fecha</th>
<th>Estado</th>
<th>Forma de pago</th>
<th>Valor</th>

</tr>
</thead>
<tfoot>
  <tr>
    <td></td>
    <td></td>
    <td>Total</td>
    <td><?php echo number_format($totalanticipos)?></td>
  </tr>
</tfoot>
<tbody>
 
<?php
$id= $_REQUEST['id'];

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
?>


</tbody>
</table>

<br><br>


<?php



?>



<form action="funcionesphp/generaranticipo.php" method="post">
<input type="hidden" name="id" value="<?php echo $id ?>">
<input type="radio" name="modopago" id="modopago" class="input50 radio" value="Total"><label for="modopago" class="input50 tituloprov">pago total</label>
<input type="radio" name="modopago" id="modopago1" class="input50 radio" value="Parcial"><label for="modopago1" class="input50 tituloprov">pago parcial</label>
<input type="text" name="total" id="" value="$ <?php echo number_format( $valortotal - $totalanticipos) ?>" readonly class="total">
<input type="number" name="parcial" id="" class="parcial" placeholder="Escribe el valor a pagar" >
<select name="formapago" id="">
<option value="Consignacion">Consignacion</option>
<option value="Efectivo">Efectivo</option>

<option value="Transferencia Bancaria">Transferencia Bancaria</option>


</select>
<div class="contenbtn">
  <input type="submit" value="Registrar" class="btn_guardar">
</div>

</form>



  </div>
  <div class="cabecera">
<h1>Generar Anticipo</h1>
  </div>
  <div class="menu">
     
        <?php
        include'vistas/menu.php';
        ?>
  </div>
</div>
</body>
</html>