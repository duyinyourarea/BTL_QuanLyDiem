<?php
class ThongKe extends connectDB
{
    //Thống kê sinh viên học lại
    function sinhvien_hoclai()
    {
        $sql_sinhvien_hoclai = "SELECT diemmonhoc.masinhvien, sinhvien.tensinhvien, diemmonhoc.mamon, monhoc.tenmon, monhoc.sotinchi, diemmonhoc.diemtb_he10,diemmonhoc.diemtb_he4,diemmonhoc.diemtb_word,diemmonhoc.trangthai FROM diemmonhoc,monhoc,sinhvien WHERE diemmonhoc.trangthai='HỌC LẠI' AND diemmonhoc.mamon=monhoc.mamon AND diemmonhoc.masinhvien=sinhvien.masinhvien";
        return mysqli_query($this->con, $sql_sinhvien_hoclai);
    }
    function count_hoclai()
    {
        $sql_count_hoclai = "SELECT COUNT(diemmonhoc.trangthai) AS count FROM diemmonhoc WHERE diemmonhoc.trangthai='HỌC LẠI'";
        return mysqli_query($this->con, $sql_count_hoclai);
    }
    function tenmon_hoclai()
    {
        $sql_tenmon_hoclai = "SELECT DISTINCT diemmonhoc.mamon, monhoc.tenmon FROM monhoc,diemmonhoc WHERE diemmonhoc.mamon=monhoc.mamon AND diemmonhoc.trangthai='HỌC LẠI'";
        return mysqli_query($this->con, $sql_tenmon_hoclai);
    }
    function find_tenmon_hoclai($mamon)
    {
        $sql_find_tenmon_hoclai = "SELECT diemmonhoc.masinhvien, sinhvien.tensinhvien, diemmonhoc.mamon, monhoc.tenmon, monhoc.sotinchi, diemmonhoc.diemtb_he10,diemmonhoc.diemtb_he4,diemmonhoc.diemtb_word,diemmonhoc.trangthai FROM diemmonhoc,monhoc,sinhvien WHERE diemmonhoc.trangthai='HỌC LẠI' AND diemmonhoc.mamon=monhoc.mamon AND diemmonhoc.masinhvien=sinhvien.masinhvien AND diemmonhoc.mamon='$mamon'";
        return mysqli_query($this->con, $sql_find_tenmon_hoclai);
    }
    //Thống kê sinh viên thi lại
    function sinhvien_thilai()
    {
        $sql_sinhvien_thilai = "SELECT diemmonhoc.masinhvien,sinhvien.tensinhvien, lop.tenlop, diemmonhoc.mamon, monhoc.tenmon, diemmonhoc.diemcuoiki_l1, diemmonhoc.diemtb_he10, diemmonhoc.diemtb_word, diemmonhoc.trangthai FROM diemmonhoc,monhoc,sinhvien,lop WHERE diemmonhoc.masinhvien=sinhvien.masinhvien AND sinhvien.malop=lop.malop AND diemmonhoc.mamon=monhoc.mamon AND diemmonhoc.trangthai='THI LẠI'";
        return mysqli_query($this->con, $sql_sinhvien_thilai);
    }
    function tenmon_thilai()
    {
        $sql_tenmon_thilai = "SELECT DISTINCT diemmonhoc.mamon, monhoc.tenmon FROM monhoc,diemmonhoc WHERE diemmonhoc.mamon=monhoc.mamon AND diemmonhoc.trangthai='THI LẠI'";
        return mysqli_query($this->con, $sql_tenmon_thilai);
    }
    function count_thilai()
    {
        $sql_count_thilai = "SELECT COUNT(diemmonhoc.trangthai) AS count FROM diemmonhoc WHERE diemmonhoc.trangthai='THI LẠI'";
        return mysqli_query($this->con, $sql_count_thilai);
    }
    function tenlop_thilai()
    {
        $sql_tenlop_thilai = "SELECT DISTINCT lop.malop, lop.tenlop FROM lop,diemmonhoc,sinhvien WHERE diemmonhoc.masinhvien=sinhvien.masinhvien AND diemmonhoc.trangthai='THI LẠI' AND sinhvien.malop=lop.malop";
        return mysqli_query($this->con, $sql_tenlop_thilai);
    }
    function find_thilai($malop, $mamon)
    {
        $sql_find_thilai = "SELECT diemmonhoc.masinhvien,sinhvien.tensinhvien, lop.tenlop, diemmonhoc.mamon, monhoc.tenmon, diemmonhoc.diemcuoiki_l1, diemmonhoc.diemtb_he10, diemmonhoc.diemtb_word, diemmonhoc.trangthai FROM diemmonhoc,monhoc,sinhvien,lop WHERE diemmonhoc.masinhvien=sinhvien.masinhvien AND sinhvien.malop=lop.malop AND diemmonhoc.mamon=monhoc.mamon AND diemmonhoc.trangthai='THI LẠI' AND lop.malop LIKE '%$malop%' AND diemmonhoc.mamon LIKE '%$mamon%'";
        return mysqli_query($this->con, $sql_find_thilai);
    }
    //Thống kê học bổng
    function sinhvien_hocbong()
    {
        $sql_sinhvien_hocbong = "SELECT diemsinhvien.*, sinhvien.tensinhvien, lop.tenlop, nganh.tennganh, khoa.tenkhoa FROM diemsinhvien, sinhvien, lop, nganh, khoa WHERE diemsinhvien.masinhvien=sinhvien.masinhvien AND sinhvien.malop=lop.malop AND lop.manganh=nganh.manganh AND nganh.makhoa=khoa.makhoa AND diemsinhvien.diemtb_he4 > 2.8";
        return mysqli_query($this->con, $sql_sinhvien_hocbong);
    }
    function count_hocbong()
    {
        $sql_count_hocbong = "SELECT COUNT(diemsinhvien.diemtb_he4) AS count FROM diemsinhvien WHERE diemsinhvien.diemtb_he4 > 2.8";
        return mysqli_query($this->con, $sql_count_hocbong);
    }
    function tenlop_hocbong()
    {
        $sql_tenlop_hocbong = "SELECT DISTINCT lop.malop, lop.tenlop FROM lop,diemsinhvien,sinhvien WHERE diemsinhvien.masinhvien=sinhvien.masinhvien AND diemsinhvien.diemtb_he4 > 2.8 AND sinhvien.malop=lop.malop";
        return mysqli_query($this->con, $sql_tenlop_hocbong);
    }
    function find_hocbong($malop)
    {
        $sql_find_hocbong = "SELECT diemsinhvien.*, sinhvien.tensinhvien, lop.tenlop, nganh.tennganh, khoa.tenkhoa FROM diemsinhvien, sinhvien, lop, nganh, khoa WHERE diemsinhvien.masinhvien=sinhvien.masinhvien AND sinhvien.malop=lop.malop AND lop.malop='$malop' AND lop.manganh=nganh.manganh AND nganh.makhoa=khoa.makhoa AND diemsinhvien.diemtb_he4 > 2.8";
        return mysqli_query($this->con, $sql_find_hocbong);
    }
    //Thống kê điểm sinh viên
    function sinhvien_diem()
    {
        $sql_sinhvien_diem = "SELECT diemmonhoc.*, lop.tenlop, monhoc.tenmon, monhoc.sotinchi, sinhvien.tensinhvien FROM diemmonhoc, sinhvien, lop, monhoc WHERE diemmonhoc.masinhvien=sinhvien.masinhvien AND sinhvien.malop=lop.malop AND diemmonhoc.mamon=monhoc.mamon";
        return mysqli_query($this->con, $sql_sinhvien_diem);
    }
    function count_diem()
    {
        $sql_count_diem = "SELECT COUNT(diemmonhoc.dmh_id) AS count FROM diemmonhoc";
        return mysqli_query($this->con, $sql_count_diem);
    }
    function tenlop_diem()
    {
        $sql_tenlop_diem = "SELECT DISTINCT lop.malop, lop.tenlop FROM lop,diemmonhoc,sinhvien WHERE diemmonhoc.masinhvien=sinhvien.masinhvien AND sinhvien.malop=lop.malop";
        return mysqli_query($this->con, $sql_tenlop_diem);
    }
    function find_diem($malop)
    {
        $sql_find_diem = "SELECT diemmonhoc.*, lop.tenlop, monhoc.tenmon, monhoc.sotinchi, sinhvien.tensinhvien FROM diemmonhoc, sinhvien, lop, monhoc WHERE diemmonhoc.masinhvien=sinhvien.masinhvien AND sinhvien.malop=lop.malop AND lop.malop='$malop' AND diemmonhoc.mamon=monhoc.mamon";
        return mysqli_query($this->con, $sql_find_diem);
    }
}