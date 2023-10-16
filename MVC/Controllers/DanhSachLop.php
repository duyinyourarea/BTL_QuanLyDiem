<?php
class DanhSachLop extends Controller
{
    protected $lop;
    protected $monhoc;
    protected $sinhvien;
    function __construct()
    {
        $this->lop = $this->mode('Lop');
        $this->monhoc = $this->mode('Monhoc');
        $this->sinhvien = $this->mode('SinhVien');
    }
    function Get_data()
    {
        $this->view('MasterLayoutAD', [
            'page' => 'Lop_v',
            'dulieu' => $this->lop->lop_find('', '')
        ]);
    }
    function Timkiem()
    {
        if (isset($_POST['btnTimkiem'])) {
            $ml = $_POST['txtMalop'];
            $tl = $_POST['txtTenlop'];
            $this->view('MasterLayoutAD', [
                'page' => 'Lop_v',
                'dulieu' => $this->lop->lop_find($ml, $tl),
                'ml' => $ml,
                'tl' => $tl
            ]);
        }
    }
    function Xoa($malop)
    {
        $kq_del = $this->lop->lop_del($malop);
        if ($kq_del)
            echo "<script>alert('Xóa thành công')</script>";
        else
            echo "<script>alert('Xóa thất bại')</script>";
        $this->view('MasterLayoutAD', [
            'page' => 'Lop_v',
            'dulieu' => $this->lop->lop_find('', '')
        ]);
    }
    function Sua($malop)
    {
        $this->view('MasterLayoutAD', [
            'page' => 'Lop_sua',
            'dulieu' => $this->lop->lop_find($malop, '')
        ]);
    }
    function Sua_lop()
    {
        if (isset($_POST['btnLuu'])) {
            $ml = $_POST['txtMalop'];
            $tl = $_POST['txtTenlop'];
            $ss = $_POST['txtSiso'];
            $mk = $_POST['txtMakhoa'];
            $kq = $this->lop->lop_upd($ml, $tl, $ss, $mk);
            if ($kq)
                $this->view('MasterLayoutAD', [
                    'page' => 'Lop_v',
                    'dulieu' => $this->lop->lop_find('', ''),
                ]);
        }
    }
    function Them()
    {
        $this->view('MasterLayoutAD', ['page' => 'Lop_them']);
    }
    function Them_lop()
    {
        if (isset($_POST['btnLuu'])) {
            $ml = $_POST['txtMalop'];
            $tl = $_POST['txtTenlop'];
            $mk = $_POST['txtMakhoa'];
            $kq = $this->lop->lop_ins($ml, $tl, $mk);
            if ($kq)
                echo "<script>alert('Thêm thành công')</script>";
            else
                echo "<script>alert('Thêm thất bại')</script>";
            $this->view('MasterLayoutAD', [
                'page' => 'Lop_v',
                'dulieu' => $this->lop->lop_find('', ''),
            ]);
        }
    }
    function Diem_Sinhvien($malop)
    {
        $this->view('MasterLayoutAD', [
            'page' => 'DiemSinhVien_v', 'dulieu' => $this->lop->lop_find($malop, ''), 'dulieu_sinhvien' => $this->sinhvien->sinhvien_find('', '', $malop), 'dulieu_monhoc' => $this->monhoc->monhoc_find('', '')
        ]);
    }
}
