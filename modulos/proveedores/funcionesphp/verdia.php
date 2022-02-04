<?php
require'conex.php';
$usr=(isset($_POST['usr'])) ? $_POST['usr']: '';
$dia = (isset($_REQUEST['dia'])) ? $_REQUEST['dia']: '';
$hora = (isset($_POST['hora'])) ? $_POST['hora']:'';
$tipovisita = (isset($_POST['tipovisita'])) ? $_POST['tipovisita']:'';
$proveedor = (isset($_POST['proveedor'])) ? $_POST['proveedor'] : '';
$direccion = (isset($_POST['direccion'])) ? $_POST['direccion']: '';
$observacion = (isset($_POST['observacion'])) ? $_POST['observacion']: '';



$sql = "INSERT INTO 
visitas (fecha_visita, hora_visita, tipovisita, id_proveedor, lugar,observacion,id_usr) 
VALUES('$dia', '$hora', '$tipovisita', '$proveedor', '$direccion', '$observacion','$usr') ";			
 $respuesta= mysqli_query($db,$sql);

 if ($respuesta) {
     echo 1;
 }else {
     echo 2;
 }

 ?>