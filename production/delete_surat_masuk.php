<?php 
include_once("./config/config.php");

$id = $_GET['id'];

$action = mysqli_query($connect, "DELETE FROM `surat_masuk` WHERE id=$id");

header("Location:table_surat_masuk.php");
?>