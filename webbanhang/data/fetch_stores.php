<?php
include 'connect.php'; // Kết nối cơ sở dữ liệu

$district = $_POST['huyen'];
$productId = $_POST['product_id']; // Lấy ID sản phẩm từ yêu cầu

// Câu truy vấn lấy cửa hàng theo huyện và ID sản phẩm
$sql = "SELECT dc.*, kh.Hangton FROM diachicuahang dc 
        JOIN khohang kh ON dc.diachicuahangid = kh.DiaChiCuaHangID 
        WHERE dc.Huyen = '$district' AND kh.Hangton > 0 AND kh.SanPhamID = '$productId'";
$result = mysqli_query($conn, $sql);

$response = [
    'list' => '',
    'count' => mysqli_num_rows($result)
];

while ($store = mysqli_fetch_assoc($result)) {
    $response['list'] .= '<div style="font-size: 12px;color:blue;width:150%" class="py-1 ms-1">
                            <i class="bi bi-telephone-fill"></i> <span style="font-weight:bold;">0123456789</span>
                            &nbsp;<span style="color:black;">-</span>&nbsp;
                            <a href="diachicuahang.php?ch='. $store['DiaChiCuaHangID'] .'"><i class="bi bi-geo-alt-fill"></i> ' . $store['Diachi'] . ",".$store['Phuong'].",".$store['Huyen'].",".$store['ThanhPho'].'</a>
                        </div>';
}

echo json_encode($response);
?>
