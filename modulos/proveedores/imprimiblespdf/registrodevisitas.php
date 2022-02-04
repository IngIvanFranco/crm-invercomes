
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
   
    $this->Image('../img/Logo-Invercomes-Horizontal.png',80,3,43,'C');
    $this->Ln(10);
    // Arial bold 15
    $this->SetFont('Arial','B',12);
    // Movernos a la derecha
    $this->Cell(40);
    // Título
    $this->Cell(110,6,'REGISTRO DE VISITAS INSTITUCIONALES',0,0,'C');
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
    $this->MultiCell(190,4,utf8_decode('Nota: Autorizo a  INVERCOMES para el tratamiento de la información aquí consignada, conozca la destinacion de la misma y el carácter facultativo que me asiste para el otorgamiento de mis datos sensibles de conformidad por lo establecido por la ley 1581 de 2012 por lo cual se dictan disposiciones generales para la protección de datos personales.'),1,1,'');
}
}

$sql="SELECT * FROM visitas,proveedores, usr_admin
WHERE visitas.id_visita = $id
AND visitas.id_proveedor=proveedores.id_proveedor
AND visitas.id_usr = $ccusr
AND visitas.id_usr = usr_admin.identificacion";
$resultado= $db ->query($sql);



// Creación del objeto de la clase heredada
$pdf = new PDF();

$pdf->AddPage();
$pdf->SetFont('Arial','B',12);

while ($row = $resultado->fetch_assoc() ) {
    $pdf->Cell(60,6, 'Fecha visita: '.$row['fecha_visita'],1,0,'L',0);
    $pdf->Cell(50,6, utf8_decode('Ciudad: Ibagué'),1,0,'L',0);
    $pdf->Cell(70,6, utf8_decode('Departamento: Tolima'),1,1,'L',0);
    $pdf->Cell(110,6, utf8_decode('Gestor: '.$row['nombre'].''),1,0,'L',0);
    $pdf->Cell(70,6, utf8_decode('Sector: '.$row['linea'].''),1,1,'L',0);
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(180,6, utf8_decode('INFORMACIÓN DE LA EMPRESA'),1,1,'C',1);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(40,6, 'Nit: '.$row['nit_proveedor'],1,0,'L',0);
    $pdf->Cell(70,6, 'Tipo de visita: '.utf8_decode($row['tipovisita']),1,0,'L',0);
    $pdf->Cell(70,6, utf8_decode('Distribución: '.$row['tipodistribucion']),1,1,'L',0);
    $pdf->Cell(180,6, utf8_decode('Razón social: '.$row['nombre_proveedor'].''),1,1,'L',0);
    $pdf->Cell(180,6, utf8_decode('Dirección: '.$row['lugar']),1,1,'L',0);
    $pdf->Cell(70,6, utf8_decode('Telefono: '.$row['telefono_proveedor']),1,0,'L',0);
    $pdf->Cell(110,6, utf8_decode('Email: '.$row['Correo_proveedor']),1,1,'L',0);
    $pdf->Cell(70,6, utf8_decode('Contacto: '.$row['asesor']),1,0,'L',0);
    $pdf->Cell(110,6, utf8_decode('Representante legal: '),1,1,'L',0);
    $pdf->Cell(180,6, utf8_decode('Nombre de la persona que lo antendio: '),1,1,'L',0);

}
$pdf->SetTextColor(255,255,255);
$pdf->Cell(180,6, utf8_decode('PEDIDO '),1,1,'C',1);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(180,100, utf8_decode(''),1,1,'C',0);
$pdf->Cell(180,6, utf8_decode('Observaciones:'),1,1,'L',0);
$pdf->Cell(180,6, utf8_decode(''),1,1,'C',0);
$pdf->Cell(180,6, utf8_decode(''),1,1,'C',0);
$pdf->Cell(180,12, utf8_decode(''),0,1,'C',0);
$pdf->Cell(180,6, utf8_decode('Firma'),0,1,'L',0);
$pdf->Cell(180,36, utf8_decode(''),0,1,'C',0);
$pdf->Cell(90,6, utf8_decode('Empresa'),0,0,'C',0);
$pdf->Cell(90,6, utf8_decode('Invercomes'),0,1,'C',0);

$pdf->Output();
?>