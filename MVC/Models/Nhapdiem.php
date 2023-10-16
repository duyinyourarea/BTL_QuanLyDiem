<?php 
class NhapDiem extends connectDB{
    function nhapdiem_quatrinh($mamon, $malop, $lanthi){
        $sql_ds_nhapdiemquatrinh = "SELECT * FROM diemmonhoc, sinhvien WHERE diemmonhoc.masinhvien = sinhvien.masinhvien and malop = '$malop' and lanthi = '$lanthi' and mamon = '$mamon'";
       return mysqli_query($this->con, $sql_ds_nhapdiemquatrinh);
    }
    function nhapdiem_quatrinh_array($mamon, $malop, $lanthi){
        $sql_ds_nhapdiemquatrinh = "SELECT * FROM diemmonhoc, sinhvien WHERE diemmonhoc.masinhvien = sinhvien.masinhvien and malop = '$malop' and lanthi = '$lanthi' and mamon = '$mamon'";
        $data_ds_ndqt = mysqli_query($this->con, $sql_ds_nhapdiemquatrinh);
        return mysqli_fetch_all($data_ds_ndqt);
    }
}
?>