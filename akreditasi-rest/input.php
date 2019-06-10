<?php
require_once "conf/conf.php";

$respon = array(
    'status' => 0,
    'result' => array(),
    'msg' => array()
);

$input = array();
    
$input['vap'] = trim(@$_POST['vap']);
$input['isk'] = trim(@$_POST['isk']);
$input['plebitis'] = trim(@$_POST['plebitis']);
$input['ilo'] = trim(@$_POST['ilo']);
$input['ventilator'] = trim(@$_POST['ventilator']);
$input['urine'] = trim(@$_POST['urine']);
$input['infus'] = trim(@$_POST['infus']);
$input['operasi'] = trim(@$_POST['operasi']);
$input['mdro'] = trim(@$_POST['mdro']);
$input['klb'] = trim(@$_POST['klb']);
$input['kode'] = trim(@$_POST['kode']);
$input['unit'] = trim(@$_POST['unit']);
$tanggal = date("Y-m-d H:i:s");
 

if (!empty($input['kode'])) {
    $respon['result'][] = 1;
} else {
    $respon['result'][] = 0;
    $respon['msg'][] = '- Kode Unit wajib diisi';
}
if (!empty($input['unit'])) {
    $respon['result'][] = 1;
} else {
    $respon['result'][] = 0;
    $respon['msg'][] = '- Nama Unit wajib diisi';
}

if(!empty($respon['result']) && !in_array(0, $respon['result'])){
    $sql = "INSERT INTO `skor` (`nilai`, `kode`, `unit`,`tgl`,`formula_id`) VALUES
    ('".$input['vap']."', '".$input['kode']."','".$input['unit']."','".$tanggal."',1),
    ('".$input['isk']."', '".$input['kode']."','".$input['unit']."','".$tanggal."',2),
    ('".$input['plebitis']."', '".$input['kode']."','".$input['unit']."','".$tanggal."',3),
    ('".$input['ilo']."', '".$input['kode']."','".$input['unit']."','".$tanggal."',4),
    ('".$input['ventilator']."', '".$input['kode']."','".$input['unit']."','".$tanggal."',5),
    ('".$input['urine']."', '".$input['kode']."','".$input['unit']."','".$tanggal."',6),
    ('".$input['infus']."', '".$input['kode']."','".$input['unit']."','".$tanggal."',7),
    ('".$input['operasi']."', '".$input['kode']."','".$input['unit']."','".$tanggal."',8),
    ('".$input['mdro']."', '".$input['kode']."','".$input['unit']."','".$tanggal."',9),
    ('".$input['klb']."', '".$input['kode']."','".$input['unit']."','".$tanggal."',10)";

    $query = mysqli_query($koneksi, $sql);
    
    

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