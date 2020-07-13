

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
        $this->Cell(190,20,iso88592('Uživajte na našoj obali!'),0,1,'C');
        for($i=0;$i < 210;$i+=70){
        $this->Image('media/waves.png',$i,270,70,20);
        }
    }
    public function userInfo($name,$date_arrival,$date_depart){
        $this->SetFont('Roboto-Medium','',17);
        $this->Cell(60,20,'Gost',0,0,'R');
        $this->Cell(70,20,'',0,0,'C');
        $this->Cell(60,20,'Vlasnik',0,1,'L');
        $this->SetFont('Roboto-Light','',11);
        $this->Cell(60,10,iso88592('Ime: '.$name),0,0,'R');
        $this->Cell(70,10,'',0,0,'C');
        $this->Cell(60,10,'Ime: Vlasta Stefani',0,1,'L');
        $this->Cell(60,10,iso88592('Datum dolaska: '.$date_arrival),0,0,'R');
        $this->Cell(70,10,'',0,0,'C');
        $this->Cell(60,10,'Adresa: Zidarska 65',0,1,'L');
        $this->Cell(60,10,'Datum odlaska: '.$date_depart,0,0,'R');
        $this->Cell(70,10,'',0,0,'C');
        $this->Cell(60,10,'Mob: 099/1866733',0,1,'L');
        $this->Cell(130,10,'',0,0,'C');
        $this->Cell(60,10,'Email: orjena01@gmail.com',0,1,'L');
        $this->Cell(190,10,'',0,1,'C');
    }
    public function headerTable(){
        $this->SetFont('Roboto-thin','',11);
        $this->Cell(40,10,iso88592('*Sve cijene su izražene u kunama'),0,1,'L',false);
        $this->SetFont('Roboto-Light','',11);
        $this->SetFillColor(153, 187, 255);
        $this->Cell(32,10,'Vrsta usluge ',1,0,'C',true);
        $this->Cell(32,10,'Iznos akontacije',1,0,'C',true);
        $this->Cell(32,10,iso88592('Broj noći'),1,0,'C',true);
        $this->Cell(32,10,iso88592('Jedinična cijena'),1,0,'C',true);
        $this->Cell(32,10,'Ostatak za uplatu',1,0,'C',true);
        $this->Cell(32,10,'Ukupno',1,1,'C',true);
    }
    public function tableContent($tservice,$noAcc,$noNights,$unitPrice,$to_pay,$Total){
        $this->SetFont('Roboto-Light','',11);
        $this->Cell(32,10,$tservice,1,0,'C');
        $this->Cell(32,10,$noAcc,1,0,'C');
        $this->Cell(32,10,$noNights,1,0,'C');
        $this->Cell(32,10,$unitPrice,1,0,'C');
        $this->Cell(32,10,$to_pay,1,0,'C');
        $this->Cell(32,10,$Total,1,1,'C');
    }
    public function billInfo($paymentMet,$dateOfBill){
        $this->SetFont('Roboto-Light','',11);
        $this->Ln(10);
        #datum izdavanja računa vučemo iz baze, ne danasnji datum
        $this->Cell(60,10,'Datum racuna: '.$dateOfBill,0,1,'L');
        $this->Cell(60,10,iso88592('Način plaćanja: ').$paymentMet,0,1,'L');
    }
    public function totalPrice($total_acomodation,$total_pet){
        $this->SetFont('Roboto-Black','',11);
        $this->Ln(10);
        $total_price = $total_acomodation + $total_pet;
        $this->Cell(192,10,iso88592('Ukupan iznos računa: '.$total_price),0,1,'R');
    }

    
}
/* $racun=new MojRacun();
$racun->id = 2;
$racun->SetTitle('Racun 2/2020',false);
$racun->AddPage('P','A4',0);
$racun->userInfo('Marko Petak','10.07.2020','15.07.2020');
$racun->headerTable();
if(isset($pet)){
    $racun->tableContent('Ljubimac','0','4','7','240');
}
$racun->tableContent('Najam apartmana','300','5','301','1204.97','1504.97');
$racun->billInfo('Gotovina',date('d.m.Y'));
$racun->Output('I',iso88592('Marko Petak').date('d-m-Y').'.pdf',false); */
?>