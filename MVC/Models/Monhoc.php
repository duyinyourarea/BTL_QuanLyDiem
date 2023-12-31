<?php
class Monhoc extends connectDB{
    function monhoc_ins($mamon, $tenmon, $sotinchi, $ki, $giangvien, $phuongthuctinhdiem, $manganh){
        $sql_monhoc_ins = "INSERT INTO monhoc VALUES('$mamon', '$tenmon', '$sotinchi', '$manganh', '$ki', '$giangvien', '$phuongthuctinhdiem')";
        return mysqli_query($this->con, $sql_monhoc_ins);
    }
    function monhoc_upd($mamon, $tenmon, $sotinchi, $ki, $giangvien, $phuongthuctinhdiem, $manganh){
        $sql_monhoc_upd = "UPDATE monhoc SET tenmon = '$tenmon', sotinchi = '$sotinchi', manganh = '$manganh', ki = '$ki', giangvien='$giangvien', phuongthuctinhdiem = '$phuongthuctinhdiem' WHERE mamon = '$mamon'";
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
    function getData($mamon){
        $sql_mh = "SELECT * FROM monhoc WHERE mamon = '$mamon'";
        $data_mh = mysqli_query($this->con, $sql_mh);
        return mysqli_fetch_assoc($data_mh);
    }
    function monhoc_findByNganh($manganh){
        $sql_monhoc_find="SELECT * FROM monhoc where manganh = '$manganh'";
        return mysqli_fetch_all(mysqli_query($this->con,$sql_monhoc_find));
    }
    function ki_findByNganh($manganh){
        $sql_monhoc_find="SELECT DISTINCT ki FROM monhoc WHERE manganh like '%$manganh%'";
        return mysqli_fetch_all(mysqli_query($this->con,$sql_monhoc_find));
    }
}
?>