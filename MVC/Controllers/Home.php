<?php 
class Home extends Controller{
    protected $taikhoan;
    function __construct()
    {
        $this->taikhoan = $this->mode('TaiKhoan');
    }
    function Get_data(){
        $this->view('Login_v',[
            'page'=>'Login_body'
        ]);
    }
    function Trangchu($taikhoan){
        $row_data_acc = $this->taikhoan->getDataAcc($taikhoan);
        $tensv = '';
        $masv = '';
        $vaitro = '';
        if($row_data_acc['vaitro'] == "Admin"){
            $data_acc_admin = $this->taikhoan->getDataAcc($taikhoan);
            $tensv = $data_acc_admin['taikhoan'];
            $vaitro = $data_acc_admin['$vaitro'];
        }else {
            $data_acc_sv = $this->taikhoan->getDataSv($taikhoan);
            $tensv = $data_acc_sv['tensinhvien'];
            $masv = $data_acc_sv['masinhvien'];
            $vaitro = $data_acc_sv['vaitro'];
        }
        $this->view('MasterLayout',['page'=>'Home','info_ten' => $tensv, 'info_ma' => $masv, 'vaitro' => $vaitro
    ]);
    }

}