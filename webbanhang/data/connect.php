<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'qlthietbicongnghe';
// Kết nối đến cơ sở dữ liệu
$conn = mysqli_connect($server, $username, $password, $database);
// Kiểm tra kết nối
if (!$conn) {
    die('Không thể kết nối: ' . mysqli_connect_error());
}
// Thiết lập mã hóa UTF-8
mysqli_query($conn, "SET NAMES 'utf8'");

?>
