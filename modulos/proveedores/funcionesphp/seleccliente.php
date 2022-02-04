<?php
session_start();
$clienteid = $_REQUEST['cliente'];

$_SESSION['idcliente']=$clienteid;

header("location: ../generarventa.php")

?>