<?php 

$hostname = 'localhost';
$database= 'pendataan_surat';
$username = 'root';
$password = '';

$connect = mysqli_connect($hostname,$username,$password,$database);

if($connect)
echo "<script>console.log('Connected');</script>";
else 
echo "<script>console.log('Can`t connect to server');</script>;"

?>