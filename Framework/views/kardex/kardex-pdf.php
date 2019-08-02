<?php
require_once __DIR__.'/../../fpdf/fpdf.php';

class PDF extends FPDF
{
// Cabecera de página
public function Header()
{
     $this->SetFont('Arial','B',12);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(50,10,'Universidad Politecnica de Quintana Roo',0,0,'C');

    $this->Line(170,20,60,20);

    $this->Image('public/img/politecnica.jpg',10,5,-200);
    // Salto de línea
    $this->Ln(15);

    $this->SetFont('Arial','B',11);
  
    $this->Cell(50,10,'Kardex',0,1,'L');  
}

// Pie de página
public function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','B',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF('P','mm', array(216,279));
$pdf->AliasNbPages();
$pdf->AddPage();
    $pdf->SetFont('Arial','B',8);


    $pdf->Cell(25,10,'Matricula: ',0,0,'L');

    $pdf->SetFont('Arial','',8);

    $pdf->SetXY(60,35);

    $pdf->Cell(150,10,$_SESSION['usuario']['matricula'],0,1,'L');
    
    $pdf->SetFont('Arial','B',8);

    $pdf->SetXY(10,40);

    $pdf->Cell(25,10,'Creditos acumulados: ',0,0,'L');
    
    $pdf->SetFont('Arial','',8);

    $pdf->SetXY(60,40);

    $pdf->Cell(20,10,$this->creditos,0,1,'L');

    $pdf->SetFont('Arial','B',8);

    $pdf->SetXY(100,35);

    $pdf->Cell(35,10,'Porcentaje de avance: ',0,0,'L');

    $pdf->SetFont('Arial','',8);

    $pdf->SetXY(150,35);
    
    $pdf->Cell(40,10,$this->porcentaje,0,0,'L');

    $pdf->SetFont('Arial','B',8);

    $pdf->SetXY(100,40);
    
    $pdf->Cell(35,10,'Promedio: ',0,0,'L');

    $pdf->SetFont('Arial','',8);

    $pdf->SetXY(150,40);
    
    $pdf->Cell(40,10,$this->promedio,0,0,'L');

    // Variable de linea
    $numCeldaY = 50;

    //Kardex del alumno
    $pdf->SetFontSize(10);
    $pdf->SetXY(4,$numCeldaY); 
    $pdf->SetFont('Arial','B',6);
    $pdf->Cell(20,10, 'Clave' ,1,0,'C');
    $pdf->Cell(70,10, 'Materia' ,1,0,'C');
    $pdf->Cell(20,10, 'Calificacion' ,1,0,'C');
    $pdf->Cell(25,10, 'Oportunidad' ,1,0,'C');
    $pdf->Cell(20,10, 'Cuatrimestre' ,1,0,'C');
    $pdf->Cell(30,10, 'Periodo' ,1,0,'C');
    $pdf->Cell(20,10, 'Especial' ,1,0,'C');

    foreach ($this->datos as $dato){

        $numCeldaY = $numCeldaY + 10;

        if($numCeldaY >= 260){
            $numCeldaY = 45;
        }

        $pdf->SetFontSize(8);
        $pdf->SetXY(4,$numCeldaY);

        $clave = $dato['claveMat'];
        $materia = utf8_decode($dato['nombreMat']);
        $array_materia = explode(' ', $materia); 
        $nombre_materia = "";

        for($i = 0; $i < count($array_materia); $i++){
            if($array_materia[$i] != ""){
                $nombre_materia = $nombre_materia . " " . $array_materia[$i];
            }
        }

        $pdf->Cell(20,10, ($clave),1,0,'C');
        $pdf->Cell(70,10, $nombre_materia,1,0,'C');
        $pdf->Cell(20,10, $dato['calfMat'],1,0,'C');
        $pdf->Cell(25,10, $dato['opMat'],1,0,'C');
        $pdf->Cell(20,10, $dato['cuatriPri'],1,0,'C');
        $pdf->Cell(30,10, $dato['periodPri'],1,0,'C');
        $pdf->Cell(20,10, $dato['especial'],1,0,'C');

    }
    
$pdf->Output();
?>
