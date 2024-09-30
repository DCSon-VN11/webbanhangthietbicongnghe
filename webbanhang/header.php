<?php
require_once 'data/control.php';
$get = new data();
session_start();
if (isset($_GET['dx'])) {
    unset($_SESSION['tkkh'], $_SESSION['idgio'], $_SESSION['giohang'], $_SESSION['ttnd']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSphone</title>
    <link href="../webbanhang/image/logo.jpg" rel="icon">
    <link href="../webbanhang/css/style.css" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .carousel-indicators .active {
            font-weight: 700;
            border-bottom: 2.5px solid rgb(46, 46, 251);
        }

        .carousel-control-prev,
        .carousel-control-next {
            display: none;
        }

        .carousel-inner:hover .carousel-control-prev,
        .carousel-inner:hover .carousel-control-next {
            display: block;
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <!-- header -->
    <div class="bg-primary w-100 header">
        <div class="container m-auto">
            <nav class="navbar navbar-expand-lg py-0">
                <div class="container w-auto d-flex justify-content-center">
                    <a class="navbar-brand py-0" href="../webbanhang/trangchu.php">
                        <div class="logo">
                            <span style="font-size: 50px;">CS</span>phone<img src="../webbanhang/image/logo.jpg"></img>
                        </div>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 mt-2 mt-lg-2 align-items-center justify-content-center">
                            <li class="nav-item ps-2 pt-2 pt-lg-0">
                                <a class="btn btn-primary bg-light bg-opacity-10 p-2" id="btndanhmuc">
                                    <i class="bi bi-file-text"></i> Danh mục
                                </a>
                            </li>
                            <li class="nav-item ps-2 pt-2 pt-lg-0" style="width: 500px;">
                                <div class="position-relative d-flex ps-2 pt-2 pt-lg-0">
                                    <i class="fa fa-search position-absolute" style="margin: 11px 10px;"></i>
                                    <input class="form-control" id="search" type="search" style="text-indent:20px" placeholder="Bạn cần tìm gì?">
                                </div>
                            </li>
                            <li class="nav-item ps-2 pt-2 pt-lg-0 ms-2 box rounded">
                                <div class="d-flex text-light align-items-center pe-2">
                                    <div>
                                        <i class="bi bi-telephone fs-5"></i>
                                    </div>
                                    <div class="ms-1">
                                        <span class="d-block" style="font-size: 12px;">Gọi mua hàng</span>
                                        <span class="d-block mt-1" style="font-size: 14px;">0123456789</span>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item ps-2 pt-2 pt-lg-0 ms-2 box rounded">
                                <a class="d-flex text-light align-items-center pe-2 text-decoration-none" href="../webbanhang/diachicuahang.php" style="width: 90px;" >
                                    <div>
                                        <i class="bi bi-geo-alt fs-5"></i>
                                    </div>
                                    <div class="ms-1" style="margin-top: -5px;">
                                        <span style="font-size: 13px;">Cửa hàng gần bạn</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item pt-2 pt-lg-0 box rounded">
                                <button class="btn btn-link text-decoration-none text-light px-3 position-relative" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                    <div><i class="bi bi-cart fs-3"></i></div>
                                    <?php
                                    if (isset($_SESSION['tkkh'])) {
                                        if (empty($_SESSION['giohang'])) {
                                            $numberOfItems = 0;
                                        } else {
                                            $numberOfItems = count($_SESSION['giohang']);
                                        }
                                    ?>
                                        <span class="position-absolute cart text-primary"><?php echo $numberOfItems; ?></span>
                                    <?php
                                    }
                                    ?>

                                </button>
                            </li>
                            <li class="nav-item pt-2 pt-lg-0 d-flex justify-content-center">
                                <!-- Button trigger modal -->
                                <?php
                                if (isset($_SESSION['ttnd'])) {
                                    $name = explode(" ", $_SESSION['ttnd']['TenNguoiDung']);
                                ?>
                                    <a class="text-light text-decoration-none box rounded px-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="bi bi-person-circle fs-3 d-block"></i>
                                        <span style="font-size: 15px;"><?php echo end($name) ?></span>
                                    </a>
                                <?php
                                } else {
                                ?>
                                    <button class="btn btn-primary bg-light bg-opacity-10 box rounded px-3 dangnhap">
                                        <i class="bi bi-person-circle fs-3 d-block"></i>
                                    </button>
                                <?php
                                }
                                ?>
                            </li>
                        </ul>
                    </div>
                    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog position-relative" style="left: 400px;top:56px;">
                            <i class="bi bi-caret-up-fill fs-3 text-light position-absolute" style="top: -24px;left: 310px;"></i>
                            <div class="modal-content">
                                <div class="modal-body overflow-auto" style="height:500px;">
                                    <?php
                                    if (!isset($_SESSION['giohang']) || empty($_SESSION['giohang'])) echo "Giỏ hàng trống";
                                    else {
                                        $show = 3;
                                        $dem = 0;
                                        $tong = count($_SESSION['giohang']);
                                        foreach ($_SESSION['giohang'] as $item) {
                                            if ($dem >= $show) break;
                                            $ha = $get->se_hasp_id($item['SanPhamID']);
                                            $h = mysqli_fetch_assoc($ha);
                                            $getsp = $get->se_sp_id($item['SanPhamID']);
                                            $sp = mysqli_fetch_assoc($getsp);
                                    ?>
                                            <div class="border rounded w-100 bg-white d-flex mt-3 p-2">
                                                <a href="../webbanhang/chitietsanpham.php?idsp=<?php echo $item['SanPhamID'] ?>" class="modal-link">
                                                    <div class="d-flex align-items-center" style="width:15%">
                                                        <img src="../images/sanpham/<?php echo $h['DuongDanAnh'] ?>" width="90px" height="90px" alt="">
                                                    </div>
                                                </a>
                                                <div style="display:flex;width:85%;margin-left:25px">
                                                    <div style="width: 70%;">
                                                        <form method="POST">
                                                            <a href="../webbanhang/chitietsanpham.php?idsp=<?php echo $item['SanPhamID'] ?>" class="modal-link text-decoration-none text-black">
                                                                <?php echo $sp['Ten'] ?>
                                                            </a>
                                                            <div class="mt-1 ms-1">
                                                                <span id="gia" style="font-weight: bold;color:blue"><?php echo number_format($sp['Gia'], 0, ',', '.') ?> VNĐ</span>
                                                            </div>
                                                            <?php echo "Số Lượng:" .  $item['SoLuong'] ?>
                                                    </div>
                                                    <div style="width:35%;position: relative;text-align:right;">
                                                        <div style="position:absolute;bottom:0px;width:100%;height:50px;">
                                                            <p class="mb-0 fw-bold">Tạm tính:</p>
                                                            <p class="text-danger" style="font-size:14px">
                                                                <?php echo number_format($sp['Gia'] * $item['SoLuong'], 0, ',', '.') . ' VNĐ' ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                            $dem += 1;
                                        }
                                        if ($t = $tong - $show > 0) {
                                        ?>
                                            <div class="d-flex justify-content-between align-items-center w-100 text-primary mt-2">
                                                <hr style="height:2px;margin: 10px 0 15px;background-color: black;width:18%;">
                                                <p>Xem thêm <?php echo $t ?> sản phẩm trong giỏ hàng</p>
                                                <hr style="height:2px;margin: 10px 0 15px;background-color: black;width:18%;">
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                    <div style="position:absolute;bottom:10px;right:15px">
                                        <a href="../webbanhang/user.php?gh" class="btn btn-primary">Xem Giỏ Hàng</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="dropend rounded timkiem" id="ketquatimkiem" style="display: none;">
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('#search').on('focus', function() {
                                $('#ketquatimkiem').css({
                                    'display': 'flex',
                                    'position': 'fixed'
                                });
                                $('#overlay').css('display', 'flex');
                            });
                            $('#search').on('input', function() {
                                var query = $(this).val();
                                if (query.length > 0) {
                                    $.ajax({
                                        url: 'data/search.php', // Đường dẫn đến API tìm kiếm
                                        type: 'GET',
                                        data: {
                                            q: query
                                        },
                                        success: function(response) {
                                            var response = JSON.parse(response);
                                            $('#ketquatimkiem').empty();
                                            if (Array.isArray(response) && response.length > 0) { // Kiểm tra dữ liệu trả về
                                                $.each(response, function(index, item) {
                                                    var html = `
                            <div class="border rounded w-100 bg-white d-flex mt-3 p-2">
                                <a href="../webbanhang/chitietsanpham.php?idsp=${item.sanphamid}" class="modal-link">
                                    <div class="d-flex align-items-center" style="width:15%">
                                        <img src="../images/sanpham/${item.duongdananh}" width="90px" height="90px" alt="">
                                    </div>
                                </a>
                                <div style="display:flex;width:85%;margin-left:25px">
                                    <div style="width: 70%;">
                                        <a href="../webbanhang/chitietsanpham.php?idsp=${item.idsanpham}" class="modal-link text-decoration-none text-black">
                                            ${item.ten + " "+item.cauhinh}
                                        </a>
                                        <p>${Number(item.gia).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' })}</p>
                                    </div>
                                </div>
                            </div>
                        `;
                                                    $('#ketquatimkiem').append(html);
                                                });
                                            } else {
                                                $('#ketquatimkiem').html('<p>Không tìm thấy sản phẩm nào.</p>');
                                            }
                                            $('#ketquatimkiem').show();
                                        },
                                        error: function() {
                                            $('#ketquatimkiem').html('<p>Không tìm thấy kết quả.</p>').show();
                                        }
                                    });
                                } else {
                                    $('#ketquatimkiem').hide();
                                }
                            });
                            $('#overlay').on('click', function() {
                                $('#ketquatimkiem').css('display', 'none');
                                $(this).css('display', 'none');
                            });
                        });
                    </script>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-sm modal-dialog position-relative" style="left: 450px;top:56px;">
                            <i class="bi bi-caret-up-fill fs-3 text-light position-absolute" style="top: -24px;left: 214px;"></i>
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class=" p-2 border border-2 rounded">
                                        <a class="text-decoration-none" href="../webbanhang/user.php">Thông tin Tài khoản</a>
                                    </div>
                                </div>
                                <div class="modal-footer ">
                                    <a class="text-decoration-none" href="../webbanhang/trangchu.php?dx">
                                        Đăng xuất
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-lg modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalToggleLabel">Đăng nhập</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST">

                                        <div class="form-group mb-3">
                                            <span>Email</span>
                                            <input class="form-control" type="email" name="name" autocomplete="name" required placeholder="Ví dụ: email@gmail.com">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="password">Password</label>
                                            <div class="mb-5">
                                                <div class="position-absolute">
                                                    <input class="form-control" autocomplete="off" type="password" id="password" name="password" required pattern="[0-9]{8}" title="Password gồm 8 ký tự số" placeholder="Password gồm 8 ký tự số">
                                                    <span class="toggle-password" aria-label="Hiển thị mật khẩu">
                                                        <i class="bi bi-eye"></i>
                                                    </span>
                                                </div>
                                                <script>
                                                    $('.toggle-password').click(function() {
                                                        const passwordField = $('#password');
                                                        const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
                                                        passwordField.attr('type', type);
                                                        $(this).find('i').toggleClass('bi-eye bi-eye-slash');
                                                    });
                                                </script>
                                            </div>
                                            Bạn quên mật khẩu?
                                            <a style="color: blue;" data-bs-target="#qmk" data-bs-toggle="modal" data-bs-dismiss="modal">Quên mật khẩu</a>
                                        </div>

                                        <div class="form-group mb-0 text-center" style="float:left;">
                                            <button name="btn" class="btn btn-primary"> Đăng nhập </button>
                                            Bạn chưa có tài khoản
                                            <a style="color: blue;" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Đăng ký</a>
                                        </div>
                                        <?php
                                        if (isset($_POST['btn'])) {
                                            $dn = $get->loginuser($_POST['name']);
                                            $r = mysqli_num_rows($dn);
                                            if ($r == 0) {
                                                echo "<script>alert('Tài khoản không tồn tại!!!')</script>";
                                            } else if ($r > 0) {
                                                $r = mysqli_fetch_assoc($dn);
                                                if (password_verify($_POST['password'], $r['Password'])) {
                                                    $_SESSION['tkkh'] = $r;
                                                    $u = $get->se_tt_id($r['UserID']);
                                                    $su = mysqli_fetch_assoc($u);
                                                    $_SESSION['ttnd'] = $su;
                                                    $gio = $get->se_giohang_tk($r['TaiKhoanID']);
                                                    $idgio = mysqli_num_rows($gio);
                                                    if ($idgio > 0) {
                                                        $idgio = mysqli_fetch_assoc($gio);
                                                        $_SESSION['idgio'] = $idgio['GioHangID'];
                                                        $giohang = $get->se_donggiohang($idgio['GioHangID']);
                                                        $dong = mysqli_num_rows($giohang);
                                                        if ($dong == 0) $_SESSION['giohang'] = [];
                                                        else {
                                                            foreach ($giohang as $hang) {
                                                                $_SESSION['giohang'][] = $hang;
                                                            }
                                                        }
                                                    } else {
                                                        $giohang = $get->in_giohang($r['TaiKhoanID']);
                                                        $_SESSION['idgio'] = $giohang;
                                                    }
                                                    echo "<script>window.location='trangchu.php';</script>";
                                                } else {
                                                    echo "<script>alert('Mật khẩu không chính xác!!!')</script>";
                                                }
                                            }
                                        }
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        $('.dangnhap').click(function() {
                            $('#exampleModal1').modal('show');
                        });
                    </script>
                    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalToggleLabel2">Đăng ký</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post">
                                        <div class="form-group">
                                            <label for="ten">Họ và Tên:</label>
                                            <input required="true" type="text" class="form-control" id="ten" name="ten" placeholder="Nhập họ và tên">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input required="true" type="email" class="form-control" id="email" name="email" autocomplete="email" placeholder="Nhập Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="sdt">Số điện thoại:</label>
                                            <input required="true" type="text" pattern="[0-9]{}" title="Nhập đúng định dạng số điện thoại" placeholder="Nhập số điện thoại" class="form-control" id="sdt" name="sdt">
                                        </div>
                                        <div class="form-group">
                                            <label for="diachi">Đia chỉ:</label>
                                            <input type="text" class="form-control" id="diachi" name="diachi" placeholder="Nhập địa chỉ">
                                        </div>
                                        <div class="form-group">
                                            <label for="ngay">Ngày sinh:</label>
                                            <input type="date" class="form-control" id="ngay" name="ngay" placeholder="Nhập ngày sinh">
                                        </div>
                                        <div class="form-group">
                                            <span class="control-label">Giới tính</span>
                                            <select class="form-control" name="gioitinh">
                                                <option value="">-- Chọn giới tính --</option>
                                                <option>Nam</option>
                                                <option>Nữ</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="mk">Mật khẩu:</label>
                                            <input required="true" type="password" autocomplete="off" pattern="[0-9]{8}" class="form-control" id="mk" name="mk" title="Password gồm 8 ký tự số" placeholder="Password gồm 8 ký tự số">
                                        </div>
                                        <button name="dk" class="btn btn-primary mt-1">Đăng ký</button>
                                        Đã có tài khoản
                                        <a style="color: blue;" data-bs-target="#exampleModal1" data-bs-toggle="modal" data-bs-dismiss="modal">Đăng nhập</a>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                </div>
                                <?php
                                if (isset($_POST['dk'])) {
                                    $nv = $get->se_tt_email($_POST['email']);
                                    $r = mysqli_fetch_assoc($nv);
                                    if ($r) echo "<script>alert('Email đã tồn tại')</script>";
                                    else {
                                        $in = $get->themnhanvien(
                                            $_POST['ten'],
                                            $_POST['email'],
                                            $_POST['sdt'],
                                            $_POST['ngay'],
                                            $_POST['gioitinh'],
                                            $_POST['diachi']
                                        );
                                        if ($in) {
                                            $nv = $get->themtkkh($in, $_POST['email'], password_hash($_POST['mk'], PASSWORD_DEFAULT));
                                            echo "<script>alert('Thành công')</script>";
                                        } else
                                            echo "<script>alert('Không thành công')</script>";
                                        echo "<script>window.location='trangchu.php';</script>";
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="qmk" aria-hidden="true" aria-labelledby="qmk" tabindex="-1">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalToggleLabel">Quên mật khẩu</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST">

                                        <div class="form-group mb-3">
                                            <span>Email của bạn</span>
                                            <input class="form-control" type="email" name="qsdt" required placeholder="Nhập số Email">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="password">Mật khẩu mới</label>
                                            <input class="form-control" type="password" autocomplete="off" name="qnew" required pattern="[0-9]{8}" title="Password gồm 8 ký tự số" placeholder="Password gồm 6 ký tự số">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="password">Xác nhận mật khẩu</label>
                                            <input class="form-control" type="password" name="ckqnew" autocomplete="off" required pattern="[0-9]{8}" title="Password gồm 8 ký tự số" placeholder="Password gồm 6 ký tự số">
                                        </div>
                                        <div class="form-group mb-0 text-center" style="float:left;">
                                            <button name="qmk" class="btn btn-primary"> Đổi </button>
                                        </div>
                                        <?php
                                        if (isset($_POST['qmk'])) {
                                            $nv = $get->se_tt_email($_POST['email']);
                                            $r = mysqli_fetch_assoc($nv);
                                            if ($r > 0) {
                                                $r = mysqli_fetch_assoc($check);
                                                if ($_POST['qnew'] == $_POST['ckqnew']) {
                                                    $qmk = $get->dmk($r['Username'], $_POST['qnew']);
                                                    if ($qmk) {
                                                        echo "<script>alert('Đổi mật khẩu thành công')</script>";
                                                    } else
                                                        echo "<script>alert('Không thành công')</script>";
                                                    echo "<script>window.location='trangchu.php';</script>";
                                                } else echo "<script>alert('Xác nhận mật khẩu không trùng khớp')</script>";
                                            } else echo "<script>alert('Số điện thoại không chính xác')</script>";
                                        }
                                        ?>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div id="overlay" class="overlay"></div>
    <div class="dropend rounded modaldanhmuc" id="modaldanhmuc" style="display: none;">
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
        <script>
            var menu = document.getElementById('modaldanhmuc');
            var overlay = document.getElementById('overlay');
            document.getElementById('btndanhmuc').addEventListener('click', function() {
                if (menu.style.display != 'none') {
                    menu.style.display = 'none';
                    overlay.style.display = 'none';
                } else {
                    menu.style.display = 'flex';
                    menu.style.position = 'fixed';
                    overlay.style.display = 'flex';
                }
            });
            document.getElementById('overlay').addEventListener('click', function() {
                menu.style.display = 'none';
                overlay.style.display = 'none';
            });
        </script>
    </div>
    <!-- end-header -->
</body>

</html>