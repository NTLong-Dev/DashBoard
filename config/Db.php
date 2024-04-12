<?php
$mysqli = new mysqli("localhost", "root", "", "quanlybinh_gn");
if($mysqli->connect_errno){
  echo "Lỗi" .$mysqli->connect_error;
  exit();
}
?>