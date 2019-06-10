<?php
 $koneksi = mysqli_connect("localhost","root","","ppi");
 $koneksi2 = mysqli_connect("localhost","root","","pmkp");
 
 // Check connection
 if (mysqli_connect_errno()){
     echo "Koneksi database gagal : " . mysqli_connect_error();
 }

?>