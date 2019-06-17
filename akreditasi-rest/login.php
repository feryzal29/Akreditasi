<?php
require_once "conf/conf.php";

session_start();

$respond = array(
    'status' => false,
    'msg'=> array()
);

$user = mysqli_real_escape_string($koneksi, @$_POST['username']);
$pass = mysqli_real_escape_string($koneksi, @$_POST['password']);

$validation = array();

if (!empty($user) && !empty($pass)) {
    $validation[] = true;
} else {
    $validation[] = false;
    $respond['msg'][] = 'Username dan Password tidak boleh kosong!';
}

if (!empty($validation) && !in_array(false, $validation)) {
    $query = mysqli_query($koneksi,"SELECT * FROM `user` WHERE user='$user' and pass='$pass' ");

    $rows = mysqli_num_rows($query);
    if($rows > 0){
        
        while ($data = mysqli_fetch_assoc($query)) {
            $_SESSION['id'] = $data['id'];
            $_SESSION['user'] = $data['user'];
            $_SESSION['level'] = $data['level'];
            $_SESSION['login'] = true;

            $respond['status'] = true;
        }
        $respond['msg'][] = "LOGIN BERHASILL GAESSS!!!";
    } else {
        $respond['msg'][] = "Username atau Password salah!";
    }
}
header('Access-Control-Allow-Origin: *');
header('conten-type:aplication/json');
echo json_encode($respond);
