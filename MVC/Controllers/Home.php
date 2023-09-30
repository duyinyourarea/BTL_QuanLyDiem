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
}