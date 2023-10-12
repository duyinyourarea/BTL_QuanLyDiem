<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class TraCuuDiem extends Controller
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
    function Get_data($masinhvien)
    {
        $this->view('MasterLayoutSV', [
            'page' => 'Tracuudiem_v',
            'masinhvien' => $masinhvien
        ]);
    }
    function Timkiem()
    {
        if (isset($_POST['btnTimkiem'])) {
            $ki = $_POST['txtHocki'];
            $tenmon = $_POST['txtTenmon'];
            $this->view('MasterLayout', [
                'page' => 'Tracuudiem_v', 'dulieu' => $this->sinhvien->sinhvien_find('', '', ''), 'ki' => $ki, 'tenmon' => $tenmon
            ]);
        }
    }
}