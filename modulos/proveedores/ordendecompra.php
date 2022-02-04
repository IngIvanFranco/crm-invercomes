<?php
include'funcionesphp/conex.php';
require 'funcionesphp/Cart.php';

$valortotal=0;
?>
<!DOCTYPE html>
<html lang="esp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/ordendecompra.css">
    <link rel="stylesheet" href="css/generales.css">
    <link rel="stylesheet" href="css/grid.css">    
    <link rel="stylesheet" href="iconos/styles.css">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    
    <title>CRM-INVERCOMES</title>
</head>

<script>
   
   function updateCartItem2(datos,id){
       $.get("funcionesphp/CartAction.php", {action:"updateCartItem2", id:id, cantidad:datos.value}, function(data){
           alert('estoy aqui ');
           if(data == 'ok'){
              location.reload();
           }else{
               alert('algo sucedio intenta mas tarde.');
             
           }
       });
   }
   </script>
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
  <form action="funcionesphp/selecproveedor.php" method="post">
    
<div class="contimgfor">  <img src="img/Logo-Invercomes-Horizontal.png" class="iconform">
<h2 class="tituloprov">selecciona tu proveedor</h2></div>
    
<select name="proveedor" id="" class="input80" required>
<?php
$sql = $db->query("SELECT * FROM `proveedores` WHERE proveedores.id_usradmin = $ccusr");
while ($row = $sql->fetch_assoc()) {
    echo '<option value="'.$row['id_proveedor'].'">'. utf8_encode($row['nombre_proveedor']).'</option>';
}
?>
</select>
<a href="regisproveedor.php" class="btn_add">+</a>
<div class="cont_btn">
<input type="submit" value="Crear" class="btn_guardar">
</div>
</form>

  </div>
  <div class="cabecera">
<h1>Generar orden de compra</h1>
  </div>
  <div class="menu">
     
        <?php
        include'vistas/menu.php';
        ?>
  </div>
</div>
</body>
</html>