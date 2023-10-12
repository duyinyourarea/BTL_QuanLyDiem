<?php
class HomeLogin extends Controller
{
    protected $taikhoan;
    function __construct()
    {
        $this->taikhoan = $this->mode('TaiKhoan');
    }
    function Get_data()
    {
        $this->view('Login_v', [
            'page' => 'Login_body'
        ]);
    }
    function Dangnhap()
    {
        if (isset($_POST['btnLogin'])) {
            $taikhoan = $_POST['txtTaiKhoan'];
            $matkhau = $_POST['txtMatKhau'];
            $ck = $this->taikhoan->taikhoan_check($taikhoan, $matkhau);
            if ($taikhoan == '' || $matkhau == '') {
                echo "<script>alert('Vui lòng nhập đủ thông tin!')</script>";
                $this->view('Login_v', [
                    'page' => 'Login_body',
                    'taikhoan' => $taikhoan,
                    'matkhau' => $matkhau
                ]);
            } else {
                if ($ck) {
                    echo "<script>alert('Đăng nhập thành công!')</script>";
                    $row_info_acc = $this->taikhoan->getDataAcc($taikhoan);
                    if($row_info_acc['vaitro'] == "Sinh viên"){
                        $this->view(
                            'MasterLayoutSV',
                            [
                                'page' => 'Home',
                                'masinhvien' => $row_info_acc['taikhoan']
                            ]
                        );
                    }else if($row_info_acc['vaitro'] == "Admin"){
                        $this->view(
                            'MasterLayoutAD',
                            [
                                'page' => 'Home'
                            ]
                        );
                    }
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