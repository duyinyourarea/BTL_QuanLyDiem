<?php
class TraCuuDiem extends connectDB
{
    function sinhvien_info($masinhvien, $malop, $manganh, $makhoa)
    {
        $sql_sinhvien_info = "SELECT sinhvien.masinhvien,sinhvien.tensinhvien,lop.tenlop,nganh.tennganh,khoa.tenkhoa FROM sinhvien,lop,nganh,khoa WHERE sinhvien.masinhvien='$masinhvien' AND lop.malop='$malop' AND nganh.manganh='$manganh' AND khoa.makhoa='$makhoa'";
        return mysqli_query($this->con, $sql_sinhvien_info);
    }
    function bangdiem_ki($masinhvien)
    {
        $sql_bangdiem_ki = "SELECT * FROM diemsinhvien WHERE diemsinhvien.masinhvien='$masinhvien'";
        return mysqli_query($this->con, $sql_bangdiem_ki);
    }
    function bangdiem_chitiet($masinhvien, $manganh)
    {
        $sql_diem_info = "SELECT monhoc.mamon,monhoc.tenmon,monhoc.ki,monhoc.sotinchi,diemmonhoc.* FROM monhoc,diemmonhoc WHERE monhoc.manganh='$manganh' AND diemmonhoc.mamon=monhoc.mamon AND diemmonhoc.masinhvien='$masinhvien'";
        return mysqli_query($this->con, $sql_diem_info);
    }
    function sinhvien_info_lop($malop)
    {
        $sql_sinhvien_info_lop = "SELECT sinhvien.masinhvien,sinhvien.tensinhvien FROM sinhvien WHERE sinhvien.malop='$malop'";
        return mysqli_query($this->con, $sql_sinhvien_info_lop);
    }
}
