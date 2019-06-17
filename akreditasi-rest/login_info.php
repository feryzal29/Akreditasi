<?php
session_start();

$data = array();
$data['login'] = isset($_SESSION['login']) ? $_SESSION['login'] : false;

if($data['login'] === true){   
    $data['data'] = array(
        'id' => @$_SESSION['id'],
        'user' => @$_SESSION['user'],
        'level' => @$_SESSION['level']
    );
}
header('Access-Control-Allow-Origin: *');
header('conten-type:aplication/json');
echo json_encode($data);
?>