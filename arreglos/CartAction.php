<?php

date_default_timezone_set('America/Bogota');
// initialize shopping cart class
include 'Cart.php';
$cart = new Cart;



// include database configuration file
include './funcionesphp/conexion.php';

if( !empty($_POST['name'])&& !empty($_POST['apellido']) && !empty($_POST['cantidad']&& !empty($_POST['nfactura'])) ){ 

     $itemData = array(
      

        "name" => $_POST['name'],
        "apellido" => $_POST['apellido'],
        "nfactura" => $_POST['nfactura'],
        "cantidad" => $_POST['cantidad']
       
    );
    
    $insertItem = $cart->insert($itemData);
    $redirectLoc = $insertItem?'viewCart.php':'index.php';
    header("Location: ".$redirectLoc);

}elseif($_REQUEST['action'] == 'updateCartItem2' && !empty($_REQUEST['id']) ){
$itemData = array(
    'rowid' => $_REQUEST['id'],
   'cantidad'=> $_REQUEST['cantidad']
   

);
$updateItem = $cart->update($itemData);
echo $updateItem?'ok':'err';die;
} elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){
        
        echo $_REQUEST['id'];
        $deleteItem = $cart->remove($_REQUEST['id']);
        header("Location: viewCart.php");
    
    }
/*elseif ($_REQUEST['action'] == 'placeorde' ){

    foreach
    $ingre="INSERT INTO productos,proovedor (name_produc,nombre_proovedor,cantidad,fecha)VALUES ( $_POST=['name'],$_POST=['apellido'], $_POST=['cantidad'],$hoy)";
    $query= mysqli_query($db,$ingre);
    echo'guardado con exito';
    }
     else{
echo'pailas';

     } 
       */ 
?>