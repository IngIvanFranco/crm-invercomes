<?php
session_start();
$ccusr=$_SESSION['proveedor'];
require'conex.php';
$DateAndTime = date('Y-m-d h:i:s a', time()); 

$proveedor=$_POST['proveedor'];
$nit=$_POST['nit'];
$linea=$_POST['linea'];
$tipodistri=$_POST['tipodistribucion'];
$municipio=$_POST['municipio'];
$direccion=$_POST['direccion'];
$correo=$_POST['correo'];
$asesor=$_POST['asesor'];
$web=$_POST['Web'];
$tel=$_POST['tel'];
$observaciones=$_POST['observaciones'];
$productos=$_POST['productos'];


$sql="INSERT INTO proveedores VALUES('', '$proveedor', '$nit', '$correo', '$web', '$tel', '$municipio', '$linea', 
'$productos', '$tipodistri', '$observaciones', '$asesor', '$DateAndTime','$ccusr','$direccion')  ";
 


$result = mysqli_query($db, $sql);

if ($result) {
  
header("location: ../regisproveedor.php?add=1");
}else {
    
header("location: ../regisproveedor.php?add=2");
}

?>
