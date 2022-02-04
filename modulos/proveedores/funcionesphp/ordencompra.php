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
$nombre = (isset($_REQUEST['nombre'])) ? $_REQUEST['nombre']: '';
$valor = (isset($_POST['valor'])) ? $_POST['valor']:'';
$cantidad = (isset($_POST['cantidad'])) ? $_POST['cantidad']: '';
$utilidad = (isset($_POST['utilidad'])) ? $_POST['utilidad']:'';
$codigo = (isset($_POST['codigo'])) ? $_POST['codigo'] : '';
$numeroparte = (isset($_POST['numeroparte'])) ? $_POST['numeroparte']: '';
$descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion']: '';
$idp = (isset($_POST['idp'])) ? $_POST['idp']: '';
$DateAndTime = date('Y-m-d h:i:s a', time()); 

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';



switch ($opcion) {
    case 1:

    /*
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
*/

        break;
    
    case 2:
       

        $consulta="UPDATE productos SET nombre_producto='$nombre', descripcion_producto='$descripcion',
        stok='$cantidad',valor='$valor',codigo_proveedor='$codigo',numerodeparte='$numeroparte',utilidad='$utilidad'
        WHERE id_producto = '$idp' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        $consulta = "SELECT * FROM productos 
       WHERE id_usr = $usr ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);  

        break;

    case 3:
       
        break;

    case 4:
        $consulta = "SELECT * FROM productos 
       WHERE id_usr = $usr ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}



print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;


