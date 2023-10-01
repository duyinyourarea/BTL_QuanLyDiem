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
    function Get_data()
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
    function DataSinhVien($taikhoan)
    {
        $data_sinhvien = $this->taikhoan->getDataSv($taikhoan);
        $masinhvien = $data_sinhvien['masinhvien'];
        $tensinhvien = $data_sinhvien['tensinhvien'];
        $malop = $data_sinhvien['malop'];
        $data_lop = $this->sinhvien->getDataLop($malop);
        $tenlop = $data_lop['tenlop'];
        $tenkhoa = $data_lop['tenkhoa'];
        $this->view('MasterLayout', [
            'page' => 'Tracuudiem_v',
            'masinhvien' => $masinhvien, 'tensinhvien' => $tensinhvien, 'tenlop' => $tenlop, 'tenkhoa' => $tenkhoa
        ]);
    }
}
