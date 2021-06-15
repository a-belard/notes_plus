<?php
require("fpdf183/fpdf.php");
class pdfNote extends FPDF{
    function myHeader($title, $date){
        $this -> SetFont('Arial','B',14);
        $this-> SetTextColor(12,15,200);
        $this -> Cell(50,20,$title,0,0,'C');
        $this -> SetFont('Arial','',14);
        $this-> SetTextColor(12,15,200);
        $this -> Cell(200,20,$date,0,0,'C');
        $this -> ln();
    }
    function body($content){
        $this -> setFont("Arial",'',12);

    }
}

class myPdf extends MY_Controller{
    public function index(){
        $this->load->model('Model_note'); 
        $id = $_GET['id'];
        $data = $this->Model_note->getSingleNoteData($id);
        $this->fpdf = new pdfNote('P', 'mm', 'A4');
        $this->fpdf->AddPage();
        $this->fpdf->myHeader($data["title"], $data["date_created"]);
       echo $this->fpdf->Output();
    }
}
?>

