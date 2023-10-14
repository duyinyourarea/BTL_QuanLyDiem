<?php
class Khoa extends connectDB{
    function khoa_ins($makhoa, $tenkhoa){
        $sql_khoa_ins = "INSERT INTO khoa VALUES('$makhoa','$tenkhoa')";
        return mysqli_query($this->con, $sql_khoa_ins);
    }
    function khoa_upd($makhoa, $tenkhoa){
        $sql_khoa_upd = "UPDATE khoa SET tenkhoa = '$tenkhoa' WHERE makhoa = '$makhoa'";
        return mysqli_query($this->con, $sql_khoa_upd);
    }
    function khoa_del($makhoa){
        $sql_khoa_del = "DELETE FROM khoa WHERE makhoa = '$makhoa'";
        return mysqli_query($this->con, $sql_khoa_del);
    }
    function makhoa_check($makhoa){
        $sql_makhoa_check = "SELECT * FROM khoa WHERE makhoa='$makhoa'";
        $data_makhoa_check = mysqli_query($this->con, $sql_makhoa_check);
        $kq_makhoa_check = false;
        if (mysqli_num_rows($data_makhoa_check) > 0) {
            $kq_makhoa_check = true;
            
        }
        return $kq_makhoa_check;
    }
    function khoa_find($makhoa,$tenkhoa){
        $sql_khoa_find="SELECT * FROM khoa where makhoa like '%$makhoa%' and tenkhoa like '%$tenkhoa%'";
        return mysqli_query($this->con,$sql_khoa_find);
    }
    function getData($makhoa)
    {
        $sql_info = "SELECT * from khoa where makhoa = '$makhoa'";
        $data_info = mysqli_query($this->con, $sql_info);
        return mysqli_fetch_assoc($data_info);

    }
}
?>