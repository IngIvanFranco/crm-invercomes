<?php
require'funcionesphp/seguridad.php';
require'funcionesphp/conex.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/buscarorden.css">
    <link rel="stylesheet" href="css/generales.css">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="iconos/styles.css">


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">


<title>CRM-INVERCOMES</title>
</head>
<body>
<div class="container">
  <div class="trabajo">
     

  <table id="ordenes" style="width: 90% ;" class="blueTable" >
        <thead>
            <tr>
                <th>#id</th>
                <th>valor</th>
                <th>fecha</th>
                <th>estado</th>
                <th>proveedor</th>
              
                <th>   </th>
                
            </tr>
        </thead>
        <tbody>

        <?php
$sql = $db->query("SELECT * FROM ordenesdecompra,proveedores
WHERE ordenesdecompra.id_proveedor = proveedores.id_proveedor
AND ordenesdecompra.id_usradmin = $ccusr");
while ($row = $sql->fetch_assoc()) {
    echo '<tr>
    <td>  '.$row['id_ordenescompra'].'</td>
    <td>'. number_format( $row['valor_total']).'</td>
    <td>'.$row['fecha_registro'].'</td>';

     if ($row['status'] == 1) {
        echo '<td>Activo</td>';
    } else {
        echo '<td>Inactivo</td>';
    }

   echo ' <td>'.$row['nombre_proveedor'].'</td>
   
    <td class="special"> <a href="verorden.php?id='.$row['id_ordenescompra'].'"> ver </a></td>
    </tr>';
}
?>


</tbody>

<tfoot>
            <tr>
            <th>#id</th>
                <th>valor</th>
                <th>fecha</th>
                <th>estado</th>
                <th>proveedor</th>
              
                <th>   </th>
            </tr>
        </tfoot>
    </table>












  </div>
  <div class="cabecera">
  <h1>Ordenes de compra</h1>
  </div>
  <div class="menu">
     
        <?php
        include'vistas/menu.php';
        ?>
  </div>
</div>
</body>
<script src="js/datable.js"></script>
</html>