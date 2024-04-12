<?php
include('../config/Db.php');
if(isset($_POST['timkiem'])){
    $timkiem = $_POST['timkiem'];
  
    // Thực hiện truy vấn để lấy danh sách sản phẩm theo từ khóa tìm kiếm
    $sql_lietke = "SELECT * FROM quanlynhanvien WHERE Ten_Nhan_Vien LIKE '%".$timkiem."%'";
    $row_liet_ke = mysqli_query($mysqli, $sql_lietke);
  } else {
    // Nếu không có từ khóa tìm kiếm, hiển thị tất cả sản phẩm
    $sql_lietke = "SELECT * FROM quanlynhanvien ORDER BY MaNV ASC";
$row_liet_ke = mysqli_query($mysqli,$sql_lietke);
$sql_lietke1 = "SELECT * FROM phongban";
$row_liet_ke1 = mysqli_query($mysqli,$sql_lietke1);
  }
?>

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Trang Chủ Quản Lý Nhân Sự</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<style>
    .nav-item{
     padding-bottom: 18px;
     position: relative;
        top:25px;
    }
    .sidebar-divider{
        position: relative;
        top: 30px;
        padding-bottom: 30px;
    }
.sidebar-brand-icon{
    position: relative;
        top: 15px;
}
</style>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../home.php">
                <div class="sidebar-brand-icon">
                    <img src="data:image/jpeg;base64,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" width="80px" style="border-radius: 200px;">
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <?php 
                                    $username = $_SESSION['user_info'];
                                    if ($username['Phanquyen'] == 1){
                                    ?>
            <li class="nav-item ">
                <a class="nav-link" href="../home.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Báo Cáo Thống Kê</span></a>
            </li>
            <?php }?>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-user-circle"></i>
                    <span>Quản Lý Nhân Viên</span>
                </a>
            </li>
            <?php 
              $username = $_SESSION['user_info'];
              if ($username['Phanquyen'] == 1){
              ?>
                                           
            <li class="nav-item ">
                <a class="nav-link" href="../QL_PhongBan">
                    <i class="fas fa-fw fa-hospital" ></i>
                    <span>Quản Lý Phòng Ban</span>
                </a>
            </li>
            <?php }?>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="../QL_Luong">
                    <i class="fas fa-fw fa-money-bill"></i>
                    <span>Quản Lý Lương</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../QL_ChamCong">
                    <i class="fas fa-fw fa-hand-rock"></i>
                    <span>Quản Lý Chấm Công</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../QL_NghiPhep">
                    <i class="fas fa-fw fa-pager"></i>
                    <span>Quản Lý Nghỉ Phép</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-5 my-2 my-md-0">
                        <div class="input-group">
                            <input type="text" class="form-control border-0 small" placeholder="Tìm Kiếm..."
                                aria-label="Search" aria-describedby="basic-addon2" style="width: 600px;background-color: aliceblue;">
                            <div class="input-group-append">
                                <button class="btn btn-dark" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto" style="position: relative; top: -15px;">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php
    $username = $_SESSION['user_info'];
    echo '<span class="mr-3 d-none d-lg-inline text-dark">' . $username['TenDangNhap'] . '</span>';
