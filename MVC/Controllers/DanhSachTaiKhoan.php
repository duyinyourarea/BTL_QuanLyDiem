<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DanhSachTaiKhoan extends Controller
{
    protected $taikhoan;
    function __construct()
    {
        $this->taikhoan = $this->mode('TaiKhoan');
    }
    function Get_data()
    {
        
        $this->view('MasterLayoutAD', [
            'page' => 'Taikhoan_v', 'dulieu' => $this->taikhoan->taikhoan_find('', '', 'Sinh viên'),
            
        ]);
    }
    function Timkiem()
    {
        if (isset($_POST['btnTimkiem'])) {
            $taikhoan = $_POST['txtTaikhoan'];
            $matkhau = $_POST['txtMatkhau'];
            $this->view('MasterLayoutAD', [
                'page' => 'Taikhoan_v', 'dulieu' => $this->taikhoan->taikhoan_find($taikhoan, $matkhau, 'Sinh viên'), 'taikhoan' => $taikhoan, 'matkhau' => $matkhau
            ]);
        }
    }
    function Sua($taikhoan)
    {
        $this->view('MasterLayoutAD', [
            'page' => 'Taikhoan_sua', 'dulieu' => $this->taikhoan->taikhoan_find($taikhoan, '', 'Sinh viên'),
        ]);
    }
    function Sua_taikhoan()
    {
        if (isset($_POST['btnLuu'])) {
            $taikhoan = $_POST['txtTaikhoan'];
            $matkhau = $_POST['txtMatkhau'];
            if ($matkhau == '') {
                echo "<script>alert('Vui lòng nhập đủ thông tin!')</script>";
                $this->view('MasterLayoutAD', [
                    'page' => 'Taikhoan_sua', 'dulieu' => $this->taikhoan->taikhoan_find($taikhoan, '', 'Sinh viên'),
                    'matkhau' => $matkhau
                ]);
            } else {
                $kq = $this->taikhoan->taikhoan_upd($taikhoan, $matkhau);
                if ($kq) {
                    echo "<script>alert('Sửa thành công!')</script>";
                } else {
                    echo "<script>alert('Sửa thất bại!')</script>";
                }
                $this->view('MasterLayoutAD', [
                    'page' => 'Taikhoan_v', 'dulieu' => $this->taikhoan->taikhoan_find('', '', 'Sinh viên'),
                ]);
            }
        }
        if (isset($_POST['btnHuy'])) {
            $this->view('MasterLayoutAD', [
                'page' => 'Taikhoan_v', 'dulieu' => $this->taikhoan->taikhoan_find('', '', 'Sinh viên'),
            ]);
        }
    }

    function ExportExcel()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $taikhoan = $_POST['txtTaikhoan'];
        $matkhau = $_POST['txtMatkhau'];
        $data_export = $this->taikhoan->taikhoan_find($taikhoan, $matkhau, 'Sinh viên');
        //định dạng cột tiêu đề
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        // căn lề cácc tiêu đề trong các ô
        $sheet->getStyle('A1:D1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        // Tạo tiêu đề
        $sheet
            ->setCellValue('A1', 'STT')
            ->setCellValue('B1', 'Tài khoản')
            ->setCellValue('C1', 'Mật khẩu')
            ->setCellValue('D1', 'Vai trò');
           
        // Ghi dữ liệu
        $rowCount = 2;
        foreach ($data_export as $key => $value) {
            $sheet->setCellValue('A' . $rowCount, $rowCount - 1);
            $sheet->setCellValue('B' . $rowCount, $value['taikhoan']);
            $sheet->setCellValue('C' . $rowCount, $value['matkhau']);
            $sheet->setCellValue('D' . $rowCount, $value['vaitro']);
            //căn lề cho các văn bản trong các ô thuộc mỗi hàng
            $sheet->getStyle('A' . $rowCount . ':D' . $rowCount)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $rowCount++;
        }

        // Xuất file
        $writer = new Xlsx($spreadsheet);
        $writer->setOffice2003Compatibility(true);
        $filename = "DStaikhoan" . time() . ".xlsx";
        $writer->save($filename);
        header("location:" . $filename);
        $this->view('MasterLayoutAD', ['page' => 'Taikhoan_v', 'dulieu' => $this->taikhoan->taikhoan_find('', '', 'Sinh viên')]);
    }

}
