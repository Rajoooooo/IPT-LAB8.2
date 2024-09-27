<?php

namespace App\Outputs;

use App\Outputs\ProfileFormatter;
use Fpdf\Fpdf;

class PDFFormat implements ProfileFormatter
{
    private $pdf;

    public function setData($profile)
    {
        $this->pdf = new Fpdf();
        $this->pdf->AddPage();

    
        $logoUrl = 'https://www.auf.edu.ph/images/auf-logo.png'; 
        $this->pdf->Image($logoUrl, 3, 3, 10); 

       
        $this->pdf->AddFont('Times', '', 'times.php'); 
        $this->pdf->SetFont('Times', 'B', 14); 
        $this->pdf->Cell(0, 10, 'Story:', 0, 1, 'C'); 
        
        $this->pdf->SetFont('Times', '', 12); 
        $this->pdf->MultiCell(0, 10, $profile->getStory(), 0, 'C'); 
    }

    public function render()
    {
        return $this->pdf->Output('I', 'profile_' . time() . '.pdf'); 
    }
}
