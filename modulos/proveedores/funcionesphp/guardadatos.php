<?php

include './funcionesphp/conexion.php';
include 'Cart.php';
$cart = new Cart;
$cartItems = $cart->contents();
$hoy = date("Y-m-d");
foreach($cartItems as $item){

    $ingre='INSERT INTO productos (nombre_produc,id_proovedor,cantidad,nfactura,fecha) VALUES ("'.$item['name'].'","'.$item['apellido'].'","'.$item['cantidad'].'","'.$item['nfactura'].'","'.$hoy.'")';
    $query= mysqli_query($db,$ingre);
  
    if ($query) {
        echo'<script>alert("registro insertado")</script>';
        echo '<script>window.location="ingresop.php"</script>';
    }else {
        echo'<script>alert("Algo salio mal intelalo mas tarde ")</script>';
        echo '<script>window.location="viewCart.php"</script>';
    }
}

?>