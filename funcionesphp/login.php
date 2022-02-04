<?php

require'conex.php';

$usr = $_POST['usr'];
$pas = $_POST['pass'];
 $pas = hash('sha512', $pas);





$validarsql= "SELECT * FROM usr_admin WHERE identificacion = $usr
AND pass = '$pas' ";
$resultado = mysqli_query($db, $validarsql);
$filas = mysqli_num_rows($resultado);
while ($row = $resultado->fetch_assoc()) {
 $tipousr= $row['id_tipo_usr'];
 $name=$row['nombre'];
}





if($filas == 0 ){


?>
<script>
window.alert("Datos Erroneos Verifique Usuario y/o Contrasena");
location.href ="../index.php";
</script>
<?php


}

else {

         if ($tipousr==1) {
           
                  session_start();
                  $_SESSION['proveedor'] = $usr;


                  ?>
                  <script>
                     window.alert("Bienvenido <?php echo $name ?>");
                     location.href ="../modulos/proveedores/index.php";
                  </script>

                  <?php

         }   elseif ($tipousr==2) {
            session_start();
            $_SESSION['comercial'] = $usr;


            ?>
            <script>
               window.alert("Bienvenido <?php echo $name ?>");
               location.href ="../modulos/comercial/index.php";
            </script>

            <?php
         }     
         




}




?>