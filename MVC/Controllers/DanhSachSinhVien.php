<?php
class DanhSachSinhVien extends Controller
{
    protected $sinhvien;
    protected $malop;
    function __construct()
    {
        $this->sinhvien = $this->mode('SinhVien');
        $this->malop = $this->mode('Lop');
    }
    function Get_data()
    {
        $this->view('MasterLayout', [
            'page' => 'Sinhvien_v', 'dulieu' => $this->sinhvien->sinhvien_find('', '')
        ]);
    }
    function Timkiem()
    {
        if (isset($_POST['btnTimkiem'])) {
            $masinhvien = $_POST['txtMasinhvien'];
            $tensinhvien = $_POST['txtTensinhvien'];
            $this->view('MasterLayout', [
                'page' => 'Sinhvien_v', 'dulieu' => $this->sinhvien->sinhvien_find($masinhvien, $tensinhvien), 'masinhvien' => $masinhvien, 'tensinhvien' => $tensinhvien
            ]);
        }
    }
    function Xoa($masinhvien)
    {
        $kq_del = $this->sinhvien->sinhvien_del($masinhvien);
        if ($kq_del)
            echo "<script>alert('Xóa thành công')</script>";
        else
            echo "<script>alert('Xóa thất bại')</script>";
        $this->view('MasterLayout', [
            'page' => 'Sinhvien_v', 'dulieu' => $this->sinhvien->sinhvien_find('', '')
        ]);
    }
    function Sua($masinhvien)
    {
        $this->view('MasterLayout', [
            'page' => 'Sinhvien_sua', 'dulieu' => $this->sinhvien->sinhvien_find($masinhvien, '')
        ]);
    }
    function Sua_sinhvien()
    {
        if (isset($_POST['btnLuu'])) {
            $masinhvien = $_POST['txtMasinhvien'];
            $tensinhvien = $_POST['txtTensinhvien'];
            $gioitinh = $_POST['txtGioitinh'];
            $sodienthoai = $_POST['txtSodienthoai'];
            $email = $_POST['txtEmail'];
            $malop = $_POST['txtMalop'];
            $kq = $this->sinhvien->sinhvien_upd($masinhvien, $tensinhvien, $gioitinh, $sodienthoai, $email, $malop);
            if ($kq)
                $this->view('MasterLayout', [
                    'page' => 'Sinhvien_v', 'dulieu' => $this->sinhvien->sinhvien_find('', ''),
                ]);
        }
        if (isset($_POST['btnHuy'])) {
            $this->view('MasterLayout', [
                'page' => 'Sinhvien_v', 'dulieu' => $this->sinhvien->sinhvien_find('', '')
            ]);
        }
    }
    function Them_sinhvien()
    {
        if (isset($_POST['btnLuu'])) {
            //Lấy dữ liệu trên các control của form
            $masinhvien = $_POST['txtMasinhvien'];
            $tensinhvien = $_POST['txtTensinhvien'];
            $gioitinh = $_POST['txtGioitinh'];
            $sodienthoai = $_POST['txtSodienthoai'];
            $email = $_POST['txtEmail'];
            $malop = $_POST['cbMalop'];
            $ck = $this->sinhvien->masinhvien_check($masinhvien);
            if ($masinhvien == '' || $tensinhvien == '' || $gioitinh == '' || $sodienthoai == '' || $email == '' || $malop == 'Chọn lớp') {
                echo "<script>alert('Vui lòng nhập đủ thông tin!')</script>";
                $this->view('MasterLayout', ['page' => 'Sinhvien_them', 'dulieu' => $this->malop->lop_find('', '')]);
            } else {
                if ($ck) {
                    echo "<script>alert('Mã sinh viên đã tồn tại!')</script>";
                    $this->view('MasterLayout', ['page' => 'Sinhvien_them', 'dulieu' => $this->malop->lop_find('', '')]);
                } else {
                    $kq = $this->sinhvien->sinhvien_ins($masinhvien, $tensinhvien, $gioitinh, $sodienthoai, $email, $malop);
                    if ($kq)
                        echo "<script>alert('Thêm mới thành công!')</script>";
                    else
                        echo "<script>alert('Thêm mới thất bại!')</script>";
                    //gọi lại giao diện ra
                    $this->view('MasterLayout', [
                        'page' => 'Sinhvien_v',
                        'dulieu' => $this->sinhvien->sinhvien_find('', '')
                    ]);
                }
            }
        }
        if (isset($_POST['btnHuy'])) {
            $this->view('MasterLayout', [
                'page' => 'Sinhvien_v', 'dulieu' => $this->sinhvien->sinhvien_find('', '')
            ]);
        }
    }
    function Them()
    {
        $this->view('MasterLayout', ['page' => 'Sinhvien_them', 'dulieu' => $this->malop->lop_find('', '')]);
    }
}
