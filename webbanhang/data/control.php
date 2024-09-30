<?php
include('connect.php');

class data
{
    function loginadmin($tendn)
    {
        global $conn;
        $sql = "select * from taikhoan where Username='$tendn' and (role=0 or role=1)";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function loginuser($tendn)
    {
        global $conn;
        $sql = "select * from taikhoan where Username='$tendn' and role=2";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function dmk($tendn, $pass)
    {
        global $conn;
        $sql = "update taikhoan set password = '$pass' where Username='$tendn' and role=2";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function themnhanvien($ten, $email, $sdt, $ngaysinh, $gioitinh, $diachi)
    {
        global $conn;
        $sql = "insert into nguoidung(TenNguoiDung,Email,Sodienthoai,Ngaysinh,Gioitinh,Diachi) 
            values ('$ten','$email','$sdt','$ngaysinh','$gioitinh','$diachi');";
        $run = mysqli_query($conn, $sql);
        if ($run) {
            $insert_id = mysqli_insert_id($conn);
            return $insert_id;
        } else {
            return false;
        }
    }
    function themtknv($id, $ten, $pass)
    {
        global $conn;
        $sql = "insert into taikhoan(UserID,Username,Password,role) 
            values ('$id','$ten','$pass','1')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function themtkkh($id, $ten, $pass)
    {
        global $conn;
        $sql = "insert into taikhoan(UserID,Username,Password,role) 
            values ('$id','$ten','$pass','2')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_dh()
    {
        global $conn;
        $sql = "select * from donhang order by NgayDatHang desc";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_dh_id($id)
    {
        global $conn;
        $sql = "select * from donhang where DonHangID='$id' order by NgayDatHang desc";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_dh_idtk($id)
    {
        global $conn;
        $sql = "select * from donhang where TaiKhoanID='$id' order by NgayDatHang desc";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_ddh_iddh($id)
    {
        global $conn;
        $sql = "select * from dongdonhang where DonHangID='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_dx()
    {
        global $conn;
        $sql = "select * from xuathang order by NgayXuat desc";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_dn()
    {
        global $conn;
        $sql = "select * from nhaphang order by NgayNhap desc";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_tk_role($role)
    {
        global $conn;
        $sql = "select * from taikhoan where role='$role'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_tk_id($role)
    {
        global $conn;
        $sql = "select * from taikhoan where taikhoanid='$role'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_tt_id($id)
    {
        global $conn;
        $sql = "select * from nguoidung where UserID='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_tt_email($email)
    {
        global $conn;
        $sql = "select * from nguoidung where Email='$email'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function up_tt_id($id, $ten, $gioitinh, $ngay, $sdt, $diachi, $email)
    {
        global $conn;
        $sql = "UPDATE nguoidung SET TenNguoiDung='$ten',gioitinh='$gioitinh',ngaysinh='$ngay',sodienthoai='$sdt',diachi='$diachi',Email='$email'  WHERE UserID = '$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function up_tk_id_username($id, $ten, $role)
    {
        global $conn;
        $sql = "UPDATE taikhoan SET Username='$ten',role='$role'  WHERE UserID = '$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function del_tk_id($id)
    {
        global $conn;
        $sql = "delete from taikhoan where UserID='$id'";
        $sql1 = "delete from nguoidung where UserID='$id'";
        $run = mysqli_query($conn, $sql);
        $run = mysqli_query($conn, $sql1);
        return $run;
    }
    function se_ncc()
    {
        global $conn;
        $sql = "select * from nhacungcap";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_dm()
    {
        global $conn;
        $sql = "select * from danhmuc";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function in_dm($ten)
    {
        global $conn;
        $sql = "INSERT INTO danhmuc(Ten) VALUES ('$ten')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function in_ncc($ten)
    {
        global $conn;
        $sql = "INSERT INTO nhacungcap(Ten) VALUES ('$ten')";
        $run = mysqli_query($conn, $sql);
        if ($run) {
            $insert_id = mysqli_insert_id($conn);
            return $insert_id;
        } else {
            return false;
        }
    }
    function in_logo($id, $ten)
    {
        global $conn;
        $sql = "INSERT INTO anhlogo(nhacungcapid,duongdananh) VALUES ('$id','$ten')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_sp()
    {
        global $conn;
        $sql = "select * from sanpham";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_sp_lm($i, $dm)
    {
        global $conn;
        $sql = "SELECT sp.*
                FROM sanpham sp
                JOIN (
                    SELECT Ten, MIN(Gia) AS GiaMin
                    FROM sanpham
                    WHERE DanhMucID = '$dm'
                    GROUP BY Ten
                ) sp_min ON sp.Ten = sp_min.Ten AND sp.Gia = sp_min.GiaMin
                WHERE sp.DanhMucID = '$dm'
                ORDER BY sp.SanPhamID DESC
                LIMIT $i;";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_sp_dm($dm)
    {
        global $conn;
        $sql = "SELECT sp.*
                FROM sanpham sp
                WHERE sp.DanhMucID = '$dm'
                ";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_ncc_dm($dm)
    {
        global $conn;
        $sql = "SELECT DISTINCT NhaCungCapID FROM sanpham  where danhmucid='$dm'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_halogo($ten)
    {
        global $conn;
        $sql = "select * from anhlogo where nhacungcapid='$ten'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_sp_ten($ten)
    {
        global $conn;
        $sql = "select * from sanpham where ten='$ten'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_sp_id($ten)
    {
        global $conn;
        $sql = "select * from sanpham where sanphamid='$ten'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function in_sp($iddm, $idncc, $ten, $gia)
    {
        global $conn;
        $sql = "INSERT INTO sanpham(danhmucid,nhacungcapid,ten,gia,luotxem) VALUES ('$iddm','$idncc','$ten','$gia',0)";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function in_hasp($idsp, $anh)
    {
        global $conn;
        $sql = "INSERT INTO anhsanpham(sanphamid,duongdananh) VALUES ('$idsp','$anh')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_hasp_id($ten)
    {
        global $conn;
        $sql = "select * from anhsanpham where sanphamid='$ten'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function up_sp($id, $iddm, $idncc, $ten, $gia)
    {
        global $conn;
        $sql = "UPDATE sanpham SET danhmucid='$iddm',nhacungcapid='$idncc',ten='$ten',gia='$gia'  WHERE sanphamid = '$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function up_ha($id, $gia)
    {
        global $conn;
        $sql = "UPDATE anhsanpham SET duongdananh='$gia'  WHERE sanphamid = '$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function del_ha($id)
    {
        global $conn;
        $sql = "delete from anhsanpham where sanphamid='$id' ";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_loaits()
    {
        global $conn;
        $sql = "select * from loaithongso";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_loaits_id($loaits)
    {
        global $conn;
        $sql = "select * from loaithongso where loaithongsoid='$loaits'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_ts_id($id)
    {
        global $conn;
        $sql = "select * from thongso where thongsoid='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function in_loaits($ten)
    {
        global $conn;
        $sql = "INSERT INTO loaithongso(ten) VALUES ('$ten')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_bangts_id($id)
    {
        global $conn;
        $sql = "select * from bangthongso where sanphamid='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function up_ts($id, $gia)
    {
        global $conn;
        $sql = "UPDATE thongso SET giatri='$gia'  WHERE loaithongsoid = '$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_kh()
    {
        global $conn;
        $sql = "select * from khohang";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_kh_idsp($id)
    {
        global $conn;
        $sql = "select * from khohang where sanphamid = '$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_dcch_id($id)
    {
        global $conn;
        $sql = "select * from diachicuahang where diachicuahangid = '$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_dcch()
    {
        global $conn;
        $sql = "select * from diachicuahang";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_dcch_tp()
    {
        global $conn;
        $sql = "select DISTINCT ThanhPho from diachicuahang";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_dcch_huyen($city) {
        global $conn;
        $sql = "SELECT DISTINCT Huyen FROM diachicuahang WHERE ThanhPho = '$city'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_dcch_theo_huyen($district) {
        global $conn;
        $sql = "SELECT * FROM diachicuahang WHERE Huyen = '$district'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_all_stores() {
        global $conn;
        $sql = "SELECT dc.*, kh.Hangton FROM diachicuahang dc JOIN khohang kh ON dc.diachicuahangid = kh.DiaChiCuaHangID WHERE kh.Hangton > 0";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    
    function in_dcch($huyen, $thanhpho, $dc, $map)
    {
        global $conn;
        $sql = "INSERT INTO diachicuahang(huyen,thanhpho,diachi,map) VALUES ('$huyen','$thanhpho','$dc','$map')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function up_ch($id, $diachi, $huyen, $thanhpho, $map)
    {
        global $conn;
        $sql = "UPDATE diachicuahang SET diachi='$diachi',huyen='$huyen',thanhpho='$thanhpho',map='$map'  WHERE diachicuahangid = '$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function getSrc($html)
    {
        if (preg_match('/<iframe.*?src="([^"]+)"/i', $html, $matches)) {
            return $matches[1];
        } else {
            if (filter_var($html, FILTER_VALIDATE_URL)) {
                return $html;
            }
        }
        return null;
    }
    function se_mau()
    {
        global $conn;
        $sql = "select * from mausac";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_mau_id($id)
    {
        global $conn;
        $sql = "select * from mausac where mauid = '$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function in_mau($tenmau)
    {
        global $conn;
        $sql = "insert into mausac(tenmau) values ('$tenmau')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function in_kh($id, $idch, $tenmau)
    {
        global $conn;
        $sql = "insert into khohang(sanphamid,diachicuahangid,mauid) values ('$id','$idch','$tenmau')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function in_nhapkh($id, $day, $sl)
    {
        global $conn;
        $sql = "insert into nhaphang(khohangid,ngaynhap,soluong) values ('$id','$day','$sl')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function up_slnhapkh($idkh, $idsp, $mau, $sl)
    {
        global $conn;
        $sql = "UPDATE khohang SET hangton=hangton + $sl  WHERE khohangid = '$idkh' and sanphamid='$idsp' and mauid='$mau'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function in_dh($tk, $nn, $sdt, $tiendo, $noinhan, $tongtien, $tt, $pt)
    {
        global $conn;
        $sql = "INSERT INTO donhang(taikhoanid,nguoinhan,sodienthoai,tiendoid,noinhan,tongtien,thanhtoan,phuongthucthanhtoan) VALUES ('$tk','$nn','$sdt','$tiendo','$noinhan','$tongtien','$tt','$pt')";
        $run = mysqli_query($conn, $sql);
        if ($run) {
            $insert_id = mysqli_insert_id($conn);
            return $insert_id;
        } else {
            return false;
        }
    }
    function in_ddh($tk, $sp, $sl, $gia)
    {
        global $conn;
        $sql = "insert into dongdonhang(donhangid,sanphamid,soluong,gia) values ('$tk','$sp','$sl','$gia')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_giohang_tk($tk)
    {
        global $conn;
        $sql = "select * from giohang where TaiKhoanID = '$tk'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_donggiohang($tk)
    {
        global $conn;
        $sql = "select * from donggiohang where GiohangID = '$tk'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function in_giohang($tk)
    {
        global $conn;
        $sql = "insert into giohang(taikhoanid) values ('$tk')";
        $run = mysqli_query($conn, $sql);
        if ($run) {
            $insert_id = mysqli_insert_id($conn);
            return $insert_id;
        } else {
            return false;
        }
    }
    function in_donggiohang($gh, $sp)
    {
        global $conn;
        $sql = "insert into donggiohang(giohangid,sanphamid,soluong) values ('$gh','$sp',1)";
        $run = mysqli_query($conn, $sql);
        if ($run) {
            $insert_id = mysqli_insert_id($conn);
            return $insert_id;
        } else {
            return false;
        }
    }
    function se_donggiohang_soluong($tk, $sp)
    {
        global $conn;
        $sql = "select * from donggiohang where GiohangID = '$tk' and SanPhamID = '$sp'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function up_sl_donggiohang($sl, $sp)
    {
        global $conn;
        $sql = "UPDATE `donggiohang` SET `SoLuong` = '$sl' WHERE sanphamid = '$sp'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function de_donggiohang($sl)
    {
        global $conn;
        $sql = "DELETE FROM donggiohang WHERE sanphamID = '$sl'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function de_alldonggiohang($sl)
    {
        global $conn;
        $sql = "DELETE FROM donggiohang WHERE GioHangID = '$sl'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_dg(){
        global $conn;
        $sql = "select * from danhgia";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_dg_idsp($id){
        global $conn;
        $sql = "select * from danhgia where sanphamid = '$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function se_dg_idtk($id){
        global $conn;
        $sql = "select * from danhgia where taikhoanid = '$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function in_dg($idsp,$idtk,$diem,$bl){
        global $conn;
        $sql = "INSERT INTO `danhgia` ( `SanPhamID`, `TaiKhoanID`, `DiemDanhGia`, `BinhLuan`) VALUES ('$idsp','$idtk','$diem','$bl')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    function de_dg($id){
        global $conn;
        $sql = "DELETE FROM danhgia WHERE `danhgia`.`DanhGiaID` = '$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
}