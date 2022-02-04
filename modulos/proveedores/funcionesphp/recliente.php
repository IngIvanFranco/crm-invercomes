<?php

class Conexion{	  
    public static function Conectar() {        
        define('servidor', 'localhost');
        define('nombre_bd', 'crm-invercomes');
        define('usuario', 'root');
        define('password', '');					        
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');			
        try{
            $conexion = new PDO("mysql:host=".servidor."; dbname=".nombre_bd, usuario, password, $opciones);			
            return $conexion;
        }catch (Exception $e){
            die("El error de Conexión es: ". $e->getMessage());
        }
    }
}


$objeto = new Conexion();
$conexion = $objeto->Conectar();
$usr=(isset($_POST['usr'])) ? $_POST['usr']: '';
$cliente = (isset($_REQUEST['cliente'])) ? $_REQUEST['cliente']: '';
$nit = (isset($_POST['nit'])) ? $_POST['nit']:'';
$direccion = (isset($_POST['direccion'])) ? $_POST['direccion']: '';
$ciudad = (isset($_POST['ciudad'])) ? $_POST['ciudad']:'';
$contacto = (isset($_POST['contacto'])) ? $_POST['contacto'] : '';
$telefono = (isset($_POST['telefono'])) ? $_POST['telefono']: '';
$correo = (isset($_POST['correo'])) ? $_POST['correo']: '';
$web = (isset($_POST['web'])) ? $_POST['web']: '';
$DateAndTime = date('Y-m-d h:i:s a', time()); 

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';



switch ($opcion) {
    case 1:

    
      $consulta = "INSERT INTO 
        clientes (nombre_cliente, nit_cliente, direccion_cliente, ciudad_cliente,
        telefono_cliente,correo_cliente,web_cliente,fecha_creacion,id_usr,contacto) 
        VALUES('$cliente', '$nit', '$direccion', '$ciudad', '$telefono', 
        '$correo','$web','$DateAndTime','$usr','$contacto') ";			
          $resultado = $conexion->prepare($consulta);
          $resultado->execute(); 

          $consulta = "SELECT * FROM clientes ORDER BY nit_cliente DESC LIMIT 1";
          $resultado = $conexion->prepare($consulta);
          $resultado->execute();
          $data=$resultado->fetchAll(PDO::FETCH_ASSOC);  


        break;
    
    case 2:
       

        $consulta="UPDATE clientes SET nombre_cliente='$cliente', direccion_cliente='$direccion',
        ciudad_cliente='$ciudad',telefono_cliente='$telefono',correo_cliente='$correo',web_cliente='$web',contacto='$contacto'
        WHERE nit_cliente = '$nit' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT * FROM clientes ORDER BY nit_cliente DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);  

        break;

    case 3:
       
        break;

    case 4:
        $consulta = "SELECT * FROM clientes 
        WHERE id_usr = $usr";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}



print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;






/*

$sql = "INSERT INTO 
clientes (nombre_cliente, nit_cliente, direccion_cliente, ciudad_cliente,
telefono_cliente,correo_cliente,web_cliente,fecha_creacion,id_usr,contacto) 
VALUES('$cliente', '$nit', '$direccion', '$ciudad', '$telefono', 
'$correo','$web','$DateAndTime','$usr','$contacto') ";			
 $respuesta= mysqli_query($db,$sql);

 if ($respuesta) {
     echo 1;
 }else {
     echo 2;
 }

*/
?>