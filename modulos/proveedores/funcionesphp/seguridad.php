<?php
session_start();
$ccusr=$_SESSION['proveedor'];
if (!isset($_SESSION['proveedor'])) {
    session_destroy();
    header("location: ../../login.php");
}
 
?>