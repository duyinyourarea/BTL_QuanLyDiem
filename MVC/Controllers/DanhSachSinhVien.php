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
    protected $nganh;
    protected $monhoc;
    protected $nhapdiem;
    function __construct()
    {
        $this->sinhvien = $this->mode('SinhVien');
        $this->malop = $this->mode('Lop');
        $this->taikhoan = $this->mode('TaiKhoan');
        $this->nganh = $this->mode('Nganh');
        $this->monhoc = $this->mode('Monhoc');
        $this->nhapdiem = $this->mode('Nhapdiem');
    }
    function Get_data()
    {
        $this->view('MasterLayoutAD', [
            'page' => 'Sinhvien_v',
            'dulieu' => $this->sinhvien->sinhvien_find('', '', ''),
        ]);
    }
    function Timkiem()
    {
        if (isset($_POST['btnTimkiem'])) {
            $masinhvien = $_POST['txtMasinhvien'];
            $tensinhvien = $_POST['txtTensinhvien'];
            $this->view('MasterLayoutAD', [
                'page' => 'Sinhvien_v',
                'dulieu' => $this->sinhvien->sinhvien_find($masinhvien, $tensinhvien, ''),
                'masinhvien' => $masinhvien,
                'tensinhvien' => $tensinhvien,

            ]);
        }
    }
    function Xoa($masinhvien)
    {
        $row_sinhvien_malop = $this->sinhvien->getData($masinhvien);
        $malop = $row_sinhvien_malop['malop'];
        $kq_del_siso = $this->malop->del_sinhvien($malop);
        $kq_del = $this->sinhvien->sinhvien_del($masinhvien);
        $kq_taikhoan_del = $this->taikhoan->taikhoan_del($masinhvien);
        //xoa du lieu trong bang diemsinhvien va diemmonhoc
        $kq_dmh_del = $this->nhapdiem->diemmonhoc_del($masinhvien);
        $kq_dsv_del = $this->nhapdiem->diemsinhvien_del($masinhvien);
        if ($kq_del && $kq_taikhoan_del && $kq_del_siso && $kq_dmh_del && $kq_dsv_del)
            echo "<script>alert('Xóa thành công')</script>";
        else
            echo "<script>alert('Xóa thất bại')</script>";
        $this->view('MasterLayoutAD', [

            'page' => 'Sinhvien_v',
            'dulieu' => $this->sinhvien->sinhvien_find('', '', ''),

        ]);
    }
    function Sua($masinhvien)
    {

        $this->view('MasterLayoutAD', [
            'page' => 'Sinhvien_sua',
            'dulieu' => $this->sinhvien->sinhvien_find($masinhvien, '', ''),
            'dulieu_malop' => $this->malop->lop_find('', ''),
        ]);
    }
    function Sua_sinhvien()
    {
        $masinhvien = $_POST['txtMasinhvien'];
        $sql_sinhvien_malop_old = $this->sinhvien->sinhvien_find($masinhvien, '', '');
        $row_malop_old = mysqli_fetch_assoc($sql_sinhvien_malop_old);
        $malop_old = $row_malop_old['malop'];
        if (isset($_POST['btnLuu'])) {
            $tensinhvien = $_POST['txtTensinhvien'];
            $gioitinh = $_POST['txtGioitinh'];
            $sodienthoai = $_POST['txtSodienthoai'];
            $email = $_POST['txtEmail'];
            $malop = $_POST['cbMalop'];
            if ($tensinhvien == '' || $gioitinh == '' || $sodienthoai == '' || $email == '' || $malop == 'Chọn lớp') {
                echo "<script>alert('Vui lòng nhập đủ thông tin!')</script>";
                $this->view('MasterLayoutAD', [
                    'page' => 'Sinhvien_sua',
                    'dulieu' => $this->sinhvien->sinhvien_find($masinhvien, '', ''),
                    'dulieu_malop' => $this->malop->lop_find('', ''),
                    'tensinhvien' => $tensinhvien,
                    'gioitinh' => $gioitinh,
                    'sodienthoai' => $sodienthoai,
                    'email' => $email,
                    'malop' => $malop,

                ]);
            } else {
                if ($malop != $malop_old) {
                    $kq_del_siso = $this->malop->del_sinhvien($malop_old);
                    $kq_add_siso = $this->malop->add_sinhvien($malop);
                }
                $kq = $this->sinhvien->sinhvien_upd($masinhvien, $tensinhvien, $gioitinh, $sodienthoai, $email, $malop);
                if ($kq || $kq_del_siso || $kq_add_siso) {
                    echo "<script>alert('Sửa thành công!')</script>";
                } else {
                    echo "<script>alert('Sửa thất bại!')</script>";
                }
                $this->view('MasterLayoutAD', [

                    'page' => 'Sinhvien_v',
                    'dulieu' => $this->sinhvien->sinhvien_find('', '', ''),

                ]);
            }
        }
        if (isset($_POST['btnHuy'])) {
            $this->view('MasterLayoutAD', [

                'page' => 'Sinhvien_v',
                'dulieu' => $this->sinhvien->sinhvien_find('', '', ''),

            ]);
        }
    }
    function Them_sinhvien()
    {

        if (isset($_POST['btnLuu'])) {
            //Lấy dữ liệu trên các control của form thêm sinh viên
            $masinhvien = $_POST['txtMasinhvien'];
            $tensinhvien = $_POST['txtTensinhvien'];
            $gioitinh = $_POST['txtGioitinh'];
            $sodienthoai = $_POST['txtSodienthoai'];
            $email = $_POST['txtEmail'];
            $malop = $_POST['cbMalop'];
            //Thêm thông tin các môn sv phải học 
            //lấy mã ngành
            if ($malop != "") {
                $data_nganh = $this->sinhvien->getMaNganhFromMaLop($malop);
                $manganh = $data_nganh['manganh'];
                // lấy danh sách các môn thuộc ngành
                $ds_monhoc = $this->monhoc->monhoc_findByNganh($manganh);
                //Thêm thông tin vào bảng điểm môn học với trang trạng thái Đang học 
                foreach ($ds_monhoc as $key) {
                    $dmh_id_new = $this->nhapdiem->dmh_id_creat();
                    $kq_dmh_ins = $this->nhapdiem->diemmonhoc_ins($dmh_id_new, 0, 'Đang học', $masinhvien, $key[0]);
                    if ($kq_dmh_ins)
                        ;
                }
                //Thêm thông tin điểm tb theo kì của sinh viên
                // lấy danh sách các kì của các môn trong ngành 
                $ds_ki = $this->monhoc->ki_findByNganh($manganh);
                foreach ($ds_ki as $key) {
                    $dsv_id_new = $this->nhapdiem->dsv_id_creat();
                    $kq_dsv_ins = $this->nhapdiem->diemsinhvien_ins($dsv_id_new, $masinhvien, $key[0]);
                    if ($kq_dsv_ins)
                        ;
                }
            }
            //Gán dữ liệu cho tài khoản sinh viên
            $ck = $this->sinhvien->masinhvien_check($masinhvien);
            if ($masinhvien == '' || $tensinhvien == '' || $gioitinh == '' || $sodienthoai == '' || $email == '' || $malop == 'Chọn lớp') {
                echo "<script>alert('Vui lòng nhập đủ thông tin!')</script>";
                $this->view('MasterLayoutAD', [

                    'page' => 'Sinhvien_them',
                    'dulieu_malop' => $this->malop->lop_find('', ''),
                    'masinhvien' => $masinhvien,
                    'tensinhvien' => $tensinhvien,
                    'gioitinh' => $gioitinh,
                    'sodienthoai' => $sodienthoai,
                    'email' => $email,
                    'malop' => $malop,


                ]);
            } else {
                if ($ck) {
                    echo "<script>alert('Mã sinh viên đã tồn tại!')</script>";
                    $this->view(
                        'MasterLayoutAD',
                        [

                            'page' => 'Sinhvien_them',
                            'dulieu_malop' => $this->malop->lop_find('', ''),
                            'masinhvien' => $masinhvien,
                            'tensinhvien' => $tensinhvien,
                            'gioitinh' => $gioitinh,
                            'sodienthoai' => $sodienthoai,
                            'email' => $email,
                            'malop' => $malop,


                        ]
                    );
                } else {
                    $kq = $this->sinhvien->sinhvien_ins($masinhvien, $tensinhvien, $gioitinh, $sodienthoai, $email, $malop);
                    $kq_taikhoan = $this->taikhoan->taikhoan_ins($masinhvien, $sodienthoai, 'Sinh viên');
                    $kq_siso = $this->malop->add_sinhvien($malop);
                    if ($kq && $kq_siso && $kq_taikhoan)
                        echo "<script>alert('Thêm mới thành công!')</script>";
                    else
                        echo "<script>alert('Thêm mới thất bại!')</script>";
                    //gọi lại giao diện ra
                    $this->view('MasterLayoutAD', [
                        'page' => 'Sinhvien_v',
                        'dulieu' => $this->sinhvien->sinhvien_find('', '', ''),
                    ]);
                }
            }
        }
        if (isset($_POST['btnHuy'])) {
            $this->view('MasterLayoutAD', [

                'page' => 'Sinhvien_v',
                'dulieu' => $this->sinhvien->sinhvien_find('', '', ''),

            ]);
        }
    }
    function Them()
    {

        $this->view('MasterLayoutAD', [
            'page' => 'Sinhvien_them',
            'dulieu_malop' => $this->malop->lop_find('', ''),

        ]);
    }

    function ExportExcel()
    {

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
        $this->view('MasterLayoutAD', [
            'page' => 'Sinhvien_v',
            'dulieu' => $this->sinhvien->sinhvien_find('', '', '')
        ]);
    }

    function ImportExcel()
    {


        $this->view('MasterLayoutAD', [
            'page' => 'Sinhvien_imp',

        ]);
    }
    function sinhvien_import()
    {
        if (isset($_POST['btnCancel'])) {
            $this->view('MasterLayoutAD', [
                'page' => 'Sinhvien_v',
                'dulieu' => $this->sinhvien->sinhvien_find('', '', ''),


            ]);
        }
        if (isset($_POST['btnImport'])) {
            if (isset($_FILES['fileimport'])) {
                if ($_FILES['fileimport']['error'] > 0) {
                    echo "<script>alert('File Import bị lỗi')</script>";

                    $this->view('MasterLayoutAD', [
                        'page' => 'Sinhvien_imp',

                    ]);
                } else {
                    $inputFileName = 'file.xlsx';
                    move_uploaded_file($_FILES['fileimport']['tmp_name'], $inputFileName);
                    $spreadsheet = IOFactory::load($inputFileName);
                    $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
                    $arrayCount = count($sheetData);

                    for ($i = 2; $i <= $arrayCount; $i++) {
                        $masinhvien = trim($sheetData[$i]["B"]);
                        $tensinhvien = trim($sheetData[$i]["C"]);
                        $gioitinh = trim($sheetData[$i]["D"]);
                        $sodienthoai = trim($sheetData[$i]["E"]);
                        $email = trim($sheetData[$i]["F"]);
                        $malop = trim($sheetData[$i]["G"]);
                        $kq_import = $this->sinhvien->sinhvien_ins($masinhvien, $tensinhvien, $gioitinh, $sodienthoai, $email, $malop);
                        if ($kq_import)
                            ;
                    }
                    unlink('file.xlsx');
                    echo "<script>alert('Import file thành công')</script>";
                    $this->view('MasterLayoutAD', [
                        'page' => 'Sinhvien_v',
                        'dulieu' => $this->sinhvien->sinhvien_find('', '', ''),

                    ]);
                }
            } else {
                echo "<script>alert('Bạn chưa chọn file import')</script>";
            }
        }
    }
}