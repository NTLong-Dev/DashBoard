<?php
session_start();
include('../config/Db.php');

$ten = $_POST["name"];
$room = $_POST["room"];
$ngay = $_POST["ngay"];
$giovao = $_POST["giovao"];
$giora = $_POST["giora"];
$tk = $_POST['tdn'];
if (isset($_POST['Them'])) {
    $sql_them = "INSERT INTO `quanlychamcong`(`Ten_Nhan_Vien`, `Phongban`, `Ngay`, `Gio_Vao`, `Gio_Ra`,`tk`) VALUES ('$ten', '$room', '$ngay', '$giovao', '$giora' , '$tk')";

    mysqli_query($mysqli, $sql_them);

    header('Location: index.php');
} 
if (isset($_POST['submit'])) {
    // Retrieve values from the form
    $ten = $_POST["name"];
    $room = $_POST["room"];
    $ngay = $_POST["ngay"];
    $giovao = $_POST["giovao"];
    $giora = $_POST["giora"];

    // Check if the action is 'Sua'
    if ($_POST['action'] == 'Sua') {
        // Modify your SQL query accordingly
        $sql_sua = "UPDATE `quanlychamcong` 
                    SET `Ten_Nhan_Vien`='$ten', `Phongban`='$room', `Ngay`='$ngay', `Gio_Vao`='$giovao', `Gio_Ra`='$giora' ,`tk`= '$tk'
                    WHERE `MaNV`='".$_GET['MaNV']."'";

        mysqli_query($mysqli, $sql_sua);
        header('Location: index.php');
    }
}
 

if(isset($_GET['query']) && $_GET['query'] == 'xoa'){
    // Xử lý xoá nhân viên
    $MaNV = $_GET['MaNV'];
    $sql_xoa = "DELETE FROM quanlychamcong WHERE MaNV = '".$MaNV."'";
    mysqli_query($mysqli, $sql_xoa);
    header('Location:index.php');
}
?>
