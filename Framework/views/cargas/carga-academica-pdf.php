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
  
    $this->Cell(50,10,'Carga Academica',0,1,'L');  
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

    $pdf->Cell(120,10,$this->getAcademicPeriod['matricula'],0,1,'L');
    
    $pdf->SetFont('Arial','B',8);

    $pdf->SetXY(10,40);

    $pdf->Cell(25,10,'Periodo: ',0,0,'L');
    
    $pdf->SetFont('Arial','',8);

    $pdf->Cell(20,10,$this->data['info'],0,1,'L');

    $pdf->SetFont('Arial','B',8);

    $pdf->SetXY(75,35);

    $pdf->Cell(35,10,'Alumno: ',0,0,'L');

    $pdf->SetFont('Arial','',8);

    $pdf->SetXY(100,35);
    
    $pdf->Cell(40,10,$this->getAcademicPeriod['nombre'],0,0,'L');

    $pdf->SetFont('Arial','B',8);

    $pdf->SetXY(75,40);
    
    $pdf->Cell(35,10,'Carrera: ',0,0,'L');

    $pdf->SetFont('Arial','',8);

    $pdf->SetXY(100,40);
    
    $pdf->Cell(40,10,$this->getAcademicPeriod['clave_carrera'] . $this->getAcademicPeriod['plan_clave'] . " ". $this->getAcademicPeriod['carrera_nombre'] ,0,0,'L');


    //Horario del alumno
    $pdf->SetFontSize(10);
    $pdf->SetXY(4,50); 
    $pdf->SetFont('Arial','B',6);

    $pdf->Cell(10,10, 'Clave' ,1,0,'C');
    $pdf->Cell(45,10, 'Materia' ,1,0,'C');
    
    $pdf->Cell(8,10, 'CR' ,1,0,'C');
    //$pdf->Cell(20,10, ($key['cr']) ,1,1,'C');
    $pdf->Cell(45,10, 'Docentes' ,1,0,'C');
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

    $pdf->SetFont('Arial','',4.5);
    $pdf->SetY(60);
    $vector = $this->getAcademicMat; 
    foreach ($vector as $key) { 
       $pdf->SetX(4); 
       $pdf->Cell(10,10, ($key['clave_materia']) ,1,1 ,'C');
    }

    $pdf->SetY(60);
    foreach ($vector as $key) { 
       $pdf->SetX(14); 
       $pdf->Cell(45,10, ($key['nombre_mater']) ,1,1 ,'L');
    }

    $pdf->SetY(60);
    foreach ($vector as $key) { 
       $pdf->SetX(59); 
       $pdf->Cell(8,10, ($key['cr']) ,1,1 ,'C');
    }

    $pdf->SetY(60);
    foreach ($vector as $key) { 
       $pdf->SetX(67); 
       $pdf->Cell(45,10, ($key['nombre_profesor']) . ($key['apellido_profesor']) ,1,1 ,'L');
    }

    $pdf->SetY(60);
    foreach ($vector as $key) { 
       $pdf->SetX(112); 
       $pdf->Cell(20,10, ($key['lunes']) . " " . ($key['lunes_aula']) ,1,1 ,'C');
    }

    $pdf->SetY(60);
    foreach ($vector as $key) { 
       $pdf->SetX(132); 
       $pdf->Cell(20,10, ($key['martes']) . " " . ($key['martes_aula']) ,1,1 ,'C');
    }

    $pdf->SetY(60);
    foreach ($vector as $key) { 
       $pdf->SetX(152); 
       $pdf->Cell(20,10, ($key['miercoles']) . " " . ($key['miercoles_aula']) ,1,1 ,'C');
    }

    $pdf->SetY(60);
    foreach ($vector as $key) { 
       $pdf->SetX(172); 
       $pdf->Cell(20,10, ($key['jueves']) . " " . ($key['jueves_aula']) ,1,1 ,'C');
    }

    $pdf->SetY(60);
    foreach ($vector as $key) { 
       $pdf->SetX(192); 
       $pdf->Cell(20,10, ($key['viernes']) . " " . ($key['viernes_aula']) ,1,1 ,'C');
    }

