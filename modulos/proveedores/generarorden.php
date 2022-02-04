<?php
require 'funcionesphp/Cart.php';
 

 $cart = new Cart;
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


    
   
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">
    <script src="js/jquery/jquery-3.3.1.min.js"></script>
    <script src="js/popper/popper.min.js"></script>
    <script src="js/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/datatables/datatables.min.js"></script>    

    
  
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

<div class="container">
  <div class="trabajo">
      

<!-- modal add producto nuevo -->  
  <aside id="modal" class="modal">

<div class="content-modal">
   <header>
      <a href="#" class="close-modal">X</a>
      <h2>Producto Nuevo </h2>
   </header>
   <article>
   

   <form action="funcionesphp/CartAction.php" method="post" id="formproducnuevo">
  
  
    <input type="hidden" name="" id="usr" value="<?php echo $ccusr ?>"> 
    <input type="hidden" name="id" id="" value="0"> 
    <input type="text" name="name" id="name" placeholder="Bien o servicio" class="input30">
    <input type="number" name="precio" id="precio" placeholder="Precio" class="input30">
    <input type="number" name="cantidad" id="cantidad" placeholder="Cantidad" class="input30">
    <input type="number" name="utilidad" id="utilidad" placeholder="Porcentaje de utilidad" class="input30">
    <input type="text" name="codigo" id="codigo" placeholder="Codigo del proveedor" class="input30">
    <input type="text" name="numeroparte" id="numeroparte" placeholder="Numero de parte" class="input30">
   <textarea  rows="5"  name="descripcion" id="descripcion" placeholder="Descripcion" class="input100"></textarea>
    <input type="submit" value="Agregar" class="btn_volver">
  </form>
   </article>
</div>


</aside>


   <!-- modal add producto existente --> 
<aside id="modal2" class="modal2">

<div class="content-modal">
   <header>
      <a href="#" class="close-modal">X</a>
      <h2>Agregar Producto Existente </h2>
   </header>
   <article>
   
   <form action="funcionesphp/CartAction.php" method="post" id="formproducnuevo">
  
  
  
  <input type="hidden" name="id" id="id" value="0"> 
  <input type="text" name="name" id="name3" placeholder="Bien o servicio" class="input30">
  <input type="number" name="precio" id="precio3" placeholder="Precio" class="input30">
  <input type="number" name="cantidad" id="cantidad3" placeholder="Cantidad" class="input30">
  <input type="number" name="utilidad" id="utilidad3" placeholder="Porcentaje de utilidad" class="input30">
  <input type="text" name="codigo" id="codigo3" placeholder="Codigo del proveedor" class="input30">
  <input type="text" name="numeroparte" id="numeroparte3" placeholder="Numero de parte" class="input30">
 <textarea  rows="5"  name="descripcion" id="descripcion3" placeholder="Descripcion" class="input100"></textarea>
  <input type="submit" value="Agregar" class="btn_volver">
</form>
   
   </article>
</div>

</aside>



<!-- modal editar producto existente -->


<aside id="modal3" class="modal3">

<div class="content-modal">
   <header>
      <a href="#" class="close-modal">X</a>
      <h2>Editar Producto Existente </h2>
   </header>
   <article>
   
   
   <form  id="formeditproduc">
  
  
 <input type="hidden" name="" id="usr" value="<?php echo $ccusr ?>"> 
    <input type="text" name="name" id="nombre" placeholder="Bien o servicio" class="input30">
    <input type="number" name="valor" id="valor" placeholder="Precio" class="input30">
    <input type="number" name="cantidad2" id="cantidad2" placeholder="Cantidad" class="input30">
    <input type="number" name="utilidad2" id="utilidad2" placeholder="Porcentaje de utilidad" class="input30">
    <input type="text" name="codigo2" id="codigo2" placeholder="Codigo del proveedor" class="input30">
    <input type="text" name="numeroparte2" id="numeroparte2" placeholder="Numero de parte" class="input30">
   <textarea  rows="5"  name="descripcion2" id="descripcion2" placeholder="Descripcion" class="input100"></textarea>
    <input type="submit" value="Editar" class="btn_guardar" id="guardar">
  </form>

  
   
 
   </article>
</div>

</aside>




<table id="tablaproductos" style="width: 90% ;" class="blueTable table table-striped table-bordered table-condensed"  >
        <thead>
            <tr>
                
                <th>ID</th>
                <th>NOMBRE</th>
                <th>DESCRIPCION</th>
                <th>STOCK</th>
                <th>VALOR</th>
                <th>CODIGO PROVEEDOR</th>
                <th>NUMERO DE PARTE</th>
                <th>UTILIDAD</th>
                <th>   </th>
                
            </tr>
        </thead>
        <tbody>

  
</tbody>

<tfoot>
            <tr>
           
            <th>ID</th>
                <th>NOMBRE</th>
                <th>DESCRIPCION</th>
                <th>STOCK</th>
                <th>VALOR</th>
                <th>CODIGO PROVEEDOR</th>
                <th>NUMERO DE PARTE</th>
                <th>UTILIDAD</th>
                <th>   </th>
            </tr>
        </tfoot>
    </table>




    <a class="btn_crear" href="#modal" id="show-modal"><img src="img/add_box_black_24dp.svg" alt=""></a>

<?php

$cartItems = $cart->contents();
if (sizeof($cartItems)==0) {
  
}else {
  


?>
<table class="paleBlueRows">
<thead>
            <tr>
                <th>BIEN O SERVICIO</th>
                <th>DESCRIPCIÓN </th>
                <th>CANTIDAD</th>
                <th>CODIGO</th>
                <th># PARTE</th>
                <th>% UTILIDAD</th>
                <th>P/U ANTES DE IVA</th>
                <th>IVA</th>
                <th>TOTAL</th>
                <th></th>
               
                
            </tr>
        </thead>
        <tbody>

<?php


foreach($cartItems as $item){
   $valorantesiva =$item['precio']/1.19; 
   $valortotal= $valortotal+ ($item['precio']  *  $item['cantidad']   );
  
  echo '<tr>

  <td>'.$item['name'].'</td>
  <td>'.$item['descripcion'].'</td>
 
  <td>'.$item['cantidad'].'</td>
  <td>'.$item['codigo'].'</td>
  <td>'.$item['numeroparte'].'</td>

  <td>'.$item['utilidad'].' %</td>

  <td> $ '. number_format( $valorantesiva).'</td>

  <td> $ '. number_format( $valorantesiva*0.19).'</td>

 
  <td> $ '. number_format($item['precio']*$item['cantidad']).'</td>

  
  
  ';
  
  
 
  ?>
 <td> <a class="btn_eliminar " href="funcionesphp/CartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="btn_eliminar"> Eliminar </a> </td>
  <?php
  
  }
 ?>


</tbody>

<tfooter>
  
<tr>
                <th>BIEN O SERVICIO</th>
                <th>DESCRIPCIÓN </th>
                <th>CANTIDAD</th>
                <th>P/U ANTES DE IVA</th>
                <th>IVA</th>
                <th>TOTAL</th>
                
              <th></th>
                
            </tr>
</tfooter>
</table>
<p class="vlrtotal">Total <?php echo '$'.number_format($valortotal).' COP'; ?></p>
<div class="cont_btn">

<a href="funcionesphp/CartAction.php?action=guardar&vlr=<?php echo $valortotal; ?>" class="btn_guardar center">Generar Orden De Compra</a> 

</div>
<?php
}
?>

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
<script src="js/ordencompra.js"></script>
</html>