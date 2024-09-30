<body>
    <?php
    $dh = $get->se_dh_idtk($_SESSION['tkkh']['TaiKhoanID']);
    ?>
    <div class="d-flex p-3">
        <div class="w-50 border-end d-flex justify-content-center align-items-center">
            <div style="text-align: center;">
                <span style="font-size:30px;font-weight:bold;"><?php echo $d = mysqli_num_rows($dh); ?></span><br>
                Đơn hàng
            </div>
        </div>
        <?php
        $t = 0;
        foreach ($dh as $d) {
            $ddh = $get->se_ddh_iddh($d['DonHangID']);
            $h = mysqli_num_rows($ddh);
            $s = mysqli_fetch_assoc($ddh);
            $sp = $get->se_sp_id($s['SanPhamID']);
            $p = mysqli_fetch_assoc($sp);
            $ha = $get->se_hasp_id($s['SanPhamID']);
            $i = mysqli_fetch_assoc($ha);
            $status_map = [
                1 => "Chờ xác nhận",
                2 => "Đã xác nhận",
                3 => "Đang vận chuyển",
                4 => "Đã hoàn thành",
                5 => "Đã huỷ"
            ];
            $tiendo = $status_map[$d['TienDoID']];
            $donhang[] = [
                'DuongDanAnh' => $i['DuongDanAnh'],
                'Ten' => $p['Ten'],
                'TienDo' => $tiendo,
                'Gia' => $d['TongTien'],
                'ThoiGian' => $d['NgayDatHang'],
                'slsp' => $h,
                'ID' => $d['DonHangID']
            ];
            if($d['TienDoID'] ==4){
                $t += $d['TongTien'];
            }
        }
        if (!empty($donhang)) $dh = json_encode($donhang);
        else $dh = null;
        ?>
        <div class="w-50">
            <div style="text-align: center;">
                <span style="font-size:30px;font-weight:bold;"><?php echo number_format($t, 0, ',', '.') . ' VNĐ' ?></span><br>
                Tổng tích luỹ
            </div>
        </div>
    </div>
    <hr style="height:2px;margin: 10px 0 15px;background-color: #cfcece;border:none;">
    <div class="d-flex justify-content-between">
        <button class="bg-white border-1 rounded p-2 px-3 filter-btn" type="button" data-tiendo="all">Tất cả</button>
        <button class="bg-white border-1 rounded p-2 px-3 filter-btn" type="button" data-tiendo="Chờ xác nhận">Chờ xác nhận</button>
        <button class="bg-white border-1 rounded p-2 px-3 filter-btn" type="button" data-tiendo="Đã xác nhận">Đã xác nhận</button>
        <button class="bg-white border-1 rounded p-2 px-3 filter-btn" type="button" data-tiendo="Đang vận chuyển">Đang vận chuyển</button>
        <button class="bg-white border-1 rounded p-2 px-3 filter-btn" type="button" data-tiendo="Đã giao hàng">Đã giao hàng</button>
        <button class="bg-white border-1 rounded p-2 px-3 filter-btn" type="button" data-tiendo="Đã huỷ">Đã huỷ</button>
    </div>
    <div id="donhang"></div>
    <script>
        var dh = <?php echo $dh; ?>;

        function donhang(str) {
            if (str.slsp > 1) {
                var sl = `${str.Ten} <br>
                <span style="font-size:12px;color:darkgrey;">và ${str.slsp-1} sản phẩm khác</span>`;
            } else {
                var sl = `${str.Ten} <br>`;
            }
            html = `<div class="border rounded w-100 bg-white d-flex mt-3 p-2">
        <div class="d-flex align-items-center" style="width:15%">
            <img src="../images/sanpham/${str.DuongDanAnh}" width="110px" height="110px" alt="">
        </div>
        <div style="display:flex;width:85%">
            <div style="width: 80%;">
            <a href="../webbanhang/user.php?ctdh=${str.ID}" class="text-black text-decoration-none">
                ${sl}
                </a>
                <div class="mt-4">
                    <span class="bg-success-subtle p-2 rounded">${str.TienDo}</span>
                </div>
                <div class="mt-3 ms-1">
                    <span style="font-weight: bold;color:blue">${str.Gia}</span>
                </div>
            </div>
            <div style="width:25%;float:right;">
                <div style="float:inline-end">
                    <span style="color:darkgrey;">${str.ThoiGian}</span>
                </div>
            </div>
        </div>
    </div>`;
            $('#donhang').append(html);
        }
        $.each(dh, function(index, item) {
            donhang(item);
        });
        $('.filter-btn').on('click', function() {
            const fil = $(this).data('tiendo');
            $('#donhang').empty(); // Xóa nội dung cũ

            if (fil === 'all') {
                // Hiển thị tất cả bình luận
                $.each(dh, function(index, item) {
                    donhang(item);
                });
            } else {
                // Hiển thị bình luận theo số sao
                $.each(dh, function(index, item) {
                    if (item.TienDo == fil) {
                        donhang(item);
                    }
                });
            }
        });
    </script>
</body>