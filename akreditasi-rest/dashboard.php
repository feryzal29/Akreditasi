<?php
require_once "conf/conf.php";

$json = array();
$code_list_query = mysqli_query($koneksi,"SELECT `kode` AS `ttl` FROM skor GROUP BY `kode`");

$code_lists = array();
while ($code_list_fetch = mysqli_fetch_assoc($code_list_query)) {
    foreach ($code_list_fetch as $key => $value) {
        $code_lists[] = strval($value);
    }
}

$code_list_count = count($code_lists);
$codes = array();
for ($i=0; $i < $code_list_count; $i++) { 
    foreach ($code_lists as $value) {
        $code_query[$i] = mysqli_query($koneksi, "SELECT COUNT(`kode`) AS `ttl` FROM skor WHERE `kode` = $value");
        while ($code_fetch[$i] = mysqli_fetch_assoc($code_query[$i])) {
            $codes[$value] = intval($code_fetch[$i]['ttl']);
        }
    }
}

$json[] = $codes;

header('Access-Control-Allow-Origin: *');
header('content-type: application/json');
echo json_encode($json);

?>