<?php
require'conex.php';
 $metodopago=$_REQUEST['modopago'];
 $valortotal=$_REQUEST['total'];
 $valorparcial=$_REQUEST['parcial'];
 $formadepago=$_REQUEST['formapago'];
 $id=$_REQUEST['id'];
 $DateAndTime = date('Y-m-d h:i:s a', time()); 
 $estado='Generado';



 $sql = $db->query("SELECT sum(valor) FROM anticipos 
 WHERE anticipos.id_ordencompra= $id ");
 while ($row = $sql->fetch_assoc()) {
   $totalanticipos=$row['sum(valor)'];
 }


 
$sql1 = $db->query("SELECT * FROM ordenesdecompra,proveedores
WHERE ordenesdecompra.id_ordenescompra= $id 
AND ordenesdecompra.id_proveedor = proveedores.id_proveedor");
while ($row = $sql1->fetch_assoc()) {
  $valortotalorden = $row['valor_total'];

}


  $saldoporpagar=$valortotalorden-$totalanticipos;






if ($_REQUEST['modopago'] == 'Parcial') {
    if (empty($_REQUEST['parcial'])) {
        echo '<script>
        window.alert("Digita el valor del anticipo");
        window.location="../generaranticipo.php?id='.$_REQUEST['id'].'";
        </script>';
    }else {
        if ($saldoporpagar < $valorparcial) {
            echo '<script>
            window.alert("El valor del anticipo no puede superar el valor del saldo a pagar");
            window.location="../generaranticipo.php?id='.$_REQUEST['id'].'";
            </script>';
        }else {
            
        
                        
                        
                    $sql="INSERT INTO anticipos VALUES('', '$id', '$DateAndTime', '$valorparcial', '$estado', '$formadepago')  ";
                    


                    $result = mysqli_query($db, $sql);

                    if ($result) {
                    
                        echo '<script>
                        window.alert("Anticipo creado con exito");
                        window.location="../verorden.php?id='.$id.'";
                        </script>';
                    }else {
                        echo '<script>
                        window.alert("Algo salio mal intenta mas tarde");
                        window.location="../generaranticipo.php?id='.$id.'";
                        </script>';
                    }

}

      
      
      
      
      
      
    }

}elseif ($_REQUEST['modopago'] == 'Total') {
    $sql="INSERT INTO anticipos VALUES('', '$id', '$DateAndTime', '$saldoporpagar', '$estado', '$formadepago')  ";
                    


    $result = mysqli_query($db, $sql);

    if ($result) {
    
        echo '<script>
        window.alert("Anticipo creado con exito");
        window.location="../verorden.php?id='.$id.'";
        </script>';
    }else {
        echo '<script>
        window.alert("Algo salio mal intenta mas tarde");
        window.location="../generaranticipo.php?id='.$id.'";
        </script>';
    }
}



?>