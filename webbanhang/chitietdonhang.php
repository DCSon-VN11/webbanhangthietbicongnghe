<?php
require_once 'header.php';
?>

<body>
    <div class="container border rounded p-2" style="width:45%">
        <form method="post">
            <div class="d-flex justify-content-center">
                <h3>Thông tin</h3>
            </div>
            <hr>
            <?php
            $totalAmount=0;
            $mota='';
            foreach ($_SESSION['dongdonhang'] as &$item) {
                $ha = $get->se_hasp_id($item['SanPhamID']);
                $h = mysqli_fetch_assoc($ha);
                $getsp = $get->se_sp_id($item['SanPhamID']);
                $sp = mysqli_fetch_assoc($getsp);
                $itemTotal = $sp['Gia'] * $item['SoLuong'];
                $totalAmount += $itemTotal;
                $mota .=substr($sp['Ten'], 0, 7).',';
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
                                echo "<script>window.location='chitietdonhang.php';</script>";
                            }
                            if (isset($_POST['plus' . $item['SanPhamID']])) {
                                $item['SoLuong'] += 1;
                                echo "<script>window.location='chitietdonhang.php';</script>";
                            }
                            ?>
                        </div>
                        <div style="width:30%;position: relative;text-align:right;">
                            <button class="bg-white border-0" name="xoa" onclick="return confirm('Bạn muốn xoá sản phẩm này?');" value="<?php echo $item['SanPhamID'] ?>" style="float:right;margin-top:-5px;">
                                Xoá
                            </button>
                            <div style="position:absolute;bottom:0px;width:100%;height:50px;">
                                <p class="mb-0 fw-bold">Tạm tính:</p>
                                <p class="tien text-danger" style="font-size:14px">
                                    <?php echo number_format($sp['Gia'] * $item['SoLuong'], 0, ',', '.') . ' VNĐ' ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            $mota=rtrim($mota, ',');
            if (isset($_POST['xoa'])) {
                $gioHang = $_SESSION['dongdonhang'];
                foreach ($gioHang as $key => $ite) {
                    if ($ite['SanPhamID'] == $_POST['xoa']) {
                        unset($gioHang[$key]);
                        break;
                    }
                }
                $_SESSION['dongdonhang'] = array_values($gioHang);
                $de = $get->de_donggiohang($_POST['xoa']);
                echo "<script>window.location='chitietdonhang.php';</script>";
            }
            ?>
            <div class="mt-3">
                <div>
                    <span style="font-size:20px">Thông tin khách hàng</span>
                </div>
                <div class="border rounded p-2 mt-2">
                    <div class="mt-2">
                        <span>Họ và tên: </span><br>
                        <input name="ten" type="text" value="<?php echo $_SESSION['ttnd']['TenNguoiDung'] ?>" style="border:none;border-bottom:1px solid darkgrey;width:100%;margin-top:2px;">
                    </div>
                    <div class="mt-2">
                        <span>Số điện thoại: </span><br>
                        <input name="sdt" type="text" value="<?php echo $_SESSION['ttnd']['Sodienthoai'] ?>" style="border:none;border-bottom:1px solid darkgrey;width:100%;margin-top:2px;">
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <div>
                    <span style="font-size:20px">Thông tin nhận hàng</span>
                </div>
                <div class="w-100 border rounded pb-2 mt-2 overflow-hidden">
                    <div class="w-100 d-flex">
                        <div class="bg1 bg-dark-subtle w-50">
                            <div class="w-100 bg-white d-flex justify-content-center bgcuahang" style="border-top-right-radius: 20px;
                                border-bottom-right-radius: 0px;">
                                <div>
                                    <button type="button" name="diachi" class="border-0 bg-white my-3 btncuahang">Nhận tại cửa hàng</button>
                                </div>
                            </div>
                        </div>
                        <div class="bg2 bg-white w-50">
                            <div class="w-100 bg-dark-subtle d-flex justify-content-center bgtannoi" style="border-bottom-left-radius: 15px;
                                border-top-left-radius: 0px;">
                                <div>
                                    <button type="button" name="diachi" class="border-0 bg-dark-subtle my-3 btntannoi">Giao hàng tận nơi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-100 bg-bg-white cuahang">
                        <div>
                            <div class="dropdown ms-3 mt-2" style="width: 95%;">
                                <input type="text" name="cuahang" id="cuahang" list="optionsList" required="required" placeholder="Chọn cửa hàng" class="bg-white border-0 border-bottom dropdown-toggle w-100">
                                <datalist id="optionsList">
                                    <?php
                                    $se = $get->se_dcch();
                                    $n = mysqli_num_rows($se);
                                    foreach ($se as $d) {
                                    ?>
                                        <option value="<?php echo $d['Diachi'] ?>">
                                        <?php
                                    }
                                        ?>
                                </datalist>
                            </div>
                        </div>
                    </div>
                    <div class="w-100 bg-bg-white tannoi">
                        <div>
                            <div class="dropdown ms-3 mt-2" style="width:90%">
                                <input type="text" name="nhantannoi" id="tannoi" placeholder="Ghi rõ Số nhà, Tên Đường, Quận Huyện" class="border-0 border-bottom w-100">
                            </div>
                        </div>
                    </div>
                    <script>
                        $('.tannoi').hide();
                        $('.btncuahang').click(function() {
                            $('.bgtannoi, .btntannoi, .bg1').addClass('bg-dark-subtle').removeClass('bg-white');
                            $('.bgcuahang, .btncuahang, .bg2').addClass('bg-white').removeClass('bg-dark-subtle');
                            $('.bgcuahang').css({
                                'border-top-right-radius': '20px',
                                'border-bottom-right-radius': '0px'
                            });
                            $('.bgtannoi').css({
                                'border-bottom-left-radius': '15px',
                                'border-top-left-radius': '0px'
                            });
                            $('.cuahang').show();
                            $('#tannoi').val('');
                            $('#cuahang').attr('required', true);
                            $('#tannoi').removeAttr('required');
                            $('.tannoi').hide();
                        });

                        $('.btntannoi').click(function() {
                            $('.bgcuahang, .btncuahang, .bg2').addClass('bg-dark-subtle').removeClass('bg-white');
                            $('.bgtannoi, .btntannoi, .bg1').addClass('bg-white').removeClass('bg-dark-subtle');
                            $('.bgtannoi').css({
                                'border-top-left-radius': '20px',
                                'border-bottom-left-radius': '0px'
                            });
                            $('.bgcuahang').css({
                                'border-bottom-right-radius': '15px',
                                'border-top-right-radius': '0px'
                            });
                            $('.tannoi').show();
                            $('#cuahang').val("");
                            $('#tannoi').attr('required', true);
                            $('#cuahang').removeAttr('required');
                            $('.cuahang').hide();
                        });
                    </script>
                </div>
            </div>
            <div class="mt-3">
                <div class="d-flex justify-content-between" style="font-weight: bold;font-size:20px">
                    <div>
                        Tổng tiền:
                    </div>
                    <div class="text-primary">
                        <label for="" id="tongtien"></label>
                    </div>
                    <script>
                        const tienElements = document.querySelectorAll('.tien');
                        let totalAmount = 0;
                        tienElements.forEach((element) => {
                            let amountText = element.textContent.replace(' VNĐ', '').replace(/\./g, '');
                            let amount = parseInt(amountText, 10);
                            if (!isNaN(amount)) {
                                totalAmount += amount;
                            }
                        });
                        document.getElementById('tongtien').textContent = `${totalAmount.toLocaleString('vi-VN')} VNĐ`;
                    </script>
                </div>
                <div class="mt-2">
                    <button name="tt" type="submit" class="btn btn-primary w-100">
                        Tiếp tục
                    </button>
                    <?php
                    if (isset($_POST['tt'])) {
                        if (!empty($_POST['cuahang'])) $diachi = $_POST['cuahang'];
                        if (!empty($_POST['nhantannoi'])) $diachi = $_POST['nhantannoi'];
                        $_SESSION['donhang'] = [
                            'TaiKhoanID' => $_SESSION['tkkh']['TaiKhoanID'],
                            'NguoiNhan' => $_POST['ten'],
                            'SoDienThoai' => $_POST['sdt'],
                            'NoiNhan' => $diachi,
                            'TongTien' => $totalAmount,
                            'Mota' => $mota
                        ];
                        echo "<script>window.location='thongtinthanhtoan.php';</script>";
                    }
                    ?>
                </div>
            </div>
    </div>
    <?php
    require_once 'footer.php';
    ?>
</body>