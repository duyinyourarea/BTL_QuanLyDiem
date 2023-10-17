<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ThongKeSinhVien extends Controller
{
    protected $sinhvien;
    protected $lop;
    protected $monhoc;
    protected $taikhoan;
    protected $nganh;
    protected $khoa;
    protected $diem;
    protected $thongke;
    function __construct()
    {
        $this->sinhvien = $this->mode('SinhVien');
        $this->lop = $this->mode('Lop');
        $this->monhoc = $this->mode('Monhoc');
        $this->taikhoan = $this->mode('TaiKhoan');
        $this->nganh = $this->mode('Nganh');
        $this->khoa = $this->mode('Khoa');
        $this->diem = $this->mode('TraCuuDiem');
        $this->thongke = $this->mode('ThongKe');
    }
    function Get_data()
    {
        $row_sinhvien = $this->sinhvien->getData();
        $malop = $row_sinhvien['malop'];
        $row_lop = $this->lop->getData($malop);
        $manganh = $row_lop['manganh'];
        $row_nganh = $this->nganh->getData($manganh);
        $makhoa = $row_nganh['makhoa'];
        $this->view('MasterLayoutSV', [
            'page' => 'Tracuudiem_v',
            'dulieu_sinhvien' => $this->diem->sinhvien_info($malop, $manganh, $makhoa),
            'dulieu_ki' => $this->diem->bangdiem_ki(),
            'dulieu_chitiet' => $this->diem->bangdiem_chitiet($manganh),
        ]);
    }
    function Get_data_hoclai()
    {
        $this->view('MasterLayoutAD', [
            'page' => 'HocLai_v',
            'dulieu_hoclai' => $this->thongke->sinhvien_hoclai(),
            'dulieu_count' => $this->thongke->count_hoclai(),
            'dulieu_monhoc' => $this->thongke->tenmon_hoclai(),

        ]);
    }
    function Timkiem_hoclai()
    {
        if (isset($_POST['btnTimkiem'])) {
            $mamon = $_POST['cbMamon'];
            $row_monhoc = mysqli_fetch_assoc($this->monhoc->monhoc_find($mamon, ''));
            $tenmon = $row_monhoc['tenmon'];
            if ($mamon == 'Chọn môn học') {
                echo "<script>alert('Vui lòng chọn môn học!')</script>";
                $this->view('MasterLayoutAD', [
                    'page' => 'HocLai_v',
                    'dulieu_hoclai' => $this->thongke->sinhvien_hoclai(),
                    'dulieu_count' => $this->thongke->count_hoclai(),
                    'dulieu_monhoc' => $this->thongke->tenmon_hoclai(),
                ]);
            } else {
                $this->view('MasterLayoutAD', [
                    'page' => 'HocLai_v',
                    'tenmon' => $tenmon,
                    'dulieu_hoclai' => $this->thongke->find_tenmon_hoclai($mamon),
                    'dulieu_count' => $this->thongke->count_hoclai(),
                    'dulieu_monhoc' => $this->thongke->tenmon_hoclai(),
                ]);
            }
        }
    }
    function Get_data_thilai()
    {
        $this->view('MasterLayoutAD', [
            'page' => 'ThiLai_v',
            'dulieu_thilai' => $this->thongke->sinhvien_thilai(),
            'dulieu_count' => $this->thongke->count_thilai(),
            'dulieu_monhoc' => $this->thongke->tenmon_thilai(),
            'dulieu_lop' => $this->thongke->tenlop_thilai(),
        ]);
    }
    function Timkiem_thilai()
    {
        if (isset($_POST['btnTimkiem'])) {
            $mamon = $_POST['cbMamon'];
            $malop = $_POST['cbMalop'];
            // if ($mamon == 'Chọn môn học' && $malop == 'Chọn lớp') {
            //     echo "<script>alert('Vui lòng chọn thông tin!')</script>";
            //     $this->view('MasterLayoutAD', [
            //         'page' => 'ThiLai_v',
            //         'dulieu_thilai' => $this->thongke->sinhvien_thilai(),
            //         'dulieu_count' => $this->thongke->count_thilai(),
            //         'dulieu_monhoc' => $this->thongke->tenmon_thilai(),
            //         'dulieu_lop' => $this->thongke->tenlop_thilai(),
            //     ]);
            // } else {
            //     $this->view('MasterLayoutAD', [
            //         'page' => 'ThiLai_v',
            //         'dulieu_thilai' => $this->thongke->find_thilai($malop, $mamon),
            //         'dulieu_count' => $this->thongke->count_thilai(),
            //         'dulieu_monhoc' => $this->thongke->tenmon_thilai(),
            //         'dulieu_lop' => $this->thongke->tenlop_thilai(),
            //     ]);
            // }
            $this->view('MasterLayoutAD', [
                'page' => 'ThiLai_v',
                'dulieu_thilai' => $this->thongke->find_thilai($malop, $mamon),
                'dulieu_count' => $this->thongke->count_thilai(),
                'dulieu_monhoc' => $this->thongke->tenmon_thilai(),
                'dulieu_lop' => $this->thongke->tenlop_thilai(),
            ]);
        }
    }
    function Get_data_hocbong()
    {
        $this->view('MasterLayoutAD', [
            'page' => 'HocBong_v',
            'dulieu_hocbong' => $this->thongke->sinhvien_hocbong(),
            'dulieu_count' => $this->thongke->count_hocbong(),
            'dulieu_lop' => $this->thongke->tenlop_hocbong(),

        ]);
    }
    function Timkiem_hocbong()
    {
        if (isset($_POST['btnTimkiem'])) {
            $malop = $_POST['cbMalop'];
            if ($malop == 'Chọn lớp') {
                echo "<script>alert('Vui lòng chọn lớp!')</script>";
                $this->view('MasterLayoutAD', [
                    'page' => 'HocBong_v',
                    'dulieu_hocbong' => $this->thongke->sinhvien_hocbong(),
                    'dulieu_count' => $this->thongke->count_hocbong(),
                    'dulieu_lop' => $this->thongke->tenlop_hocbong(),

                ]);
            } else {
                $this->view('MasterLayoutAD', [
                    'page' => 'HocBong_v',
                    'dulieu_hocbong' => $this->thongke->find_hocbong($malop),
                    'dulieu_count' => $this->thongke->count_hocbong(),
                    'dulieu_lop' => $this->thongke->tenlop_hocbong(),

                ]);
            }
        }
    }
    function Get_data_diem()
    {
        $this->view('MasterLayoutAD', [
            'page' => 'Diem_v',
            'dulieu_diem' => $this->thongke->sinhvien_diem(),
            'dulieu_count' => $this->thongke->count_diem(),
            'dulieu_lop' => $this->thongke->tenlop_diem(),

        ]);
    }
    function Timkiem_diem()
    {
        if (isset($_POST['btnTimkiem'])) {
            $malop = $_POST['cbMalop'];
            if ($malop == 'Chọn lớp') {
                echo "<script>alert('Vui lòng chọn lớp!')</script>";
                $this->view('MasterLayoutAD', [
                    'page' => 'Diem_v',
                    'dulieu_diem' => $this->thongke->sinhvien_diem(),
                    'dulieu_count' => $this->thongke->count_diem(),
                    'dulieu_lop' => $this->thongke->tenlop_diem(),

                ]);
            } else {
                $this->view('MasterLayoutAD', [
                    'page' => 'Diem_v',
                    'dulieu_diem' => $this->thongke->find_diem($malop),
                    'dulieu_count' => $this->thongke->count_diem(),
                    'dulieu_lop' => $this->thongke->tenlop_diem(),

                ]);
            }
        }
    }
}
