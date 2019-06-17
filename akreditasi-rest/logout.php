<?php
session_start();

$data = array();

if(isset($_SESSION['login']) && $_SESSION['login'] === true){
    session_destroy();
    $data['login'] = false;
}

header('Access-Control-Allow-Origin: *');
header('conten-type:aplication/json');
echo json_encode($data);
?>