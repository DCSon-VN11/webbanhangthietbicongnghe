<?php
include 'connect.php'; // Kết nối cơ sở dữ liệu

$search = $_POST['search'] ?? ''; // Lấy giá trị tìm kiếm từ yêu cầu AJAX
$city = $_POST['city'] ?? '';     // Lấy giá trị thành phố
$district = $_POST['district'] ?? ''; // Lấy giá trị huyện

$query = "SELECT * FROM diachicuahang WHERE 1"; // Bắt đầu truy vấn

$params = [];
$paramTypes = '';

// Điều kiện tìm kiếm theo thành phố
if (!empty($city)) {
    $query .= " AND ThanhPho LIKE ?";
    $params[] = '%' . $city . '%';
    $paramTypes .= 's'; // 's' cho string
}

// Điều kiện tìm kiếm theo quận/huyện
if (!empty($district)) {
    $query .= " AND Huyen LIKE ?";
    $params[] = '%' . $district . '%';
    $paramTypes .= 's'; // 's' cho string
}

// Điều kiện tìm kiếm theo từ khóa
if (!empty($search)) {
    $query .= " AND Diachi LIKE ?";
    $params[] = '%' . $search . '%';
    $paramTypes .= 's'; // 's' cho string
}

// Chuẩn bị câu truy vấn
$stmt = mysqli_prepare($conn, $query);

if (!$stmt) {
    echo json_encode(['error' => 'Lỗi khi chuẩn bị câu truy vấn: ' . mysqli_error($conn)]);
    exit;
}

// Gán tham số cho câu truy vấn
if (!empty($params)) {
    mysqli_stmt_bind_param($stmt, $paramTypes, ...$params);
}

// Thực hiện truy vấn
if (!mysqli_stmt_execute($stmt)) {
    echo json_encode(['error' => 'Lỗi khi thực hiện truy vấn: ' . mysqli_stmt_error($stmt)]);
    exit;
}

$result = mysqli_stmt_get_result($stmt);
$count = mysqli_num_rows($result); // Đếm số lượng kết quả

$stores = ''; // Biến lưu trữ thông tin cửa hàng
$mapSrc = ''; // Biến lưu trữ địa chỉ bản đồ

if ($count > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Escape output for security
        $address = htmlspecialchars($row['Diachi']);
        $mapLink = htmlspecialchars($row['Map']);
        $phone = htmlspecialchars($row['Phone'] ?? '0123456789'); // Thêm số điện thoại nếu có

        $stores .= "
        <div>
            <span style='color:blue;'>CSphone {$address}</span>
            <div class='mt-1' style='font-size:12px'>
                <i class='bi bi-clock'></i> 8h00 - 22h00 (tất cả các ngày trong tuần) <br>
                <i class='bi bi-telephone'></i> {$phone}
            </div>
            <div class='d-flex align-items-center'>
                <a class='text-decoration-none' style='font-weight: bold;' href='#' onclick=\"document.getElementById('map-iframe').src='{$mapLink}';\">
                    <img style='margin-top:-4px;' src='../webbanhang/image/Google_Maps_icon_(2020).svg' width='10px' alt=''> Xem đường đi
                </a>
            </div>
            <hr>
        </div>
        ";

        // Lưu địa chỉ bản đồ từ hàng đầu tiên tìm thấy
        if (empty($mapSrc)) {
            $mapSrc = $mapLink;
        }
    }
} else {
    // Nếu không có cửa hàng nào tìm thấy
    $stores .= "<div class='text-center'>Không có cửa hàng nào được tìm thấy. Vui lòng kiểm tra lại tìm kiếm.</div>";
}

// Đóng câu truy vấn
mysqli_stmt_close($stmt);

// Trả về dữ liệu dưới dạng JSON
header('Content-Type: application/json');
echo json_encode(['html' => $stores, 'count' => $count, 'map' => $mapSrc]);

// Đóng kết nối
mysqli_close($conn);
