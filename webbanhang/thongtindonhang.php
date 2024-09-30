<div class="mt-2">
    <?php
    $dh = $get->se_dh_id($_GET['ctdh']);
    $d = mysqli_fetch_assoc($dh);
    $status_map = [
        1 => "Chờ xác nhận",
        2 => "Đã xác nhận",
        3 => "Đang vận chuyển",
        4 => "Đã hoàn thành",
        5 => "Đã huỷ"
    ];
    $tiendo = $status_map[$d['TienDoID']];
    ?>
    <div class="d-flex justify-content-between">
        <div>
            <h2><a href="../webbanhang/user.php?dh"><i class="bi bi-arrow-left text-body-tertiary"></i></a>Chi tiết đơn hàng</h2>
        </div>
        <div>
            <button disabled class="bg-white text-black border-1 rounded p-2 px-3"><?php echo $tiendo; ?></button>
        </div>
    </div>
    <hr style="height:2px;margin: 10px 0 15px;background-color: #cfcece;border:none;">
    <div>
        <?php
        $ddh = $get->se_ddh_iddh($d['DonHangID']);
        foreach ($ddh as $s) {
            $sp = $get->se_sp_id($s['SanPhamID']);
            $p = mysqli_fetch_assoc($sp);
            $ha = $get->se_hasp_id($s['SanPhamID']);
            $i = mysqli_fetch_assoc($ha);
        ?>
            <div class="border rounded w-100 bg-white d-flex mt-3 p-2">
                <div class="d-flex align-items-center" style="width:15%">
                    <img src="../images/sanpham/<?php echo $i['DuongDanAnh']; ?>" width="110px" height="110px" alt="">
                </div>
                <div class="justify-content-between" style="display:flex;width:85%">
                    <div style="width: 80%;">
                        <a href="../webbanhang/chitietsanpham.php?idsp=<?php echo $s['SanPhamID']; ?>" class="text-black text-decoration-none"><?php echo $p['Ten']; ?></a>
                    </div>
                    <div>
                        Số lượng: <span class="text-primary"><?php echo $s['SoLuong']; ?></span>
                    </div>
                </div>
            </div>
            <hr style="height:2px;margin: 10px 0 15px;background-color: #cfcece;border:none;">
        <?php
        }
        ?>
    </div>
    <div class="p-2">
        <div>
            <h5 class="text-primary"><i class="bi bi-wallet2"></i> Thông tin thanh toán</h5>
        </div>
        <div class="d-flex justify-content-between p-2">
            <div>
                Tổng tiền sản phẩm: <br>
                Giảm giá: <br>
                Phí vận chuyển: <br>
            </div>
            <div>
                <?php echo number_format($d['TongTien'] * 100 / 72, 0, ',', '.'); ?> VNĐ <br>
                <?php echo number_format($d['TongTien'] * 28 / 100, 0, ',', '.'); ?> VNĐ <br>
                Miễn Phí
            </div>
        </div>
        <hr style="height:1px;margin: 10px 0 15px;background-color: black;border:none;">
        <div class="d-flex justify-content-between p-2">
            <div>
                Phải thanh toán: <br>
                Đã thanh toán: <br>
            </div>
            <div>
                <?php echo number_format($d['TongTien'], 0, ',', '.'); ?> VNĐ <br>
                <?php
                if ($d['ThanhToan'] == 'Đã thanh toán') {
                ?>
                    <?php echo number_format($d['TongTien'], 0, ',', '.'); ?> VNĐ <br>
                <?php
                } elseif ($d['TienDoID'] == 5) {
                ?>
                    Đã huỷ
                <?php
                } else ?>
                Chưa thanh toán
                <?php
                ?>
            </div>
        </div>
    </div>
    <hr style="height:2px;margin: 10px 0 15px;background-color: #cfcece;border:none;">
    <div class="p-2">
        <div>
            <h5 class="text-primary"><i class="bi bi-person-vcard-fill"></i></i>Thông tin khách hàng</h5>
        </div>
        <div>
            <i class="bi bi-person fs-5 me-3"></i> Người nhận: <?php echo $d['NguoiNhan']; ?> <br>
            <i class="bi bi-telephone fs-5 me-3"></i> Số điện thoại: <?php echo $d['SoDienThoai']; ?> <br>
            <i class="bi bi-geo-alt fs-5 me-3"></i> Nơi nhận: <?php echo $d['NoiNhan']; ?> <br>
            <i class="bi bi-clock-history fs-5 me-3"></i> Ngày đặt hàng: <?php echo $d['NgayDatHang'];?>
        </div>
    </div>

</div>