<?php
require('bill.php');
require('db.php');
$conn = db();
$id_racuna = $_GET['id_bill'];
$sql_bill ='SELECT * FROM bill where id = '.$id_racuna.';';
$result = ($conn->query($sql_bill))->fetch_assoc();
$unit_price = $result['unit_price'];
$petPrice = $result['pet_price'];
$akontacija = $result['accontation'];
$start_date = $result['date_from'];
$end_date = $result['date_to'];
$start_date = new DateTime($start_date);
$end_date = new DateTime($end_date);
$noNights = $end_date->diff($start_date)->format("%d");
$start_date = $start_date->format('d.m.Y');
$end_date = $end_date->format('d.m.Y');
$racun = new MojRacun();
$racun->set_ID($id_racuna);
$racun->SetTitle('Racun '.$id_racuna,false);
$racun->AddPage('P','A4',0);
$racun->userInfo($result['guest_name'],$start_date,$end_date);
$racun->headerTable();
if($result['has_pet'] == '1'){
    $petCost = $petPrice*$noNights;
    $racun->tableContent('Ljubimac','0',$noNights,$petPrice,$petCost,$petCost);
}
else{
    $petCost = 0;
}
$total_pay = $noNights*$unit_price;
$to_pay = $total_pay-$akontacija;
$racun->tableContent('Najam apartmana',$akontacija,$noNights,$unit_price,$to_pay,$total_pay);
$racun->totalPrice($total_pay,$petCost);
$racun->billInfo('Gotovina',date('d.m.Y'));
$racun->Output('I',iso88592($result['guest_name']).date('d-m-Y').'.pdf',false);
?>