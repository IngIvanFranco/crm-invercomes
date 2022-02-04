<?php
session_start();
$proveedorid = $_REQUEST['proveedor'];

$_SESSION['idproveedor']=$proveedorid;

header("location: ../generarorden.php")

?>