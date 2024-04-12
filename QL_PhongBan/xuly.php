<?php 
include('../config/Db.php');
$room = $_POST["room"];

if(isset($_POST['Them'])){
$sql_them = "INSERT INTO `phongban`(`Phongban`) VALUES ('$room')";
mysqli_query($mysqli,$sql_them);
header('Location:index.php');
}
?>