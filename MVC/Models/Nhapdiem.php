<?php 
class NhapDiem extends connectDB{
    function nhapdiem_quatrinh($mamon, $malop){
        $sql_ds_nhapdiemquatrinh = "SELECT * FROM diemmonhoc, sinhvien WHERE diemmonhoc.masinhvien = sinhvien.masinhvien and malop = '$malop' and lanthi = '0' and mamon = '$mamon' and trangthai = 'Đang học'";
       return mysqli_query($this->con, $sql_ds_nhapdiemquatrinh);
    }
    function nhapdiem_quatrinh_all($mamon, $malop){
        $sql_ds_nhapdiemquatrinh = "SELECT * FROM diemmonhoc, sinhvien WHERE diemmonhoc.masinhvien = sinhvien.masinhvien and malop = '$malop' and lanthi = '0' and mamon = '$mamon' and trangthai = 'Đang học'";
        $data_ds_ndqt = mysqli_query($this->con, $sql_ds_nhapdiemquatrinh);
        return mysqli_fetch_all($data_ds_ndqt);
    }
    function updatediem_quatrinh($mamon, $masinhvien, $diemcc, $diemth, $diemgk){
        $sql_upd_dqt = "UPDATE diemmonhoc SET diemchuyencan = '$diemcc', diemthuchanh = '$diemth', diemgiuaki = '$diemgk', lanthi = lanthi + 1 WHERE masinhvien = '$masinhvien' and mamon = '$mamon'";
        return mysqli_query($this->con, $sql_upd_dqt);
    }
    function nhapdiem_cuoikil1($mamon, $malop){
        $sql_ds_nhapdiemquatrinh = "SELECT * FROM diemmonhoc, sinhvien WHERE diemmonhoc.masinhvien = sinhvien.masinhvien and malop = '$malop' and lanthi = '1' and mamon = '$mamon' and trangthai = 'Đang học'";
       return mysqli_query($this->con, $sql_ds_nhapdiemquatrinh);
    }
    function nhapdiem_cuoikil1_all($mamon, $malop){
        $sql_ds_nhapdiemquatrinh = "SELECT * FROM diemmonhoc, sinhvien WHERE diemmonhoc.masinhvien = sinhvien.masinhvien and malop = '$malop' and lanthi = '1' and mamon = '$mamon' and trangthai = 'Đang học'";
        $data_ds_ndqt = mysqli_query($this->con, $sql_ds_nhapdiemquatrinh);
        return mysqli_fetch_all($data_ds_ndqt);
    }
    function updatediem_cuoikil1($mamon, $masinhvien, $dckl1, $diemtb_he10, $diemtb_he4, $diemtb_word, $lanthi, $trangthai){
        $sql_upd_dqt = "UPDATE diemmonhoc SET diemcuoiki_l1 = '$dckl1', diemtb_he10 = '$diemtb_he10', diemtb_he4 = '$diemtb_he4', diemtb_word = '$diemtb_word', lanthi = '$lanthi', trangthai = '$trangthai' WHERE masinhvien = '$masinhvien' and mamon = '$mamon'";
        return mysqli_query($this->con, $sql_upd_dqt);
    }
    function nhapdiem_cuoikil2($mamon, $malop){
        $sql_ds_nhapdiemquatrinh = "SELECT * FROM diemmonhoc, sinhvien WHERE diemmonhoc.masinhvien = sinhvien.masinhvien and malop = '$malop' and lanthi = '2' and mamon = '$mamon' and trangthai = 'THI LẠI'";
       return mysqli_query($this->con, $sql_ds_nhapdiemquatrinh);
    }
    function nhapdiem_cuoikil2_all($mamon, $malop){
        $sql_ds_nhapdiemquatrinh = "SELECT * FROM diemmonhoc, sinhvien WHERE diemmonhoc.masinhvien = sinhvien.masinhvien and malop = '$malop' and lanthi = '2' and mamon = '$mamon' and trangthai = 'THI LẠI'";
        $data_ds_ndqt = mysqli_query($this->con, $sql_ds_nhapdiemquatrinh);
        return mysqli_fetch_all($data_ds_ndqt);
    }
    function updatediem_cuoikil2($mamon, $masinhvien, $dckl2, $diemtb_he10, $diemtb_he4, $diemtb_word, $lanthi, $trangthai){
        $sql_upd_dqt = "UPDATE diemmonhoc SET diemcuoiki_l2 = '$dckl2', diemtb_he10 = '$diemtb_he10', diemtb_he4 = '$diemtb_he4', diemtb_word = '$diemtb_word', lanthi = '$lanthi', trangthai = '$trangthai' WHERE masinhvien = '$masinhvien' and mamon = '$mamon'";
        return mysqli_query($this->con, $sql_upd_dqt);
    }
    function dmh_id_creat(){
        $sql_count = "SELECT * FROM diemmonhoc";
        $data_count = mysqli_query($this->con, $sql_count);
        return mysqli_num_rows($data_count) + 1;
    }
    function dsv_id_creat(){
        $sql_count = "SELECT * FROM diemsinhvien";
        $data_count = mysqli_query($this->con, $sql_count);
        return mysqli_num_rows($data_count) + 1;
    }
    function diemmonhoc_ins($dmh_id, $lanthi, $trangthai, $masinhvien, $mamon){
        $sql_dmh_ins = "INSERT INTO diemmonhoc(dmh_id, lanthi, trangthai, masinhvien, mamon) VALUES('$dmh_id', '$lanthi', '$trangthai','$masinhvien','$mamon')";
        return mysqli_query($this->con, $sql_dmh_ins);
    }
    function diemsinhvien_ins($dsv_id, $masinhvien, $ki){
        $sql_dsv_ins = "INSERT INTO diemsinhvien(dsv_id, masinhvien, ki) VALUES('$dsv_id', '$masinhvien', '$ki')";
        return mysqli_query($this->con, $sql_dsv_ins);
    }
    function diemmonhoc_del($masinhvien){
        $sql_dmh_del = "DELETE FROM diemmonhoc WHERE masinhvien = '$masinhvien'";
        return mysqli_query($this->con, $sql_dmh_del);
    }
    function diemsinhvien_del($masinhvien){
        $sql_dsv_del = "DELETE FROM diemsinhvien WHERE masinhvien = '$masinhvien'";
        return mysqli_query($this->con, $sql_dsv_del);
    }
    function diemmonhoc_findByKiAndMaSV($ki, $masinhvien){
        $sql_ds_pass = "SELECT * FROM diemmonhoc, monhoc WHERE diemmonhoc.mamon = monhoc.mamon and masinhvien = '$masinhvien' and ki = '$ki' and trangthai = 'ĐẠT'";
        $data_ds_mh_pass = mysqli_query($this->con, $sql_ds_pass);
        return mysqli_fetch_all($data_ds_mh_pass);
    }
    function diemsinhvien_upd($masinhvien, $dtb_he4, $dtb_he10, $ki){
        $sql_dsv_upd = "UPDATE diemsinhvien SET diemtb_he10 = '$dtb_he10', diemtb_he4 = '$dtb_he4' WHERE masinhvien = '$masinhvien' and ki = '$ki'";
        return mysqli_query($this->con, $sql_dsv_upd);
    }
}
?>