<?php
require_once 'header.php';
if (isset($_GET['dm'])) $dm = $get->se_sp_dm($_GET['dm']);
?>

<body>
    <!-- body -->
    <div class="container d-flex gx-0" style="width: 80%;">
        <div class="swiper mySwiper rounded" navigation-next-el=".custom-next-button" navigation-prev-el=".custom-prev-button" style="width: calc(50% - 10px);">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="../webbanhang/image/bannerdienthoai/real-me-c11-series-cate-3-6-2024.jpg" alt="">
                </div>
                <div class="swiper-slide"><img src="../webbanhang/image/bannerdienthoai/real-me-c11-series-cate-3-6-2024.jpg" alt="">
                </div>
                <div class="swiper-slide"><img src="../webbanhang/image/bannerdienthoai/real-me-c11-series-cate-3-6-2024.jpg" alt="">
                </div>
                <div class="swiper-slide"><img src="../webbanhang/image/bannerdienthoai/real-me-c11-series-cate-3-6-2024.jpg" alt="">
                </div>
                <div class="swiper-slide"><img src="../webbanhang/image/bannerdienthoai/real-me-c11-series-cate-3-6-2024.jpg" alt="">
                </div>
                <div class="swiper-slide"><img src="../webbanhang/image/bannerdienthoai/real-me-c11-series-cate-3-6-2024.jpg" alt="">
                </div>
                <div class="swiper-slide"><img src="../webbanhang/image/bannerdienthoai/real-me-c11-series-cate-3-6-2024.jpg" alt="">
                </div>
                <div class="swiper-slide"><img src="../webbanhang/image/bannerdienthoai/real-me-c11-series-cate-3-6-2024.jpg" alt="">
                </div>
                <div class="swiper-slide"><img src="../webbanhang/image/bannerdienthoai/real-me-c11-series-cate-3-6-2024.jpg" alt="">
                </div>
            </div>
            <div class="custom-next-button"><i class="bi bi-chevron-right fs-3"></i></div>
            <div class="custom-prev-button"><i class="bi bi-chevron-left fs-3"></i></div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="swiper mySwiper rounded" style="width: calc(50% - 10px);">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="../webbanhang/image/bannerdienthoai/real-me-c11-series-cate-3-6-2024.jpg" alt="">
                </div>
                <div class="swiper-slide"><img src="../webbanhang/image/bannerdienthoai/real-me-c11-series-cate-3-6-2024.jpg" alt="">
                </div>
                <div class="swiper-slide"><img src="../webbanhang/image/bannerdienthoai/real-me-c11-series-cate-3-6-2024.jpg" alt="">
                </div>
                <div class="swiper-slide"><img src="../webbanhang/image/bannerdienthoai/real-me-c11-series-cate-3-6-2024.jpg" alt="">
                </div>
                <div class="swiper-slide"><img src="../webbanhang/image/bannerdienthoai/real-me-c11-series-cate-3-6-2024.jpg" alt="">
                </div>
                <div class="swiper-slide"><img src="../webbanhang/image/bannerdienthoai/real-me-c11-series-cate-3-6-2024.jpg" alt="">
                </div>
                <div class="swiper-slide"><img src="../webbanhang/image/bannerdienthoai/real-me-c11-series-cate-3-6-2024.jpg" alt="">
                </div>
                <div class="swiper-slide"><img src="../webbanhang/image/bannerdienthoai/real-me-c11-series-cate-3-6-2024.jpg" alt="">
                </div>
                <div class="swiper-slide"><img src="../webbanhang/image/bannerdienthoai/real-me-c11-series-cate-3-6-2024.jpg" alt="">
                </div>
            </div>
            <div class="custom-next-button"><i class="bi bi-chevron-right fs-3"></i></div>
            <div class="custom-prev-button"><i class="bi bi-chevron-left fs-3"></i></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <div class="container mt-3 gx-0" style="width: 80%;">
        <div class="list-brand">
            <?php
            $ncc = $get->se_ncc_dm($_GET['dm']);
            foreach ($ncc as $n) {;
                $h = $get->se_halogo($n['NhaCungCapID']);
                $logo = mysqli_fetch_assoc($h);
                if ($logo['DuongDanAnh'] != "") {
            ?>
                    <a href="">
                        <img src="../images/thuonghieu/<?php echo $logo['DuongDanAnh'] ?>" 1 alt="<?php echo $logo['DuongDanAnh'] ?>">
                    </a>
            <?php
                }
            }
            ?>
        </div>
    </div>
    <div class="container gx-0 mt3 rounded shadow px-2 pb-2" style="width: 80%; background-color: blue;">
        <div class="w-100 d-flex align-items-center justify-content-center">
            <p class="merienda pt-4 position-relative d-flex align-items-center" style="width: 45%;">
                <i class="bi bi-fire fs-2 border rounded-circle px-2 me-1" style="color: aliceblue;"></i>
                <span style="color: aliceblue;">SẢN PHẨM</span>&nbsp;
                <span class="text-line" style="animation: blink 2s infinite;">NỔI BẬT</span>
                <span class="outtext-line">NỔI BẬT</span>
            </p>
        </div>
        <div class="w-100" style="background-color: blue;">
            <div class="swiper mySwiper1">
                <div class="swiper-wrapper">
                    <?php
                    $se = $get->se_sp_lm(10, $_GET['dm']);
                    foreach ($se as $s) {
                        $ha = $get->se_hasp_id($s['SanPhamID']);
                        $h = mysqli_fetch_assoc($ha);
                    ?>
                        <div class="swiper-slide">
                            <div class="product" style="height:420px">
                                <a href="../webbanhang/chitietsanpham.php?idsp=<?php echo $s['SanPhamID'] ?>">
                                    <img src="../images/sanpham/<?php echo $h['DuongDanAnh'] ?>" style="margin: 25px;margin-bottom: 5px;" width="160" height="160" alt="">
                                </a>
                                <p class="name"><?php echo $s['Ten'] . ' ' . $s['CauHinh'] ?></p>
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
                                        <button class="wishbtn" id="wishbtn">
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
            </div>
            <div class="custom-next-button"><i class="bi bi-chevron-right fs-3"></i></div>
            <div class="custom-prev-button"><i class="bi bi-chevron-left fs-3"></i></div>
        </div>
    </div>
    </div>
    <?php
    if ($_GET['dm'] == '1' || $_GET['dm'] == "2") {
    ?>
        <div class="container mt-2 gx-0" style="width: 80%;">
            <p style="font-size: 18px;font-weight: 700;font-family: Roboto, sans-serif !important;">Chọn theo tiêu chí</p>
            <div class="filter">
                <div class="position-relative">
                    <button id="filgia" class="btn-filter"><i class="bi bi-cash fs-5"></i>Giá</button>
                    <div id="bgfilgia" class="bg-white border border-1 rounded border-black p-2"
                        style="z-index:100;width:300px;position:absolute !important;display:none;top:45px;left:0;">
                        <i class="bi bi-caret-up-fill fs-3 text-light position-absolute" style="top: -27.5px;left: 20px;border-bottom:0; text-shadow:
                -1px -1px 0 black,
                1px -1px 0 black,
                0px -1px 0 black;"></i>
                        <form method="post">
                            <div class="d-flex justify-content-between">
                                Từ
                                <input class="bg-white border-1" type="number" value="0" min="0" id="filgia1" name="filgia1" style="width:30%;">
                                đến
                                <input class="bg-white border-1" type="number" value="0" min="0" id="filgia2" name="filgia2" style="width:30%;">
                            </div>
                            <div class="d-flex justify-content-between p-4 pb-0">
                                <button id="clofil" class="btn btn-primary">Đóng</button>
                                <button id="btnfilgia" name="btnfilgia" class="btn btn-primary">Lọc giá</button>
                            </div>
                        </form>
                        <?php
                        $uri = $_SERVER['REQUEST_URI'];
                        $filename = basename($uri);
                        $urlParts = parse_url($uri);
                        parse_str($urlParts['query'], $queryParams);
                        if (isset($_POST['btnfilgia'])) {
                            $queryParams['gia'] = $_POST['filgia1'] . "-" . $_POST['filgia2'];
                            $newQuery = http_build_query($queryParams);
                            $newUrl = $urlParts['path'] . '?' . $newQuery;
                            echo "<script>window.location='$newUrl';</script>";
                        }
                        ?>
                    </div>
                    <script>
                        $('#filgia').click(function() {
                            if ($('#bgfilgia').css('display') === 'none') $('#bgfilgia').css('display', 'block');
                            else $('#bgfilgia').css('display', 'none');
                        });
                        $('#clofil').click(function() {
                            $('#bgfilgia').css('display', 'none');
                        });
                    </script>
                </div>
                <?php
                if ($_GET['dm'] == 1) {
                ?>
                    <div class="position-relative">
                        <button id="filchip" class="btn-filter">Chip xử lí<i class="bi bi-chevron-down"></i></button>
                        <div id="bgfilchip" class="bg-white border border-1 rounded border-black p-2"
                            style="z-index:100;position:absolute !important;display:none;top:45px;left:0;">
                            <i class="bi bi-caret-up-fill fs-3 text-light position-absolute" style="top: -27.5px;left: 20px;border-bottom:0; text-shadow:
                        -1px -1px 0 black,
                        1px -1px 0 black,
                        0px -1px 0 black;"></i>
                            <form action="" method="post">
                                <div class="d-flex justify-content-between">
                                    <button type="submit" name="chip" value="Snapdragon" class="btn-filter">Snapdragon</button>
                                    <button type="submit" name="chip" value="Unisoc" class="btn-filter">Unisoc</button>
                                    <button type="submit" name="chip" value="Apple A" class="btn-filter">Apple A</button>
                                    <button type="submit" name="chip" value="Mediatek" class="btn-filter">Mediatek</button>
                                </div>
                            </form>
                            <?php
                            if (isset($_POST['chip'])) {
                                $queryParams['chip'] = $_POST['chip'];
                                $newQuery = http_build_query($queryParams);
                                $newUrl = $urlParts['path'] . '?' . $newQuery;
                                echo "<script>window.location='$newUrl';</script>";
                            }
                            ?>
                        </div>
                        <script>
                            $('#filchip').click(function() {
                                if ($('#bgfilchip').css('display') === 'none') $('#bgfilchip').css('display', 'block');
                                else $('#bgfilchip').css('display', 'none');
                            });
                        </script>
                    </div>
                <?php
                }
                if ($_GET['dm'] == 2) {
                ?>
                    <div class="position-relative">
                        <button id="filcpu" class="btn-filter">CPU<i class="bi bi-chevron-down"></i></button>
                        <div id="bgfilcpu" class="bg-white border border-1 rounded border-black p-2"
                            style="z-index:100;position:absolute !important;display:none;top:45px;left:0;">
                            <i class="bi bi-caret-up-fill fs-3 text-light position-absolute" style="top: -27.5px;left: 20px;border-bottom:0; text-shadow:
                        -1px -1px 0 black,
                        1px -1px 0 black,
                        0px -1px 0 black;"></i>
                            <form action="" method="post">
                                <div class="d-flex justify-content-between">
                                    <button name="cpu" type="submit" value="Intel" class="btn-filter">Intel</button>
                                    <button name="cpu" type="submit" value="AMD" class="btn-filter">AMD</button>
                                    <button name="cpu" type="submit" value="Apple M" class="btn-filter">Apple M</button>
                                </div>
                            </form>
                            <?php
                            if (isset($_POST['cpu'])) {
                                $queryParams['cpu'] = $_POST['cpu'];
                                $newQuery = http_build_query($queryParams);
                                $newUrl = $urlParts['path'] . '?' . $newQuery;
                                echo "<script>window.location='$newUrl';</script>";
                            }
                            ?>
                        </div>
                        <script>
                            $('#filcpu').click(function() {
                                if ($('#bgfilcpu').css('display') === 'none') $('#bgfilcpu').css('display', 'block');
                                else $('#bgfilcpu').css('display', 'none');
                            });
                        </script>
                    </div>
                    <div class="position-relative">
                        <button id="filgpu" class="btn-filter">Card đồ hoạ<i class="bi bi-chevron-down"></i></button>
                        <div id="bgfilgpu" class="bg-white border border-1 rounded border-black p-2"
                            style="z-index:100;position:absolute !important;display:none;top:45px;left:0;">
                            <i class="bi bi-caret-up-fill fs-3 text-light position-absolute" style="top: -27.5px;left: 20px;border-bottom:0; text-shadow:
                        -1px -1px 0 black,
                        1px -1px 0 black,
                        0px -1px 0 black;"></i>
                            <form action="" method="post">
                                <div class="d-flex justify-content-between">
                                    <button name="gpu" type="submit" value="NVIDIA" class="btn-filter">NVIDIA</button>
                                    <button name="gpu" type="submit" value="AMD" class="btn-filter">AMD</button>
                                    <button name="gpu" type="submit" value="GPU" class="btn-filter">Card Onboard</button>
                                </div>
                            </form>
                            <?php
                            if (isset($_POST['gpu'])) {
                                $queryParams['gpu'] = $_POST['gpu'];
                                $newQuery = http_build_query($queryParams);
                                $newUrl = $urlParts['path'] . '?' . $newQuery;
                                echo "<script>window.location='$newUrl';</script>";
                            }
                            ?>
                        </div>
                        <script>
                            $('#filgpu').click(function() {
                                if ($('#bgfilgpu').css('display') === 'none') $('#bgfilgpu').css('display', 'block');
                                else $('#bgfilgpu').css('display', 'none');
                            });
                        </script>
                    </div>
                <?php
                }
                ?>
                <div class="position-relative">
                    <button id="filram" class="btn-filter">Dung lượng ram<i class="bi bi-chevron-down"></i></button>
                    <div id="bgfilram" class="bg-white border border-1 rounded border-black p-2"
                        style="z-index:100;position:absolute !important;display:none;top:45px;left:0;">
                        <i class="bi bi-caret-up-fill fs-3 text-light position-absolute" style="top: -27.5px;left: 20px;border-bottom:0; text-shadow:
                        -1px -1px 0 black,
                        1px -1px 0 black,
                        0px -1px 0 black;"></i>
                        <form action="" method="post">
                            <div class="d-flex justify-content-between">
                                <?php
                                if ($_GET['dm'] == 1) {
                                ?>
                                    <button name="ram" type="submit" value="4 GB" class="btn-filter">4 GB</button>
                                    <button name="ram" type="submit" value="6 GB" class="btn-filter">6 GB</button>
                                    <button name="ram" type="submit" value="8 GB" class="btn-filter">8 GB</button>
                                    <button name="ram" type="submit" value="12 GB" class="btn-filter">12 GB</button>
                                <?php
                                } elseif ($_GET['dm'] == 2) {
                                ?>
                                    <button name="ram" type="submit" value="4 GB" class="btn-filter">4 GB</button>
                                    <button name="ram" type="submit" value="8 GB" class="btn-filter">8 GB</button>
                                    <button name="ram" type="submit" value="16 GB" class="btn-filter">16 GB</button>
                                    <button name="ram" type="submit" value="32 GB" class="btn-filter">32 GB</button>
                                <?php
                                }
                                ?>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['ram'])) {
                            $queryParams['ram'] = $_POST['ram'];
                            $newQuery = http_build_query($queryParams);
                            $newUrl = $urlParts['path'] . '?' . $newQuery;
                            echo "<script>window.location='$newUrl';</script>";
                        }
                        ?>
                    </div>
                    <script>
                        $('#filram').click(function() {
                            if ($('#bgfilram').css('display') === 'none') $('#bgfilram').css('display', 'block');
                            else $('#bgfilram').css('display', 'none');
                        });
                    </script>
                </div>
                <div class="position-relative">
                    <button id="filrom" class="btn-filter">Bộ nhớ trong<i class="bi bi-chevron-down"></i></button>
                    <div id="bgfilrom" class="bg-white border border-1 rounded border-black p-2"
                        style="z-index:100;position:absolute !important;display:none;top:45px;left:0;">
                        <i class="bi bi-caret-up-fill fs-3 text-light position-absolute" style="top: -27.5px;left: 20px;border-bottom:0; text-shadow:
                        -1px -1px 0 black,
                        1px -1px 0 black,
                        0px -1px 0 black;"></i>
                        <form action="" method="post">
                            <div class="d-flex justify-content-between">
                                <?php
                                if ($_GET['dm'] == 1) {
                                ?>
                                    <button type="submit" name="rom" value="64 GB" class="btn-filter">64 GB</button>
                                    <button type="submit" name="rom" value="128 GB" class="btn-filter">128 GB</button>
                                    <button type="submit" name="rom" value="256 GB" class="btn-filter">256 GB</button>
                                    <button type="submit" name="rom" value="512 GB" class="btn-filter">512 GB</button>
                                    <button type="submit" name="rom" value="1 TB" class="btn-filter">1 TB</button>
                                <?php
                                } elseif ($_GET['dm'] == 2) {
                                ?>
                                    <button type="submit" name="rom" value="128 GB" class="btn-filter">128 GB</button>
                                    <button type="submit" name="rom" value="256 GB" class="btn-filter">256 GB</button>
                                    <button type="submit" name="rom" value="512 GB" class="btn-filter">512 GB</button>
                                    <button type="submit" name="rom" value="1 TB" class="btn-filter">1 TB</button>
                                <?php
                                }
                                ?>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['rom'])) {
                            $queryParams['rom'] = $_POST['rom'];
                            $newQuery = http_build_query($queryParams);
                            $newUrl = $urlParts['path'] . '?' . $newQuery;
                            echo "<script>window.location='$newUrl';</script>";
                        }
                        ?>
                    </div>
                    <script>
                        $('#filrom').click(function() {
                            if ($('#bgfilrom').css('display') === 'none') $('#bgfilrom').css('display', 'block');
                            else $('#bgfilrom').css('display', 'none');
                        });
                    </script>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <div id="bgthongtinloc" class="container mt-2 gx-0" style="width: 80%;display:none;">
        <p style="font-size: 18px;font-weight: 700;font-family: Roboto, sans-serif !important;">Đang lọc theo</p>
        <div class="d-flex">
            <div id="thongtinloc" class="d-flex"></div>
            <div id="xoaall"></div>
        </div>
    </div>
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        var gia = urlParams.get('gia');
        var chip = urlParams.get('chip');
        var ram = urlParams.get('ram');
        var rom = urlParams.get('rom');
        var cpu = urlParams.get('cpu');
        var gpu = urlParams.get('gpu');

        function huyloc(str) {
            var btnhuyloc = `<button type="button" id="${str.replace(/\s+/g, '_')}" class="btn-filter text-danger border border-danger">
                        <i class="bi bi-x-circle-fill"></i>${str}
                    </button>`;
            $('#thongtinloc').append(btnhuyloc);
        }

        function removeParam(param) {
            urlParams.delete(param);
            var newUrl = window.location.pathname + '?' + urlParams.toString();
            window.location.href = newUrl;
        }

        if (ram || gia || chip || rom || cpu || gpu) {
            $('#bgthongtinloc').css('display', 'block');
            var btnhuy = `<button type="button" id="xoaloc" class="btn-filter text-danger border border-danger">
                    <i class="bi bi-x-circle-fill"></i>Xoá tất cả lọc
                </button>`;
            $('#xoaall').append(btnhuy);

            $('#xoaloc').click(function() {
                urlParams.delete('gia');
                urlParams.delete('chip');
                urlParams.delete('ram');
                urlParams.delete('rom');
                urlParams.delete('cpu');
                urlParams.delete('gpu');
                var newUrl = window.location.pathname + '?' + urlParams.toString();
                window.location.href = newUrl;
            });
        }
        const params = ['gia', 'chip', 'ram', 'rom', 'cpu', 'gpu'];
        params.forEach(param => {
            var value = urlParams.get(param);
            if (value) {
                $('#fil' + param).css('color', 'blue').css("border-color", "#0d6efd");
                huyloc(value);
                $('#' + value.replace(/\s+/g, '_')).click(function() {
                    removeParam(param);
                    $(this).remove();
                });
            }
        });
    </script>
    <div class="container mt-2 gx-0" style="width: 80%;">
        <p style="font-size: 18px;font-weight: 700;font-family: Roboto, sans-serif !important;">Sắp xếp theo</p>
        <div class="filter">
            <button type="button" class="btn-filter" onclick="sortProducts('desc')">
                <i class="bi bi-sort-down"></i>Giá Cao - Thấp
            </button>
            <button type="button" class="btn-filter" onclick="sortProducts('asc')">
                <i class="bi bi-sort-up"></i>Giá Thấp - Cao
            </button>
        </div>
    </div>
    <div class="container mt-2 gx-0" style="width: 80%;">
        <div id="sanpham" class="swi">
            <?php
            foreach ($dm as $s) {
                $ha = $get->se_hasp_id($s['SanPhamID']);
                $h = mysqli_fetch_assoc($ha);
                $thongso = [];
                $se = $get->se_bangts_id($s['SanPhamID']);
                foreach ($se as $t) {
                    $loaits = $get->se_ts_id($t['ThongSoID']);
                    $r = mysqli_fetch_assoc($loaits);
                    $tents = $get->se_loaits_id($r['LoaiThongSoID']);
                    $ten = mysqli_fetch_assoc($tents);
                    $thongso[$ten['Ten']] = $r['GiaTri'];
                }
                $sanpham[] = [
                    'SanPhamID' => $s['SanPhamID'],
                    'DuongDanAnh' => $h['DuongDanAnh'],
                    'Ten' => $s['Ten'],
                    'CauHinh' => $s['CauHinh'],
                    'Gia' => $s['Gia'],
                    'ThongSo' => $thongso
                ];
            }
            if (!empty($sanpham)) {
                $sanpham1 = array_filter($sanpham, function ($product) {
                    $rom = true;
                    $ram = true;
                    $price = true;
                    $chip = true;
                    $cpu = true;
                    $gpu = true;
                    if (isset($_GET['chip'])) {
                        $chip = isset($product['ThongSo']['Chipset']) && (strpos($product['ThongSo']['Chipset'], $_GET['chip']) !== false);
                    }
                    if (isset($_GET['rom'])) {
                        if($_GET['dm']==1){
                            $rom = isset($product['ThongSo']['Bộ nhớ trong']) &&
                            (strpos(str_replace(' ', '', $product['ThongSo']['Bộ nhớ trong']), str_replace(' ', '', $_GET['rom'])) !== false);
                        }
                        if($_GET['dm']==2){
                            $rom = isset($product['ThongSo']['Ổ cứng']) &&
                            (strpos(str_replace(' ', '', $product['ThongSo']['Ổ cứng']), str_replace(' ', '', $_GET['rom'])) !== false);
                        }
                    }
                    if (isset($_GET['ram'])) {
                        $ram = isset($product['ThongSo']['Dung lượng RAM']) &&
                            (strpos(str_replace(' ', '', $product['ThongSo']['Dung lượng RAM']), str_replace(' ', '', $_GET['ram'])) !== false);
                    }

                    if (isset($_GET['cpu'])) {
                        $cpu = isset($product['ThongSo']['Loại CPU']) && (strpos($product['ThongSo']['Loại CPU'], $_GET['cpu']) !== false);
                    }

                    if (isset($_GET['gpu'])) {
                        $gpu = isset($product['ThongSo']['Loại card đồ họa']) && (strpos($product['ThongSo']['Loại card đồ họa'], $_GET['gpu']) !== false);
                    }
                    if (isset($_GET['gia'])) {
                        $price_parts = explode("-", $_GET['gia']);
                        $price_min = isset($price_parts[0]) ? trim($price_parts[0]) : "";
                        $price_max = isset($price_parts[1]) ? trim($price_parts[1]) : "";
                        if ($price_min !== "" || $price_max !== "") {
                            if ($price_min !== "" && $price_max !== "") {
                                $price = floatval($product['Gia']) >= $price_min && floatval($product['Gia']) <= $price_max;
                            } elseif ($price_min !== "") {
                                $price = floatval($product['Gia']) >= $price_min;
                            } elseif ($price_max !== "") {
                                $price = floatval($product['Gia']) <= $price_max;
                            }
                        }
                    }
                    return $price && $chip && $ram && $rom && $cpu && $gpu;
                });
            }
            $sp = json_encode(array_values($sanpham1)) ?? null;
            ?>
        </div>
        <button id="loadMoreBtn">Hiển thị thêm</button>
        <script>
            var sp = <?php echo $sp; ?>;
            console.log(sp);

            function sanpham(str) {
                var html = `
        <div class="product">
            <a href="../webbanhang/chitietsanpham.php?idsp=${str.SanPhamID}">
                <img src="../images/sanpham/${str.DuongDanAnh}" style="margin: 25px;margin-bottom: 5px;" width="160" height="160" alt="">
            </a>
            <p class="name">${str.Ten + " " + str.CauHinh}</p>
            <div class="price">
                <p class="price-show">${(parseInt(str.Gia)).toLocaleString('vi-VN')} VNĐ</p>
                <p class="price-through">${(parseInt(str.Gia/(72/100))).toLocaleString('vi-VN')} VNĐ</p>
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
                    <button class="wishbtn" id="wishbtn">
                        <i id="iconf" class="bi bi-suit-heart fs-4"></i>
                    </button>
                </div>
            </div>
            <div class="tragop">
                Trả góp 0%
            </div>
        </div>
        `;
                $('#sanpham').append(html);
            }

            var currentProductsCount = 0;
            var productsPerPage = 10;

            function showProducts(sanp, start, end) {
                if (sanp) {
                    var currentProducts = sanp.slice(start, end);
                    $.each(currentProducts, function(index, item) {
                        sanpham(item);
                    });
                }
            }

            function sortProducts(order) {
                // Prevent recursion by ensuring no indirect infinite loop occurs
                if (order === 'asc') {
                    sp.sort(function(a, b) {
                        return parseFloat(a.Gia) - parseFloat(b.Gia);
                    });
                } else if (order === 'desc') {
                    sp.sort(function(a, b) {
                        return parseFloat(b.Gia) - parseFloat(a.Gia);
                    });
                }

                $('#sanpham').empty(); // Clear the current products
                currentProductsCount = parseInt(sessionStorage.getItem('currentProductsCount')) || 0; // Reset product count
                sessionStorage.setItem('sortOrder', order); // Save sorting order

                // Display sorted products without recursively triggering another sort
                showProducts(sp, 0, currentProductsCount);
                if (sp === null || currentProductsCount > sp.length) {
                    $('#loadMoreBtn').hide();
                } else {
                    $('#loadMoreBtn').show();
                }
            }
            $('#loadMoreBtn').click(function() {
                showMoreProducts(sp);
            });

            function showMoreProducts(sp) {
                var savedCount = parseInt(sessionStorage.getItem('currentProductsCount'));
                var savedSortOrder = sessionStorage.getItem('sortOrder');
                var urlMatch = sessionStorage.getItem('scrollUrl') === window.location.href;

                if (urlMatch && !isNaN(savedCount)) {
                    if (savedSortOrder) {
                        // Apply the saved sort order only if it's saved, without calling sortProducts recursively
                        sortProducts(savedSortOrder);
                    }
                    showProducts(sp, 0, savedCount);
                    currentProductsCount = savedCount;
                } else {
                    showProducts(sp, currentProductsCount, currentProductsCount + productsPerPage);
                    currentProductsCount += productsPerPage;
                }

                sessionStorage.setItem('currentProductsCount', currentProductsCount);

                if (sp === null || currentProductsCount > sp.length) {
                    $('#loadMoreBtn').hide();
                } else {
                    $('#loadMoreBtn').show();
                }
            }
            $(document).ready(function() {
                var currentUrl = window.location.href;
                var savedUrl = sessionStorage.getItem('scrollUrl');

                // Clear sort state if URL changes
                if (savedUrl && savedUrl !== currentUrl) {
                    sessionStorage.removeItem('sortOrder');
                    sessionStorage.removeItem('currentProductsCount');
                }

                sessionStorage.setItem('scrollUrl', currentUrl);

                var savedSortOrder = sessionStorage.getItem('sortOrder');
                if (savedSortOrder) {
                    // Only call sortProducts once to prevent recursive calls
                    sortProducts(savedSortOrder);
                } else {
                    showMoreProducts(sp);
                }
            });
        </script>

    </div>

    <!-- end-body -->
    <?php
    require_once 'footer.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".custom-next-button",
                prevEl: ".custom-prev-button",
            },
        });
        var swiper1 = new Swiper(".mySwiper1", {
            slidesPerView: 1,
            spaceBetween: 10,
            navigation: {
                nextEl: ".custom-next-button",
                prevEl: ".custom-prev-button",
            },
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
        });
    </script>
</body>

</html>