<?php
require'funcionesphp/seguridad.php';
include'funcionesphp/conex.php';
 $id=$_REQUEST['id'];


 $sql = $db->query("SELECT * FROM proveedores WHERE `id_proveedor` = $id  ");
 while ($row = $sql->fetch_assoc()) {
  
   $nombre = $row['nombre_proveedor'];
   $nit= $row['nit_proveedor'];
   $correo=$row['Correo_proveedor'];
   $web=$row['web_proveedor'];
   $telefono=$row['telefono_proveedor'];
   $ciudad=$row['ciudad'];
   $linea=$row['linea'];
   $productos=$row['productos'];
   $tipo=$row['tipodistribucion'];
   $obser=$row['observaciones'];
   $asesor=$row['asesor'];
   $creacion=$row['creacion'];
 }
 ?>



<!DOCTYPE html>
<html lang="esp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/generales.css">
    <link rel="stylesheet" href="css/verproveedor.css">
    <link rel="stylesheet" href="css/grid.css">    
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
    
<form action="funcionesphp/actualizarproveedor.php">
    
  <div class="contimgfor">  <img src="img/Logo-Invercomes-Horizontal.png" class="iconform">
  <h2 class="tituloprov">actualiza tu proveedor</h2></div>
    <input type="hidden" name="id" value="<?php echo $id?>">
    <input name="nombre" type="text" value="<?php echo $nombre ?>" class="input50" placeholder="nombre">
    <input name="nit" type="text" value="<?php echo $nit ?>" class="input50" placeholder="nit">
    <input name="correo" type="text" value="<?php echo $correo ?>" class="input50" placeholder="correo">
    <input name="web" type="text" value="<?php echo $web ?>" class="input50" placeholder="web">
    <input name="telefono" type="text" value="<?php echo $telefono ?>" class="input50" placeholder="telefono">
    <input name="ciudad" type="text" value="<?php echo $ciudad ?>" class="input50" placeholder="ciudad">
    <input name="linea" type="text" value="<?php echo $linea ?>" class="input30" placeholder="linea">
    <input name="tipo" type="text" value="<?php echo $tipo ?>" class="input30" placeholder="tipo de proveedor">
    <input name="asesor" type="text" value="<?php echo $asesor ?>" class="input30" placeholder="asesor">
    <input name="creacion" type="text" value="<?php echo $creacion ?>" readonly class="input100" placeholder=" fecha de creacion">
    <textarea name="observacion"  cols="30" rows="5" placeholder="observaciones" class="input50"><?php echo $obser ?></textarea>
    <textarea name="productos"  cols="30" rows="5" placeholder="productos" class="input50"><?php echo $productos ?></textarea>
    <input type="button" value="Volver"  class="btn_volver" onclick="volverbuscarproveedor()">
    <input type="submit" value="Actualizar" class="btn_guardar">
</form>






  </div>
  <div class="cabecera">
<h1><?php echo $nombre ?> </h1>
  </div>
  <div class="menu">
     
        <?php
        include'vistas/menu.php';
        ?>
  </div>
</div>
</body>

<script>
    function volverbuscarproveedor() {
        window.location.href = "buscarproveedor.php";
        
    }
</script>
</html>