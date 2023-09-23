<?php
class ThemSinhVien extends controller
{
    protected $masinhvien;
    function __construct()
    {
        $this->masinhvien = $this->mode('SinhVien');
    }
    function Get_data()
    {
        $this->view('MasterLayout', [
            'page' => 'Sinhvien_them',
            'masinhvien' => '',
            'tensinhvien' => '',
            'gioitinh' => '',
            'sodienthoai' => '',
            'email' => '',
            'malop' => '',
        ]);
    }
    function sinhvien_them()
    {
        if (isset($_POST['btnLuu'])) {
            //Lấy dữ liệu trên các control của form
            $masinhvien = $_POST['txtMasinhvien'];
            $tensinhvien = $_POST['txtTensinhvien'];
            $gioitinh = $_POST['txtGioitinh'];
            $sodienthoai = $_POST['txtSodienthoai'];
            $email = $_POST['txtEmail'];
            $malop = $_POST['txtMalop'];
            $ck = $this->masinhvien->masinhvien_check($masinhvien);
            if ($masinhvien = '' || $tensinhvien = '' || $gioitinh = '' || $sodienthoai = '' || $email = '') {
                echo "<script>alert('Vui lòng nhập đủ thông tin!')</script>";
            } else {
                if ($ck) {
                    echo "<script>alert('Mã sinh viên đã tồn tại!')</script>";
                } else {
                    $kq = $this->masinhvien->sinhvien_ins($masinhvien, $tensinhvien, $gioitinh, $sodienthoai, $email, $malop);
                    if ($kq)
                        echo "<script>alert('Thêm mới thành công!')</script>";
                    else
                        echo "<script>alert('Thêm mới thất bại!')</script>";
                }
                //gọi lại giao diện ra
                $this->view('MasterLayout', [
                    'page' => 'Sinhvien_them',
                    'masinhvien' => $masinhvien,
                    'tensinhvien' => $tensinhvien,
                    'gioitinh' => $gioitinh,
                    'sodienthoai' => $sodienthoai,
                    'email' => $email,
                    'malop' => $malop,
                ]);
            }
        }
    }
}
