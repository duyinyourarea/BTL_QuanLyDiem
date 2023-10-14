<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class TraCuuDiemTongHop extends Controller
{
    protected $sinhvien;
    protected $lop;
    protected $monhoc;
    protected $taikhoan;
    function __construct()
    {
        $this->sinhvien = $this->mode('SinhVien');
        $this->lop = $this->mode('Lop');
        $this->monhoc = $this->mode('Monhoc');
        $this->taikhoan = $this->mode('TaiKhoan');
    }
    function Get_data()
    {
        // $taikhoan=$_POST['txtInfoAcc'];
        // $vaitro = '';
        // $data_acc = $this->taikhoan->getDataAcc($taikhoan);
        // $vaitro = $data_acc['vaitro'];
        $this->view('MasterLayoutSV', [
            'page' => 'Tracuudiemtonghop_v',
            // 'info' => $taikhoan,
            // 'vaitro' => $vaitro
        ]);
    }
    function Timkiem()
    {
        if (isset($_POST['btnTimkiem'])) {
            $ki = $_POST['txtHocki'];
            $tenmon = $_POST['txtTenmon'];
            $this->view('MasterLayoutSV', [
                'page' => 'Tracuudiem_v', 'dulieu' => $this->sinhvien->sinhvien_find('', '', ''), 'ki' => $ki, 'tenmon' => $tenmon
            ]);
        }
    }
}