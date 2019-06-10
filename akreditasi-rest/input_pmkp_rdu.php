<?php
require_once "conf/conf.php";

$respon = array(
    'status' => 0,
    'result' => array(),
    'msg' => array()
);

$input = array();
    
$input['kpi1'] = trim(@$_POST['kpi1']);
$input['kpi2'] = trim(@$_POST['kpi2']);
$input['ert1'] = trim(@$_POST['ert1']);
$input['ert2'] = trim(@$_POST['ert2']);
$input['tunggurj1'] = trim(@$_POST['tunggurj1']);
$input['tunggurj2'] = trim(@$_POST['tunggurj2']);
$input['operasiefektif1'] = trim(@$_POST['operasiefektif1']);
$input['operasiefektif2'] = trim(@$_POST['operasiefektif2']);
$input['visitesp1'] = trim(@$_POST['visitesp1']);
$input['visitesp2'] = trim(@$_POST['visitesp2']);
$input['lab1'] = trim(@$_POST['lab1']);
$input['lab2'] = trim(@$_POST['lab2']);
$input['formulariumbpjs1'] = trim(@$_POST['formulariumbpjs1']);
$input['formulariumbpjs2'] = trim(@$_POST['formulariumbpjs2']);
$input['formulariumnonbpjs1'] = trim(@$_POST['formulariumnonbpjs1']);
$input['formulariumnonbpjs2'] = trim(@$_POST['formulariumnonbpjs2']);
$input['cucitangan1'] = trim(@$_POST['cucitangan1']);
$input['cucitangan2'] = trim(@$_POST['cucitangan2']);
$input['resikocidera1'] = trim(@$_POST['resikocidera1']);
$input['resikocidera2'] = trim(@$_POST['resikocidera2']);
$input['clinical1'] = trim(@$_POST['clinical1']);
$input['clinical2'] = trim(@$_POST['clinical2']);
$input['kepuasan1'] = trim(@$_POST['kepuasan1']);
$input['kepuasan2'] = trim(@$_POST['kepuasan2']);
$input['komplain1'] = trim(@$_POST['komplain1']);
$input['komplain2'] = trim(@$_POST['komplain2']);

$tanggal = date("Y-m-d H:i:s");

if(!empty($respon['result']) && !in_array(0, $respon['result'])){
    $sql = "INSERT INTO `skor` (`skor`, `tgl`, `formula_id`,) VALUES
    ('".$input['kpi1']."', '".$tanggal."',49),
    ('".$input['kpi2']."', '".$tanggal."',50),
    ('".$input['ert1']."', '".$tanggal."',51),
    ('".$input['ert2']."', '".$tanggal."',52),
    ('".$input['tunggurj1']."', '".$tanggal."',53),
    ('".$input['tunggurj2']."', '".$tanggal."',54),
    ('".$input['operasiefektif1']."', '".$tanggal."',55),
    ('".$input['operasiefektif2']."', '".$tanggal."',56),
    ('".$input['visitesp1']."', '".$tanggal."',57),
    ('".$input['visitesp2']."', '".$tanggal."',58),
    ('".$input['lab1']."', '".$tanggal."',59),
    ('".$input['lab2']."', '".$tanggal."',60),
    ('".$input['formulariumbpjs1']."', '".$tanggal."',61),
    ('".$input['formulariumbpjs2']."', '".$tanggal."',62),
    ('".$input['formulariumnonbpjs1']."', '".$tanggal."',63),
    ('".$input['formulariumnonbpjs2']."', '".$tanggal."',64)
    ('".$input['cucitangan1']."', '".$tanggal."',65),
    ('".$input['cucitangan2']."', '".$tanggal."',66),
    ('".$input['resikocidera1']."', '".$tanggal."',67),
    ('".$input['resikocidera2']."', '".$tanggal."',68),
    ('".$input['clinical1']."', '".$tanggal."',69),
    ('".$input['clinical2']."', '".$tanggal."',70),
    ('".$input['kepuasan1']."', '".$tanggal."',71),
    ('".$input['kepuasan2']."', '".$tanggal."',72),
    ('".$input['komplain1']."', '".$tanggal."',73),
    ('".$input['komplain2']."', '".$tanggal."',74)";
    $query = mysqli_query($koneksi2, $sql);
    
    

    if($query){
        $respon['status'] = 1;
        $respon['msg'] = "input berhasil";
    } else {
        $respon['status'] = 0;
        $respon['msg'][] = 'Query gagal';
    }

    $respon['query'][] = $sql;

}

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
echo json_encode($respon, JSON_PRETTY_PRINT);
die();
?> 