<?php
class TaiKhoan extends connectDB
{
    function taikhoan_ins($taikhoan, $matkhau, $vaitro)
    {
        $sql_taikhoan_ins = "INSERT INTO taikhoan VALUES('$taikhoan','$matkhau','$vaitro')";
        return mysqli_query($this->con, $sql_taikhoan_ins);
    }
    function taikhoan_upd($taikhoan, $matkhau)
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
    function taikhoan_find($taikhoan, $matkhau, $vaitro)
    {
        $sql_taikhoan_find = "SELECT * FROM taikhoan where taikhoan like '%$taikhoan%' and matkhau like '%$matkhau%' and vaitro like '%$vaitro%'";
        return mysqli_query($this->con, $sql_taikhoan_find);
    }
    function getDataAcc($taikhoan){
        $data_info_acc = $this->taikhoan_find($taikhoan,'','');
        $row_info = mysqli_fetch_assoc($data_info_acc);
        if($row_info['vaitro'] == "Admin"){
            return $row_info;
        }else{
            $sql_info_sv = "SELECT * from taikhoan, sinhvien where taikhoan.taikhoan = sinhvien.masinhvien and taikhoan = '$taikhoan'";
            $data_info_sv = mysqli_query($this->con,$sql_info_sv);
            return mysqli_fetch_assoc($data_info_sv);
        }
    }
}
