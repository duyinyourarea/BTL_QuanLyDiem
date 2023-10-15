<?php
class NhapDiem extends Controller
{
    protected $monhoc;
    protected $lop;

    function __construct()
    {
        $this->monhoc = $this->mode('Monhoc');
        $this->lop = $this->mode('Lop');
    }
    function Get_data()
    {
        $data_lop = $this->lop->lop_find('', '');
        $data_monhoc = $this->monhoc->monhoc_find('', '');
        $this->view('MasterLayoutAD', [
            'page' => 'Nhapdiem_v',
            'data_lop' => $data_lop,
            'data_monhoc' => $data_monhoc
        ]);
    }
    function Tieptheo()
    {
        $malop = $_POST['selectedLop'];
        $mamon = $_POST['selectedMonHoc'];
        $loaidiem = $_POST['selectedLoaiDiem'];
        if ($malop == "0" || $mamon == "0" || $loaidiem == "0") {
            $data_lop = $this->lop->lop_find('', '');
            $data_monhoc = $this->monhoc->monhoc_find('', '');
            echo "<script>alert('Vui loàng chọn đủ thông tin')</script>";
            $this->view('MasterLayoutAD', [
                'page' => 'Nhapdiem_v',
                'data_lop' => $data_lop,
                'data_monhoc' => $data_monhoc
            ]);
        }else{
            if($loaidiem == "1"){
                $this->view('MasterLayoutAD', [
                    'page' => 'DiemSinhVienQuaTrinh_v',
                ]);
            }else if($loaidiem == "2"){
                
            }else if($loaidiem == "3"){

            }
        }
    }
}
?>