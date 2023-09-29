<?php
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
        $kq_taikhoan_del = $this->taikhoan->taikhoan_del($masinhvien);
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
            'page' => 'Sinhvien_sua', 'dulieu' => $this->sinhvien->sinhvien_find($masinhvien, ''), 'dulieu_malop' => $this->malop->lop_find('', '')
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
            $malop = $_POST['cbMalop'];
            if ($tensinhvien == '' || $gioitinh == '' || $sodienthoai == '' || $email == '' || $malop == 'Chọn lớp') {
                echo "<script>alert('Vui lòng nhập đủ thông tin!')</script>";
                $this->view('MasterLayout', [
                    'page' => 'Sinhvien_sua', 'dulieu' => $this->sinhvien->sinhvien_find($masinhvien, ''), 'dulieu_malop' => $this->malop->lop_find('', ''),
                    'tensinhvien' => $tensinhvien,
                    'gioitinh' => $gioitinh,
                    'sodienthoai' => $sodienthoai,
                    'email' => $email,
                    'malop' => $malop

                ]);
            } else {
                $kq = $this->sinhvien->sinhvien_upd($masinhvien, $tensinhvien, $gioitinh, $sodienthoai, $email, $malop);
                if ($kq) {
                    echo "<script>alert('Sửa thành công!')</script>";
                } else {
                    echo "<script>alert('Sửa thất bại!')</script>";
                }
                $this->view('MasterLayout', [
                    'page' => 'Sinhvien_v', 'dulieu' => $this->sinhvien->sinhvien_find('', ''),
                ]);
            }
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
            //Lấy dữ liệu trên các control của form thêm sinh viên
            $masinhvien = $_POST['txtMasinhvien'];
            $tensinhvien = $_POST['txtTensinhvien'];
            $gioitinh = $_POST['txtGioitinh'];
            $sodienthoai = $_POST['txtSodienthoai'];
            $email = $_POST['txtEmail'];
            $malop = $_POST['cbMalop'];
            //Gán dữ liệu cho tài khoản sinh viên
            $taikhoan = $_POST['txtMasinhvien'];
            $matkhau = $_POST['txtSodienthoai'];
            $ck = $this->sinhvien->masinhvien_check($masinhvien);
            if ($masinhvien == '' || $tensinhvien == '' || $gioitinh == '' || $sodienthoai == '' || $email == '' || $malop == 'Chọn lớp') {
                echo "<script>alert('Vui lòng nhập đủ thông tin!')</script>";
                $this->view('MasterLayout', [
                    'page' => 'Sinhvien_them', 'dulieu_malop' => $this->malop->lop_find('', ''),
                    'masinhvien' => $masinhvien, 'tensinhvien' => $tensinhvien, 'gioitinh' => $gioitinh, 'sodienthoai' => $sodienthoai, 'email' => $email, 'malop' => $malop
                ]);
            } else {
                if ($ck) {
                    echo "<script>alert('Mã sinh viên đã tồn tại!')</script>";
                    $this->view(
                        'MasterLayout',
                        [
                            'page' => 'Sinhvien_them', 'dulieu_malop' => $this->malop->lop_find('', ''),
                            'masinhvien' => $masinhvien, 'tensinhvien' => $tensinhvien, 'gioitinh' => $gioitinh, 'sodienthoai' => $sodienthoai, 'email' => $email, 'malop' => $malop
                        ]
                    );
                } else {
                    $kq = $this->sinhvien->sinhvien_ins($masinhvien, $tensinhvien, $gioitinh, $sodienthoai, $email, $malop);
                    $kq_taikhoan = $this->taikhoan->taikhoan_ins($taikhoan, $matkhau, $masinhvien);
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
        $this->view('MasterLayout', ['page' => 'Sinhvien_them', 'dulieu_malop' => $this->malop->lop_find('', '')]);
    }
}
