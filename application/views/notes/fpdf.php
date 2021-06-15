<?php

include "./fpdf183/fpdf.php";
$db = new PDO('mysql:host=localhost;dbname=notes_plus','root','');

class myPDF extendS FPDF{
    function  header(){
        $id = $_GET['id'];
        $query = "SELECT title from notes where noteId = $id";
        $this -> image('a.png',10,3,40);
        $this -> SetFont('Arial','B',14);
        $this -> Cell(300,20,'Rwanda Admnistrative system',0,0,'C');
        $this -> ln();
    }

    function  footer(){
        $this -> SetY(-15);
        $this -> SetFont('Arial','',8);
        $this -> cell(0,10,'Page'.$this -> PageNo().' ',0,0,'C');
    }

    function headerTable(){
        $this -> SetFont('Times','B',12);
        $this -> Cell(40,10,'villageId',1,0,'C');
        $this -> Cell(40,10,'Province',1,0,'C');
        $this -> Cell(40,10,'District',1,0,'C');
        $this -> Cell(40,10,'Sector',1,0,'C');
        $this -> Cell(40,10,'cell',1,0,'C');
        $this -> Cell(40,10,'village',1,0,'C');
        $this -> Ln();
    }
    function viewTable($db){
        $this -> setFont('Times','',12);
        $sql = "SELECT villageId, villageName, c.cellName, s.sectorName, d.districtName, 
        p.provinceName from village v, cell c, sector s, district d, province p where v.cellId = c.cellId and
         c.sectorId = s.sectorId and s.districtId = d.districtId and d.provinceId = p.provinceId limit 128" ;
        $stmt = $db->query($sql);
        while($data = $stmt -> fetch(PDO::FETCH_OBJ)){
            $this -> Cell(40,10,$data->villageId,1,0,'C');
            $this -> Cell(40,10,$data->provinceName,1,0,'L');
            $this -> Cell(40,10,$data->districtName,1,0,'L');
            $this -> Cell(40,10,$data->sectorName,1,0,'L');
            $this -> Cell(40,10,$data->cellName,1,0,'L');
            $this -> Cell(40,10,$data->villageName,1,0,'L');
            $this -> Ln();
        }
    }
}

$pdf = new myPDF();
$pdf -> AliasNbPages();
$pdf -> AddPage('L','A4',0);
$pdf -> headerTable();
$pdf -> viewTable($db);
$pdf -> Output();

?>