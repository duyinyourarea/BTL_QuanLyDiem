<?php 
class Home extends Controller{
    protected $taikhoan;
    function __construct()
    {
        $this->taikhoan = $this->mode('TaiKhoan');
    }
    function Get_data(){
        $this->view('Login_v',[
            'page'=>'Home'
        ]);
    }
    function Dangnhap(){
        if (isset($_POST['btnLogin'])){
            $taikhoan=$_POST['txtTaiKhoan'];
            $matkhau=$_POST['txtMatKhau'];
            $ck = $this->taikhoan->taikhoan_check($taikhoan, $matkhau);
            if ($taikhoan == '' || $matkhau == '') {
                echo "<script>alert('Vui lòng nhập đủ thông tin!')</script>";
                $this->view('Login_v', [
                    'page' => 'Home',
                    'taikhoan' => $taikhoan, 'matkhau' => $matkhau
                ]);
            }else {
                if ($ck) {
                    echo "<script>alert('Đăng nhập thành công!')</script>";
                    $this->view(
                        'MasterLayout',
                        [
                            'page' => '',
                            
                        ]
                    );
                }else {
                    echo "<script>alert('Đăng nhập thất bại!')</script>";
                    $this->view('Login_v', [
                        'page' => 'Home',
                        'taikhoan' => $taikhoan, 'matkhau' => $matkhau
                    ]);
                }
            }
        }
    }
    
}
