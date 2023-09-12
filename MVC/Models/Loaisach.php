<?php
class Loaisach extends connectDB
{
    function loaisach_ins($ml, $tl, $mt)
    {
        $sql = "INSERT INTO loaisach VALUES('$ml','$tl','$mt')";
        return mysqli_query($this->con, $sql);
    }
    function checktrungmaloai($ml)
    {
        $sql1 = "SELECT * FROM loaisach WHERE Maloai='$ml'";
        $dt = mysqli_query($this->con, $sql1);
        $kq = false;
        if (mysqli_num_rows($dt) > 0) {
            $kq = true;
            
        }
        return $kq;
    }
}
?>