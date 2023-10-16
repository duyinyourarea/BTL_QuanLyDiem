<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class DanhSachLop extends Controller
{
    protected $lop;
    protected $monhoc;
    protected $nganh;
    protected $sinhvien;
    function __construct()
    {
        $this->lop = $this->mode('Lop');
        $this->monhoc = $this->mode('Monhoc');
        $this->sinhvien = $this->mode('SinhVien');
        $this->nganh = $this->mode('Nganh');
    }
    function Get_data()
    {
        $this->view('MasterLayoutAD', [
            'page' => 'Lop_v',
            'dulieu' => $this->lop->lop_find('', '')
        ]);
    }
    function Timkiem()
    {
        if (isset($_POST['btnTimkiem'])) {
            $ml = $_POST['txtMalop'];
            $tl = $_POST['txtTenlop'];
            $this->view('MasterLayoutAD', [
                'page' => 'Lop_v',
                'dulieu' => $this->lop->lop_find($ml, $tl),
                'ml' => $ml,
                'tl' => $tl
            ]);
        }
    }
    function Xoa($malop)
    {
        $kq_del = $this->lop->lop_del($malop);
        if ($kq_del)
            echo "<script>alert('Xóa thành công')</script>";
        else
            echo "<script>alert('Xóa thất bại')</script>";
        $this->view('MasterLayoutAD', [
            'page' => 'Lop_v',
            'dulieu' => $this->lop->lop_find('', '')
        ]);
    }
    function Sua($malop)
    {
        $this->view('MasterLayoutAD', [
            'page' => 'Lop_sua',
            'dulieu' => $this->lop->lop_find($malop, ''),
            'data_nganh' => $this->nganh->nganh_find('','')
        ]);
    }
    function Sua_lop()
    {
        if (isset($_POST['btnLuu'])) {
            $ml = $_POST['txtMalop'];
            $tl = $_POST['txtTenlop'];
            $ss = $_POST['txtSiso'];
            $mk = $_POST['txtMakhoa'];
            $kq = $this->lop->lop_upd($ml, $tl, $ss, $mk);
            if ($kq)
                $this->view('MasterLayoutAD', [
                    'page' => 'Lop_v',
                    'dulieu' => $this->lop->lop_find('', ''),
                ]);
        }
        if (isset($_POST['btnHuy'])) {
            $this->view('MasterLayoutAD', [
                'page' => 'Lop_v',
                'dulieu' => $this->lop->lop_find('', '')
            ]);
        }
    }
    function Them()
    {
        $this->view('MasterLayoutAD', ['page' => 'Lop_them', 'data_nganh' => $this->nganh->nganh_find('','')]);
    }
    function Them_lop()
    {
        if (isset($_POST['btnLuu'])) {
            $ml = $_POST['txtMalop'];
            $tl = $_POST['txtTenlop'];
            $siso = $_POST['txtSiso'];
            $mn = $_POST['txtManganh'];
            $kq = $this->lop->lop_ins($ml, $tl, $siso, $mn);
            if ($kq)
                echo "<script>alert('Thêm thành công')</script>";
            else
                echo "<script>alert('Thêm thất bại')</script>";
            $this->view('MasterLayoutAD', [
                'page' => 'Lop_v',
                'dulieu' => $this->lop->lop_find('', ''),
            ]);
        }
        if(isset($_POST['btnHuy'])){
            $this->view('MasterLayoutAD', [
                'page' => 'Lop_v',
                'dulieu' => $this->lop->lop_find('', '')
            ]);
        }
    }
    function Diem_Sinhvien($malop)
    {
        $this->view('MasterLayoutAD', [
            'page' => 'DiemSinhVien_v', 'dulieu' => $this->lop->lop_find($malop, ''), 'dulieu_sinhvien' => $this->sinhvien->sinhvien_find('', '', $malop), 'dulieu_monhoc' => $this->monhoc->monhoc_find('', '')
        ]);
    }
    function ExportExcel()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $data_export = $this->lop->lop_find('', '');
        //định dạng cột tiêu đề
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        // căn lề cácc tiêu đề trong các ô
        $sheet->getStyle('A1:E1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        // Tạo tiêu đề
        $sheet
            ->setCellValue('A1', 'STT')
            ->setCellValue('B1', 'Mã lớp')
            ->setCellValue('C1', 'Tên lớp')
            ->setCellValue('D1', 'Sĩ số')
            ->setCellValue('E1', 'Mã ngành');

        // Ghi dữ liệu
        $rowCount = 2;
        foreach ($data_export as $key => $value) {
            $sheet->setCellValue('A' . $rowCount, $rowCount - 1);
            $sheet->setCellValue('B' . $rowCount, $value['malop']);
            $sheet->setCellValue('C' . $rowCount, $value['tenlop']);
            $sheet->setCellValue('D' . $rowCount, $value['siso']);
            $sheet->setCellValue('E' . $rowCount, $value['manganh']);
            //căn lề cho các văn bản trong các ô thuộc mỗi hàng
            $sheet->getStyle('A' . $rowCount . ':E' . $rowCount)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $rowCount++;
        }

        // Xuất file
        $writer = new Xlsx($spreadsheet);
        $writer->setOffice2003Compatibility(true);
        $filename = "DSlop" . time() . ".xlsx";
        $writer->save($filename);
        header("location:" . $filename);
        $this->view('MasterLayoutAD', ['page' => 'Lop_v', 'dulieu' => $this->lop->lop_find('', '')]);
    }
    function ImportExcel()
    {
        $this->view('MasterLayoutAD', ['page' => 'Lop_imp']);

    }
    function lop_import()
    {
        if (isset($_POST['btnCancel'])) {
            $this->view('MasterLayoutAD', [
                'page' => 'Lop_v',
                'dulieu' => $this->lop->lop_find('', '')
            ]);
        }
        if (isset($_POST['btnImport'])) {
            if (isset($_FILES['fileimport'])) {
                if ($_FILES['fileimport']['error'] > 0) {
                    echo "<script>alert('File Import bị lỗi')</script>";
                    $this->view('MasterLayoutAD', ['page' => 'Lop_imp']);
                } else {
                    $inputFileName = 'file.xlsx';
                    move_uploaded_file($_FILES['fileimport']['tmp_name'], $inputFileName);
                    $spreadsheet = IOFactory::load($inputFileName);
                    $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
                    $arrayCount = count($sheetData);

                    for ($i = 2; $i <= $arrayCount; $i++) {
                        $malop = trim($sheetData[$i]["B"]);
                        $tenlop = trim($sheetData[$i]["C"]);
                        $siso = trim($sheetData[$i]["D"]);
                        $manganh = trim($sheetData[$i]["E"]);
                        $kq_import = $this->lop->lop_ins($malop, $tenlop, $siso, $manganh);
                        if($kq_import);
                    }
                    unlink('file.xlsx');
                    echo "<script>alert('Import file thành công')</script>";
                    $this->view('MasterLayoutAD', [
                        'page' => 'Lop_v',
                        'dulieu' => $this->lop->lop_find('', ''),
                    ]);
                }

            } else {
                echo "<script>alert('Bạn chưa chọn file import')</script>";
            }

        }
    }
}
