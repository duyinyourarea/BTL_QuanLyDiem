<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class DanhSachKhoa extends Controller
{
    protected $khoa;
    function __construct()
    {
        $this->khoa = $this->mode('Khoa');
    }
    function Get_data()
    {
        $this->view('MasterLayoutAD', [
            'page' => 'Khoa_v',
            'dulieu' => $this->khoa->khoa_find('', '')
        ]);
    }
    function Timkiem()
    {
        if (isset($_POST['btnTimkiem'])) {
            $mk = $_POST['txtMakhoa'];
            $tk = $_POST['txtTenkhoa'];
            $this->view('MasterLayoutAD', [
                'page' => 'Khoa_v',
                'dulieu' => $this->khoa->khoa_find($mk, $tk),
                'mk' => $mk,
                'tk' => $tk
            ]);
        }
    }
    function Xoa($makhoa)
    {
        $kq_del = $this->khoa->khoa_del($makhoa);
        if ($kq_del)
            echo "<script>alert('Xóa thành công')</script>";
        else
            echo "<script>alert('Xóa thất bại')</script>";
        $this->view('MasterLayoutAD', [
            'page' => 'Khoa_v',
            'dulieu' => $this->khoa->khoa_find('', '')
        ]);
    }
    function Sua($makhoa)
    {
        $this->view('MasterLayoutAD', [
            'page' => 'Khoa_sua',
            'dulieu' => $this->khoa->khoa_find($makhoa, '')
        ]);
    }
    function Sua_khoa()
    {
        if (isset($_POST['btnLuu'])) {
            $mk = $_POST['txtMakhoa'];
            $tk = $_POST['txtTenkhoa'];
            $kq = $this->khoa->khoa_upd($mk, $tk);
            if ($kq)
                $this->view('MasterLayoutAD', ['page' => 'Khoa_v', 'dulieu' => $this->khoa->khoa_find('', '')]);
        }
        if (isset($_POST['btnHuy'])) {
            $this->view('MasterLayoutAD', ['page' => 'Khoa_v', 'dulieu' => $this->khoa->khoa_find('', '')]);
        }
    }
    function Them()
    {
        $this->view('MasterLayoutAD', ['page' => 'Khoa_them']);
    }
    function Them_khoa()
    {
        if (isset($_POST['btnLuu'])) {
            $mk = $_POST['txtMakhoa'];
            $tk = $_POST['txtTenkhoa'];
            $kq = $this->khoa->khoa_ins($mk, $tk);
            if ($kq)
                echo "<script>alert('Thêm thành công')</script>";
            else
                echo "<script>alert('Thêm thất bại')</script>";
            $this->view('MasterLayoutAD', [
                'page' => 'Khoa_v',
                'dulieu' => $this->khoa->khoa_find('', ''),
            ]);
        }
        if (isset($_POST['btnHuy'])) {
            $this->view('MasterLayoutAD', [
                'page' => 'Khoa_v',
                'dulieu' => $this->khoa->khoa_find('', '')
            ]);
        }
    }
    function ExportExcel()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $data_export = $this->khoa->khoa_find('', '');
        //định dạng cột tiêu đề
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        // căn lề cácc tiêu đề trong các ô
        $sheet->getStyle('A1:C1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        // Tạo tiêu đề
        $sheet
            ->setCellValue('A1', 'STT')
            ->setCellValue('B1', 'Mã khoa')
            ->setCellValue('C1', 'Tên khoa');

        // Ghi dữ liệu
        $rowCount = 2;
        foreach ($data_export as $key => $value) {
            $sheet->setCellValue('A' . $rowCount, $rowCount - 1);
            $sheet->setCellValue('B' . $rowCount, $value['makhoa']);
            $sheet->setCellValue('C' . $rowCount, $value['tenkhoa']);
            //căn lề cho các văn bản trong các ô thuộc mỗi hàng
            $sheet->getStyle('A' . $rowCount . ':C' . $rowCount)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $rowCount++;
        }

        // Xuất file
        $writer = new Xlsx($spreadsheet);
        $writer->setOffice2003Compatibility(true);
        $filename = "DSkhoa" . time() . ".xlsx";
        $writer->save($filename);
        header("location:" . $filename);
        $this->view('MasterLayoutAD', ['page' => 'Khoa_v', 'dulieu' => $this->khoa->khoa_find('', '')]);
    }
    function ImportExcel()
    {
        $this->view('MasterLayoutAD', ['page' => 'Khoa_imp']);

    }
    function khoa_import()
    {
        if (isset($_POST['btnCancel'])) {
            $this->view('MasterLayoutAD', [
                'page' => 'Khoa_v',
                'dulieu' => $this->khoa->khoa_find('', '')
            ]);
        }
        if (isset($_POST['btnImport'])) {
            if (isset($_FILES['fileimport'])) {
                if ($_FILES['fileimport']['error'] > 0) {
                    echo "<script>alert('File Import bị lỗi')</script>";
                    $this->view('MasterLayoutAD', ['page' => 'Nganh_imp']);
                } else {
                    $inputFileName = 'file.xlsx';
                    move_uploaded_file($_FILES['fileimport']['tmp_name'], $inputFileName);
                    $spreadsheet = IOFactory::load($inputFileName);
                    $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
                    $arrayCount = count($sheetData);

                    for ($i = 2; $i < $arrayCount; $i++) {
                        $makhoa = trim($sheetData[$i]["B"]);
                        $tenkhoa = trim($sheetData[$i]["C"]);
                        $kq_import = $this->khoa->khoa_ins($makhoa, $tenkhoa);
                        isset($kq_import);
                    }
                    unlink('file.xlsx');
                    echo "<script>alert('Import file thành công')</script>";
                    $this->view('MasterLayoutAD', [
                        'page' => 'Khoa_v',
                        'dulieu' => $this->khoa->khoa_find('', ''),
                    ]);
                }

            } else {
                echo "<script>alert('Bạn chưa chọn file import')</script>";
            }

        }
    }
}

?>