<?php
class TaiKhoan extends connectDB
{
    function taikhoan_ins($taikhoan, $matkhau, $masinhvien)
    {
        $sql_taikhoan_ins = "INSERT INTO taikhoan VALUES('$taikhoan','$matkhau','$masinhvien')";
        return mysqli_query($this->con, $sql_taikhoan_ins);
    }
    function taikhoan_upd($taikhoan, $matkhau, $masinhvien)
    {
        $sql_taikhoan_upd = "UPDATE taikhoan SET matkhau = '$matkhau' WHERE taikhoan = '$taikhoan'";
        return mysqli_query($this->con, $sql_taikhoan_upd);
    }
    function taikhoan_del($taikhoan)
    {
        $sql_taikhoan_del = "DELETE FROM taikhoan WHERE taikhoan = '$taikhoan'";
        return mysqli_query($this->con, $sql_taikhoan_del);
    }
    function taikhoan_check($taikhoan, $matkhau)
    {
        $sql_taikhoan_check = "SELECT * FROM taikhoan WHERE taikhoan='$taikhoan' AND matkhau='$matkhau'";
        $data_taikhoan_check = mysqli_query($this->con, $sql_taikhoan_check);
        $kq_taikhoan_check = false;
        if (mysqli_num_rows($data_taikhoan_check) > 0) {
            $kq_taikhoan_check = true;
        }
        return $kq_taikhoan_check;
    }
    function taikhoan_find($taikhoan, $matkhau)
    {
        $sql_taikhoan_find = "SELECT * FROM taikhoan where taikhoan like '%$taikhoan%' and matkhau like '%$matkhau%'";
        return mysqli_query($this->con, $sql_taikhoan_find);
    }
}
