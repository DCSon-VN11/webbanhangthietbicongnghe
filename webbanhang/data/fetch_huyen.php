<?php
include 'connect.php'; // Kết nối cơ sở dữ liệu

$city = $_POST['thanhpho'];
$sql = "SELECT DISTINCT Huyen FROM diachicuahang WHERE ThanhPho = '$city'";
$result = mysqli_query($conn, $sql);

$options = '<option value="">Quận/Huyện</option>';
while ($row = mysqli_fetch_assoc($result)) {
    $options .= '<option value="' . $row['Huyen'] . '">' . $row['Huyen'] . '</option>';
}

echo $options;
?>
