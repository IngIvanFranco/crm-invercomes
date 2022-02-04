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
    <link rel="stylesheet" href="css/cliente.css">
    <link rel="stylesheet" href="css/generales.css">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="iconos/styles.css">
    

    
   
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">
    <script src="js/jquery/jquery-3.3.1.min.js"></script>
    <script src="js/popper/popper.min.js"></script>
    <script src="js/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/datatables/datatables.min.js"></script>    


<title>CRM-INVERCOMES</title>
</head>
<body>
<div class="container">
  <div class="trabajo" >
     
  <a class="btn_crear" href="#modal" id="show-modal"><img src="img/add_box_black_24dp.svg" alt=""></a>
  <table id="tablaclientes" style="width: 90% ;" class="blueTable table table-striped table-bordered table-condensed"  >
        <thead>
            <tr>
                
                <th>nit</th>
                <th>nombre</th>
                <th>ciudad</th>
                <th>direccion</th>
                <th>contacto</th>
                <th>telefeno</th>
                <th>correo</th>
                <th>web</th>
                <th>   </th>
                
            </tr>
        </thead>
        <tbody>

  
</tbody>

<tfoot>
            <tr>
            
                
            <th>nit</th>
                <th>nombre</th>
                <th>ciudad</th>
                <th>direccion</th>
                <th>contacto</th>
                <th>telefeno</th>
                <th>correo</th>
                <th>web</th>
                <th>   </th>
            </tr>
        </tfoot>
    </table>




    <aside id="modal" class="modal">

<div class="content-modal">
   <header>
      <a href="#" class="close-modal">X</a>
      <h2>Registrar Cliente </h2>
   </header>
   <article>
     <form id="formcliente">
      <input type="hidden" id="usr" value="<?php echo $ccusr ?>">
      <input type="text" name="cliente" id="cliente" class="input50" placeholder="Nombre cliente">
      <input type="number" name="nit" id="nit" class="input50" placeholder="Nit cliente">
      <input type="text" name="direccion" id="direccion" class="input100" placeholder="Direccion cliente">
      <select name="" id="ciudad" class="input100" required>
<?php
$sql = $db->query("SELECT * FROM municipios,departamentos WHERE municipios.departamento_id = departamentos.id_departamento");
while ($row = $sql->fetch_assoc()) {
    echo '<option value="'. $row['municipio'].'-'.$row['departamento'].'">'. utf8_decode( $row['municipio']).'-'. utf8_decode($row['departamento']).'</option>';
}
?>
</select>
<input type="text" name="contacto" id="contacto" class="input50" placeholder="Contacto cliente">
<input type="number" name="telefono" id="telefono" class="input50" placeholder="Telefono cliente">
<input type="email" name="correo" id="correo" class="input50" placeholder="Correo cliente">
<input type="text" name="web" id="web" class="input50" placeholder="Web cliente">


<div class="conten_btn">

<a class="btn_guardar" href="#" id="guardar" ><img src="img/save_black_24dp.svg" alt=""></a>

</div>
</form>
   </article>
</div>


</aside>






  </div>
  <div class="cabecera">
  <h1>Clientes</h1>
 
  </div>
  <div class="menu">
     
        <?php
        include'vistas/menu.php';
        ?>
  </div>
</div>
</body>

<script src="js/cliente.js"></script>

</html>