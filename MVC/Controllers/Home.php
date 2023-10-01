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
            'page' => 'Login_body'
        ]);
    }
    function Trangchu($taikhoan)
    {
        $vaitro = '';
        $data_acc = $this->taikhoan->getDataAcc($taikhoan);
        $vaitro = $data_acc['vaitro'];
        $this->view('MasterLayout', [
            'page' => 'Home',
            'info' => $taikhoan,
            'vaitro' => $vaitro
        ]);
    }
    function Tracuudiem($taikhoan)
    {

    }
    function Danhsachsinhvien($taikhoan)
    {
        $row_data_acc = $this->taikhoan->getDataAcc($taikhoan);
        $vaitro = '';
        $vaitro = $row_data_acc['vaitro'];
        if ($vaitro == "Admin") {
            $this->view('MasterLayout', [
                'page' => 'Sinhvien_v',
                'info' => $taikhoan,
                'vaitro' => $vaitro
            ]);
        } else {
            echo "<script>alert('Chức năng chỉ dành cho admin')</script>";
            $this->view('MasterLayout', [
                'page' => 'Home',
                'info' => $taikhoan,
                'vaitro' => $vaitro
            ]);
        }

    }
    function Danhsachtaikhoan($taikhoan)
    {
        $row_data_acc = $this->taikhoan->getDataAcc($taikhoan);
        $vaitro = '';
        $vaitro = $row_data_acc['vaitro'];
        if ($vaitro == "Admin") {
            $this->view('MasterLayout', [
                'page' => 'Taikhoan_v',
                'info' => $taikhoan,
                'vaitro' => $vaitro
            ]);
        } else {
            echo "<script>alert('Chức năng chỉ dành cho admin')</script>";
            $this->view('MasterLayout', [
                'page' => 'Home',
                'info' => $taikhoan,
                'vaitro' => $vaitro
            ]);
        }

    }
    function Danhsachmonhoc($taikhoan)
    {
        $row_data_acc = $this->taikhoan->getDataAcc($taikhoan);
        $vaitro = '';
        $vaitro = $row_data_acc['vaitro'];
        if ($vaitro == "Admin") {
            $this->view('MasterLayout', [
                'page' => 'Monhoc_v',
                'info' => $taikhoan,
                'vaitro' => $vaitro
            ]);
        } else {
            echo "<script>alert('Chức năng chỉ dành cho admin')</script>";
            $this->view('MasterLayout', [
                'page' => 'Home',
                'info' => $taikhoan,
                'vaitro' => $vaitro
            ]);
        }

    }
    function Danhsachlop($taikhoan)
    {
        $row_data_acc = $this->taikhoan->getDataAcc($taikhoan);
        $vaitro = '';
        $vaitro = $row_data_acc['vaitro'];
        if ($vaitro == "Admin") {
            $this->view('MasterLayout', [
                'page' => 'Lop_v',
                'info' => $taikhoan,
                'vaitro' => $vaitro
            ]);
        } else {
            echo "<script>alert('Chức năng chỉ dành cho admin')</script>";
            $this->view('MasterLayout', [
                'page' => 'Home',
                'info' => $taikhoan,
                'vaitro' => $vaitro
            ]);
        }

    }
    function Danhsachkhoa($taikhoan)
    {
        $row_data_acc = $this->taikhoan->getDataAcc($taikhoan);
        $vaitro = '';
        $vaitro = $row_data_acc['vaitro'];
        if ($vaitro == "Admin") {
            $this->view('MasterLayout', [
                'page' => 'Khoa_v',
                'info' => $taikhoan,
                'vaitro' => $vaitro
            ]);
        } else {
            echo "<script>alert('Chức năng chỉ dành cho admin')</script>";
            $this->view('MasterLayout', [
                'page' => 'Home',
                'info' => $taikhoan,
                'vaitro' => $vaitro
            ]);
        }

    }

}