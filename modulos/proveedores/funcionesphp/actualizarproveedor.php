<?php
require'conex.php';
$id=$_REQUEST['id'];
$nombre=$_REQUEST['nombre'];
$nit=$_REQUEST['nit'];
$correo=$_REQUEST['correo'];
$web=$_REQUEST['web'];
$telefono=$_REQUEST['telefono'];
$ciudad=$_REQUEST['ciudad'];
$linea=$_REQUEST['linea'];
$tipo=$_REQUEST['tipo'];
$asesor=$_REQUEST['asesor'];
$creacion=$_REQUEST['creacion'];
$observacion=$_REQUEST['observacion'];
$productos=$_REQUEST['productos'];




$sql="UPDATE proveedores
SET nombre_proveedor = '$nombre', nit_proveedor = '$nit', Correo_proveedor= '$correo', web_proveedor= '$web', telefono_proveedor='$telefono',
linea='$linea', productos='$productos', tipodistribucion='$tipo', observaciones='$observacion', asesor='$asesor', ciudad='$ciudad'
WHERE id_proveedor=$id ";
 


$result = mysqli_query($db, $sql);

if ($result) {
  
header("location: ../verproveedor.php?id=$id&add=1");
}else {
    
header("location: ../verproveedor.php?id=$id&add=2");
}


?>