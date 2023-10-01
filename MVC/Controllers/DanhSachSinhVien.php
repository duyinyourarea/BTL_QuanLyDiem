<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DanhSachSinhVien extends Controller
{
    protected $sinhvien;
    protected $malop;
    protected $taikhoan;
    function __construct()
    {
        $this->sinhvien = $this->mode('SinhVien');
        $this->malop = $this->mode('Lop');
        $this->taikhoan = $this->mode('TaiKhoan');
    }
    function Get_data()
    {
        $taikhoan = $_POST['txtInfoAcc'];
        $vaitro = '';
        $data_acc = $this->taikhoan->getDataAcc($taikhoan);
        $vaitro = $data_acc['vaitro'];
        $this->view('MasterLayout', [
            'page' => 'Sinhvien_v',
            'dulieu' => $this->sinhvien->sinhvien_find('', '', ''),
            'info' => $taikhoan,
            'vaitro' => $vaitro
        ]);
    }
    function Timkiem()
    {
        if (isset($_POST['btnTimkiem'])) {
            //
            $taikhoan = $_POST['txtInfoAcc'];
            $vaitro = '';
            $data_acc = $this->taikhoan->getDataAcc($taikhoan);
            $vaitro = $data_acc['vaitro'];
            //
            $masinhvien = $_POST['txtMasinhvien'];
            $tensinhvien = $_POST['txtTensinhvien'];
            $this->view('MasterLayout', [
                'page' => 'Sinhvien_v',
                'dulieu' => $this->sinhvien->sinhvien_find($masinhvien, $tensinhvien, ''),
                'masinhvien' => $masinhvien,
                'tensinhvien' => $tensinhvien,
                'info' => $taikhoan,
                'vaitro' => $vaitro
            ]);
        }
    }
    function Xoa($masinhvien)
    {
        
        //
        $taikhoan = $_POST['txtInfoAcc'];
        // $taikhoan = $arr[1];
        $vaitro = '';
        $data_acc = $this->taikhoan->getDataAcc($taikhoan);
        $vaitro = $data_acc['vaitro'];
        //
        $kq_del = $this->sinhvien->sinhvien_del($masinhvien);
        $kq_taikhoan_del = $this->taikhoan->taikhoan_del($masinhvien);
        if ($kq_del && $kq_taikhoan_del)
            echo "<script>alert('Xóa thành công')</script>";
        else
            echo "<script>alert('Xóa thất bại')</script>";
        $this->view('MasterLayout', [
            'page' => 'Sinhvien_v',
            'dulieu' => $this->sinhvien->sinhvien_find('', '', ''),
            'info' => $taikhoan,
            'vaitro' => $vaitro
        ]);
    }
    function Sua($masinhvien)
    {
        $taikhoan = $_POST['txtInfoAcc'];
        $vaitro = '';
        $data_acc = $this->taikhoan->getDataAcc($taikhoan);
        $vaitro = $data_acc['vaitro'];
        $this->view('MasterLayout', [
            'page' => 'Sinhvien_sua',
            'dulieu' => $this->sinhvien->sinhvien_find($masinhvien, '', ''),
            'dulieu_malop' => $this->malop->lop_find('', ''),
            'info' => $taikhoan,
            'vaitro' => $vaitro
        ]);
    }
    function Sua_sinhvien()
    {
        //
        $taikhoan = $_POST['txtInfoAcc'];
        $vaitro = '';
        $data_acc = $this->taikhoan->getDataAcc($taikhoan);
        $vaitro = $data_acc['vaitro'];
        if (isset($_POST['btnLuu'])) {

            //
            $masinhvien = $_POST['txtMasinhvien'];
            $tensinhvien = $_POST['txtTensinhvien'];
            $gioitinh = $_POST['txtGioitinh'];
            $sodienthoai = $_POST['txtSodienthoai'];
            $email = $_POST['txtEmail'];
            $malop = $_POST['cbMalop'];
            $ck_siso = $this->malop->malop_check($malop);
            if ($tensinhvien == '' || $gioitinh == '' || $sodienthoai == '' || $email == '' || $malop == 'Chọn lớp') {
                echo "<script>alert('Vui lòng nhập đủ thông tin!')</script>";
                $this->view('MasterLayout', [
                    'page' => 'Sinhvien_sua',
                    'dulieu' => $this->sinhvien->sinhvien_find($masinhvien, '', ''),
                    'dulieu_malop' => $this->malop->lop_find('', ''),
                    'tensinhvien' => $tensinhvien,
                    'gioitinh' => $gioitinh,
                    'sodienthoai' => $sodienthoai,
                    'email' => $email,
                    'malop' => $malop,
                    'info' => $taikhoan,
                    'vaitro' => $vaitro

                ]);
            } else {
                if ($ck_siso) {
                    $kq_lop = $this->malop->add_sinhvien($malop);
                }

                $kq = $this->sinhvien->sinhvien_upd($masinhvien, $tensinhvien, $gioitinh, $sodienthoai, $email, $malop);

                if ($kq) {
                    echo "<script>alert('Sửa thành công!')</script>";
                } else {
                    echo "<script>alert('Sửa thất bại!')</script>";
                }
                $this->view('MasterLayout', [
                    'page' => 'Sinhvien_v',
                    'dulieu' => $this->sinhvien->sinhvien_find('', '', ''),
                    'info' => $taikhoan,
                    'vaitro' => $vaitro
                ]);
            }
        }
        if (isset($_POST['btnHuy'])) {
            $this->view('MasterLayout', [
                'page' => 'Sinhvien_v',
                'dulieu' => $this->sinhvien->sinhvien_find('', '', ''),
                'info' => $taikhoan,
                'vaitro' => $vaitro
            ]);
        }
    }
    function Them_sinhvien()
    {
        //
        $taikhoan = $_POST['txtInfoAcc'];
        $vaitro = '';
        $data_acc = $this->taikhoan->getDataAcc($taikhoan);
        $vaitro = $data_acc['vaitro'];
        if (isset($_POST['btnLuu'])) {

            //Lấy dữ liệu trên các control của form thêm sinh viên
            $masinhvien = $_POST['txtMasinhvien'];
            $tensinhvien = $_POST['txtTensinhvien'];
            $gioitinh = $_POST['txtGioitinh'];
            $sodienthoai = $_POST['txtSodienthoai'];
            $email = $_POST['txtEmail'];
            $malop = $_POST['cbMalop'];
            //Gán dữ liệu cho tài khoản sinh viên
            $ck = $this->sinhvien->masinhvien_check($masinhvien);
            if ($masinhvien == '' || $tensinhvien == '' || $gioitinh == '' || $sodienthoai == '' || $email == '' || $malop == 'Chọn lớp') {
                echo "<script>alert('Vui lòng nhập đủ thông tin!')</script>";
                $this->view('MasterLayout', [
                    'page' => 'Sinhvien_them',
                    'dulieu_malop' => $this->malop->lop_find('', ''),
                    'masinhvien' => $masinhvien,
                    'tensinhvien' => $tensinhvien,
                    'gioitinh' => $gioitinh,
                    'sodienthoai' => $sodienthoai,
                    'email' => $email,
                    'malop' => $malop,
                    'info' => $taikhoan,
                    'vaitro' => $vaitro
                ]);
            } else {
                if ($ck) {
                    echo "<script>alert('Mã sinh viên đã tồn tại!')</script>";
                    $this->view(
                        'MasterLayout',
                        [
                            'page' => 'Sinhvien_them',
                            'dulieu_malop' => $this->malop->lop_find('', ''),
                            'masinhvien' => $masinhvien,
                            'tensinhvien' => $tensinhvien,
                            'gioitinh' => $gioitinh,
                            'sodienthoai' => $sodienthoai,
                            'email' => $email,
                            'malop' => $malop,
                            'info' => $taikhoan,
                            'vaitro' => $vaitro
                        ]
                    );
                } else {
                    $kq = $this->sinhvien->sinhvien_ins($masinhvien, $tensinhvien, $gioitinh, $sodienthoai, $email, $malop);
                    $kq_taikhoan = $this->taikhoan->taikhoan_ins($masinhvien, $sodienthoai, 'Sinh viên');
                    if ($kq)
                        echo "<script>alert('Thêm mới thành công!')</script>";
                    else
                        echo "<script>alert('Thêm mới thất bại!')</script>";
                    //gọi lại giao diện ra
                    $this->view('MasterLayout', [
                        'page' => 'Sinhvien_v',
                        'dulieu' => $this->sinhvien->sinhvien_find('', '', ''),
                        'info' => $taikhoan,
                        'vaitro' => $vaitro
                    ]);
                }
            }
        }
        if (isset($_POST['btnHuy'])) {
            $this->view('MasterLayout', [
                'page' => 'Sinhvien_v',
                'dulieu' => $this->sinhvien->sinhvien_find('', '', ''),
                'info' => $taikhoan,
                'vaitro' => $vaitro
            ]);
        }
    }
    function Them($taikhoan)
    {
        //
        // $taikhoan = $_POST['txtInfoAcc'];
        $vaitro = '';
        $data_acc = $this->taikhoan->getDataAcc($taikhoan);
        $vaitro = $data_acc['vaitro'];
        $this->view('MasterLayout', [
            'page' => 'Sinhvien_them',
            'dulieu_malop' => $this->malop->lop_find('', ''),
            'info' => $taikhoan,
            'vaitro' => $vaitro
        ]);
    }

    function ExportExcel($taikhoan)
    {
        //
        // $taikhoan = $_POST['txtInfoAcc'];
        $vaitro = '';
        $data_acc = $this->taikhoan->getDataAcc($taikhoan);
        $vaitro = $data_acc['vaitro'];
        //
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $data_export = $this->sinhvien->sinhvien_find('', '', '');
        //định dạng cột tiêu đề
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);
        // căn lề cácc tiêu đề trong các ô
        $sheet->getStyle('A1:G1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        // Tạo tiêu đề
        $sheet
            ->setCellValue('A1', 'STT')
            ->setCellValue('B1', 'Mã sinh viên')
            ->setCellValue('C1', 'Tên sinh viên')
            ->setCellValue('D1', 'Giới tính')
            ->setCellValue('E1', 'Số điện thoại')
            ->setCellValue('F1', 'Email')
            ->setCellValue('G1', 'Mã lớp');

        // Ghi dữ liệu
        $rowCount = 2;
        foreach ($data_export as $key => $value) {
            $sheet->setCellValue('A' . $rowCount, $rowCount - 1);
            $sheet->setCellValue('B' . $rowCount, $value['masinhvien']);
            $sheet->setCellValue('C' . $rowCount, $value['tensinhvien']);
            $sheet->setCellValue('D' . $rowCount, $value['gioitinh']);
            $sheet->setCellValue('E' . $rowCount, $value['sodienthoai']);
            $sheet->setCellValue('F' . $rowCount, $value['email']);
            $sheet->setCellValue('G' . $rowCount, $value['malop']);
            //căn lề cho các văn bản trong các ô thuộc mỗi hàng
            $sheet->getStyle('A' . $rowCount . ':G' . $rowCount)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $rowCount++;
        }

        // Xuất file
        $writer = new Xlsx($spreadsheet);
        $writer->setOffice2003Compatibility(true);
        $filename = "DSsinhvien" . time() . ".xlsx";
        $writer->save($filename);
        // header("location:" . $filename);
        $this->view('MasterLayout', [
            'page' => 'Sinhvien_v',
            'dulieu' => $this->sinhvien->sinhvien_find('', '', ''),
            'info' => $taikhoan,
            'vaitro' => $vaitro
        ]);
    }

    function ImportExcel($taikhoan)
    {
        //
        // $taikhoan = $_POST['txtInfoAcc'];
        $vaitro = '';
        $data_acc = $this->taikhoan->getDataAcc($taikhoan);
        $vaitro = $data_acc['vaitro'];
        $this->view('MasterLayout', [
            'page' => 'Sinhvien_imp',
            'info' => $taikhoan,
            'vaitro' => $vaitro
        ]);

    }
    function sinhvien_import()
    {
        //
        $taikhoan = $_POST['txtInfoAcc'];
        $vaitro = '';
        $data_acc = $this->taikhoan->getDataAcc($taikhoan);
        $vaitro = $data_acc['vaitro'];
        if (isset($_POST['btnCancel'])) {
            $this->view('MasterLayout', [
                'page' => 'Sinhvien_v',
                'dulieu' => $this->sinhvien->sinhvien_find('', '', ''),
                'info' => $taikhoan,
                'vaitro' => $vaitro
            ]);
        }
        if (isset($_POST['btnImport'])) {
            if (isset($_FILES['fileimport'])) {
                if ($_FILES['fileimport']['error'] > 0) {
                    echo "<script>alert('File Import bị lỗi')</script>";
                    $this->view('MasterLayout', [
                        'page' => 'Sinhvien_imp',
                        'info' => $taikhoan,
                        'vaitro' => $vaitro
                    ]);
                } else {
                    $inputFileName = 'file.xlsx';
                    move_uploaded_file($_FILES['fileimport']['tmp_name'], $inputFileName);
                    $spreadsheet = IOFactory::load($inputFileName);
                    $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
                    $arrayCount = count($sheetData);

                    for ($i = 2; $i < $arrayCount; $i++) {
                        $masinhvien = trim($sheetData[$i]["B"]);
                        $tensinhvien = trim($sheetData[$i]["C"]);
                        $gioitinh = trim($sheetData[$i]["D"]);
                        $sodienthoai = trim($sheetData[$i]["E"]);
                        $email = trim($sheetData[$i]["F"]);
                        $malop = trim($sheetData[$i]["G"]);
                        $kq_import = $this->sinhvien->sinhvien_ins($masinhvien, $tensinhvien, $gioitinh, $sodienthoai, $email, $malop);
                        isset($kq_import);
                    }
                    unlink('file.xlsx');
                    echo "<script>alert('Import file thành công')</script>";
                    $this->view('MasterLayout', [
                        'page' => 'Sinhvien_v',
                        'dulieu' => $this->sinhvien->sinhvien_find('', '', ''),
                        'info' => $taikhoan,
                        'vaitro' => $vaitro
                    ]);
                }

            } else {
                echo "<script>alert('Bạn chưa chọn file import')</script>";
            }

        }
    }
}