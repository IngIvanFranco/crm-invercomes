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
    <link rel="stylesheet" href="css/buscarproveedor.css">
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
     

  <table id="example" style="width: 90% ;" class="blueTable"  >
        <thead>
            <tr>
                <th>#id</th>
                <th>nit</th>
                <th>nombre</th>
                <th>linea</th>
                <th>telefeno</th>
                <th>correo</th>
                <th>ciudad</th>
                <th>   </th>
		
                
            </tr>
        </thead>
        <tbody>

        <?php
$sql = $db->query("SELECT * FROM proveedores WHERE id_usradmin = $ccusr");
while ($row = $sql->fetch_assoc()) {
    echo '<tr>
    <td>  '.$row['id_proveedor'].'</td>
    <td>'.$row['nit_proveedor'].'</td>
    <td>'.$row['nombre_proveedor'].'</td>
    <td>'.$row['linea'].'</td>
    <td>'.$row['telefono_proveedor'].'</td>
    <td>'.$row['Correo_proveedor'].'</td>
    <td>'.$row['ciudad'].'</td>
    
	<td> <img src="../../../marketplaceinvercomes/img/product/'.$row['id_proveedor'].'.jpg" style="width: 80px" </td>
    </tr>';
}
?>


</tbody>

<tfoot>
            <tr>
            <th>#id</th>
                <th>nit</th>
                <th>nombre</th>
                <th>linea</th>
                <th>telefeno</th>
                <th>correo</th>
                <th>ciudad</th>
                <th>    </th>
            </tr>
        </tfoot>
    </table>












  </div>
  <div class="cabecera">
  <h1>Proveedores</h1>
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