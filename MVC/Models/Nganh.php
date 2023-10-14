<?php
class Nganh extends connectDB{
    function nganh_ins($manganh, $tennganh, $makhoa){
        $sql_nganh_ins = "INSERT INTO nganh VALUES('$manganh','$tennganh','$makhoa')";
        return mysqli_query($this->con, $sql_nganh_ins);
    }
    function nganh_upd($manganh, $tennganh, $makhoa){
        $sql_nganh_upd = "UPDATE nganh SET tennganh = '$tennganh', makhoa = '$makhoa' WHERE manganh = '$manganh'";
        return mysqli_query($this->con, $sql_nganh_upd);
    }
    function nganh_del($manganh){
        $sql_nganh_del = "DELETE FROM nganh WHERE manganh = '$manganh'";
        return mysqli_query($this->con, $sql_nganh_del);
    }
    function manganh_check($manganh){
        $sql_manganh_check = "SELECT * FROM nganh WHERE manganh='$manganh'";
        $data_manganh_check = mysqli_query($this->con, $sql_manganh_check);
        $kq_manganh_check = false;
        if (mysqli_num_rows($data_manganh_check) > 0) {
            $kq_manganh_check = true;
            
        }
        return $kq_manganh_check;
    }
    function nganh_find($manganh,$tennganh){
        $sql_nganh_find="SELECT * FROM nganh where manganh like '%$manganh%' and tennganh like '%$tennganh%'";
        return mysqli_query($this->con,$sql_nganh_find);
    }
    
    function getData($manganh)
    {
        $sql_info = "SELECT * from nganh where manganh = '$manganh'";
        $data_info = mysqli_query($this->con, $sql_info);
        return mysqli_fetch_assoc($data_info);

    }
}
