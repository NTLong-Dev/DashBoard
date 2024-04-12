<?php
include('../config/Db.php');

$ten = $_POST["name"];
$room = $_POST["room"];
$loainghiphep = $_POST["loainghiphep"];
$don = $_POST["don"];
$songaynghi = $_POST["songaynghi"];

if (isset($_POST['Them'])) {
    $sql_them = "INSERT INTO `quanlynghiphep`(`Ten_Nhan_Vien`, `Phongban`, `loainghiphep`, `don`, `songaynghi`) VALUES ('$ten', '$room', '$loainghiphep', '$don', '$songaynghi')";
    
    mysqli_query($mysqli, $sql_them);

    header('Location: index.php');
}

if (isset($_GET['query']) && $_GET['query'] == 'xoa') {
    // Xử lý xoá nhân viên
    $MaNV = $_GET['MaNV'];
    $sql_xoa = "DELETE FROM quanlynghiphep WHERE MaNV = '".$MaNV."'";
    mysqli_query($mysqli, $sql_xoa);
    header('Location: index.php');
}
?>
