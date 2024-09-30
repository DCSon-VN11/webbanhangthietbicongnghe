<?php
require_once 'header.php';
?>

<body style="background-color: rgb(243, 248, 253);">
    <div class="container d-flex" style="width:80%;">
        <div class="menuuser rounded p-2 me-5 border border-1" style="width:30%;">
            <div class="w-75 ms-4">
                <form action="" method="post">
                    <div class="w-100 m-2">
                        <button name="nd" class="d-flex align-items-center text-black border-0 bg-white"><i class="bi bi-person fs-3 me-2"></i> Thông tin người dùng</button>
                    </div>
                    <hr style="height:2px;margin: 10px 0 15px;background-color: black;border:none;">
                    <div class="w-100 m-2">
                        <button name="gh" class="d-flex align-items-center text-black border-0 bg-white"><i class="bi bi-cart fs-3 me-2"></i> Giỏ Hàng</button>
                    </div>
                    <hr style="height:2px;margin: 10px 0 15px;background-color: black;border:none;">
                    <div class="w-100 m-2">
                        <button name="dh" class="d-flex align-items-center text-black border-0 bg-white"><i class="bi bi-journal-text fs-3 me-2"></i> Tra cứu đơn hàng</button>
                    </div>
                    <hr style="height:2px;margin: 10px 0 15px;background-color: black;border:none;">
                    <div class="w-100 m-2">
                        <button name="dg" class="d-flex align-items-center text-black border-0 bg-white"><i class="bi bi-chat-right-text fs-3 me-2"></i> Đánh giá sản phẩm</button>
                    </div>
                    <hr style="height:2px;margin: 10px 0 15px;background-color: black;border:none;">
            </div>
        </div>
        <div class="border border-1 rounded p-1 pb-3" style="background-color: rgb(255,255,255);width:75%">
            <?php
            if (isset($_POST['nd'])) {
                require_once 'thongtinuser.php';
            } elseif (isset($_POST['dg']) || isset($_GET['dg'])) {
                require_once 'danhgiasp.php';
            } elseif (isset($_POST['dh'])|| isset($_GET['dh'])) {
                require_once 'donhang.php';
            } elseif (isset($_POST['gh']) || isset($_GET['gh'])) {
                require_once 'giohang.php';
            } elseif (isset($_GET['ctdh'])){
                require_once 'thongtindonhang.php';
            } else {
                require_once 'thongtinuser.php';
            }
            ?>

        </div>
    </div>
    <?php
    require_once 'footer.php';
    ?>
</body>