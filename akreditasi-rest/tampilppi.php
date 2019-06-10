<?php
require_once "conf/conf.php";

$sql = "SELECT skor.id,skor.nilai,skor.kode,skor.unit,skor.tgl, formula.nama FROM skor INNER JOIN formula on skor.formula_id = formula.id order by skor.id asc";
$query = mysqli_query($koneksi,$sql);
$result = array();
while ($data = mysqli_fetch_assoc($query)){
$result[]=$data; 
}
echo json_encode($result);
?>