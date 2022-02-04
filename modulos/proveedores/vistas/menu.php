<?php

?>
<link rel="stylesheet" href="css/menu.css">
<img src="img/Invercomes_icon.png" class="imgmenu">
<div class="separate"></div>
  <div class="accordion">
     <input type="radio" name="select" class="accordion-select"  />
    <div class="accordion-title"><span>Proveedores</span></div>
    <div class="accordion-content">
         <ul>
            <a href="buscarproveedor.php">  <li>Buscar Proveedor</li> </a>
              
            <a href="regisproveedor.php">  <li>Registrar Proveedor</li></a>
         </ul>
    </div> 
    <input type="radio" name="select" class="accordion-select"  />
    <div class="accordion-title"><span>Clientes</span></div>
    <div class="accordion-content">
         <ul>
            <a href="cliente.php">  <li>Listar Clientes</li> </a>
              
            
         </ul>
    </div> 
         <input type="radio" name="select" class="accordion-select" />
    <div class="accordion-title"><span>Compras</span></div>
    <div class="accordion-content">

    <ul>
            <a href="ordendecompra.php">  <li>Generar orden de compra</li> </a>
            <a href="buscarorden.php">  <li>Buscar orden de compra</li> </a>
              
           
         </ul>


    </div> 
         <input type="radio" name="select" class="accordion-select" />
    <div class="accordion-title"><span>Visitas</span></div>
    <div class="accordion-content"><ul>
    <a href="agenda.php">  <li>Agenda</li> </a>
    </ul></div> 
    <input type="radio" name="select" class="accordion-select" />
    <div class="accordion-title"><span>Ventas</span></div>
    <div class="accordion-content"><ul>
    <a href="ordenventa.php">  <li>Generar orden de venta</li> </a>
            <a href=" #">  <li>Buscar orden de venta</li> </a>
    </ul></div> 
</div> 
<div class="contbtncerrar">
<a href="funcionesphp/cerrarsesion.php" class="btn_cerrarsesion">cerrar sesion</a>
</div>