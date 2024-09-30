<div>
    <?php
    $dg = $get->se_dg_idtk($_SESSION['tkkh']['TaiKhoanID']);
    ?>
    <div class="d-flex p-3">
        <div class="w-100 d-flex justify-content-center align-items-center">
            <div style="text-align: center;">
                <span style="font-size:30px;font-weight:bold;"><?php echo $s = mysqli_num_rows($dg); ?></span><br>
                Đánh giá
            </div>
        </div>
    </div>
    <hr style="height:2px;margin: 10px 0 15px;background-color: #cfcece;border:none;">
    <?php
    foreach ($dg as $d) {
        $sp = $get->se_sp_id($d['SanPhamID']);
        $s = mysqli_fetch_assoc($sp);
        $ha = $get->se_hasp_id($s['SanPhamID']);
        $h = mysqli_fetch_assoc($ha);
    ?>
        <div class="border rounded w-100 bg-white d-flex mt-3 p-2">
            <div class="d-flex align-items-center" style="width:15%">
                <img src="../images/sanpham/<?php echo $h['DuongDanAnh']; ?>" width="110px" height="110px" alt="">
            </div>
            <div style="display:flex;width:85%">
                <div style="width: 80%;">
                    <?php echo $s['Ten'] . " " . $s['CauHinh']; ?><br>
                    <span style="color:darkgrey;"><?php echo $d['NgayTao']; ?></span>
                    <div class="mt-2">
                        <div class="rating d-flex">
                            <?php
                            for ($i = 0; $i < 5; $i++) {
                                if ($i < $d['DiemDanhGia']) {
                            ?>
                                    <i class="bi bi-star-fill"></i>
                                <?php
                                } else {
                                ?>
                                    <i class="bi bi-star"></i>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="mt-2 ms-1" style="font-size:15px">
                        <?php echo $d['BinhLuan']; ?>
                    </div>
                </div>
                <div style="width:25%;float:right;">
                    <form action="" method="post">
                        <a href="../webbanhang/user.php?dg&deldg=<?php echo $d['DanhGiaID']; ?>" onclick="return confirm('Bạn muốn xoá đánh giá này?');" class="border-0 text-black text-decoration-none" style="float:inline-end"><i class="bi bi-x-lg"></i></a>
                </div>
            </div>
        </div>
    <?php
    }
    if (isset($_GET['deldg'])) {
        $de = $get->de_dg($_GET['deldg']);
        echo "<script>window.location='user.php?dg';</script>";
    }
    ?>
</div>