?>
                                <img class="rounded-circle"
                                    src="https://cdn-icons-png.flaticon.com/512/149/149071.png" style="width: 50px;">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                   Đăng Xuất
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <style>
                    .rr{
                        float: right;
                        position:relative;
                        left: 890px;
                        top:-30px;
                    }
                </style>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Quản Lý Nhân Viên</h1>
                  <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3"style="height: 50px">
                            <h6 class="m-0 font-weight-bold text-dark">Bảng Nhân Viên</h6>
                            <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md- my-2 my-md-0" action = "index.php" method = "POST">
                        <div class="input-group rr">
                            <input type="text" class="form-control border-0 small" placeholder="Tìm Kiếm Trong Nhân Viên..."
                                aria-label="Search" aria-describedby="basic-addon2" style="width: 300px;" name = "timkiem">
                            <div class="input-group-append">
                                <button class="btn btn-dark" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                        </div>
 
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Mã Nhân Viên</th>
                                            <th>Tên Nhân Viên</th>
                                            <th>Giới Tính</th>
                                            <th>Ngày Sinh</th>
                                            <th>Phòng Ban</th>
                                            <th>Số Điện Thoại</th>
                                            <th>Quản Lý</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <?php 
                                             $username = $_SESSION['user_info'];
                                            if ($username['Phanquyen'] == 1){
                                            ?>
                                            <td colspan="6" style="border: none;"><a href="" data-toggle="modal" data-target="#logoutModal1"><input type="submit" value="Thêm" class="text-white bg-dark border-0" style="height: 40px; width: 100px; border-radius: 120px;" ></a></td>
                                            <?php }?>
                                      </tr>
                                    </tfoot>
                                    <?php
                        while($rows = mysqli_fetch_array($row_liet_ke)){
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $rows['MaNV'] ?></td>
                                    <td><?php echo $rows['Ten_Nhan_Vien'] ?></td>
                                    <td><?php echo $rows['gioiTinh'] ?></td>
                                    <td><?php echo $rows['NgaySinh'] ?></td>
                                    <td><?php echo $rows['Phongban'] ?></td>
                                    <td><?php echo $rows['SDT'] ?></td>
                                    <td>
                                        <a href="" class="text-success" data-toggle="modal" data-target="#logoutModal2_<?php echo $rows['MaNV'] ?>"><i class="fas fa-fw fa-wrench"></i></a> 
                                        <?php 
                                             $username = $_SESSION['user_info'];
                                            if ($username['Phanquyen'] == 1){
                                            ?>
                                        | 
                                        
                                        <a href="" data-toggle="modal" data-target="#logoutModal4_<?php echo $rows['MaNV'] ?>" class="text-success"><i class="fas fa-fw fa-trash"></i></a>
                                        <?php }?>
                                    </td>
                                </tr>
                            </tbody>
                            <form action="xuly.php?MaNV=<?php echo $rows['MaNV'] ?>" method="post">
                            <div class="modal fade" id="logoutModal2_<?php echo $rows['MaNV'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <h5 class="modal-title text-dark" id="exampleModalLabel" style="padding: 20px"><strong>Sửa Nhân Viên</h5>
                                    <div class="modal-header">
<!-- Trong form sửa -->
<div class="text-centers text-dark">
    <p>Tên Nhân Viên: </p>
    <input type="text" name="ten" value="<?php echo $rows['Ten_Nhan_Vien']; ?>">

    <p>Giới Tính: </p>
<select name="gioiTinh">
    <option value="Nam" <?php echo ($rows['gioiTinh'] == 'Nam') ? 'selected' : ''; ?>>Nam</option>
    <option value="Nữ" <?php echo ($rows['gioiTinh'] == 'Nữ') ? 'selected' : ''; ?>>Nữ</option>
</select>



    <p>Ngày Sinh: </p>
    <input type="date" name="ngaySinh" value="<?php echo $rows['NgaySinh']; ?>">

    <p>Phòng Ban: </p>
    <select name="room">
        <option>Phòng Ban</option>
        <?php
        mysqli_data_seek($row_liet_ke1, 0); 
        while ($rows1 = mysqli_fetch_array($row_liet_ke1)) {
            ?>
            <option value="<?php echo $rows1['Phongban']; ?>" <?php echo ($rows['Phongban'] == $rows1['Phongban']) ? 'selected' : ''; ?>><?php echo $rows1['Phongban']; ?></option>
        <?php } ?>
    </select>

    <p>Số Điện Thoại: </p>
    <input type="tel" name="Sdt" value="<?php echo $rows['SDT']; ?>">

    <input type="hidden" name="tk" value="<?php echo $rows['TenDangNhap']; ?>">
    <input type="hidden" name="pass" value="<?php echo $rows['password']; ?>">
</div>

                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Huỷ</button>
                                        <a href="xuly.php?MaNV=<?php echo $rows['MaNV'] ?>&query=sua"><input type="submit"  name="Sua" value = "Sửa" class = "btn btn-success"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
    </form>
                            <div class="modal fade" id="logoutModal4_<?php echo $rows['MaNV'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Bạn Muốn Xoá</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Huỷ</button>
                                            <a class="btn btn-primary" href="xuly.php?MaNV=<?php echo $rows['MaNV'] ?>&query=xoa">Xoá</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }?>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Nguyễn Thăng Long</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn Muốn Đăng Xuất</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Hãy Lựa Chọn</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Huỷ</button>
                    <a class="btn btn-primary" href="../index.php">Đăng Xuất</a>
                </div>
            </div>
        </div>
    </div>
    <style>
        .text-centers input , select{
            display: block;
            align-items: center;
            position: relative;
            left: 200px;
            width: 250px;
        }
        .text-centers{
            margin-top:-40px;
        }
        .text-centers p{
            position: relative;
            top: 43px;
            left: 20px;
        }
    </style>
    <div class="modal fade" id="logoutModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <h5 class="modal-title text-dark" id="exampleModalLabel" style="padding: 20px"><strong>Thêm Nhân Viên</h5>
         <form action="xuly.php" method = "POST">
         <div class="modal-header">
                    <div class="text-centers text-dark">
                    <p>Tên Nhân Viên: </p><input type="text" name = "ten">
                    <p>Giới Tính: </p>
                    </p><select name="gioiTinh">
                                                <option>Nam</option>
                                                <option>Nữ</option>
                                            </select>
                    <p>Ngày Sinh: </p><input type="date" name = "ngaySinh">
                    
                    <p>Phòng Ban: </p><select name="room">
                                                <option>Phòng Ban</option>
                                                <?php
                                                mysqli_data_seek($row_liet_ke1, 0); 
                        while($rows1 = mysqli_fetch_array($row_liet_ke1)){
                            ?>
                            <option><?php echo $rows1['Phongban'] ?></option>
                            <?php }?>

                                            </select>
                    <p>Số Điện Thoại: </p><input type="tel" name = "Sdt">
                    <p>Email: </p><input type="email" name = "tk">
                    <p>Password: </p><input type="text" name = "pass">
                    <p>Phân Quyền: </p><input type="number" name = "pq">
                    </div></strong>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Huỷ</button>
                    <input type="submit" name="Them" class="btn btn-success" value = "Thêm" style="width: 100px;">
                    
                    
                </div>
         </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>