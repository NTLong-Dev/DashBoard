<?php
include('../config/Db.php');

$ten = $_POST["name"];
$room = $_POST["room"];
$luongcb = $_POST["luongcb"];
$luongkt = $_POST["luongkt"];
$luongpc = $_POST["luongpc"];
$thuong = $_POST["thuong"];
$tk = $_POST["tdn"];

if (isset($_POST['Them'])) {
    $sql_them = "INSERT INTO `quanlyluong` 
    (`Ten_Nhan_Vien`, `Phongban`, `Luong_coban`, `Luong_khautru`, `Luong_phucap`, `Thuong` , `tk`) 
    VALUES ('$ten', '$room', '$luongcb', '$luongkt', '$luongpc', '$thuong' ,'$tk')";

    mysqli_query($mysqli, $sql_them);

    header('Location: index.php');
}
if(isset($_GET['query']) && $_GET['query'] == 'xoa'){
    // Xử lý xoá nhân viên
    $MaNV = $_GET['MaNV'];
    $sql_xoa = "DELETE FROM quanlyluong WHERE MaNV = '".$MaNV."'";
    mysqli_query($mysqli, $sql_xoa);
    header('Location:index.php');
}
?>
