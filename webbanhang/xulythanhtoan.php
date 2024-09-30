<?php
$dh = $get->in_dh(
                $_SESSION['tkkh']['TaiKhoanID'],
                $_SESSION['donhang']['NguoiNhan'],
                $_SESSION['donhang']['SoDienThoai'],
                1,
                $_SESSION['donhang']['NoiNhan'],
                $_SESSION['donhang']['TongTien'],
                'Đã thanh toán',
                'Chuyển khoản'
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
            unset($_SESSION['giohang'], $_SESSION['dongdonhang'], $_SESSION['donhang']);
echo "<script>window.location='trangchu.php';</script>";