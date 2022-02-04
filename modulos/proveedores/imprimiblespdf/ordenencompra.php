<?php
$id= $_REQUEST['id'];
require'../funcionesphp/seguridad.php';
require'../funcionesphp/conex.php';


require('../fpdf/fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
   

   
    $this->Image('../img/Logo-Invercomes-Horizontal.png',10,10,40,'C');
    $this->Ln(0);
    // Arial bold 15
    $this->SetFont('Arial','B',10);
    // Movernos a la derecha
    $this->Cell(40);
    // Título
    $this->Cell(50,5,'SGC',1,0,'C');
    $this->Cell(30,5,'Codigo',1,0,'C');
    $this->Cell(60,5,'   ',1,1,'C');
    $this->Cell(40);
    $this->SetTextColor(255,255,255);
    $this->Cell(50,5,'FORMATO',1,0,'C',1);
    $this->Cell(30,5, utf8_decode( 'Versión'),1,0,'C',1);
    $this->Cell(60,5,' 1  ',1,1,'C',1);
    $this->Cell(40);
    $this->SetTextColor(0,0,0);
    $this->Cell(140,5,'ORDEN DE COMPRA',1,1,'C');
    
   



     
    // Salto de línea
    $this->Ln(10);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    
    $this->Cell(190,4,utf8_decode('CRM-INVERCOMES Software desarrollado por Invercomes S.A.S'),0,1,'C',0);
}
}

$sql="SELECT * FROM ordenesdecompra,proveedores
WHERE ordenesdecompra.id_ordenescompra = $id
AND ordenesdecompra.id_usradmin = $ccusr
AND ordenesdecompra.id_proveedor = proveedores.id_proveedor";
$resultado= $db ->query($sql);



// Creación del objeto de la clase heredada
$pdf = new PDF();

$pdf->AddPage();
$pdf->SetFont('Arial','B',7);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(180,6, utf8_decode('ORDEN DE COMPRA NUMERO: '.$id),1,1,'C',1);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(180,6, utf8_decode('PROVEEDOR'),1,1,'C',0);

while ($row = $resultado->fetch_assoc() ) {
    $pdf->SetTextColor(0,0,0);

    $pdf->Cell(180,6, 'NOMBRE DE LA EMPRESA: '.$row['nombre_proveedor'],1,1,'L',0);
    $pdf->Cell(180,6, 'CONTACTO O DEPARTAMENTO: '.$row['asesor'],1,1,'L',0);
    $pdf->Cell(180,6, 'DIRECCION: '.$row['direccion'],1,1,'L',0);
    $pdf->Cell(180,6, 'CIUDAD: '. utf8_decode( $row['ciudad']),1,1,'L',0);
    $pdf->Cell(180,6, 'TELEFONO: '.  $row['telefono_proveedor'],1,1,'L',0);
    $pdf->Cell(180,6, 'CORREO ELECTRONICO: '.  $row['Correo_proveedor'],1,1,'L',0);
  

}



$pdf->SetFont('Arial','B',7);
$pdf->Cell(180,6, utf8_decode('PRODUCTOS'),1,1,'C',0);
$pdf->SetTextColor(255,255,255);

$pdf->Cell(30,6, utf8_decode('BIEN O SERVICIO'),1,0,'C',1);
$pdf->Cell(60,6, utf8_decode('DESCRIPCION'),1,0,'C',1);
$pdf->Cell(20,6, utf8_decode('CANTIDAD'),1,0,'C',1);
$pdf->Cell(30,6, utf8_decode('P/U ANTES IVA'),1,0,'C',1);
$pdf->Cell(20,6, utf8_decode('IVA'),1,0,'C',1);
$pdf->Cell(20,6, utf8_decode('TOTAL'),1,1,'C',1);

