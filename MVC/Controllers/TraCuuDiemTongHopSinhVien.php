<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class TraCuuDiemTongHopSinhVien extends Controller
{
    protected $sinhvien;
    protected $lop;
    protected $monhoc;
    protected $taikhoan;
    protected $nganh;
    protected $khoa;
    protected $diem;
    function __construct()
    {
        $this->sinhvien = $this->mode('SinhVien');
        $this->lop = $this->mode('Lop');
        $this->monhoc = $this->mode('Monhoc');
        $this->taikhoan = $this->mode('TaiKhoan');
        $this->nganh = $this->mode('Nganh');
        $this->khoa = $this->mode('Khoa');
        $this->diem = $this->mode('TraCuuDiem');
    }
    function Get_data($masinhvien)
    {
        $row_sinhvien = $this->sinhvien->getData($masinhvien);
        $malop = $row_sinhvien['malop'];
        $row_lop = $this->lop->getData($malop);
        $manganh = $row_lop['manganh'];
        $row_nganh = $this->nganh->getData($manganh);
        $makhoa = $row_nganh['makhoa'];
        $this->view('MasterLayoutSV', [
            'page' => 'Tracuudiemtonghop_v',
            'masinhvien' => $masinhvien,
            'masinhvien_tmp' => $masinhvien,
            'dulieu_sinhvien_lop' => $this->diem->sinhvien_info_lop($malop),
            'dulieu_sinhvien' => $this->diem->sinhvien_info($masinhvien, $malop, $manganh, $makhoa),
            'dulieu_ki' => $this->diem->bangdiem_ki($masinhvien),
            'dulieu_chitiet' => $this->diem->bangdiem_chitiet($masinhvien, $manganh),
        ]);
    }
    function Timkiem()
    {
        if (isset($_POST['btnTimkiem'])) {
            $masinhvien = $_POST['txtMSV_old'];
            $masinhvien_tmp = $_POST['cbMasinhvien'];
            $row_sinhvien = $this->sinhvien->getData($masinhvien);
            $malop = $row_sinhvien['malop'];
            $row_lop = $this->lop->getData($malop);
            $manganh = $row_lop['manganh'];
            $row_nganh = $this->nganh->getData($manganh);
            $makhoa = $row_nganh['makhoa'];
            if ($masinhvien_tmp == 'Chọn sinh viên') {
                echo "<script>alert('Vui lòng chọn sinh viên!')</script>";
                $this->view('MasterLayoutSV', [
                    'page' => 'Tracuudiemtonghop_v',
                    'masinhvien' => $masinhvien,
                    'masinhvien_tmp' => $masinhvien_tmp,
                    'dulieu_sinhvien_lop' => $this->diem->sinhvien_info_lop($malop),
                    'dulieu_sinhvien' => $this->diem->sinhvien_info($masinhvien_tmp, $malop, $manganh, $makhoa),
                    'dulieu_ki' => $this->diem->bangdiem_ki($masinhvien_tmp),
                    'dulieu_chitiet' => $this->diem->bangdiem_chitiet($masinhvien_tmp, $manganh),
                ]);
            } else {
                $this->view('MasterLayoutSV', [
                    'page' => 'Tracuudiemtonghop_v',
                    'masinhvien' => $masinhvien,
                    'masinhvien_tmp' => $masinhvien_tmp,
                    'dulieu_sinhvien_lop' => $this->diem->sinhvien_info_lop($malop),
                    'dulieu_sinhvien' => $this->diem->sinhvien_info($masinhvien_tmp, $malop, $manganh, $makhoa),
                    'dulieu_ki' => $this->diem->bangdiem_ki($masinhvien_tmp),
                    'dulieu_chitiet' => $this->diem->bangdiem_chitiet($masinhvien_tmp, $manganh),
                ]);
            }
        }
    }
}
