<?php 
session_start();

include('config/Db.php');

$admin = $_POST["a"];
$pass = $_POST["b"];

$sql_lietke = "SELECT `MaNV`, `TenDangNhap`, `password`, `Phanquyen` FROM quanlynhanvien WHERE TenDangNhap = '$admin' AND password = '$pass'";
$row_liet_ke = mysqli_query($mysqli, $sql_lietke);

if(mysqli_num_rows($row_liet_ke) > 0){
    $user_info = mysqli_fetch_assoc($row_liet_ke);

    // Lưu thông tin quanlynhanvien vào session
    $_SESSION['user_info'] = $user_info;
    $user = $_SESSION['user_info'];
    if($user['Phanquyen'] == 1){

    echo '<script>alert("Đăng Nhập Admin thành công"); window.location.href = "home.php";</script>';
    }else{
        echo '<script>alert("Đăng Nhập thành công"); window.location.href = "QL_NhanVien";</script>';
    }
} else {
    echo '<script>alert("Tài Khoản Và Mật Khẩu Sai");window.location.href = "index.php";</script>';
}
?>
