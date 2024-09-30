<?php

namespace PayOS;

require_once 'data/control.php';
$get = new \data();
session_start();

// Include the necessary files
require 'src/PayOS.php';

// Initialize PayOS with your credentials
$payOS = new PayOS(
    'e782bfa2-673f-43bf-9e2d-922cf1185ea6', // Merchant ID
    '0f967302-665e-4541-941e-2bd616117a94', // API Key
    'd9e7aee7551dbf2db460a2f04e0e8d9bea15ed2a1dc88425b7f2ed81941f3b8b' // Secret Key
);

// Your domain configuration
$YOUR_DOMAIN = "http://cson.ihostfull.com";

// Function to generate a unique order code
function generateOrderCode() {
    // Generate a random order code within the safe range
    return rand(1, 9007199254740991); 
}

// Create a payment link
if (isset($_SESSION['donhang'])) {
    var_dump($_SESSION['donhang']); // Check order details
    $orderCode = generateOrderCode(); // Generate unique order code
    $data = [
        "orderCode" => $orderCode,
        "amount" => $_SESSION['donhang']['TongTien'],
        "description" => substr($_SESSION['donhang']['Mota'], 0, 22) . "...",
        "returnUrl" => $YOUR_DOMAIN . "/webbanhang/xulythanhtoan.php",
        "cancelUrl" => $YOUR_DOMAIN . "/webbanhang/trangchu.php"
    ];

    try {
        $response = $payOS->createPaymentLink($data);
        $_SESSION['donhang']['orderCode'] = $orderCode; // Save order code in session
        header("Location: " . $response['checkoutUrl']);
        exit;
    } catch (\Exception $th) {
        file_put_contents('error_log.txt', $th->getMessage(), FILE_APPEND);
        echo 'Có lỗi xảy ra: ' . $th->getMessage(); // Detailed error message
    }
} else {
    echo "Thông tin đơn hàng không tồn tại.";
    exit;
}

// Get payment link information (optional)
$orderCode = $_SESSION['donhang']['orderCode'] ?? ''; // Use the correct order code
if (!empty($orderCode)) {
    try {
        $response = $payOS->getPaymentLinkInformation($orderCode);
        var_dump($response);
    } catch (\Exception $th) {
        echo 'Đã xảy ra lỗi: ' . $th->getMessage();
    }
} else {
    echo "Mã đơn hàng không hợp lệ.";
}
