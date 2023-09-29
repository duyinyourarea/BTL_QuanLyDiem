<?php
class Monhoc extends connectDB{
    function monhoc_ins($mamon, $tenmon, $sotinchi, $makhoa, $ki, $giangvien, $phuongthuctinhdiem){
        $sql_monhoc_ins = "INSERT INTO monhoc VALUES('$mamon', '$tenmon', '$sotinchi', '$makhoa', '$ki', '$giangvien', '$phuongthuctinhdiem')";
        return mysqli_query($this->con, $sql_monhoc_ins);
    }
    function monhoc_upd($mamon, $tenmon, $sotinchi, $makhoa, $ki, $giangvien, $phuongthuctinhdiem){
        $sql_monhoc_upd = "UPDATE monhoc SET tenmon = '$tenmon', sotinchi = '$sotinchi', makhoa = '$makhoa', ki = '$ki', giangvien='$giangvien', phuongthuctinhdiem = '$phuongthuctinhdiem' WHERE mamon = '$mamon'";
        return mysqli_query($this->con, $sql_monhoc_upd);
    }
    function monhoc_del($mamon){
        $sql_monhoc_del = "DELETE FROM monhoc WHERE mamon = '$mamon'";
        return mysqli_query($this->con, $sql_monhoc_del);
    }
    function mamon_check($mamon){
        $sql_mamon_check = "SELECT * FROM monhoc WHERE mamon='$mamon'";
        $data_mamon_check = mysqli_query($this->con, $sql_mamon_check);
        $kq_mamon_check = false;
        if (mysqli_num_rows($data_mamon_check) > 0) {
            $kq_mamon_check = true;
            
        }
        return $kq_mamon_check;
    }
    function monhoc_find($mamon,$tenmon){
        $sql_monhoc_find="SELECT * FROM monhoc where mamon like '%$mamon%' and tenmon like '%$tenmon%'";
        return mysqli_query($this->con,$sql_monhoc_find);
    }
}
?>