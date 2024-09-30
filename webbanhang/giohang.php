<body>
    <div>
        <div class="d-flex p-3">
            <div class="w-100 d-flex justify-content-center align-items-center">
                <p style="font-weight:bold;font-size:20px">Giỏ Hàng Của Bạn</p>
            </div>
        </div>
        <hr style="height:2px;margin: 10px 0 15px;background-color: #cfcece;border:none;">
        <form method="POST">
            <div class="d-flex justify-content-between">
                <div>
                    <input type="checkbox" name="all" value="all" id="all">
                    <label for="all">Chọn tất cả</label>
                </div>
                <a href="../webbanhang/user.php?gh&deall" class="border-0 text-black text-decoration-none" onclick="return confirm('Bạn muốn xoá tất cả?');">Xoá tất cả</a>
                <?php
                if (isset($_GET['deall'])) {
                    $_SESSION['giohang'] = [];
                    $de = $get->de_alldonggiohang($_SESSION['idgio']);
                }
                ?>
            </div>
            <?php
            if (!isset($_SESSION['giohang']) || empty($_SESSION['giohang'])) echo "Giỏ hàng trống";
            else {
                foreach ($_SESSION['giohang'] as &$item) {
                    $ha = $get->se_hasp_id($item['SanPhamID']);
                    $h = mysqli_fetch_assoc($ha);
                    $getsp = $get->se_sp_id($item['SanPhamID']);
                    $sp = mysqli_fetch_assoc($getsp);
            ?>
                    <div class="border rounded w-100 bg-white d-flex mt-3 p-2">
                        <input type="checkbox" name="selectitem[]" class="selectitem" data-price="<?php echo $sp['Gia'] * $item['SoLuong']; ?>" value="<?php echo $item['SanPhamID'] ?>">
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
                                    <button name="<?php echo "minus" . $item['SanPhamID'] ?>" class="button-minus ms-2 border-0 rounded" style="font-size:18px">-</button>
                                    <input name="sl" disabled class="quantity-input ms-2 border-0" type="number" min="1" value="<?php echo $item['SoLuong'] ?>" style="width:20px;text-align:center;">
                                    <button name="<?php echo "plus" . $item['SanPhamID'] ?>" class="ms-2 border-0 rounded" style="font-size:18px">+</button>
                                </div>
                                <script>
                                    function updateMinusButton(input) {
                                        var quantity = parseInt(input.val());
                                        var minusButton = input.siblings('.button-minus');
                                        if (quantity <= 1) {
                                            minusButton.hide();
                                        } else {
                                            minusButton.show();
                                        }
                                    }
                                    $('.quantity-input').each(function() {
                                        updateMinusButton($(this));
                                    });
                                </script>
                                <?php
                                if (isset($_POST["minus" . $item['SanPhamID']])) {
                                    $item['SoLuong'] -= 1;
                                    $up = $get->up_sl_donggiohang($item['SoLuong'], $item['SanPhamID']);
                                    echo "<script>window.location='user.php?gh';</script>";
                                }
                                if (isset($_POST['plus' . $item['SanPhamID']])) {
                                    $item['SoLuong'] += 1;
                                    $up = $get->up_sl_donggiohang($item['SoLuong'], $item['SanPhamID']);
                                    echo "<script>window.location='user.php?gh';</script>";
                                }
                                ?>
                            </div>
                            <div style="width:30%;position: relative;text-align:right;">
                                <a class="text-black text-decoration-none border-0" href="../webbanhang/user.php?gh&xoa=<?php echo $item['SanPhamID'] ?>" onclick="return confirm('Bạn muốn xoá sản phẩm này?');" style="float:right;margin-top:-5px;">
                                    Xoá
                                </a>
                                <div style="position:absolute;bottom:0px;width:100%;height:50px;">
                                    <p class="mb-0 fw-bold">Tạm tính:</p>
                                    <p class=" text-danger" style="font-size:14px">
                                        <?php echo number_format($sp['Gia'] * $item['SoLuong'], 0, ',', '.') . ' VNĐ' ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
            <div class="position-sticky p-1" style="bottom:10px;background-color:white;">
                <div class="w-100 d-flex justify-content-between align-items-center mt-3">
                    <button name="mua" id="mua" class="btn btn-primary ms-2">Mua Hàng</button>
                    <p class="text-primary fw-bold me-2" style="font-size: 20px;">Tổng tiền: <span id="totalAmount" style="color:red;font-weight:400;font-size:18px;"></span></p>
                </div>
            </div>
            <script>
                function calculateTotal() {
                    let total = 0;
                    const checkboxes = document.querySelectorAll('.selectitem:checked');

                    checkboxes.forEach((checkbox) => {
                        total += parseInt(checkbox.getAttribute('data-price'));
                    });
                    document.getElementById('totalAmount').innerText = total.toLocaleString() + " VND";
                    toggleBuyButton(checkboxes.length > 0);
                }

                function toggleBuyButton(enable) {
                    document.getElementById('mua').disabled = !enable;
                }
                document.querySelectorAll('.selectitem').forEach((checkbox) => {
                    checkbox.addEventListener('change', calculateTotal);
                });
                document.querySelectorAll('.selectitem').forEach((checkbox) => {
                    checkbox.addEventListener('change', calculateTotal);
                });
                document.getElementById('all').addEventListener('change', function() {
                    const checkboxes = document.querySelectorAll('.selectitem');
                    const isChecked = this.checked;

                    checkboxes.forEach((checkbox) => {
                        checkbox.checked = isChecked;
                    });
                    calculateTotal();
                });
                window.addEventListener('load', calculateTotal);
            </script>
            <?php
            if (isset($_POST['mua']) && isset($_POST['selectitem'])) {
                if (isset($_SESSION['dongdonhang'])) unset($_SESSION['dongdonhang']);
                if (isset($_SESSION['donhang'])) unset($_SESSION['donhang']);
                foreach ($_SESSION['giohang'] as $ite) {
                    if (in_array($ite['SanPhamID'], $_POST['selectitem'])) {
                        $_SESSION['dongdonhang'][] = $ite;
                    }
                }
                echo "<script>window.location='chitietdonhang.php';</script>";
            }
            if (isset($_GET['xoa'])) {
                $gioHang = $_SESSION['giohang'];
                foreach ($gioHang as $key => $ite) {
                    if ($ite['SanPhamID'] == $_GET['xoa']) {
                        unset($gioHang[$key]);
                        break;
                    }
                }
                $_SESSION['giohang'] = array_values($gioHang);
                $de = $get->de_donggiohang($_GET['xoa']);
                echo "<script>window.location='user.php?gh';</script>";
            }
            ?>
    </div>
</body>