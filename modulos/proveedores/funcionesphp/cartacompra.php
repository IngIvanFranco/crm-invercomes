<?php

date_default_timezone_set('America/Bogota');
// initialize shopping cart class
include 'Cart.php';
$cart = new Cart;
$id_usr= $_SESSION['proveedor'];
$status=1;



// include database configuration file
include 'conex.php';

if( !empty($_POST['name'])&& !empty($_POST['descripcion']) && !empty($_POST['cantidad']&& !empty($_POST['precio']) ) ){ 


if ($_POST['utilidad']<8) {
    $itemData = array(
      

        "name" => $_POST['name'],
        "descripcion" => $_POST['descripcion'],
        "precio" => $_POST['precio'],
        "cantidad" => $_POST['cantidad'],
        "utilidad" => 8,
        "codigo" => $_POST['codigo'],
        "numeroparte" => $_POST['numeroparte'],
        "id"=> $_POST['id']
       
    ); 
}else {
    

     $itemData = array(
      

        "name" => $_POST['name'],
        "descripcion" => $_POST['descripcion'],
        "precio" => $_POST['precio'],
        "cantidad" => $_POST['cantidad'],
        "utilidad" => $_POST['utilidad'],
        "codigo" => $_POST['codigo'],
        "numeroparte" => $_POST['numeroparte'],
        "id"=> $_POST['id']
       
    );
}

    $insertItem = $cart->insert($itemData);
    $redirectLoc = $insertItem?'../generarorden.php':'../index.php';
    header("Location: ".$redirectLoc);

}
elseif($_REQUEST['action'] == 'updateCartItem2' && !empty($_REQUEST['id']) ){
$itemData = array(
    'rowid' => $_REQUEST['id'],
   'cantidad'=> $_REQUEST['cantidad']
   

);
$updateItem = $cart->update($itemData);
echo $updateItem?'ok':'err';die;
} elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){
        
        echo $_REQUEST['id'];
        $deleteItem = $cart->remove($_REQUEST['id']);
        header("Location: ../generarorden.php");
    
    }
    elseif ($_REQUEST['action'] == 'guardar' && $_REQUEST['vlr']  ){
    
       


        $insertOrder = $db->query("INSERT INTO ordenesdecompra (valor_total, fecha_registro, status, id_usradmin, id_proveedor) VALUES 
        ('".$_REQUEST['vlr']."','".date("Y-m-d H:i:s")."', '".$status."','".$id_usr."','".$_SESSION['idproveedor']."')");
        
        if($insertOrder){
            $orderID = $db->insert_id;
        
         
            $cartItems = $cart->contents();
        foreach($cartItems as $item){


            if ($item['id']== 0) {
                
            
        
            $ingreproduct='INSERT INTO productos (nombre_producto,descripcion_producto,stok,valor,codigo_proveedor,numerodeparte,utilidad,id_usr) 
            VALUES ("'.$item['name'].'","'.$item['descripcion'].'","'.$item['cantidad'].'","'.$item['precio'].'","'.$item['codigo'].'"
            ,"'.$item['numeroparte'].'","'.$item['utilidad'].'","'.$id_usr.'")';
            $inserproduc= mysqli_query($db,$ingreproduct);

            $idproduc = $db->insert_id;
          
            $ingre='INSERT INTO detalle_ordencompra (id_ordencompra,producto_id,cantidad,valor,utilidad) 
            VALUES ("'.$orderID.'","'.$idproduc.'","'.$item['cantidad'].'","'.$item['precio'].'","'.$item['utilidad'].'")';
            $query= mysqli_query($db,$ingre);

        }else {

            $ingre='INSERT INTO detalle_ordencompra (id_ordencompra,producto_id,cantidad,valor,utilidad) 
            VALUES ("'.$orderID.'","'.$item['id'].'","'.$item['cantidad'].'","'.$item['precio'].'","'.$item['utilidad'].'")';
            $query= mysqli_query($db,$ingre);
        }

                    
            if ($query) {
            
                header("location: ../ordendecompra.php?add=1");
                }else {
                    
                header("location: ../ordendecompra.php?add=2");
                }
                
        }
    }
    $cart->destroy();

    }
    elseif (empty($_POST['name']) || empty($_POST['descripcion']) || empty($_POST['cantidad'] || empty($_POST['precio']))) {
    



        echo'<script>alert("Campos vacios")</script>';
        echo '<script>window.location="../ordendecompra.php"</script>';
        
        
        
        
        }
       
?>