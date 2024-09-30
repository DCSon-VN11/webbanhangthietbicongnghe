<?php
require_once 'header.php';
$se = $get->se_sp_id($_GET['idsp']);
$r = mysqli_fetch_assoc($se);
?>

<body>
    <div class="container" style="width: 77%;">
        <div class="d-flex align-items-center">
            <h1 style="font-size: 20px;margin-bottom:0;"><?php echo $r['Ten'] . " " . $r['CauHinh'] ?></h1>
        </div>
    </div>
    <hr style="height:2px;margin: 10px 0 15px;background-color: #cfcece;border:none;">
    </div>
    <div class="container w-75 d-flex">
        <div style="width: 60%;">
            <div style="width:100%;">
                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff;height: 360px;border-radius:15px;" class="swiper mySwiper2 border">
                    <div class="swiper-wrapper">
                        <?php
                        $ha = $get->se_hasp_id($r['SanPhamID']);
                        foreach ($ha as $h) {
                        ?>
                            <div class="swiper-slide d-flex align-items-center justify-content-center">
                                <img src="../images/sanpham/<?php echo $h['DuongDanAnh'] ?>" />
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="swiper-button-next" style="color:#cfcece;"></div>
                    <div class="swiper-button-prev" style="color:#cfcece"></div>
                </div>
                <div thumbsSlider="" class="swiper mySwiper3 mt-2" style="height:10%;">
                    <div class="swiper-wrapper">
                        <?php
                        $ha = $get->se_hasp_id($r['SanPhamID']);
                        foreach ($ha as $h) {
                        ?>
                            <div style="overflow: hidden;" class="swiper-slide d-flex align-items-center justify-content-center border border-2 rounded">
                                <img src="../images/sanpham/<?php echo $h['DuongDanAnh'] ?>" width="100%" height="100%" />
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="w-100 d-flex">
                <div class="mt-3 border-top border-bottom rounded-top rounded-bottom" style="overflow:hidden;width:45%">
                    <table style="font-size:14px;" class="table table-striped border-start border-end mb-0">
                        <thead>
                            <tr>
                                <th colspan="2">
                                    <h6 style="font-weight:bold;">Thông tin sản phẩm</h6>
                                </th>
                            </tr>
                        </thead>
                        <tr>
                            <td><i class="bi bi-phone fs-5"></i></td>
                            <td>Mới, đầy đủ phụ kiện từ nhà sản xuất</td>
                        </tr>
                        <tr>
                            <td><i class="bi bi-box-seam"></i></td>
                            <td>Hộp, Sách hướng dẫn, Cây lấy sim, Cáp sạc</td>
                        </tr>
                        <tr>
                            <td><i class="bi bi-shield-check"></i></td>
                            <td>1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple</td>
                        </tr>
                        <tr>
                            <td><i class="bi bi-clipboard2-check"></i></td>
                            <td>Giá sản phẩm đã bao gồm VAT</td>
                        </tr>
                    </table>
                </div>
                <div class="mt-3 ms-2" style="width: 60%;">
                    <div class="w-100 d-flex justify-content-between mb-2">
                        <select class="border rounded py-2" style="width:49%;text-align:center;" id="tp">
                            <option value="">Tỉnh/Thành Phố</option>
                            <?php
                            $cities = $get->se_dcch_tp();
                            foreach ($cities as $city) {
                                echo '<option value="' . $city['ThanhPho'] . '">' . $city['ThanhPho'] . '</option>';
                            }
                            ?>
                        </select>
                        <select id="huyen" class="dropdown border rounded" style="width:49%;text-align:center;">
                            <option value="">Quận/Huyện</option>
                        </select>
                    </div>
                    <p id="store-count">Có 0 cửa hàng có sản phẩm</p>
                    <div id="store-list" class="w-100 ps-1 border rounded overflow-x-hidden" style="overflow:auto;height:150px;">
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        var productId = <?php echo $_GET['idsp']; ?>; // Thay thế bằng ID sản phẩm thực tế mà bạn muốn lấy

                        // Hàm để tải tất cả cửa hàng có sản phẩm
                        function loadAllStores() {
                            $.ajax({
                                url: 'data/fetch_all_stores.php?product_id=' + productId, // Tạo file này để xử lý yêu cầu lấy tất cả cửa hàng
                                method: 'GET',
                                success: function(response) {
                                    var result = JSON.parse(response);
                                    $('#store-list').html(result.list); // Hiển thị danh sách cửa hàng
                                    $('#store-count').text(`Có ${result.count} cửa hàng có sản phẩm`);
                                }
                            });
                        }

                        // Khi trang được tải, kiểm tra xem có cần tải tất cả cửa hàng không
                        loadAllStores();

                        // Khi người dùng chọn thành phố
                        $('#tp').change(function() {
                            var city = $(this).val();
                            if (city !== "") {
                                // Gọi AJAX để lấy huyện theo thành phố
                                $.ajax({
                                    url: 'data/fetch_huyen.php',
                                    method: 'POST',
                                    data: {
                                        thanhpho: city
                                    },
                                    success: function(response) {
                                        $('#huyen').html(response); // Cập nhật danh sách huyện
                                        $('#store-list').html(''); // Xóa danh sách cửa hàng
                                        $('#store-count').text('Có 0 cửa hàng có sản phẩm'); // Reset thông báo
                                    }
                                });
                            } else {
                                $('#huyen').html('<option value="">Quận/Huyện</option>'); // Đặt lại danh sách huyện
                                loadAllStores(); // Tải tất cả cửa hàng khi không chọn thành phố
                            }
                        });

                        // Khi người dùng chọn huyện
                        $('#huyen').change(function() {
                            var district = $(this).val();
                            if (district !== "") {
                                // Gọi AJAX để lấy các cửa hàng theo huyện
                                $.ajax({
                                    url: 'data/fetch_stores.php',
                                    method: 'POST',
                                    data: {
                                        huyen: district,
                                        product_id: productId // Thêm ID sản phẩm vào dữ liệu gửi đi
                                    },
                                    success: function(response) {
                                        var result = JSON.parse(response);
                                        $('#store-list').html(result.list); // Hiển thị danh sách cửa hàng
                                        $('#store-count').text(`Có ${result.count} cửa hàng có sản phẩm`);
                                    }
                                });
                            } else {
                                loadAllStores(); // Tải tất cả cửa hàng khi không chọn huyện
                            }
                        });
                    });
                </script>
            </div>
        </div>
        <div class="ms-3" style="width:42%;">
            <div class="d-flex justify-content-between">
                <?php
                $kh = $get->se_sp_ten($r['Ten']);
                foreach ($kh as $k) {
                ?>
                    <div class="border rounded mt-1 py-1 <?php if ($_GET['idsp'] == $k['SanPhamID']) echo 'border-primary text-primary' ?>" style="width:32%;text-align:center;">
                        <a class="text-decoration-none <?php if ($_GET['idsp'] != $k['SanPhamID']) echo 'text-dark' ?>" href="../webbanhang/chitietsanpham.php?idsp=<?php echo $k['SanPhamID'] ?>">
                            <h1 style="font-weight:700;font-size:12px;"><?php echo $k['CauHinh'] ?></h1>
                            <p style="font-size:13px;margin:0"><?php echo number_format($k['Gia'], 0, ',', '.') ?> VNĐ</p>
                        </a>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="w-100 mt-2">
                <div class="rounded-top p-1" style="font-weight: bold;font-size:18px;color:blue;background-color:#A9D0F5;">
                    <i class="bi bi-gift fs-4 ms-2"></i> Khuyến mãi
                </div>
                <div class="p-3 border-start border-end" style="font-size:15px;">
                    Hiện tại không có khuyến mãi
                </div>
                <div class="rounded-bottom p-1" style="font-weight: bold;font-size:14px;background-color:#A9D0F5;">
                    Khuyến mãi chỉ áp dụng cho <span style="color:blue;">thanh toán online 100%</span> hoặc thanh toán <span style="color:blue;">trực tiếp tại cửa hàng</span>
                </div>
            </div>
            <div class="swiper mySwiper rounded mt-2" style="width: 100%;height:auto;">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="../webbanhang/image\tragop.png" width="100%" alt="">
                    </div>
                    <div class="swiper-slide"><img src="../webbanhang/image\tragop.png" width="100%" alt="">
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-center mt-2">
                <form class="w-100 d-flex" method="post">
                    <button name="mua" class="btn btn-primary" style="width:80%;font-size:25px;font-weight:bold;">
                        Mua ngay
                    </button>
                    <?php
                    if (isset($_POST['mua'])) {
                        if (isset($_SESSION['dongdonhang'])) unset($_SESSION['dongdonhang']);
                        if (isset($_SESSION['donhang'])) unset($_SESSION['donhang']);
                        $_SESSION['dongdonhang'][] = ['SanPhamID' => $r['SanPhamID'], 'SoLuong' => 1, 'Gia' => $r['Gia']];
                        echo "<script>window.location='chitietdonhang.php';</script>";
                    }
                    ?>
                    <div style="width:20%">
                        <button type="submit" name="gio" class="btn btn-outline-primary ms-2" style="width:90%">
                            <i class="bi bi-cart-plus fs-4"></i>
                        </button>
                        <?php
                        if (isset($_POST['gio'])) {
                            if (!isset($_SESSION['tkkh'])) {
                                echo "<script>alert('Vui lòng đăng nhập!!!')</script>";
                            } else {
                                $d = $get->se_donggiohang_soluong($_SESSION['idgio'], $r['SanPhamID']);
                                $dong = mysqli_num_rows($d);
                                if ($dong == 0) {
                                    $donggiohang = isset($_SESSION['giohang']) ? $_SESSION['giohang'] : [];
                                    $donggiohang[] = ['GioHangID' => $_SESSION['idgio'], 'SanPhamID' => $r['SanPhamID'], 'SoLuong' => 1, 'Gia' => $r['Gia']];
                                    $_SESSION['giohang'] = $donggiohang;
                                    $themgio = $get->in_donggiohang($_SESSION['idgio'], $r['SanPhamID']);
                                    if ($themgio) echo "<script>alert('Thêm vào giỏ hàng thành công')</script>";
                                    else echo "<script>alert('Không thành công')</script>";
                                } else {
                                    foreach ($_SESSION['giohang'] as &$item) {
                                        if ($item['SanPhamID'] == $r['SanPhamID']) {
                                            $item['SoLuong'] += 1;
                                            $upsl = $get->up_sl_donggiohang($item['SoLuong'], $r['SanPhamID']);
                                            if ($upsl) echo "<script>alert('Thêm vào giỏ hàng thành công')</script>";
                                            else echo "<script>alert('Không thành công')</script>";
                                            break;
                                        }
                                    }
                                    unset($item);
                                }
                                echo "<script>window.location.href = 'chitietsanpham.php?idsp=" . $r['SanPhamID'] . "';</script>";
                                exit();
                            }
                        }
                        ?>
                    </div>
            </div>
            <div class="w-100 border rounded mt-2 overflow-hidden">
                <div class="p-2" style="font-weight:bold;background-color:#d1d5db;width:100%;">
                    ƯU ĐÃI THÊM
                </div>
                <ul class="mt-2" style="list-style: none;margin-left:-25px">
                    <li style="font-size:12px;margin-top:5px">
                        <i class="bi bi-check-circle-fill me-2" style="color:limegreen;"></i><img src="../webbanhang/image/image_1009_1__1.jpg" alt=""> Giảm đến 500K khi thanh toán qua VNPAY-QR
                    </li>
                    <li style="font-size:12px;margin-top:5px">
                        <i class="bi bi-check-circle-fill me-2" style="color:limegreen;"></i><img src="../webbanhang/image/image_904_1_.png" alt=""> Nhập mã "SPPCPS06" Giảm ngay 60.000đ cho đơn từ 2 triệu
                    </li>
                    <li style="font-size:12px;margin-top:5px">
                        <i class="bi bi-check-circle-fill me-2" style="color:limegreen;"></i><img src="../webbanhang/image/logo-home-credit-new.jpg" alt=""> Giảm 400.000đ khi thanh toán bằng thẻ tín dụng Home Credit
                    </li>
                    <li style="font-size:12px;margin-top:5px">
                        <i class="bi bi-check-circle-fill me-2" style="color:limegreen;"></i>Liên hệ B2B để được tư vấn giá tốt nhất cho khách hàng doanh nghiệp khi mua số lượng nhiều
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="w-100 d-flex justify-content-center">
        <hr style="height:2px;margin: 10px 0 15px;background-color: #cfcece;border:none;width:78%">
    </div>
    <div class="container d-flex" style="width:80%;">
        <hr style="height:2px;margin: 10px 0 15px;background-color: #cfcece;border:none;">
        <div class="border rounded p-2" style="width: 68%;">
            <span class="mb-2 ms-2" style="font-size:20px;font-weight:bold;">Đánh giá & nhận xét iPhone 13 128GB</span>
            <div class="w-100 d-flex">
                <div class="border-end py-4 my-4" style="width: 40%;">
                    <div class="d-flex justify-content-center w-100">
                        <span style="font-size:30px;font-weight:bold;">0.0/5</span>
                    </div>
                    <div class="d-flex justify-content-center rating w-100">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <div class="d-flex justify-content-center w-100">
                        <span>0 đánh giá</span>
                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center" style="width:60%;">
                    <div class="rating w-100">
                        <div class="d-flex align-items-center justify-content-center">
                            <span style="color:black;">5</span><i class="bi bi-star-fill"></i> &nbsp;
                            <div class="progress mt-1" style="height: 10px;width:60%;" role="progressbar" aria-label="Basic example">
                                <div class="progress-bar" style="width:0%"></div>
                            </div>
                            &nbsp;
                            <span style="color:black;">0 đánh giá</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <span style="color:black;">4</span><i class="bi bi-star-fill"></i> &nbsp;
                            <div class="progress mt-1" style="height: 10px;width:60%;" role="progressbar" aria-label="Basic example">
                                <div class="progress-bar" style="width:0%"></div>
                            </div>
                            &nbsp;
                            <span style="color:black;">0 đánh giá</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <span style="color:black;">3</span><i class="bi bi-star-fill"></i> &nbsp;
                            <div class="progress mt-1" style="height: 10px;width:60%;" role="progressbar" aria-label="Basic example">
                                <div class="progress-bar" style="width:0%"></div>
                            </div>
                            &nbsp;
                            <span style="color:black;">0 đánh giá</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <span style="color:black;">2</span><i class="bi bi-star-fill"></i> &nbsp;
                            <div class="progress mt-1" style="height: 10px;width:60%;" role="progressbar" aria-label="Basic example">
                                <div class="progress-bar" style="width:0%"></div>
                            </div>
                            &nbsp;
                            <span style="color:black;">0 đánh giá</span>
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <span style="color:black;">1</span><i class="bi bi-star-fill"></i> &nbsp;
                            <div class="progress mt-1" style="height: 10px;width:60%;" role="progressbar" aria-label="Basic example">
                                <div class="progress-bar" style="width:0%"></div>
                            </div>
                            &nbsp;
                            <span style="color:black;">0 đánh giá</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-100 d-flex align-items-center justify-content-center">
                <hr style="width:98%">
            </div>
            <div class="w-100">
                <div class="w-100 d-flex align-items-center justify-content-center">
                    <span style="font-size:20px">Bạn đánh giá sản phẩm này như nào?</span>
                </div>
                <div class="d-flex align-items-center justify-content-center">
                    <form action="" style="width:80%" method="post">
                        <div class="d-flex justify-content-between w-100">
                            <input type="checkbox" name="rating" value="1" class="btn-check" id="btn-check-1" autocomplete="off">
                            <label class="text-warning" for="btn-check-1"><i class="bi bi-star-fill fs-1"></i></label>

                            <input type="checkbox" name="rating" value="2" class="btn-check" id="btn-check-2" autocomplete="off">
                            <label class="text-warning" for="btn-check-2"><i class="bi bi-star-fill fs-1"></i></label>

                            <input type="checkbox" name="rating" value="3" class="btn-check" id="btn-check-3" autocomplete="off">
                            <label class="text-warning" for="btn-check-3"><i class="bi bi-star-fill fs-1"></i></label>

                            <input type="checkbox" name="rating" value="4" class="btn-check" id="btn-check-4" autocomplete="off">
                            <label class="text-warning" for="btn-check-4"><i class="bi bi-star-fill fs-1"></i></label>

                            <input type="checkbox" name="rating" value="5" checked class="btn-check" id="btn-check-5" autocomplete="off">
                            <label class="text-warning" for="btn-check-5"><i class="bi bi-star-fill fs-1"></i></label>
                        </div>
                        <script>
                            $('.btn-check').on('change', function() {
                                const index = parseInt($(this).attr('id').split('-')[2])
                                $('.btn-check').each(function(i) {
                                    const currentIndex = i + 1;
                                    if (currentIndex <= index) {
                                        $(this).prop('checked', true);
                                        $(this).next('label').find('i')
                                            .removeClass('bi-star')
                                            .addClass('bi-star-fill');
                                    } else {
                                        $(this).prop('checked', false);
                                        $(this).next('label').find('i')
                                            .removeClass('bi-star-fill')
                                            .addClass('bi-star');
                                    }
                                });
                            });
                        </script>
                </div>
                <textarea name="textrating" class="form-control mt-2" placeholder="Nhập nhận xét của bạn" id="floatingTextarea2" style="height: 100px"></textarea>
                <button name="btnrating" class="btn btn-primary mt-2">Gửi đánh giá</button>
                <?php
                if (isset($_POST['btnrating'])) {
                    $in = $get->in_dg($_GET['idsp'], $_SESSION['tkkh']['TaiKhoanID'], $_POST['rating'], $_POST['textrating']);
                    if ($in) {
                        echo "<script>alert('Thành công')</script>";
                    } else
                        echo "<script>alert('Không thành công')</script>";
                    echo "<script>window.location='chitietsanpham.php?idsp=" . $_GET['idsp'] . "';</script>";
                }
                ?>
            </div>
            <div class="w-100 d-flex align-items-center justify-content-center">
                <hr style="width:98%">
            </div>
            <div class="w-100">
                <span class="mb-2 ms-2" style="font-size:20px;font-weight:bold;">Lọc theo</span>
                <div class="d-flex align-items-center justify-content-between mt-2" style="width:40%;">
                    <button type="button" class="filter-btn" data-rating="all" style="border: 0.5px solid #BDBDBD;background-color:#fff;border-radius:10px;">Tất cả</button>
                    <button type="button" class="filter-btn" data-rating="5" style="border: 0.5px solid #BDBDBD;background-color:#fff;border-radius:10px;">
                        <span style="color:black;">5</span><i class="bi bi-star-fill" style="color: #f59e0b;"></i>
                    </button>
                    <button type="button" class="filter-btn" data-rating="4" style="border: 0.5px solid #BDBDBD;background-color:#fff;border-radius:10px;">
                        <span style="color:black;">4</span><i class="bi bi-star-fill" style="color: #f59e0b;"></i>
                    </button>
                    <button type="button" class="filter-btn" data-rating="3" style="border: 0.5px solid #BDBDBD;background-color:#fff;border-radius:10px;">
                        <span style="color:black;">3</span><i class="bi bi-star-fill" style="color: #f59e0b;"></i>
                    </button>
                    <button type="button" class="filter-btn" data-rating="2" style="border: 0.5px solid #BDBDBD;background-color:#fff;border-radius:10px;">
                        <span style="color:black;">2</span><i class="bi bi-star-fill" style="color: #f59e0b;"></i>
                    </button>
                    <button type="button" class="filter-btn" data-rating="1" style="border: 0.5px solid #BDBDBD;background-color:#fff;border-radius:10px;">
                        <span style="color:black;">1</span><i class="bi bi-star-fill" style="color: #f59e0b;"></i>
                    </button>
                </div>
            </div>
            <?php
            $dg = $get->se_dg_idsp($_GET['idsp']);
            foreach ($dg as $d) {
                $tk = $get->se_tk_id($d['TaiKhoanID']);
                $k = mysqli_fetch_assoc($tk);
                $user = $get->se_tt_id($k['UserID']);
                $k = mysqli_fetch_assoc($user);
                $danhgia[] = ['Ten' => $k['TenNguoiDung'], 'Rating' => $d['DiemDanhGia'], 'ThoiGian' => $d['NgayTao'], 'BinhLuan' => $d['BinhLuan']];
            }
            if (!empty($danhgia)) {
                $dg = json_encode($danhgia);
            } else $dg = null;
            ?>
            <div id="danhgia" class="w-100 mt-2">

            </div>
        </div>
        <script>
            var dg = <?php echo $dg; ?>;

            // Hàm render bình luận
            function danhgia(str) {
                let stars = '';
                for (let i = 0; i < 5; i++) {
                    if (i < str.Rating) {
                        stars += '<i class="bi bi-star-fill"></i>'; // Ngôi sao đầy
                    } else {
                        stars += '<i class="bi bi-star"></i>'; // Ngôi sao rỗng
                    }
                }
                html = `<div class="w-100 d-flex">
        <i class="bi bi-person-circle fs-3 me-2"></i>
        <div class="w-100">
            <div class="w-100 mt-2">
                ${str.Ten}
                <span style="font-size:11px;text-align:center;"><i class="bi bi-clock ms-2 me-1 mt-2"></i>${str.ThoiGian}</span>
            </div>
            <div class="d-flex rating mt-2">
                ${stars}
            </div>
            <div class="mt-2" style="font-size:13px;">
                ${str.BinhLuan}
            </div>
        </div>
    </div>
    <div class="w-100 d-flex align-items-center justify-content-center">
        <hr style="width:98%">
    </div>`;
                $('#danhgia').append(html);
            }

            // Render tất cả bình luận ban đầu
            $.each(dg, function(index, item) {
                danhgia(item);
            });

            // Lọc theo số sao
            $('.filter-btn').on('click', function() {
                const rating = $(this).data('rating');
                $('#danhgia').empty(); // Xóa nội dung cũ

                if (rating === 'all') {
                    // Hiển thị tất cả bình luận
                    $.each(dg, function(index, item) {
                        danhgia(item);
                    });
                } else {
                    // Hiển thị bình luận theo số sao
                    $.each(dg, function(index, item) {
                        if (item.Rating == rating) {
                            danhgia(item);
                        }
                    });
                }
            });
        </script>
        <div class="thongtinsp border rounded ms-4 px-3 py-2" style="width:35%;height:100%;">
            <span style="font-weight:bold;font-size:18px;">Thông số kỹ thuật</span>
            <ul class="mt-2 border rounded p-0">
                <?php
                $se = $get->se_bangts_id($r['SanPhamID']);
                foreach ($se as $s) {
                    $loaits = $get->se_ts_id($s['ThongSoID']);
                    $r = mysqli_fetch_assoc($loaits);
                    $tents = $get->se_loaits_id($r['LoaiThongSoID']);
                    $ten = mysqli_fetch_assoc($tents);
                ?>
                    <li class="d-flex justify-content-between p-1">
                        <?php echo $ten['Ten'] ?>
                        <div class="w-50"><?php echo $r['GiaTri'] ?></div>
                    </li>
                <?php
                }
                ?>
            </ul>
            <div class="d-flex justify-content-center">
                <button class="btn btn-light w-75 border">Xem cấu hình chi tiết<i class="bi bi-chevron-down ms-2"></i></button>
            </div>
        </div>
    </div>
    <div class="container mt-4" style="width: 80%;">
        <hr style="height:2px;margin: 10px 0 15px;background-color: #cfcece;border:none;">
        <span style="font-size:20px;font-weight:bold;">SẢN PHẨM TƯƠNG TỰ</span>
        <div class="swiper mySwiper1">
            <div class="swiper-wrapper mb-2">
                <?php
                $se = $get->se_sp_lm(20, 1);
                foreach ($se as $s) {
                    $ha = $get->se_hasp_id($s['SanPhamID']);
                    $h = mysqli_fetch_assoc($ha);
                ?>
                    <div class="swiper-slide">
                        <div class="product" style="height:420px">
                            <a href="../webbanhang/chitietsanpham.php?idsp=<?php echo $s['SanPhamID'] ?>">
                                <img src="../images/sanpham/<?php echo $h['DuongDanAnh'] ?>" style="margin: 25px;margin-bottom: 5px;" width="160" height="160" alt="">
                            </a>
                            <p class="name"><?php echo $s['Ten'] ?></p>
                            <div class="price">
                                <p class="price-show"><?php echo number_format($s['Gia'], 0, ',', '.') ?> VNĐ</p>
                                <p class="price-through"><?php echo number_format($s['Gia'] * 28 / 100 + $s['Gia'], 0, ',', '.') ?> VNĐ</p>
                                <div class="price-percent">
                                    <p class="price-percent-detail">Giảm 28%</p>
                                </div>
                            </div>
                            <div class="promotion">
                                <p>
                                    Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng
                                </p>
                            </div>
                            <div class="bottom-div">
                                <div class="rating">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                                <div class="wishlist">
                                    Yêu thích &nbsp;
                                    <button class="wishbtn">
                                        <i id="iconf" class="bi bi-suit-heart fs-4"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="tragop">
                                Trả góp 0%
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="swiper-scrollbar"></div>
        </div>
    </div>
    <?php
    require_once 'footer.php';
    ?>
    <script src=" https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js">
    </script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
        });
        var swiper = new Swiper(".mySwiper3", {
            spaceBetween: 10,
            slidesPerView: 10,
            freeMode: true,
            watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });
        var swiper1 = new Swiper(".mySwiper1", {
            slidesPerView: 1,
            spaceBetween: 10,
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 0,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 0,
                },
                1024: {
                    slidesPerView: 4.8,
                    spaceBetween: 5,
                },
            },
            scrollbar: {
                el: '.swiper-scrollbar',
                hide: true,
                draggable: true
            },
            direction: 'horizontal',
        });
    </script>
</body>