<?php
namespace PayOS;
session_start();
// Include the necessary files
require 'PayOS.php';

// Initialize PayOS with your credentials
$payOS = new PayOS(
    'e782bfa2-673f-43bf-9e2d-922cf1185ea6',
    '0f967302-665e-4541-941e-2bd616117a94',
    'd9e7aee7551dbf2db460a2f04e0e8d9bea15ed2a1dc88425b7f2ed81941f3b8b'
);

// Your domain configuration (replace with your actual domain)
$YOUR_DOMAIN = "https://localhost";

// Create a payment link
$data = [
    "orderCode" => intval(substr(strval(microtime(true) * 10000), -10)), // Using microtime to generate a unique orderCode
    "amount" => $_SESSION['tt'],
    "description" => substr($_SESSION['sp']['Ten'], 0, 25),
    "returnUrl" => $YOUR_DOMAIN.  "/doantotnghiep\webbanhang/thanhcong.php",
    "cancelUrl" =>  $YOUR_DOMAIN.  "/doantotnghiep\webbanhang/trangchu.php"
];

try {
    $response = $payOS->createPaymentLink($data);
    // Plain PHP redirect
    header("Location: " . $response['checkoutUrl']);
    exit;
} catch (\Exception $th) {
    // Handle exceptions
    if ($th->getMessage() === 'Đơn thanh toán đã tồn tại') {
        echo 'Đơn thanh toán đã tồn tại. Vui lòng thử lại sau.';
    } else {
        echo 'Đã xảy ra lỗi: ' . $th->getMessage();
    }
}

// Get payment link information
$orderCode = 123456;
try {
    $response = $payOS->getPaymentLinkInformation($orderCode);
    var_dump($response);
} catch (\Exception $th) {
    echo 'Đã xảy ra lỗi: ' . $th->getMessage();
}
