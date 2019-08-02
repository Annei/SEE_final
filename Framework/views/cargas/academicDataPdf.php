<?php
require_once __DIR__.'/../../fpdf/fpdf.php';

class PDF extends FPDF
{
// Cabecera de página
public function Header()
{
    // Logo
    //$this->Image('logo_pb.png',10,8,33);

	$this->SetX(45);
    
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(50,10,'Carga Academica',0,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
public function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF('P','mm','A3');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',10);
$pdf->SetY(50); 
//Datos del alumno		
	$pdf->SetX(8);

	$pdf->Cell(40,10,'Matricula',1,0,'L');
    $pdf->Cell(120,10, $this->getAcademicPeriod['matricula'],1,1,'L');
    $pdf->Ln(1);
    
    $pdf->SetX(8); 
    $pdf->Cell(40,10, 'Nombre' ,1,0,'L');
    $pdf->Cell(120,10, $this->getAcademicPeriod['nombre'],1,1,'L');
    $pdf->Ln(1);

	$pdf->SetX(8); 
    $pdf->Cell(40,10, 'Estudia' ,1,0,'L');
    $pdf->Cell(120,10,$this->getAcademicPeriod['clave_carrera'] . $this->getAcademicPeriod['plan_clave'] . " ". $this->getAcademicPeriod['carrera_nombre'] . $this->getAcademicPeriod['plan_inicio'],1,1,'L');
    $pdf->Ln(1);

    $pdf->SetX(8); 
    $pdf->Cell(40,10, 'Plan de estudio' ,1,0,'L');
    $pdf->Cell(120,10,$this->data['info'],1,1,'L');
    $pdf->Ln(15);


    //Horario del alumno
    $pdf->SetFontSize(10);
    $pdf->SetXY(8,100); 

    $pdf->Cell(10,10, 'Clave' ,1,0,'C');
    $pdf->Cell(70,10, 'Materia' ,1,0,'C');
    
    $pdf->Cell(10,10, 'CR' ,1,0,'C');
    //$pdf->Cell(20,10, ($key['cr']) ,1,1,'C');
    $pdf->Cell(70,10, 'Docentes' ,1,0,'C');
    //$pdf->Cell(30,10, 'CRISTHIAN DE JESUS' ,1,1,'C');
    $pdf->Cell(20,10, 'Lunes' ,1,0,'C');
    //$pdf->Cell(20,10, ($key['lunes']) ,1,1,'C');
    $pdf->Cell(20,10, 'Martes' ,1,0,'C');
    //$pdf->Cell(20,10, ($key['martes']) ,1,1,'C');
    $pdf->Cell(20,10, 'Miercoles' ,1,0,'C');
    //$pdf->Cell(20,10,  ($key['miercoles']) ,1,1,'C');
    $pdf->Cell(20,10, 'Jueves' ,1,0,'C');
    //$pdf->Cell(20,10, ($key['jueves']) ,1,1,'C');
    $pdf->Cell(20,10, 'Viernes' ,1,0,'C');
    //$pdf->Cell(20,10, ($key['viernes']) ,1,1,'C');
	$pdf->Ln(10);

	$pdf->SetFont('Times','',7);
	$pdf->SetY(110);
	$vector = $this->getAcademicMat; 
	foreach ($vector as $key) { 
       $pdf->SetX(8); 
       $pdf->Cell(10,10, ($key['clave_materia']) ,1,1 ,'C');
    }

    $pdf->SetY(110);
    foreach ($vector as $key) { 
       $pdf->SetX(18); 
       $pdf->Cell(70,10, ($key['nombre_mater']) ,1,1 ,'L');
    }

    $pdf->SetY(110);
    foreach ($vector as $key) { 
       $pdf->SetX(88); 
       $pdf->Cell(10,10, ($key['cr']) ,1,1 ,'C');
    }

    $pdf->SetY(110);
    foreach ($vector as $key) { 
       $pdf->SetX(98); 
       $pdf->Cell(70,10, ($key['nombre_profesor']) . ($key['apellido_profesor']) ,1,1 ,'L');
    }

    $pdf->SetY(110);
    foreach ($vector as $key) { 
       $pdf->SetX(168); 
       $pdf->Cell(20,10, ($key['lunes']) . " " . ($key['lunes_aula']) ,1,1 ,'C');
    }

    $pdf->SetY(110);
    foreach ($vector as $key) { 
       $pdf->SetX(188); 
       $pdf->Cell(20,10, ($key['martes']) . " " . ($key['martes_aula']) ,1,1 ,'C');
    }

    $pdf->SetY(110);
    foreach ($vector as $key) { 
       $pdf->SetX(208); 
       $pdf->Cell(20,10, ($key['miercoles']) . " " . ($key['miercoles_aula']) ,1,1 ,'C');
    }

    $pdf->SetY(110);
    foreach ($vector as $key) { 
       $pdf->SetX(228); 
       $pdf->Cell(20,10, ($key['jueves']) . " " . ($key['jueves_aula']) ,1,1 ,'C');
    }

    $pdf->SetY(110);
    foreach ($vector as $key) { 
       $pdf->SetX(248); 
       $pdf->Cell(20,10, ($key['viernes']) . " " . ($key['viernes_aula']) ,1,1 ,'C');
    }

  
$pdf->Output();
?>
