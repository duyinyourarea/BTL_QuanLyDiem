<?php
class TraCuuDiem extends connectDB
{
    function sinhvien_find($masinhvien, $tensinhvien, $malop)
    {
        $sql_sinhvien_find = "SELECT * FROM sinhvien,lop,monhoc where masinhvien like '%$masinhvien%' and tensinhvien like '%$tensinhvien%' and malop like '%$malop%'";
        return mysqli_query($this->con, $sql_sinhvien_find);
    }
}
