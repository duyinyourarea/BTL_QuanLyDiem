<?php
class Lop extends connectDB{
    function lop_ins($malop, $tenlop, $siso, $makhoa){
        $sql_lop_ins = "INSERT INTO loaisach VALUES('$malop','$tenlop','$siso','$makhoa')";
        return mysqli_query($this->con, $sql_lop_ins);
    }
    function lop_upd($malop, $tenlop, $siso, $makhoa){
        $sql_lop_upd = "UPDATE lop SET tenlop = '$tenlop', siso = '$siso', makhoa = '$makhoa' WHERE malop = '$malop'";
        return mysqli_query($this->con, $sql_lop_upd);
    }
    function lop_del($malop){
        $sql_lop_del = "DELETE FROM lop WHERE malop = '$malop'";
        return mysqli_query($this->con, $sql_lop_del);
    }
    function malop_check($malop){
        $sql_malop_check = "SELECT * FROM lop WHERE malop='$malop'";
        $data_malop_check = mysqli_query($this->con, $sql_malop_check);
        $kq_malop_check = false;
        if (mysqli_num_rows($data_malop_check) > 0) {
            $kq_malop_check = true;
            
        }
        return $kq_malop_check;
    }
    function lop_find($malop,$tenlop){
        $sql_lop_find="SELECT * FROM lop where malop like '%$malop%' and tenlop like '%$tenlop%'";
        return mysqli_query($this->con,$sql_lop_find);
    }
}
?>