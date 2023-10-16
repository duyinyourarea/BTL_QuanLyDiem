<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class DanhSachNganh extends Controller
{
    protected $nganh;
    protected $khoa;
    function __construct()
    {
        $this->nganh = $this->mode('Nganh');
        $this->khoa = $this->mode('Khoa');
    }
    function Get_data()
    {
        $this->view('MasterLayoutAD', [
            'page' => 'Nganh_v',
            'dulieu' => $this->nganh->nganh_find('', '')
        ]);
    }
    function Timkiem()
    {
        if (isset($_POST['btnTimkiem'])) {
            $mn = $_POST['txtManganh'];
            $tn = $_POST['txtTennganh'];
            $mk = $_POST['txtMakhoa'];
            $this->view('MasterLayoutAD', [
                'page' => 'Nganh_v',
                'dulieu' => $this->nganh->nganh_find($mn, $tn, $mk),
                'mn' => $mn,
                'tn' => $tn,
                'mk' => $mk
            ]);
        }
    }
    function Xoa($manganh)
    {
        $kq_del = $this->nganh->nganh_del($manganh);
        if ($kq_del)
            echo "<script>alert('Xóa thành công')</script>";
        else
            echo "<script>alert('Xóa thất bại')</script>";
        $this->view('MasterLayoutAD', [
            'page' => 'Nganh_v',
            'dulieu' => $this->nganh->nganh_find('', '')
        ]);
    }
    function Sua($manganh)
    {
        $this->view('MasterLayoutAD', [
            'page' => 'Nganh_sua',
            'dulieu' => $this->nganh->nganh_find($manganh, ''),
            'data_khoa' => $this->khoa->khoa_find('','')
        ]);
    }
    function Sua_nganh()
    {
        if (isset($_POST['btnLuu'])) {
            $mn = $_POST['txtManganh'];
            $tn = $_POST['txtTennganh'];
            $mk = $_POST['txtMakhoa'];
            $kq = $this->nganh->nganh_upd($mn, $tn, $mk);
            if ($kq)
                $this->view('MasterLayoutAD', [
                    'page' => 'Nganh_v',
                    'dulieu' => $this->nganh->nganh_find('', ''),
                ]);
        }
        if (isset($_POST['btnHuy'])) {
            $this->view('MasterLayoutAD', [
                'page' => 'Nganh_v',
                'dulieu' => $this->nganh->nganh_find('', '')
            ]);
        }
    }
    function Them()
    {
        $this->view('MasterLayoutAD', ['page' => 'Nganh_them', 'data_khoa' => $this->khoa->khoa_find('', '')]);
    }
    function Them_nganh()
    {
        if (isset($_POST['btnLuu'])) {
            $mn = $_POST['txtManganh'];
            $tn = $_POST['txtTennganh'];
            $mk = $_POST['txtMakhoa'];
            $kq = $this->nganh->nganh_ins($mn, $tn, $mk);
            if ($kq)
                echo "<script>alert('Thêm thành công')</script>";
            else
                echo "<script>alert('Thêm thất bại')</script>";
            $this->view('MasterLayoutAD', [
                'page' => 'Nganh_v',
                'dulieu' => $this->nganh->nganh_find('', ''),
            ]);
        }
        if (isset($_POST['btnHuy'])) {
            $this->view('MasterLayoutAD', [
                'page' => 'Nganh_v',
                'dulieu' => $this->nganh->nganh_find('', '')
            ]);
        }
    }
    function ExportExcel()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $data_export = $this->nganh->nganh_find('', '');
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
            ->setCellValue('B1', 'Mã ngành')
            ->setCellValue('C1', 'Tên ngành')
            ->setCellValue('D1', 'Mã khoa');

        // Ghi dữ liệu
        $rowCount = 2;
        foreach ($data_export as $key => $value) {
            $sheet->setCellValue('A' . $rowCount, $rowCount - 1);
            $sheet->setCellValue('B' . $rowCount, $value['manganh']);
            $sheet->setCellValue('C' . $rowCount, $value['tennganh']);
            $sheet->setCellValue('D' . $rowCount, $value['makhoa']);
            //căn lề cho các văn bản trong các ô thuộc mỗi hàng
            $sheet->getStyle('A' . $rowCount . ':D' . $rowCount)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $rowCount++;
        }

        // Xuất file
        $writer = new Xlsx($spreadsheet);
        $writer->setOffice2003Compatibility(true);
        $filename = "DSnganh" . time() . ".xlsx";
        $writer->save($filename);
        header("location:" . $filename);
        $this->view('MasterLayoutAD', ['page' => 'Nganh_v', 'dulieu' => $this->nganh->nganh_find('', '')]);
    }
    function ImportExcel()
    {
        $this->view('MasterLayoutAD', ['page' => 'Nganh_imp']);

    }
    function nganh_import()
    {
        if (isset($_POST['btnCancel'])) {
            $this->view('MasterLayoutAD', [
                'page' => 'Nganh_v',
                'dulieu' => $this->nganh->nganh_find('', '')
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

                    for ($i = 2; $i <= $arrayCount; $i++) {
                        $manganh = trim($sheetData[$i]["B"]);
                        $tennganh = trim($sheetData[$i]["C"]);
                        $makhoa = trim($sheetData[$i]["D"]);
                        $kq_import = $this->nganh->nganh_ins($manganh, $tennganh, $makhoa);
                        if($kq_import);
                    }
                    unlink('file.xlsx');
                    echo "<script>alert('Import file thành công')</script>";
                    $this->view('MasterLayoutAD', [
                        'page' => 'Nganh_v',
                        'dulieu' => $this->nganh->nganh_find('', ''),
                    ]);
                }

            } else {
                echo "<script>alert('Bạn chưa chọn file import')</script>";
            }

        }
    }
}

?>