$sql="SELECT productos.nombre_producto, productos.descripcion_producto,detalle_ordencompra.cantidad,detalle_ordencompra.valor FROM detalle_ordencompra, productos WHERE detalle_ordencompra.id_ordencompra = $id AND detalle_ordencompra.producto_id=productos.id_producto; ";
$resultado= $db ->query($sql);
while ($row = $resultado->fetch_assoc() ) {
    $pdf->SetTextColor(0,0,0);
    $pdf->SetFont('Arial','B',6);
    $pdf->Cell(30,6, utf8_decode($row['nombre_producto']),1,0,'C',0);
    $pdf->Cell(60,6, utf8_decode($row['descripcion_producto']),1,0,'C',0);
    $pdf->SetFont('Arial','B',7);
    $pdf->Cell(20,6, number_format($row['cantidad']),1,0,'C',0);
    $pdf->Cell(30,6,'$ '.number_format($row['valor']/1.19),1,0,'C',0);
    $pdf->Cell(20,6, '$ '.number_format($row['valor']-($row['valor']/1.19)),1,0,'C',0);
    $pdf->Cell(20,6, '$ '.number_format($row['valor']*$row['cantidad']),1,1,'C',0);

}

$pdf->Cell(180,6, utf8_decode('ANTICIPOS'),1,1,'C',0);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(60,6, utf8_decode('FECHA'),1,0,'C',1);
$pdf->Cell(60,6, utf8_decode('FORMA DE PAGO'),1,0,'C',1);
$pdf->Cell(60,6, utf8_decode('VALOR'),1,1,'C',1);
$pdf->SetTextColor(0,0,0);

$sql="SELECT * FROM anticipos 
WHERE anticipos.id_ordencompra  = $id ";
$resultado= $db ->query($sql);
while ($row = $resultado->fetch_assoc() ) {
$pdf->Cell(60,6, utf8_decode($row['fecha_registro']),1,0,'C',0);
$pdf->Cell(60,6, utf8_decode($row['forma_pago']),1,0,'C',0);
$pdf->Cell(60,6, number_format($row['valor']),1,1,'C',0);
}
$pdf->Cell(180,6, utf8_decode('TOTALES'),1,1,'C',0);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(90,6, utf8_decode('VALOR TOTAL ORDEN DE COMPRA'),1,0,'C',1);
$pdf->Cell(90,6, utf8_decode('VALOR TOTAL ANTICIPOS'),1,1,'C',1);
$pdf->SetTextColor(0,0,0);
$sql="SELECT * FROM ordenesdecompra,proveedores
WHERE ordenesdecompra.id_ordenescompra = $id
AND ordenesdecompra.id_usradmin = $ccusr
AND ordenesdecompra.id_proveedor = proveedores.id_proveedor";
$resultado= $db ->query($sql);
while ($row = $resultado->fetch_assoc() ) {
$pdf->Cell(90,6, number_format($row['valor_total']),1,0,'C',0);
    }


$sql="SELECT SUM(valor) FROM anticipos
WHERE anticipos.id_ordencompra = $id ";
$resultado= $db ->query($sql);
while ($row = $resultado->fetch_assoc() ) {
$pdf->Cell(90,6, number_format($row['SUM(valor)']),1,1,'C',0);
}

$pdf->Cell(180,40, '',0,1,'C',0);
$pdf->Cell(90,6, '____________________________________________',0,0,'L',0);
$pdf->Cell(90,6, '____________________________________________',0,1,'L',0);
$pdf->Cell(90,6, 'REALIZADO',0,0,'L',0);
$pdf->Cell(90,6, 'AUTORIZADO',0,1,'L',0);
$sql="SELECT * FROM usr_admin
WHERE usr_admin.identificacion = $ccusr ";
$resultado= $db ->query($sql);
while ($row = $resultado->fetch_assoc() ) {
$pdf->Cell(90,6, utf8_decode($row['nombre']),0,0,'L',0);
$pdf->Cell(90,6, utf8_decode('CRISS DAYANA RAMIREZ'),0,1,'L',0);
$pdf->Cell(90,6, utf8_decode('CARGO'),0,0,'L',0);
$pdf->Cell(90,6, utf8_decode('GERENTE '),0,1,'L',0);
}
$pdf->Output();
?>