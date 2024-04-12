<?php 
include('../config/Db.php');
$ten = $_POST["ten"];
$gioiTinh = $_POST["gioiTinh"];
$ngaySinh = $_POST["ngaySinh"];
$room = $_POST["room"];
$Sdt = $_POST["Sdt"];
$tk = $_POST["tk"];
$pass = $_POST["pass"];
$pq =  $_POST["pq"];
if(isset($_POST['Them'])){
    $sql_them = "INSERT INTO quanlynhanvien(`Ten_Nhan_Vien`, `gioiTinh`, `NgaySinh`, `Phongban`, `TenDangNhap`, `password`, `SDT`, `Phanquyen`) VALUES ('$ten', '$gioiTinh', '$ngaySinh', '$room', '$tk', '$pass', '$Sdt', '$pq')";
    mysqli_query($mysqli,$sql_them);
    header('Location:index.php');
}elseif(isset($_POST['Sua'])){
    $sql_sua = "UPDATE quanlynhanvien SET `Ten_Nhan_Vien`='".$ten."', `gioiTinh`='".$gioiTinh."', `NgaySinh`='".$ngaySinh."', `Phongban`='".$room."', `SDT`='".$Sdt."', `TenDangNhap`='".$tk."', `password`='".$pass."' WHERE `MaNV`='".$_GET['MaNV']."'";
    mysqli_query($mysqli,$sql_sua);
    header('Location:index.php');
  
}
if(isset($_GET['query']) && $_GET['query'] == 'xoa'){
    // Xử lý xoá nhân viên
    $MaNV = $_GET['MaNV'];
    $sql_xoa = "DELETE FROM quanlynhanvien WHERE MaNV = '".$MaNV."'";
    mysqli_query($mysqli, $sql_xoa);
    header('Location:index.php');
}
?>
