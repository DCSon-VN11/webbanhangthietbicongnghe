<?php
require_once 'header.php';
?>

<body>
    <!-- body -->
    <div class="container d-flex m-auto mt-2 gx-0" style="width: 80%;">
        <div class="dropend d-flex flex-column rounded ms-0 fs-6" style="width: 18%;">
            <?php
            $dm = $get->se_dm();
            foreach ($dm as $d) {
            ?>
                <div class="dropdown-toggle" aria-expanded="false">
                    <a style="text-decoration: none;color:black" href="../webbanhang/sanpham.php?dm=<?php echo $d['DanhMucID'] ?>"><?php echo $d['Ten']; ?></a>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="banner shadow bg-body-tertiary rounded">
            <div id="carouselExampleInterval" class="carousel slide h-100" data-bs-ride="carousel">
                <div class="carousel-indicators bg-light rounded-bottom" style="width: 100%;height: 20%;margin: 0;">
                    <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="0" class="active" style="opacity: 100%;height: 97%;text-indent: 0px;margin: 0;width: 20%;border-top:none;font-size: 12px;font-family: Roboto, sans-serif !important;text-align: center;" aria-current="true" aria-label="Slide 1">ASUS TUF GAMING <br> chỉ từ 16.99 triệu</button>
                    <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="1" style="opacity: 100%;height: 97%;text-indent: 0px;margin: 0;width: 20%;border-top:none;font-size: 12px;font-family: Roboto, sans-serif !important;text-align: center;" aria-label="Slide 2">HUAWE.I WATCH FIT 3 <br> chỉ từ 2.79 triệu</button>
                    <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="2" style="opacity: 100%;height: 97%;text-indent: 0px;margin: 0;width: 20%;border-top:none;font-size: 12px;font-family: Roboto, sans-serif !important;text-align: center;" aria-label="Slide 3">iPhone 15 pro <br> chỉ từ 22.69 triệu</button>
                    <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="3" style="opacity: 100%;height: 97%;text-indent: 0px;margin: 0;width: 20%;border-top:none;font-size: 12px;font-family: Roboto, sans-serif !important;text-align: center;" aria-label="Slide 1">Nubia NEO 2 <br> chỉ từ 2.99 triệu</button>
                    <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="4" style="opacity: 100%;height: 97%;text-indent: 0px;margin: 0;width: 20%;border-top:none;font-size: 12px;font-family: Roboto, sans-serif !important;text-align: center;" aria-label="Slide 2">Samsung galaxy S24 <br> chỉ từ 16.79 triệu</button>
                    <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="5" style="opacity: 100%;height: 97%;text-indent: 0px;margin: 0;width: 20%;border-top:none;font-size: 12px;font-family: Roboto, sans-serif !important;text-align: center;" aria-label="Slide 3">MINOR IV <br> chỉ từ 3.69 triệu</button>
                    <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="6" style="opacity: 100%;height: 97%;text-indent: 0px;margin: 0;width: 20%;border-top:none;font-size: 12px;font-family: Roboto, sans-serif !important;text-align: center;" aria-label="Slide 1">V30e <br> 10.19 triệu</button>
                    <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="7" style="opacity: 100%;height: 97%;text-indent: 0px;margin: 0;width: 20%;border-top:none;font-size: 12px;font-family: Roboto, sans-serif !important;text-align: center;" aria-label="Slide 2">Xiaomi 14 Ultra <br> chỉ từ 5.89 triệu</button>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var carousel = document.querySelector('#carouselExampleInterval');
                        var indicator = document.querySelectorAll('.carousel-indicators button');
                        var max = 5;
                        carousel.addEventListener('slide.bs.carousel', function(event) {
                            var total = indicator.length;
                            var activeIndex = event.to;
                            indicator.forEach((indicator, index) => {
                                if (index >= activeIndex && index < activeIndex + max) {
                                    indicator.style.display = 'block';
                                } else if (total - activeIndex > max - 1) {
                                    indicator.style.display = 'none';
                                }

                            });
                        });
                        indicator.forEach((indicator, index) => {
                            if (index < max) {
                                indicator.style.display = 'block';
                            } else {
                                indicator.style.display = 'none';
                            }
                        });
                    });
                </script>
                <div class="carousel-inner rounded-top" style="height: 80%;">
                    <div class="carousel-item h-100 active ">
                        <img src="../webbanhang/image/banner/Asus_sliding.2_new_1_11zon.jpg" class="d-block w-100 h-100" alt="...">
                    </div>
                    <div class="carousel-item h-100">
                        <img src="../webbanhang/image/banner/HUAWEI WATCH FIT 3-2tr7_2_11zon.jpg" class="d-block w-100 h-100" alt="...">
                    </div>
                    <div class="carousel-item h-100">
                        <img src="../webbanhang/image/banner/iphone-15-pro-upgrader-stogage_3_11zon.jpg" class="d-block w-100 h-100" alt="...">
                    </div>
                    <div class="carousel-item h-100">
                        <img src="../webbanhang/image/banner/nubia-neo-2-sliding-2-5-2024_4_11zon.jpg" class="d-block w-100 h-100" alt="...">
                    </div>
                    <div class="carousel-item h-100">
                        <img src="../webbanhang/image/banner/samsung-galaxy-sliding-s24-th4_5_11zon.jpg" class="d-block w-100 h-100" alt="...">
                    </div>
                    <div class="carousel-item h-100">
                        <img src="../webbanhang/image/banner/tai-nghe-bluetooth-marshall-minor-iv-sliding_6_11zon.jpg" class="d-block w-100 h-100" alt="...">
                    </div>
                    <div class="carousel-item h-100">
                        <img src="../webbanhang/image/banner/vivo-v-30-e-sliding-18-6-2024_7_11zon.jpg" class="d-block w-100 h-100" alt="...">
                    </div>
                    <div class="carousel-item h-100">
                        <img src="../webbanhang/image/banner/xiaomi-14-ultra-sliding-23-5-2024_8_11zon.jpg" class="d-block w-100 h-100" alt="...">
                    </div>
                    <button class="carousel-control-prev bg-black align-items-center" type="button" style="left: -10px;padding-right: 1%;width: auto;height: 20%;border-radius: 0 100px 100px 0;margin: auto;" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                        <i class="bi bi-chevron-left fs-2 ms-2" aria-hidden="true"></i>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next bg-black align-items-center" type="button" data-bs-target="#carouselExampleInterval" style="right: -10px;padding-left: 1%;width: auto;height: 20%;border-radius: 100px 0px 0px 100px;margin: auto;" data-bs-slide="next">
                        <i class="bi bi-chevron-right fs-2 me-2" aria-hidden="true"></i>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="bannermini">
            <img class="shadow bg-body-tertiary rounded" src="../webbanhang/image/bannermini/b2s-mac-2024-690300.webp" width="100%" height="30%" alt="">
            <img class="shadow bg-body-tertiary rounded" src="../webbanhang/image/bannermini/690x300_Rightbanner_Galaxy-M34-5G_04 (2).webp" width="100%" height="30%" alt="">
            <img class="shadow bg-body-tertiary rounded" src="../webbanhang/image/bannermini/ipad-pro-m4-2024-20-5-right-banner.jpg" width="100%" height="30%" alt="">
        </div>
    </div>
    <div class="container gx-0 mt-3" style="width: 80%;height: 80px;">
        <img class="rounded shadow bg-body-tertiary" src="../webbanhang/image/Untitled-1.jpg" style="width: 100%;height: 100%;" alt="">
    </div>
    <div class="container gx-0 mt-3" style="width: 80%;">
        <div class="w-100 d-flex mb-2">
            <p style="font-weight: bold;font-size: 25px;width: 22%;">ĐIỆN THOẠI NỔI BẬT</p>
        </div>
        <div class="swi">
            <?php
            $se = $get->se_sp_lm(10, 1);
            foreach ($se as $s) {
                $ha = $get->se_hasp_id($s['SanPhamID']);
                $h = mysqli_fetch_assoc($ha);
            ?>
                <div class="product">
                    <a href="../webbanhang/chitietsanpham.php?idsp=<?php echo $s['SanPhamID'] ?>">
                        <img src="../images/sanpham/<?php echo $h['DuongDanAnh'] ?>" style="margin: 25px;margin-bottom: 5px;" width="160" height="160" alt="">
                    </a>
                    <p class="name"><?php if(isset($s['CauHinh'])) echo $s['Ten']." ".$s['CauHinh']; else echo $s['Ten'] ?></p>
                    <div class="price">
                        <p class="price-show"><?php echo number_format($s['Gia'], 0, ',', '.') ?> VNĐ</p>
                        <p class="price-through"><?php echo number_format($s['Gia'] * 100 / 72, 0, ',', '.') ?> VNĐ</p>
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
            <?php
            }
            ?>
        </div>
    </div>
    <div class="container gx-0 mt-3" style="width: 80%;">
        <div class="w-100 d-flex mb-2">
            <p style="font-weight: bold;font-size: 25px;width: 22%;">LAPTOP</p>
        </div>
        <div class="swi">
            <?php
            $se = $get->se_sp_lm(10, 2);
            foreach ($se as $s) {
                $ha = $get->se_hasp_id($s['SanPhamID']);
                $h = mysqli_fetch_assoc($ha);
            ?>
                <div class="product">
                    <a href="../webbanhang/chitietsanpham.php?idsp=<?php echo $s['SanPhamID'] ?>">
                        <img src="../images/sanpham/<?php echo $h['DuongDanAnh'] ?>" style="margin: 25px;margin-bottom: 5px;" width="160" height="160" alt="">
                    </a>
                    <p class="name"><?php if(isset($s['CauHinh'])) echo $s['Ten']." ".$s['CauHinh']; else echo $s['Ten'] ?></p>
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
            <?php
            }
            ?>
        </div>
    </div>
    <div class="container gx-0 mt-3" style="width: 80%;">
        <div class="w-100 d-flex mb-2">
            <p style="font-weight: bold;font-size: 25px;width: 22%;">ÂM THANH</p>
        </div>
        <div class="swi">
            <?php
            $se = $get->se_sp_lm(10, 3);
            foreach ($se as $s) {
                $ha = $get->se_hasp_id($s['SanPhamID']);
                $h = mysqli_fetch_assoc($ha);
            ?>
                <div class="product">
                    <a href="../webbanhang/chitietsanpham.php?idsp=<?php echo $s['SanPhamID'] ?>">
                        <img src="../images/sanpham/<?php echo $h['DuongDanAnh'] ?>" style="margin: 25px;margin-bottom: 5px;" width="160" height="160" alt="">
                    </a>
                    <p class="name"><?php if(isset($s['CauHinh'])) echo $s['Ten']." ".$s['CauHinh']; else echo $s['Ten'] ?></p>
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
            <?php
            }
            ?>
        </div>
    </div>
    <!-- end-body -->
    <?php
    require_once 'footer.php';
    ?>
</body>

</html>