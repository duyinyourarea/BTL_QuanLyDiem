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
    function ExportExcel_diem()
    {

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $data_export = $this->thongke->sinhvien_diem();
        //định dạng cột tiêu đề
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->getColumnDimension('H')->setAutoSize(true);
        $sheet->getColumnDimension('I')->setAutoSize(true);
        $sheet->getColumnDimension('J')->setAutoSize(true);
        $sheet->getColumnDimension('K')->setAutoSize(true);
        $sheet->getColumnDimension('L')->setAutoSize(true);
        $sheet->getColumnDimension('M')->setAutoSize(true);
        $sheet->getColumnDimension('N')->setAutoSize(true);
        // căn lề cácc tiêu đề trong các ô
        $sheet->getStyle('A1:N1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        // Tạo tiêu đề
        $sheet
            ->setCellValue('A1', 'STT')
            ->setCellValue('B1', 'Mã sinh viên')
            ->setCellValue('C1', 'Tên sinh viên')
            ->setCellValue('D1', 'Lớp')
            ->setCellValue('E1', 'Môn học')
            ->setCellValue('F1', 'Số tín chỉ')
            ->setCellValue('G1', 'Lần thi')
            ->setCellValue('H1', 'Chuyên cần')
            ->setCellValue('I1', 'Thực hành/Thảo luận')
            ->setCellValue('J1', 'Giữa kì')
            ->setCellValue('K1', 'Cuối kì')
            ->setCellValue('L1', 'Tổng kết HP')
            ->setCellValue('M1', 'Điểm chữ')
            ->setCellValue('N1', 'Đánh giá');

        // Ghi dữ liệu
        $rowCount = 2;
        foreach ($data_export as $key => $value) {
            $diemcuoiki = '';
            if ($value['diemcuoiki_l1'] != null) {
                if ($value['diemcuoiki_l2'] != null) {
                    $diemcuoiki = $value['diemcuoiki_l1'] . " | " . $value['diemcuoiki_l2'];
                } else {
                    $diemcuoiki = $value['diemcuoiki_l1'];
                }
            } else {
                if ($value['diemcuoiki_l2'] != null) {
                    $diemcuoiki = $value['diemcuoiki_l2'];
                }
            }
            $sheet->setCellValue('A' . $rowCount, $rowCount - 1);
            $sheet->setCellValue('B' . $rowCount, $value['masinhvien']);
            $sheet->setCellValue('C' . $rowCount, $value['tensinhvien']);
            $sheet->setCellValue('D' . $rowCount, $value['tenlop']);
            $sheet->setCellValue('E' . $rowCount, $value['tenmon']);
            $sheet->setCellValue('F' . $rowCount, $value['sotinchi']);
            $sheet->setCellValue('G' . $rowCount, $value['lanthi']);
            $sheet->setCellValue('H' . $rowCount, $value['diemchuyencan']);
            $sheet->setCellValue('I' . $rowCount, $value['diemthuchanh']);
            $sheet->setCellValue('J' . $rowCount, $value['diemgiuaki']);
            $sheet->setCellValue('K' . $rowCount, $diemcuoiki);
            $sheet->setCellValue('L' . $rowCount, $value['diemtb_he10']);
            $sheet->setCellValue('M' . $rowCount, $value['diemtb_word']);
            $sheet->setCellValue('N' . $rowCount, $value['trangthai']);
            //căn lề cho các văn bản trong các ô thuộc mỗi hàng
            $sheet->getStyle('A' . $rowCount . ':N' . $rowCount)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $rowCount++;
        }

        // Xuất file
        $writer = new Xlsx($spreadsheet);
        $writer->setOffice2003Compatibility(true);
        $filename = "DSdiemsinhvien" . time() . ".xlsx";
        $writer->save($filename);

        // header("location:" . $filename);
        $this->view('MasterLayoutAD', [
            'page' => 'Diem_v',
            'dulieu_diem' => $this->thongke->sinhvien_diem(),
            'dulieu_count' => $this->thongke->count_diem(),
            'dulieu_lop' => $this->thongke->tenlop_diem(),

        ]);
    }
    function ExportExcel_hocbong()
    {

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $data_export = $this->thongke->sinhvien_hocbong();
        //định dạng cột tiêu đề
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->getColumnDimension('H')->setAutoSize(true);
        $sheet->getColumnDimension('I')->setAutoSize(true);
        // căn lề cácc tiêu đề trong các ô
        $sheet->getStyle('A1:I1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        // Tạo tiêu đề
        $sheet
            ->setCellValue('A1', 'STT')
            ->setCellValue('B1', 'Mã sinh viên')
            ->setCellValue('C1', 'Tên sinh viên')
            ->setCellValue('D1', 'Lớp')
            ->setCellValue('E1', 'Ngành')
            ->setCellValue('F1', 'Khoa')
            ->setCellValue('G1', 'Học kì')
            ->setCellValue('H1', 'Tổng kết HP')
            ->setCellValue('I1', 'Tổng kết hệ 4');

        // Ghi dữ liệu
        $rowCount = 2;
        foreach ($data_export as $key => $value) {
            $sheet->setCellValue('A' . $rowCount, $rowCount - 1);
            $sheet->setCellValue('B' . $rowCount, $value['masinhvien']);
            $sheet->setCellValue('C' . $rowCount, $value['tensinhvien']);
            $sheet->setCellValue('D' . $rowCount, $value['tenlop']);
            $sheet->setCellValue('E' . $rowCount, $value['tennganh']);
            $sheet->setCellValue('F' . $rowCount, $value['tenkhoa']);
            $sheet->setCellValue('G' . $rowCount, $value['ki']);
            $sheet->setCellValue('H' . $rowCount, $value['diemtb_he10']);
            $sheet->setCellValue('I' . $rowCount, $value['diemtb_he4']);
            //căn lề cho các văn bản trong các ô thuộc mỗi hàng
            $sheet->getStyle('A' . $rowCount . ':I' . $rowCount)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $rowCount++;
        }

        // Xuất file
        $writer = new Xlsx($spreadsheet);
        $writer->setOffice2003Compatibility(true);
        $filename = "DShocbongsinhvien" . time() . ".xlsx";
        $writer->save($filename);

        // header("location:" . $filename);
        $this->view('MasterLayoutAD', [
            'page' => 'HocBong_v',
            'dulieu_hocbong' => $this->thongke->sinhvien_hocbong()
        ]);
    }
    function ExportExcel_thilai()
    {

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $data_export = $this->thongke->sinhvien_thilai();
        //định dạng cột tiêu đề
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->getColumnDimension('H')->setAutoSize(true);
        $sheet->getColumnDimension('I')->setAutoSize(true);
        $sheet->getColumnDimension('J')->setAutoSize(true);
        // căn lề cácc tiêu đề trong các ô
        $sheet->getStyle('A1:J1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        // Tạo tiêu đề
        $sheet
            ->setCellValue('A1', 'STT')
            ->setCellValue('B1', 'Mã sinh viên')
            ->setCellValue('C1', 'Tên sinh viên')
            ->setCellValue('D1', 'Lớp')
            ->setCellValue('E1', 'Mã môn')
            ->setCellValue('F1', 'Tên môn')
            ->setCellValue('G1', 'Học kì')
            ->setCellValue('H1', 'Tổng kết HP')
            ->setCellValue('I1', 'Điểm chữ')
            ->setCellValue('J1', 'Trạng thái');

        // Ghi dữ liệu
        $rowCount = 2;
        foreach ($data_export as $key => $value) {
            $sheet->setCellValue('A' . $rowCount, $rowCount - 1);
            $sheet->setCellValue('B' . $rowCount, $value['masinhvien']);
            $sheet->setCellValue('C' . $rowCount, $value['tensinhvien']);
            $sheet->setCellValue('D' . $rowCount, $value['tenlop']);
            $sheet->setCellValue('E' . $rowCount, $value['mamon']);
            $sheet->setCellValue('F' . $rowCount, $value['tenmon']);
            $sheet->setCellValue('G' . $rowCount, $value['ki']);
            $sheet->setCellValue('H' . $rowCount, $value['diemtb_he10']);
            $sheet->setCellValue('I' . $rowCount, $value['diemtb_word']);
            $sheet->setCellValue('J' . $rowCount, $value['trangthai']);
            //căn lề cho các văn bản trong các ô thuộc mỗi hàng
            $sheet->getStyle('A' . $rowCount . ':J' . $rowCount)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $rowCount++;
        }

        // Xuất file
        $writer = new Xlsx($spreadsheet);
        $writer->setOffice2003Compatibility(true);
        $filename = "DSthilaisinhvien" . time() . ".xlsx";
        $writer->save($filename);

        // header("location:" . $filename);
        $this->view('MasterLayoutAD', [
            'page' => 'ThiLai_v',
            'dulieu_thilai' => $this->thongke->sinhvien_thilai()
        ]);
    }
    function ExportExcel_hoclai()
    {

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $data_export = $this->thongke->sinhvien_hoclai();
        //định dạng cột tiêu đề
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->getColumnDimension('H')->setAutoSize(true);
        $sheet->getColumnDimension('I')->setAutoSize(true);
        // căn lề cácc tiêu đề trong các ô
        $sheet->getStyle('A1:I1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        // Tạo tiêu đề
        $sheet
            ->setCellValue('A1', 'STT')
            ->setCellValue('B1', 'Mã sinh viên')
            ->setCellValue('C1', 'Tên sinh viên')
            ->setCellValue('D1', 'Mã môn')
            ->setCellValue('E1', 'Tên môn')
            ->setCellValue('F1', 'Số tín chỉ')
            ->setCellValue('G1', 'Tổng kết HP')
            ->setCellValue('H1', 'Điểm chữ')
            ->setCellValue('I1', 'Trạng thái');

        // Ghi dữ liệu
        $rowCount = 2;
        foreach ($data_export as $key => $value) {
            $sheet->setCellValue('A' . $rowCount, $rowCount - 1);
            $sheet->setCellValue('B' . $rowCount, $value['masinhvien']);
            $sheet->setCellValue('C' . $rowCount, $value['tensinhvien']);
            $sheet->setCellValue('D' . $rowCount, $value['mamon']);
            $sheet->setCellValue('E' . $rowCount, $value['tenmon']);
            $sheet->setCellValue('F' . $rowCount, $value['sotinchi']);
            $sheet->setCellValue('G' . $rowCount, $value['diemtb_he10']);
            $sheet->setCellValue('H' . $rowCount, $value['diemtb_word']);
            $sheet->setCellValue('I' . $rowCount, $value['trangthai']);
            //căn lề cho các văn bản trong các ô thuộc mỗi hàng
            $sheet->getStyle('A' . $rowCount . ':I' . $rowCount)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $rowCount++;
        }

        // Xuất file
        $writer = new Xlsx($spreadsheet);
        $writer->setOffice2003Compatibility(true);
        $filename = "DShoclaisinhvien" . time() . ".xlsx";
        $writer->save($filename);

        // header("location:" . $filename);
        $this->view('MasterLayoutAD', [
            'page' => 'HocLai_v',
            'dulieu_hoclai' => $this->thongke->sinhvien_hoclai()
        ]);
    }
}