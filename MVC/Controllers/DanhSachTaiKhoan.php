<?php
class DanhSachTaiKhoan extends Controller
{
    protected $taikhoan;
    function __construct()
    {
        $this->taikhoan = $this->mode('TaiKhoan');
    }
    function Get_data()
    {
        $this->view('MasterLayout', [
            'page' => 'Taikhoan_v', 'dulieu' => $this->taikhoan->taikhoan_find('', '', 'Sinh viên'),
        ]);
    }
    function Timkiem()
    {
        if (isset($_POST['btnTimkiem'])) {
            $taikhoan = $_POST['txtTaikhoan'];
            $matkhau = $_POST['txtMatkhau'];
            $this->view('MasterLayout', [
                'page' => 'Taikhoan_v', 'dulieu' => $this->taikhoan->taikhoan_find($taikhoan, $matkhau, 'Sinh viên'), 'taikhoan' => $taikhoan, 'matkhau' => $matkhau
            ]);
        }
    }
    function Sua($taikhoan)
    {
        $this->view('MasterLayout', [
            'page' => 'Taikhoan_sua', 'dulieu' => $this->taikhoan->taikhoan_find($taikhoan, '', 'Sinh viên'),
        ]);
    }
    function Sua_taikhoan()
    {
        if (isset($_POST['btnLuu'])) {
            $taikhoan = $_POST['txtTaikhoan'];
            $matkhau = $_POST['txtMatkhau'];
            if ($matkhau == '') {
                echo "<script>alert('Vui lòng nhập đủ thông tin!')</script>";
                $this->view('MasterLayout', [
                    'page' => 'Taikhoan_sua', 'dulieu' => $this->taikhoan->taikhoan_find($taikhoan, '', 'Sinh viên'),
                    'matkhau'=> $matkhau
                ]);
            } else {
                $kq = $this->taikhoan->taikhoan_upd($taikhoan, $matkhau);
                if ($kq) {
                    echo "<script>alert('Sửa thành công!')</script>";
                } else {
                    echo "<script>alert('Sửa thất bại!')</script>";
                }
                $this->view('MasterLayout', [
                    'page' => 'Taikhoan_v', 'dulieu' => $this->taikhoan->taikhoan_find('', '', 'Sinh viên'),
                ]);
            }
        }
        if (isset($_POST['btnHuy'])) {
            $this->view('MasterLayout', [
                'page' => 'Taikhoan_v', 'dulieu' => $this->taikhoan->taikhoan_find('', '', 'Sinh viên'),
            ]);
        }
    }
}
