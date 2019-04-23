<?php 
include_once("./config/config.php");

$id = $_GET['id'];

$action = mysqli_query($connect, "DELETE FROM `admin` WHERE id=$id");

header("Location:table_admin.php");
?>