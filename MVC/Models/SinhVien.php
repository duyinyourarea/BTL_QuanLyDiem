<?php
class SinhVien extends connectDB{
    function sinhvien_ins($masinhvien, $tensinhvien, $gioitinh, $sodienthoai, $email, $malop){
        $sql_sinhvien_ins = "INSERT INTO sinhvien VALUES('$masinhvien','$tensinhvien','$gioitinh','$sodienthoai','$email','$malop')";
        return mysqli_query($this->con, $sql_sinhvien_ins);
    }
    function sinhvien_upd($masinhvien, $tensinhvien, $gioitinh, $sodienthoai, $email, $malop){
        $sql_sinhvien_upd = "UPDATE sinhvien SET tensinhvien = '$tensinhvien', gioitinh = '$gioitinh', sodienthoai = '$sodienthoai', email = '$email', malop = '$malop' WHERE masinhvien = '$masinhvien'";
        return mysqli_query($this->con, $sql_sinhvien_upd);
    }
    function sinhvien_del($masinhvien){
        $sql_sinhvien_del = "DELETE FROM sinhvien WHERE masinhvien = '$masinhvien'";
        return mysqli_query($this->con, $sql_sinhvien_del);
    }
    function masinhvien_check($masinhvien){
        $sql_masinhvien_check = "SELECT * FROM sinhvien WHERE masinhvien='$masinhvien'";
        $data_masinhvien_check = mysqli_query($this->con, $sql_masinhvien_check);
        $kq_masinhvien_check = false;
        if (mysqli_num_rows($data_masinhvien_check) > 0) {
            $kq_masinhvien_check = true;
            
        }
        return $kq_masinhvien_check;
    }
    function sinhvien_find($masinhvien,$tensinhvien,$malop){
        $sql_sinhvien_find="SELECT * FROM sinhvien where masinhvien like '%$masinhvien%' and tensinhvien like '%$tensinhvien%' and malop like '%$malop%'";
        return mysqli_query($this->con,$sql_sinhvien_find);
    }
    function sinhvien_check($masinhvien,$malop){
        $sql_sinhvien_check = "SELECT * FROM sinhvien WHERE masinhvien='$masinhvien' AND malop='$malop'";
        $data_sinhvien_check = mysqli_query($this->con, $sql_sinhvien_check);
        $kq_sinhvien_check = false;
        if (mysqli_num_rows($data_sinhvien_check) > 0) {
            $kq_sinhvien_check = true;
            
        }
        return $kq_sinhvien_check;
    }
    function getDataLop($masinhvien)
    {
        $sql_info_lop = "SELECT * from sinhvien,lop where sinhvien.malop = lop.malop and masinhvien = '$masinhvien'";
        $data_info_lop = mysqli_query($this->con, $sql_info_lop);
        return mysqli_fetch_assoc($data_info_lop);

    }
}
