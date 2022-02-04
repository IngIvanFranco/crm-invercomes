<?php
require'funcionesphp/seguridad.php';
include'funcionesphp/conex.php';
?>
<!DOCTYPE html>
<html lang="esp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/regisproveedor.css">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/generales.css">
    <link rel="stylesheet" href="iconos/styles.css">

    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">

    <title>CRM-INVERCOMES</title>
</head>
<body>
<?php
if (!isset($_REQUEST['add'])) {
  
}elseif ($_REQUEST['add']== 1){

  
    
?>
<script>

Swal.fire({
        position: 'center',
      icon: 'success',
      title: 'Registro Exitoso',
      showConfirmButton: false,
      timer: 1500
            })

</script>
<?php
}elseif ($_REQUEST['add']== 2) {
      
?>
<script>

Swal.fire({
        position: 'center',
      icon: 'error',
      title: 'Algo salio mal',
      showConfirmButton: false,
      timer: 1500
            }) 

</script>
<?php
}
?>


<div class="container">
  <div class="trabajo">
   

<form action="funcionesphp/resprove.php" method="post">

  <div class="contimgfor">  <img src="img/Logo-Invercomes-Horizontal.png" class="iconform">
  <h2 class="tituloprov">Registra tu proveedor</h2></div>

<input type="text" name="proveedor" placeholder="Proveedor" class="input50" required>
<input type="number" name="nit" placeholder="Identificacion" class="input50" required>

<select name="linea" id="" class="input30" required>
    <option value="motocicletas">Motocicletas</option>
    <option value="movilidad">Movilidad</option>
    <option value="tecnologia">Tecnología</option>
    <option value="hogar">Hogar</option>
    <option value="cacharreria">Cacharrería</option>
    <option value="aseo">Aseo</option>
    <option value="cuidado personal">Cuidado personal</option>
    <option value="mobiliario de oficina">Mobiliario de oficina</option>
    <option value="dotaciones">Dotaciones</option>
    <option value="publicidad">Publicidad</option>
    <option value="papeleria">Papelería</option>
</select>


<select name="tipodistribucion" id="" class="input30" required>
    <option value="Directa">Directa</option>
    <option value="Intermediaria">Intermediario</option>
</select>


<input type="text" name="direccion" placeholder="Direccion" class="input30" required>
<input type="email" name="correo" placeholder="Correo" class="input30" required>
<input type="text" name="asesor" placeholder="Asesor" class="input30" required>
<input type="text" name="Web" placeholder="Web" class="input30" required>
<input type="number" name="tel" placeholder="Telefono" class="input50" required>

<select name="municipio" id="" class="input50" required>
<?php
$sql = $db->query("SELECT * FROM municipios,departamentos WHERE municipios.departamento_id = departamentos.id_departamento");
while ($row = $sql->fetch_assoc()) {
    echo '<option value="'.$row['municipio'].'-'.$row['departamento'].'">'. utf8_encode( $row['municipio']).'-'. utf8_encode($row['departamento']).'</option>';
}
?>
</select>

<textarea name="observaciones" id="" cols="30" rows="5" placeholder="Observaciones" class="input50" required></textarea>
<textarea name="productos" id="" cols="30" rows="5" placeholder="productos" class="input50" required></textarea>

<input type="submit" value="Guardar" class="btn_guardar">




</form>






  </div>
  <div class="cabecera">
<h1>Registro de proveedor</h1>
  </div>
  <div class="menu">
     
        <?php
        include'vistas/menu.php';
        ?>
  </div>
</div>
</body>

</html>