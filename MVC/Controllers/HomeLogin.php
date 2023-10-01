<?php
class HomeLogin extends Controller
{
    protected $taikhoan;
    protected $sinhvien;
    function __construct()
    {
        $this->taikhoan = $this->mode('TaiKhoan');
        $this->sinhvien = $this->mode('SinhVien');
    }
    function Get_data()
    {
        
        $this->view('Login_v', [
            'page' => 'Login_body'
        ]);
    }
    function Dangnhap()
    {
        if (isset($_POST['btnTracuudiem'])) {
            $taikhoan = $_POST['txtInfoAcc'];
            $vaitro = '';
            $data_acc = $this->taikhoan->getDataAcc($taikhoan);
            $vaitro = $data_acc['vaitro'];
            $data_sinhvien = $this->taikhoan->getDataSv($taikhoan);
            $masinhvien = $data_sinhvien['masinhvien'];
            $tensinhvien = $data_sinhvien['tensinhvien'];
            $malop = $data_sinhvien['malop'];
            $data_lop = $this->sinhvien->getDataLop($malop);
            $tenlop = $data_lop['tenlop'];
            $tenkhoa = $data_lop['tenkhoa'];
            $this->view('MasterLayout', [
                'page' => 'Tracuudiem_v',
                'info' => $taikhoan,
                'vaitro' => $vaitro,
                'masinhvien' => $masinhvien, 'tensinhvien' => $tensinhvien, 'tenlop' => $tenlop, 'tenkhoa' => $tenkhoa
            ]);
        }
        if (isset($_POST['btnLogin'])) {
            $taikhoan = $_POST['txtTaiKhoan'];
            $matkhau = $_POST['txtMatKhau'];
            $ck = $this->taikhoan->taikhoan_check($taikhoan, $matkhau);
            if ($taikhoan == '' || $matkhau == '') {
                echo "<script>alert('Vui lòng nhập đủ thông tin!')</script>";
                $this->view('Login_v', [
                    'page' => 'Login_body',
                    'taikhoan' => $taikhoan,
                ]);
            } else {
                if ($ck) {
                    echo "<script>alert('Đăng nhập thành công!')</script>";
                    $row_info_acc = $this->taikhoan->getDataAcc($taikhoan);
                    $this->view(
                        'MasterLayout',
                        [
                            'page' => 'Home',
                            'info' => $row_info_acc['taikhoan'],
                            'vaitro' => $row_info_acc['vaitro']
                        ]
                    );
                } else {
                    echo "<script>alert('Đăng nhập thất bại!')</script>";
                    $this->view('Login_v', [
                        'page' => 'Login_body',
                        'taikhoan' => $taikhoan,
                        'matkhau' => $matkhau
                    ]);
                }
            }
        }
    }

}