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
    function myHeader($title, $date){
        $this -> SetFont('Arial','',12);
        $this -> SetAlpha(0.85);
        $this -> Cell(30, 20,date("D dS M Y",strtotime($date)),0,0,'L');
        $this -> ln();
        $this -> SetAlpha(1);
        $this -> SetFont('Arial','B',16);
        $this -> Cell(30,0,$title,0,0,'L');
        $this -> ln();
    }
    function body($content){
        $this -> setFont("Arial",'',12);

    }
}

class Printnote extends MY_Controller{
    public function index(){
        $this->load->model('Model_note'); 
        $id = $_GET['id'];
        $data = $this->Model_note->getSingleNoteData($id);
        $this->fpdf = new pdfNote('P', 'mm', [170,200]);
        $this->fpdf->AddPage();
        $this->fpdf->myHeader($data["title"], $data["date_created"]);
       echo $this->fpdf->Output();
    }
}
?>

