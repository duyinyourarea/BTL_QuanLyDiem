<?php
class Home extends Controller
{
    protected $taikhoan;
    function __construct()
    {
        $this->taikhoan = $this->mode('TaiKhoan');
    }
    function Get_data()
    {
        $this->view('Login_v', [
            'page' => 'Home'
        ]);
    }
    function TrangchuSV($data_1)
    {
        $this->view('MasterLayoutSV', [
            'page' => 'Home',
            'masinhvien' => $data_1
        ]);
    }
    function TrangchuAD($data_1)
    {
        $this->view('MasterLayoutAD', [
            'page' => 'Home'
        ]);
    }
}