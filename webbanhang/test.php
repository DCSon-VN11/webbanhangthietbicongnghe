<?php
session_start();
//unset($_SESSION['giohang']);
// Kiểm tra nếu session tồn tại
if (!empty($_SESSION)) {
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';
} else {
    echo 'Không có dữ liệu session.';
}