$pdf->Ln(13);
    
    // Arial bold 15
    $pdf->SetFont('Arial','B',12);
    // Movernos a la derecha
    $pdf->Cell(80);
    // Título
    $pdf->Cell(50,10,'Universidad Politecnica de Quintana Roo',0,0,'C');

    $pdf->Line(170,153,60,153);
    
    $pdf->Image('public/img/politecnica.jpg',10,135,-200);
    // Salto de línea
    $pdf->Ln(15);

     $pdf->SetFont('Arial','B',8);

    $pdf->Cell(25,10,'Matricula: ',0,0,'L');

    $pdf->SetFont('Arial','',8);

    $pdf->Cell(120,10,$this->getAcademicPeriod['matricula'],0,1,'L');
    
    $pdf->SetFont('Arial','B',8);

    $pdf->SetXY(10,165);

    $pdf->Cell(25,10,'Periodo: ',0,0,'L');
    
    $pdf->SetFont('Arial','',8);

    $pdf->Cell(20,10,$this->data['info'],0,1,'L');

    $pdf->SetFont('Arial','B',8);

    $pdf->SetXY(75,158);

    $pdf->Cell(35,10,'Alumno: ',0,0,'L');

    $pdf->SetFont('Arial','',8);

    $pdf->SetXY(100,158);
    
    $pdf->Cell(40,10,$this->getAcademicPeriod['nombre'],0,0,'L');

    $pdf->SetFont('Arial','B',8);

    $pdf->SetXY(75,165);
    
    $pdf->Cell(35,10,'Carrera: ',0,0,'L');

    $pdf->SetFont('Arial','',8);

    $pdf->SetXY(100,165);
    
    $pdf->Cell(40,10,$this->getAcademicPeriod['clave_carrera'] . $this->getAcademicPeriod['plan_clave'] . " ". $this->getAcademicPeriod['carrera_nombre'] ,0,0,'L');

    $pdf->SetFontSize(10);
    $pdf->SetXY(4,175); 
    $pdf->SetFont('Arial','B',6);

    $pdf->Cell(10,10, 'Clave' ,1,0,'C');
    $pdf->Cell(45,10, 'Materia' ,1,0,'C');
    
    $pdf->Cell(8,10, 'CR' ,1,0,'C');
    //$pdf->Cell(20,10, ($key['cr']) ,1,1,'C');
    $pdf->Cell(45,10, 'Docentes' ,1,0,'C');
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
    
    $pdf->SetFont('Arial','',4.5);
    $pdf->SetY(185);
    $vector = $this->getAcademicMat; 
    foreach ($vector as $key) { 
       $pdf->SetX(4); 
       $pdf->Cell(10,10, ($key['clave_materia']) ,1,1 ,'C');
    }

     $pdf->SetY(185);
    foreach ($vector as $key) { 
       $pdf->SetX(14); 
       $pdf->Cell(45,10, ($key['nombre_mater']) ,1,1 ,'L');
    }

    $pdf->SetY(185);
    foreach ($vector as $key) { 
       $pdf->SetX(59); 
       $pdf->Cell(8,10, ($key['cr']) ,1,1 ,'C');
    }

    $pdf->SetY(185);
    foreach ($vector as $key) { 
       $pdf->SetX(67); 
       $pdf->Cell(45,10, ($key['nombre_profesor']) . ($key['apellido_profesor']) ,1,1 ,'L');
    }

    $pdf->SetY(185);
    foreach ($vector as $key) { 
       $pdf->SetX(112); 
       $pdf->Cell(20,10, ($key['lunes']) . " " . ($key['lunes_aula']) ,1,1 ,'C');
    }

    $pdf->SetY(185);
    foreach ($vector as $key) { 
       $pdf->SetX(132); 
       $pdf->Cell(20,10, ($key['martes']) . " " . ($key['martes_aula']) ,1,1 ,'C');
    }

    $pdf->SetY(185);
    foreach ($vector as $key) { 
       $pdf->SetX(152); 
       $pdf->Cell(20,10, ($key['miercoles']) . " " . ($key['miercoles_aula']) ,1,1 ,'C');
    }

    $pdf->SetY(185);
    foreach ($vector as $key) { 
       $pdf->SetX(172); 
       $pdf->Cell(20,10, ($key['jueves']) . " " . ($key['jueves_aula']) ,1,1 ,'C');
    }

    $pdf->SetY(185);
    foreach ($vector as $key) { 
       $pdf->SetX(192); 
       $pdf->Cell(20,10, ($key['viernes']) . " " . ($key['viernes_aula']) ,1,1 ,'C');
    }

$pdf->Output();
?>
