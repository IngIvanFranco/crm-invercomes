<?php
require'funcionesphp/seguridad.php';
require'funcionesphp/conex.php';

$meses=['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];
$mesesn=['01','02','03','04','05','06','07','08','09','10','11','12'];
$_REQUEST['dia'];
$_REQUEST['mes'];

$hoy = strtotime(date("Y-m-d"));
 $fechaget = strtotime(date("Y")."-".$mesesn[$_REQUEST['mes']-1]."-".$_REQUEST['dia']);

$libreto= '
<div class="conten_btn">
<p>Espacio libre</p>
</div>';

?>
<!DOCTYPE html>
<html lang="esp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/verdia.css">
    <link rel="stylesheet" href="css/generales.css">
    <link rel="stylesheet" href="css/grid.css">    
    <link rel="stylesheet" href="iconos/styles.css">
    
    <title>CRM-INVERCOMES</title>
</head>
<body>
<div class="container">
  <div class="trabajo" id="acordeon" >
    <div class="agendadia">

    <div class="accordion"  >
     <input type="radio" name="select" class="accordion-select"   />
    <div class="accordion-title"><span>8:00 AM</span></div>
    <div class="accordion-content">
    <?php
        
        $sql1 = $db->query("SELECT * FROM `visitas`, proveedores 
        WHERE visitas.id_usr = '$ccusr' 
        AND visitas.id_proveedor = proveedores.id_proveedor 
        AND visitas.hora_visita >= '08:00:00' 
        AND visitas.hora_visita < '09:00:00' 
        AND visitas.fecha_visita ='2022-$_REQUEST[mes]-$_REQUEST[dia]'");
        
         $filas= mysqli_num_rows($sql1);
        
         if ($filas == 0) {
            echo $libreto;
        
         } else {
              
        
        while ($row = $sql1->fetch_assoc()) {
         echo '<ul>
         <li class="itemdia">'.$row['hora_visita'].'</li>
        <li class="itemdia">'.$row['nombre_proveedor'].'</li>
        <li class="itemdia">'.$row['tipovisita'].'</li>
        <li class="itemdia">'.$row['linea'].'</li>
        <li class="itemdia">'.$row['lugar'].'</li>
        <li class="itemdia">'.$row['observacion'].'</li>
        <a href="imprimiblespdf/registrodevisitas.php?id='.$row['id_visita'].'" class="btn_add">PDF</a>
        
        </ul>';
         }
        }
        
        
                ?>
    </div> 
         <input type="radio" name="select" class="accordion-select" />
    <div class="accordion-title"><span>9:00 AM</span></div>
    <div class="accordion-content"> <?php
        
        $sql1 = $db->query("SELECT * FROM `visitas`, proveedores 
        WHERE visitas.id_usr = '$ccusr' 
        AND visitas.id_proveedor = proveedores.id_proveedor 
        AND visitas.hora_visita >= '09:00:00' 
        AND visitas.hora_visita < '10:00:00' 
        AND visitas.fecha_visita ='2022-$_REQUEST[mes]-$_REQUEST[dia]'");
        
         $filas= mysqli_num_rows($sql1);
        
         if ($filas == 0) {
            echo $libreto;
        
         } else {
              
        
        while ($row = $sql1->fetch_assoc()) {
         echo '<ul>
         <li class="itemdia">'.$row['hora_visita'].'</li>
        <li class="itemdia">'.$row['nombre_proveedor'].'</li>
        <li class="itemdia">'.$row['tipovisita'].'</li>
        <li class="itemdia">'.$row['linea'].'</li>
        <li class="itemdia">'.$row['lugar'].'</li>
        <li class="itemdia">'.$row['observacion'].'</li>
        <a href="imprimiblespdf/registrodevisitas.php?id='.$row['id_visita'].'" class="btn_add">PDF</a>
        
        </ul>';
         }
        }
        
        
                ?></div> 
         <input type="radio" name="select" class="accordion-select" />
    <div class="accordion-title"><span>10:00 AM</span></div>
    <div class="accordion-content">
        <?php
        
$sql1 = $db->query("SELECT * FROM `visitas`, proveedores 
WHERE visitas.id_usr = '$ccusr' 
AND visitas.id_proveedor = proveedores.id_proveedor 
AND visitas.hora_visita >= '10:00:00' 
AND visitas.hora_visita < '11:00:00' 
AND visitas.fecha_visita ='2022-$_REQUEST[mes]-$_REQUEST[dia]'");

 $filas= mysqli_num_rows($sql1);

 if ($filas == 0) {
   echo $libreto;

 } else {
      

while ($row = $sql1->fetch_assoc()) {
   echo '<ul>
   <li class="itemdia">'.$row['hora_visita'].'</li>
   <li class="itemdia">'.$row['nombre_proveedor'].'</li>
   <li class="itemdia">'.$row['tipovisita'].'</li>
   <li class="itemdia">'.$row['linea'].'</li>
   <li class="itemdia">'.$row['lugar'].'</li>
   <li class="itemdia">'.$row['observacion'].'</li>
   <a href="imprimiblespdf/registrodevisitas.php?id='.$row['id_visita'].'" class="btn_add">PDF</a>
   
   </ul>';
 }
}


        ?>


    </div> 
         <input type="radio" name="select" class="accordion-select" />
    <div class="accordion-title"><span>11:00AM</span></div>
    <div class="accordion-content"> <?php
        
        $sql1 = $db->query("SELECT * FROM `visitas`, proveedores 
        WHERE visitas.id_usr = '$ccusr' 
        AND visitas.id_proveedor = proveedores.id_proveedor 
        AND visitas.hora_visita >= '11:00:00' 
        AND visitas.hora_visita < '12:00:00' 
        AND visitas.fecha_visita ='2022-$_REQUEST[mes]-$_REQUEST[dia]'");
        
         $filas= mysqli_num_rows($sql1);
        
         if ($filas == 0) {
            echo $libreto;
        
         } else {
              
        
        while ($row = $sql1->fetch_assoc()) {
         echo '<ul>
         <li class="itemdia">'.$row['hora_visita'].'</li>
        <li class="itemdia">'.$row['nombre_proveedor'].'</li>
        <li class="itemdia">'.$row['tipovisita'].'</li>
        <li class="itemdia">'.$row['linea'].'</li>
        <li class="itemdia">'.$row['lugar'].'</li>
        <li class="itemdia">'.$row['observacion'].'</li>
        <a href="imprimiblespdf/registrodevisitas.php?id='.$row['id_visita'].'" class="btn_add">PDF</a>
        
        </ul>';
         }
        }
        
        
                ?></div> 

<input type="radio" name="select" class="accordion-select" />
    <div class="accordion-title"><span>Medio Dia</span></div>
    <div class="accordion-content">
         <img src="img/Logo-Invercomes-Horizontal.png" class="imgconten">

</div> 
         <input type="radio" name="select" class="accordion-select" />
    <div class="accordion-title"><span>2:00 PM</span></div>
    <div class="accordion-content">
    <?php
        
        $sql1 = $db->query("SELECT * FROM `visitas`, proveedores 
        WHERE visitas.id_usr = '$ccusr' 
        AND visitas.id_proveedor = proveedores.id_proveedor 
        AND visitas.hora_visita >= '14:00:00' 
        AND visitas.hora_visita < '15:00:00' 
        AND visitas.fecha_visita ='2022-$_REQUEST[mes]-$_REQUEST[dia]'");
        
         $filas= mysqli_num_rows($sql1);
        
         if ($filas == 0) {
            echo $libreto;
        
         } else {
              
        
        while ($row = $sql1->fetch_assoc()) {
         echo '<ul>
         <li class="itemdia">'.$row['hora_visita'].'</li>
        <li class="itemdia">'.$row['nombre_proveedor'].'</li>
        <li class="itemdia">'.$row['tipovisita'].'</li>
        <li class="itemdia">'.$row['linea'].'</li>
        <li class="itemdia">'.$row['lugar'].'</li>
        <li class="itemdia">'.$row['observacion'].'</li>
        <a href="imprimiblespdf/registrodevisitas.php?id='.$row['id_visita'].'" class="btn_add">PDF</a>
        
        </ul>';
         }
        }
        
        
                ?>
    </div> 
         <input type="radio" name="select" class="accordion-select" />
    <div class="accordion-title"><span>3:00 PM</span></div>
    <div class="accordion-content">
    <?php
        
        $sql1 = $db->query("SELECT * FROM `visitas`, proveedores 
        WHERE visitas.id_usr = '$ccusr' 
        AND visitas.id_proveedor = proveedores.id_proveedor 
        AND visitas.hora_visita >= '15:00:00' 
        AND visitas.hora_visita < '16:00:00' 
        AND visitas.fecha_visita ='2022-$_REQUEST[mes]-$_REQUEST[dia]'");
        
         $filas= mysqli_num_rows($sql1);
        
         if ($filas == 0) {
            echo $libreto;
        
         } else {
              
        
        while ($row = $sql1->fetch_assoc()) {
         echo '<ul>
         <li class="itemdia">'.$row['hora_visita'].'</li>
         <li class="itemdia">'.$row['nombre_proveedor'].'</li>
         <li class="itemdia">'.$row['tipovisita'].'</li>
         <li class="itemdia">'.$row['linea'].'</li>
         <li class="itemdia">'.$row['lugar'].'</li>
         <li class="itemdia">'.$row['observacion'].'</li>
         <a href="imprimiblespdf/registrodevisitas.php?id='.$row['id_visita'].'" class="btn_add">PDF</a>
         
         </ul>';
         }
        }
        
        
                ?>
    </div> 
         <input type="radio" name="select" class="accordion-select" />
    <div class="accordion-title"><span>4:00 PM</span></div>
    <div class="accordion-content"><?php
        
        $sql1 = $db->query("SELECT * FROM `visitas`, proveedores 
        WHERE visitas.id_usr = '$ccusr' 
        AND visitas.id_proveedor = proveedores.id_proveedor 
        AND visitas.hora_visita >= '16:00:00' 
        AND visitas.hora_visita < '17:00:00' 
        AND visitas.fecha_visita ='2022-$_REQUEST[mes]-$_REQUEST[dia]'");
        
         $filas= mysqli_num_rows($sql1);
        
         if ($filas == 0) {
            echo $libreto;
        
         } else {
              
        
        while ($row = $sql1->fetch_assoc()) {
         echo '<ul>
         <li class="itemdia">'.$row['hora_visita'].'</li>
        <li class="itemdia">'.$row['nombre_proveedor'].'</li>
        <li class="itemdia">'.$row['tipovisita'].'</li>
        <li class="itemdia">'.$row['linea'].'</li>
        <li class="itemdia">'.$row['lugar'].'</li>
        <li class="itemdia">'.$row['observacion'].'</li>
        <a href="imprimiblespdf/registrodevisitas.php?id='.$row['id_visita'].'" class="btn_add">PDF</a>
        
        </ul>';
         }
        }
        
        
                ?></div> 
         <input type="radio" name="select" class="accordion-select" />
    <div class="accordion-title"><span>5:00 PM</span></div>
    <div class="accordion-content">
    <?php
        
        $sql1 = $db->query("SELECT * FROM `visitas`, proveedores 
        WHERE visitas.id_usr = '$ccusr' 
        AND visitas.id_proveedor = proveedores.id_proveedor 
        AND visitas.hora_visita >= '17:00:00' 
        AND visitas.hora_visita < '18:00:00' 
        AND visitas.fecha_visita ='2022-$_REQUEST[mes]-$_REQUEST[dia]'");
        
         $filas= mysqli_num_rows($sql1);
        
         if ($filas == 0) {
            echo $libreto;
        
         } else {
              
        
        while ($row = $sql1->fetch_assoc()) {
        echo '<ul>
        <li class="itemdia">'.$row['hora_visita'].'</li>
        <li class="itemdia">'.$row['nombre_proveedor'].'</li>
        <li class="itemdia">'.$row['tipovisita'].'</li>
        <li class="itemdia">'.$row['linea'].'</li>
        <li class="itemdia">'.$row['lugar'].'</li>
        <li class="itemdia">'.$row['observacion'].'</li>
        <a href="imprimiblespdf/registrodevisitas.php?id='.$row['id_visita'].'" class="btn_add">PDF</a>
        </ul>
        ';
         }
        }
        
        
                ?>
    </div> 
</div> 



    </div>
    <div class="conten_btn">
    <a class="btn_volver" href="agenda.php">Atras</a>
    <?php 

    if ($hoy > $fechaget) {
     
    }else {
      


      ?>
<a class="btn_crear" href="#modal" id="show-modal">Agendar</a>
      <?php
    }
    


    ?>
    
    </div>

    <aside id="modal" class="modal">

        <div class="content-modal">
           <header>
              <a href="#" class="close-modal">X</a>
              <h2>Agendar Cita <?php echo date("Y").'-'.$meses[$_REQUEST['mes']-1].'-'.$_REQUEST['dia']?> </h2>
           </header>
           <article>
              <input type="hidden" id="dia" value="<?php echo date("Y").'-'.$mesesn[$_REQUEST['mes']-1].'-'.$_REQUEST['dia']?>">
              <input type="hidden" id="usr" value="<?php echo $ccusr ?>">
              <input type="time" name="hora" id="hora" class="input100">
              <select name="" id="tipovisita" class="input100"> 
                 <option value="Visita Nueva">Nueva</option>
                 <option value="Seguiminento">Seguimiento</option>
              </select>
              <select name="" id="proveedor" class="input100">
              <?php
$sql = $db->query("SELECT * FROM proveedores WHERE id_usradmin = $ccusr");
while ($row = $sql->fetch_assoc()) {
    echo '<option value="'.$row['id_proveedor'].'">'.$row['nombre_proveedor'].'</option>';
}
?>
</select>
<textarea name="" id="direccion" cols="30" placeholder="Direccion" class="input100"></textarea>
<textarea name="" id="observacion" cols="30" placeholder="Observacion" class="input100"></textarea>

<div class="conten_btn">
    
    <a class="btn_guardar" href="#" id="guardar" onclick="guardar()">Guardar</a>
    </div>

           </article>
        </div>


    </aside>

  </div>
  <div class="cabecera">
<h1><?php echo $_REQUEST['dia'].' de '.$meses[$_REQUEST['mes']-1].' del '.date('Y') ?></h1>
  </div>
  <div class="menu">
  
        <?php
        include'vistas/menu.php';
        ?>
  </div>
</div>
</body>
<script src="js/verdia.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
</html>