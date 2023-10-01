<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DanhSachMonHoc extends Controller
{
    protected $monhoc;
    protected $khoa;
    protected $taikhoan;

    function __construct()
    {

        $this->monhoc = $this->mode('Monhoc');
        $this->khoa = $this->mode('Khoa');
        $this->taikhoan = $this->mode('TaiKhoan');
    }
    function Get_data()
    {
        // $tensv = $_POST['txtInfoAcc1'];
        // $masv = $_POST['txtInfoAcc2'];
        // $vaitro = $this->taikhoan->vaitro_check($masv);
        // if ($vaitro == "Sinh viên") {

        //     echo "<script>alert('Chức năng này không dành cho sinh viên')</script>";
        //     $this->view('MasterLayout', [
        //         'page' => 'Home',
        //         'dulieu' => $this->monhoc->monhoc_find('', ''),
        //         'info_ten' => $tensv,
        //         'info' => $masv,
        //         'vaitro' => $vaitro,
        //     ]);
        // }
        $this->view('MasterLayout', [
            'page' => 'Monhoc_v',
            'dulieu' => $this->monhoc->monhoc_find('', '')
        ]);
    }
    function Timkiem()
    {
        if (isset($_POST['btnTimkiem'])) {
            $mm = $_POST['txtMamon'];
            $tm = $_POST['txtTenmon'];
            $this->view('MasterLayout', [
                'page' => 'Monhoc_v',
                'dulieu' => $this->monhoc->monhoc_find($mm, $tm),
                'mm' => $mm,
                'tm' => $tm
            ]);
        }
    }
    function Xoa($mamon)
    {
        $kq_del = $this->monhoc->monhoc_del($mamon);
        if ($kq_del)
            echo "<script>alert('Xóa thành công')</script>";
        else
            echo "<script>alert('Xóa thất bại')</script>";
        $this->view('MasterLayout', [
            'page' => 'Monhoc_v',
            'dulieu' => $this->monhoc->monhoc_find('', '')
        ]);
    }
    function Sua($mamon)
    {
        $this->view('MasterLayout', [
            'page' => 'Monhoc_sua',
            'dulieu' => $this->monhoc->monhoc_find($mamon, ''),
            'data_khoa' => $this->khoa->khoa_find('', '')
        ]);
    }
    function Sua_monhoc()
    {
        if (isset($_POST['btnLuu'])) {
            $mm = $_POST['txtMamon'];
            $tm = $_POST['txtTenmon'];
            $stc = $_POST['txtSotinchi'];
            $mk = $_POST['txtMakhoa'];
            $k = $_POST['txtKi'];
            $gv = $_POST['txtGiangvien'];
            $dcc = $_POST['txtDiemcc'];
            $dtl_th = $_POST['txtDiemtl_th'];
            $dgk = $_POST['txtDiemgk'];
            $dck = $_POST['txtDiemck'];
            if ($mm == "" || $tm == "" || $stc == "" || $mk == "" || $gv == "" || $k == "") {
                echo "<script>alert('Vui lòng nhập đủ thông tin')</script>";
                $this->view('MasterLayout', [
                    'page' => 'Monhoc_sua',
                    'dulieu' => $this->monhoc->monhoc_find($mm, ''),
                    'data_khoa' => $this->khoa->khoa_find('', '')
                ]);
            } else {
                if ($dcc == "") {
                    $dcc = 0;
                }
                if ($dtl_th == "") {
                    $dtl_th = 0;
                }
                if ($dgk == "") {
                    $dgk = 0;
                }
                if ($dck == "") {
                    $dck = 0;
                }
                if ($dcc + $dtl_th + $dgk + $dck != 100) {
                    echo "<script>alert('Tổng tỉ lệ điểm phải là 100')</script>";
                    $this->view('MasterLayout', [
                        'page' => 'Monhoc_them',
                        'dulieu' => $this->monhoc->monhoc_find($mm, ''),
                        'data_khoa' => $this->khoa->khoa_find('', '')
                    ]);
                } else {
                    $pttd = $dcc . '/' . $dtl_th . '/' . $dgk . '/' . $dck;
                    $kq = $this->monhoc->monhoc_upd($mm, $tm, $stc, $mk, $k, $gv, $pttd);
                    if ($kq)
                        echo "<script>alert('Sửa thành công')</script>";
                    else
                        echo "<script>alert('Sửa thất bại')</script>";
                    $this->view('MasterLayout', [
                        'page' => 'Monhoc_v',
                        'dulieu' => $this->monhoc->monhoc_find('', ''),
                    ]);

                }

            }

        }
    }
    function Them()
    {
        $this->view('MasterLayout', ['page' => 'Monhoc_them', 'data_khoa' => $this->khoa->khoa_find('', '')]);
    }
    function Them_monhoc()
    {
        if (isset($_POST['btnLuu'])) {
            $mm = $_POST['txtMamon'];
            $tm = $_POST['txtTenmon'];
            $stc = $_POST['txtSotinchi'];
            $mk = $_POST['txtMakhoa'];
            $k = $_POST['txtKi'];
            $gv = $_POST['txtGiangvien'];
            $dcc = $_POST['txtDiemcc'];
            $dtl_th = $_POST['txtDiemtl_th'];
            $dgk = $_POST['txtDiemgk'];
            $dck = $_POST['txtDiemck'];
            if ($mm == "" || $tm == "" || $stc == "" || $mk == "" || $gv == "" || $k == "") {
                echo "<script>alert('Vui lòng nhập đủ thông tin')</script>";
                $this->view('MasterLayout', [
                    'page' => 'Monhoc_them',
                    'data_khoa' => $this->khoa->khoa_find('', ''),
                    'mm' => $mm,
                    'tm' => $tm,
                    'stc' => $stc,
                    'mk' => $mk,
                    'k' => $k,
                    'gv' => $gv,
                    'dcc' => $dcc,
                    'dtl_th' => $dtl_th,
                    'dgk' => $dgk,
                    'dck' => $dck
                ]);
            } else {
                if ($dcc == "") {
                    $dcc = 0;
                }
                if ($dtl_th == "") {
                    $dtl_th = 0;
                }
                if ($dgk == "") {
                    $dgk = 0;
                }
                if ($dck == "") {
                    $dck = 0;
                }
                if ($dcc + $dtl_th + $dgk + $dck != 100) {
                    echo "<script>alert('Tổng tỉ lệ điểm phải là 100')</script>";
                    $this->view('MasterLayout', [
                        'page' => 'Monhoc_them',
                        'data_khoa' => $this->khoa->khoa_find('', ''),
                        'mm' => $mm,
                        'tm' => $tm,
                        'stc' => $stc,
                        'mk' => $mk,
                        'k' => $k,
                        'gv' => $gv,
                        'dcc' => $dcc,
                        'dtl_th' => $dtl_th,
                        'dgk' => $dgk,
                        'dck' => $dck
                    ]);
                } else {
                    $check_mamon = $this->monhoc->mamon_check($mm);
                    if ($check_mamon) {
                        echo "<script>alert('Mã môn đã tồn tại')</script>";
                        $this->view('MasterLayout', [
                            'page' => 'Monhoc_them',
                            'dulieu' => $this->monhoc->monhoc_find($mm, ''),
                            'data_khoa' => $this->khoa->khoa_find('', ''),
                            'mm' => $mm,
                            'tm' => $tm,
                            'stc' => $stc,
                            'mk' => $mk,
                            'k' => $k,
                            'gv' => $gv,
                            'dcc' => $dcc,
                            'dtl_th' => $dtl_th,
                            'dgk' => $dgk,
                            'dck' => $dck
                        ]);
                    } else {
                        $pttd = $dcc . '/' . $dtl_th . '/' . $dgk . '/' . $dck;
                        $kq = $this->monhoc->monhoc_ins($mm, $tm, $stc, $mk, $k, $gv, $pttd);
                        if ($kq)
                            echo "<script>alert('Thêm thành công')</script>";
                        else
                            echo "<script>alert('Thêm thất bại')</script>";
                        $this->view('MasterLayout', [
                            'page' => 'Monhoc_v',
                            'dulieu' => $this->monhoc->monhoc_find('', ''),
                        ]);
                    }
                }

            }

        }
    }
    function ExportExcel()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $mm = $_POST['txtMamon'];
        $tm = $_POST['txtTenmon'];
        $data_export = $this->monhoc->monhoc_find($mm, $tm);
        //định dạng cột tiêu đề
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->getColumnDimension('H')->setAutoSize(true);
        // căn lề cácc tiêu đề trong các ô
        $sheet->getStyle('A1:H1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        // Tạo tiêu đề
        $sheet
            ->setCellValue('A1', 'STT')
            ->setCellValue('B1', 'Mã môn')
            ->setCellValue('C1', 'Tên môn')
            ->setCellValue('D1', 'Số tín chỉ')
            ->setCellValue('E1', 'Mã khoa')
            ->setCellValue('F1', 'Kì')
            ->setCellValue('G1', 'Giảng viên')
            ->setCellValue('H1', 'CT tính điểm');

        // Ghi dữ liệu
        $rowCount = 2;
        foreach ($data_export as $key => $value) {
            $sheet->setCellValue('A' . $rowCount, $rowCount - 1);
            $sheet->setCellValue('B' . $rowCount, $value['mamon']);
            $sheet->setCellValue('C' . $rowCount, $value['tenmon']);
            $sheet->setCellValue('D' . $rowCount, $value['sotinchi']);
            $sheet->setCellValue('E' . $rowCount, $value['makhoa']);
            $sheet->setCellValue('F' . $rowCount, $value['ki']);
            $sheet->setCellValue('G' . $rowCount, $value['giangvien']);
            $sheet->setCellValue('H' . $rowCount, $value['phuongthuctinhdiem']);
            //căn lề cho các văn bản trong các ô thuộc mỗi hàng
            $sheet->getStyle('A' . $rowCount . ':H' . $rowCount)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $rowCount++;
        }

        // Xuất file
        $writer = new Xlsx($spreadsheet);
        $writer->setOffice2003Compatibility(true);
        $filename = "DSmonhoc" . time() . ".xlsx";
        $writer->save($filename);
        header("location:" . $filename);
        $this->view('MasterLayout', ['page' => 'Monhoc_v', 'dulieu' => $this->monhoc->monhoc_find('', '')]);
    }
    function ImportExcel()
    {
        $this->view('MasterLayout', ['page' => 'Monhoc_imp']);

    }
    function monhoc_import()
    {
        if (isset($_POST['btnCancel'])) {
            $this->view('MasterLayout', [
                'page' => 'Monhoc_v',
                'dulieu' => $this->monhoc->monhoc_find('', '')
            ]);
        }
        if (isset($_POST['btnImport'])) {
            if (isset($_FILES['fileimport'])) {
                if ($_FILES['fileimport']['error'] > 0) {
                    echo "<script>alert('File Import bị lỗi')</script>";
                    $this->view('MasterLayout', ['page' => 'Monhoc_imp']);
                } else {
                    $inputFileName = 'file.xlsx';
                    move_uploaded_file($_FILES['fileimport']['tmp_name'], $inputFileName);
                    $spreadsheet = IOFactory::load($inputFileName);
                    $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
                    $arrayCount = count($sheetData);

                    for ($i = 2; $i < $arrayCount; $i++) {
                        $mamon = trim($sheetData[$i]["B"]);
                        $tenmon = trim($sheetData[$i]["C"]);
                        $sotinchi = trim($sheetData[$i]["D"]);
                        $makhoa = trim($sheetData[$i]["E"]);
                        $ki = trim($sheetData[$i]["F"]);
                        $giangvien = trim($sheetData[$i]["G"]);
                        $pttd = trim($sheetData[$i]["H"]);
                        $kq_import = $this->monhoc->monhoc_ins($mamon, $tenmon, $sotinchi, $makhoa, $ki, $giangvien, $pttd);
                        isset($kq_import);
                    }
                    unlink('file.xlsx');
                    echo "<script>alert('Import file thành công')</script>";
                    $this->view('MasterLayout', [
                        'page' => 'Monhoc_v',
                        'dulieu' => $this->monhoc->monhoc_find('', ''),
                    ]);
                }

            } else {
                echo "<script>alert('Bạn chưa chọn file import')</script>";
            }

        }
    }
}
?>