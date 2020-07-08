

<?php
#A4 = 210 x 297
require('fpdf182\fpdf.php');
require('fpdf182\makefont\makefont.php');
function iso88592($string){
    $string = mb_convert_encoding($string,'ISO-8859-2');
    return $string;
}
class MojRacun extends FPDF{
    
    public $id;
    
    public function set_ID($id){
    $this->id = $id;
    }
    
    public function header(){
        $this->AddFont('Roboto-Black','','Roboto-Black.php');
        $this->AddFont('Roboto-Medium','','Roboto-Medium.php');
        $this->AddFont('Roboto-Thin','','Roboto-Thin.php');
        $this->AddFont('Roboto-Light','','Roboto-Light.php');
        $this->SetFont('Roboto-Medium','',16);
        $str_bill = 'Račun '.$this->id.'/'.date('Y');
        $this->Cell(90,20,iso88592($str_bill),'B',0,'L');
        $this->SetFont('Roboto-Medium','',20);
        $this->Cell(100,20,'Apartmani Vlasta ','B',1,'R');
        $this->Ln(20);
        
    }
    public function footer(){
        $this->setY(-70);
        $this->SetFont('Roboto-Light','',13);
        $this->Cell(120,15,'U ____________________, datuma:______________.',0,0,'L');
        $this->Cell(70,15,'Potpis/Signature: ',0,1,'C');
        $this->Cell(190,15,'________________________________',0,1,'R');
        $this->SetFont('Roboto-Thin','',12);
        $this->Cell(180,20,iso88592('Uživajte na našoj obali!'),0,1,'C');
    }
    public function userInfo($name,$address,$oib){
        $this->SetFont('Roboto-Medium','',17);
        $this->Cell(60,20,'Gost',0,0,'C');
        $this->Cell(70,20,'',0,0,'C');
        $this->Cell(60,20,'Vlasnik',0,1,'C');
        $this->SetFont('Roboto-Light','',11);
        $this->Cell(60,10,iso88592('Ime: '.$name),0,0,'L');
        $this->Cell(70,10,'',0,0,'C');
        $this->Cell(60,10,'Ime: Vlasta Stefani',0,1,'L');
        $this->Cell(60,10,iso88592('Nesto od gosta: '.$address),0,0,'L');
        $this->Cell(70,10,'',0,0,'C');
        $this->Cell(60,10,'Adresa: Zidarska 65',0,1,'L');
        $this->Cell(60,10,'OIB: '.$oib,0,0,'L');
        $this->Cell(70,10,'',0,0,'C');
        $this->Cell(60,10,'OIB: Tu unesesmo OIB',0,1,'L');
        $this->Cell(130,10,'',0,0,'C');
        $this->Cell(60,10,'email: orjena01@gmail.com',0,1,'L');
        $this->Cell(190,10,'',0,1,'C');
    }
    public function headerTable(){
        $this->SetFont('Roboto-Light','',11);
        $this->SetFillColor(153, 187, 255);
        $this->Cell(35,10,'Vrsta usluge ',1,0,'C',true);
        $this->Cell(40,10,'Iznos akontacije',1,0,'C',true);
        $this->Cell(40,10,iso88592('Broj noći'),1,0,'C',true);
        $this->Cell(40,10,iso88592('Jedinična cijena'),1,0,'C',true);
        $this->Cell(35,10,'Ukupno',1,1,'C',true);
    }
    public function tableContent($tservice,$noAcc,$noNights,$unitPrice,$Total){
        $this->SetFont('Roboto-Light','',11);
        $this->Cell(35,10,$tservice,1,0,'C');
        $this->Cell(40,10,$noAcc,1,0,'C');
        $this->Cell(40,10,$noNights,1,0,'C');
        $this->Cell(40,10,$unitPrice,1,0,'C');
        $this->Cell(35,10,$Total,1,1,'C');
    }
    public function billInfo($paymentMet,$dateOfBill){
        $this->SetFont('Roboto-Light','',11);
        $this->Ln(30);
        #datum izdavanja računa vučemo iz baze, ne danasnji datum
        $this->Cell(60,10,'Datum racuna: '.$dateOfBill,0,1,'C');
        $this->Cell(60,10,iso88592('Način plaćanja: ').$paymentMet,0,1,'C');
    }

    
}
$racun=new MojRacun();
$racun->id = 1;
$racun->SetTitle('Racun br.<broj racuna>',false);
$racun->AddPage('P','A4',0);
$racun->userInfo('Tin Marečić','Ede Starca 11', rand());
$racun->headerTable();
$racun->tableContent('Najam apartmana','1','4','60 EUR','240 EUR');
$racun->billInfo('Gotovina',date('d.m.Y'));
$racun->Output('I','Tin Marečić',false);
?>