<?php
require_once 'header.php';
?>

<body>
    <div class="container border rounded p-2" style="width:45%">
        <div class="d-flex justify-content-center">
            <h3>Thanh toán</h3>
        </div>
        <hr>
        <?php
        $totalAmount = 0;
        foreach ($_SESSION['dongdonhang'] as &$item) {
            $ha = $get->se_hasp_id($item['SanPhamID']);
            $h = mysqli_fetch_assoc($ha);
            $getsp = $get->se_sp_id($item['SanPhamID']);
            $sp = mysqli_fetch_assoc($getsp);
            $itemTotal = $sp['Gia'] * $item['SoLuong'];
            $totalAmount += $itemTotal;
        ?>
            <div class="border rounded w-100 bg-white d-flex mt-3 p-2">
                <a href="../webbanhang/chitietsanpham.php?idsp=<?php echo $item['SanPhamID'] ?>">
                    <div class="d-flex align-items-center" style="width:15%">
                        <img src="../images/sanpham/<?php echo $h['DuongDanAnh'] ?>" width="90px" height="90px" alt="">
                    </div>
                </a>
                <div style="display:flex;width:85%;margin-left:25px">
                    <div style="width: 70%;">
                        <a href="../webbanhang/chitietsanpham.php?idsp=<?php echo $item['SanPhamID'] ?>" class="text-decoration-none text-black">
                            <?php echo $sp['Ten'] ?>
                        </a>
                        <div class="mt-1 ms-1">
                            <label id="gia" style="font-weight: bold;color:blue"><?php echo number_format($sp['Gia'], 0, ',', '.') ?> VNĐ</label>
                        </div>
                        <div>
                            Số lượng:
                            <input name="sl" disabled class="quantity-input ms-2 border-0" type="number" min="1" value="<?php echo $item['SoLuong'] ?>" style="width:20px;text-align:center;">
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        <div class="mt-3">
            <div>
                <span style="font-size:20px">Phương thức thanh toán</span>
            </div>
            <div class="border rounded p-2 mt-2">
                <form action="" method="post">
                    <select name="pttt" class="form-select" aria-label="Default select example">
                        <option value="0">Tiền mặt</option>
                        <option value="1">Chuyển khoản qua PayOS</option>
                    </select>
            </div>
        </div>
        <div class="mt-3">
            <div>
                <span style="font-size:20px">Thông tin nhận hàng</span>
            </div>
            <div class="w-100 border rounded p-2 mt-2">
                <div class="d-flex justify-content-between mt-2">
                    <div>
                        Người nhận:
                    </div>
                    <div>
                        <?php echo $_SESSION['donhang']['NguoiNhan'] ?>
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <div>
                        Số điện thoại:
                    </div>
                    <div>
                        <?php echo $_SESSION['donhang']['SoDienThoai'] ?>
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <div>
                        Địa chỉ nhận hàng:
                    </div>
                    <div>
                        <?php echo $_SESSION['donhang']['NoiNhan'] ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <div class="d-flex justify-content-between" style="font-weight: bold;font-size:20px">
                <div>
                    Tổng tiền:
                </div>
                <div class="text-primary">
                    <?php echo number_format($_SESSION['donhang']['TongTien'], 0, ',', '.'); ?> VNĐ
                </div>
            </div>
            <div class="mt-2">
                <button name="tt" class="btn btn-primary w-100">
                    Thanh toán
                </button>
                <?php
                if (isset($_POST['tt'])) {
                    if ($_POST['pttt'] == 0) {
                        $dh = $get->in_dh(
                            $_SESSION['tkkh']['TaiKhoanID'],
                            $_SESSION['donhang']['NguoiNhan'],
                            $_SESSION['donhang']['SoDienThoai'],
                            1,
                            $_SESSION['donhang']['NoiNhan'],
                            $_SESSION['donhang']['TongTien'],
                            'Chưa thanh toán',
                            'Tiền mặt'
                        );
                        foreach ($_SESSION['dongdonhang'] as $dongdh) {
                            $ddh = $get->in_ddh(
                                $dh,
                                $dongdh['SanPhamID'],
                                $dongdh['SoLuong'],
                                $dongdh['Gia']
                            );
                            $de = $get->de_donggiohang($dongdh['SanPhamID']);
                        }
                        unset($_SESSION['giohang']);
                        unset($_SESSION['dongdonhang']);
                        unset($_SESSION['donhang']);
                        echo "<script>alert('Đặt hàng thành công')</script>";
                        echo "<script>window.location='trangchu.php';</script>";
                    } else {
                        echo "<script>window.location='thanhtoanpayos.php';</script>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    require_once 'footer.php';
    ?>
</body>