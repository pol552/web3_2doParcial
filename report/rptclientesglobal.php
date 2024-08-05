<?php
session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . "/cocina/config/global.php");
require_once(ROOT_DIR . "/model/Ven_clientesModel.php");
require(ROOT_CORE . '/fpdf/fpdf.php');

class PDF extends FPDF
{
    function convertxt($p_txt)
    {
        return iconv('UTF-8', 'iso-8859-1', $p_txt);
    }
    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, "Reporte ", 0, 1, 'C');
    }
    function Footer()
    {
        $this->SetY(-15);
        $this->setFont('Arial', 'I', 8);
        $this->Cell(0, 10, $this->convertxt("Página ") . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$rpt = new Ven_clientesModel();
$records = $rpt->findall();
$records = $records['DATA'];

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// Cabecera
$pdf->SetFont('Arial', 'B', 12);
$header = array($pdf->convertxt("No."), $pdf->convertxt("Nombre"), $pdf->convertxt("Tipo"), $pdf->convertxt("Marca"), $pdf->convertxt("Precio"));
$widths = array(10, 40, 40, 40, 40); // Se agrega un cuarto elemento para 'Marca'

for ($i = 0; $i < count($header); $i++) {
    $pdf->Cell($widths[$i], 7, $header[$i], 1);
}
$pdf->Ln();

// Cuerpo
$pdf->SetFont('Arial', '', 10);
foreach ($records as $row) {
    $pdf->Cell($widths[0], 6, $pdf->convertxt($row['id']), 1);
    $pdf->Cell($widths[1], 6, $pdf->convertxt($row['nombre']), 1);
    $pdf->Cell($widths[2], 6, $pdf->convertxt($row['tipo']), 1);
    $pdf->Cell($widths[3], 6, $pdf->convertxt($row['marca']), 1); // Asegúrate de que este índice existe
    $pdf->Cell($widths[4], 6, $pdf->convertxt($row['precio']), 1);

    $pdf->Ln();
}

$pdf->Output();
?>
