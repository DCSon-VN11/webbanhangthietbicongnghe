<?php
require_once 'connect.php';
// Nhận từ khóa tìm kiếm từ yêu cầu
$query = isset($_GET['q']) ? mysqli_real_escape_string($conn, $_GET['q']) : '';

// Truy vấn cơ sở dữ liệu để tìm kiếm các sản phẩm
$sql = "SELECT
        sanpham.sanphamid,
        sanpham.ten,
        sanpham.gia,
        sanpham.cauhinh,
        anhsanpham.duongdananh
    FROM
        sanpham
    JOIN
        anhsanpham ON sanpham.sanphamid = anhsanpham.sanphamid
    WHERE
        sanpham.ten LIKE '%$query%'
        AND anhsanpham.anhsanphamid = (
            SELECT MIN(anhsanphamid)
            FROM anhsanpham
            WHERE anhsanpham.sanphamid = sanpham.sanphamid
        )
";
$result = mysqli_query($conn, $sql);

// Kiểm tra kết quả và hiển thị
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $ids[] = $row;
    }
    echo json_encode($ids);
} else {
    echo '<p>Không tìm thấy sản phẩm nào.</p>';
}
