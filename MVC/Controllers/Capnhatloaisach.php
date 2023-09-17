<?php
class Capnhatloaisach extends Controller
{
    protected $ls;
    function __construct()
    {
        $this->ls = $this->mode('Loaisach');
    }
    function Get_data()
    {
        $this->view('MasterLayout2', [
            'page' => 'Capnhatloaisach_v',
            'ml' => '',
            'tl' => '',
            'mt' => ''
        ]);
    }
    function themmoi()
    {
        if (isset($_POST['btnThem'])) {
            //lấy dữ liệu
            $ml = $_POST['txtMaloai'];
            $tl = $_POST['txtTenloai'];
            $mt = $_POST['txtMota'];
            $ck = $this->ls->loaisach_ins($ml, $tl, $mt);
            if ($ck) {
                echo "<script>alert('Trùng mã loại sách')</script>";
            } else {
                $kq = $this->ls->loaisach_ins($ml, $tl, $mt);
                if ($kq)
                    echo "<script> alert('Thêm mới thành công')</script>";
                else
                    echo "<script> alert('Thêm mới thất bại')</script>";
            }
            //goi lai giao dien
            $this->view('MasterLayout', [
                'page' => 'Capnhatloaisach_v',
                'ml' => $ml,
                'tl' => $tl,
                'mt' => $mt
            ]);
        }
    }
}
?>