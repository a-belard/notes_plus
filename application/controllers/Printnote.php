<?php
require("fpdf183/fpdf.php");
class pdfNote extends FPDF{
    protected $extgstates = array();
    function SetAlpha($alpha, $bm='Normal')
    {
        $gs = $this->AddExtGState(array('ca'=>$alpha, 'CA'=>$alpha, 'BM'=>'/'.$bm));
        $this->SetExtGState($gs);
    }

    function AddExtGState($parms)
    {
        $n = count($this->extgstates)+1;
        $this->extgstates[$n]['parms'] = $parms;
        return $n;
    }

    function SetExtGState($gs)
    {
        $this->_out(sprintf('/GS%d gs', $gs));
    }

    function _enddoc()
    {
        if(!empty($this->extgstates) && $this->PDFVersion<'1.4')
            $this->PDFVersion='1.4';
        parent::_enddoc();
    }

    function _putextgstates()
    {
        for ($i = 1; $i <= count($this->extgstates); $i++)
        {
            $this->_newobj();
            $this->extgstates[$i]['n'] = $this->n;
            $this->_put('<</Type /ExtGState');
            $parms = $this->extgstates[$i]['parms'];
            $this->_put(sprintf('/ca %.3F', $parms['ca']));
            $this->_put(sprintf('/CA %.3F', $parms['CA']));
            $this->_put('/BM '.$parms['BM']);
            $this->_put('>>');
            $this->_put('endobj');
        }
    }

    function _putresourcedict()
    {
        parent::_putresourcedict();
        $this->_put('/ExtGState <<');
        foreach($this->extgstates as $k=>$extgstate)
            $this->_put('/GS'.$k.' '.$extgstate['n'].' 0 R');
        $this->_put('>>');
    }

    function _putresources()
    {
        $this->_putextgstates();
        parent::_putresources();
    }
    function myHeader($title){
        $this -> SetFont('Arial','B',20);
        $this -> SetTextColor(150,50,50);
        $this -> Cell(30,0,$title,0,0,'L');
    }
    function body($content){
        $this -> SetTextColor(0);
        $this -> Cell(0,10," ");
        $this -> ln();
        $this -> setFont("courier",'',15);
        $this -> MultiCell(0,5,$content);
    }
    function Footer(){
        $this -> SetY(-10);
        $this -> SetFont('Courier','',12);
        $this -> SetAlpha(0.8);
        $this -> Cell(0, 0,date("h:m A",strtotime($GLOBALS["date"])),0,0,'L');
        $this -> Cell(0, 0,date("l, dS M Y",strtotime($GLOBALS["date"])),0,0,'R');
    }
}

class Printnote extends MY_Controller{
    public function index(){
        $this->load->model('Model_note'); 
        $id = $_GET['id'];
        $data = $this->Model_note->getSingleNoteData($id);
        $GLOBALS["date"] = $data["date_created"];
        $this->fpdf = new pdfNote('P', 'mm', [150,120]);
        $this->fpdf->AddPage();
        $this->fpdf->myHeader($data["title"]);
        $this->fpdf->body($data["content"]);
       echo $this->fpdf->Output();
    }
}
?>

