<?php
class DanhSachMonHoc extends Controller
{
    protected $monhoc;
    protected $khoa;

    function __construct()
    {
        $this->monhoc = $this->mode('Monhoc');
        $this->khoa = $this->mode('Khoa');
    }
    function Get_data()
    {
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
?>