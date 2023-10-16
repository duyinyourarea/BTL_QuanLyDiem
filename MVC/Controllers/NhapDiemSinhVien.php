<?php
class NhapDiemSinhVien extends Controller
{
    protected $monhoc;
    protected $lop;
    protected $nhapdiem;

    function __construct()
    {
        $this->monhoc = $this->mode('Monhoc');
        $this->lop = $this->mode('Lop');
        $this->nhapdiem = $this->mode('NhapDiem');
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
        if (isset($_POST['btnTiepTheo'])) {
            $malop = $_POST['selectedLop'];
            $mamon = $_POST['selectedMonHoc'];
            $loaidiem = $_POST['selectedLoaiDiem'];
            $data_ds_ndqt = $this->nhapdiem->nhapdiem_quatrinh($mamon, $malop, 0);
            if ($malop == "0" || $mamon == "0" || $loaidiem == "0") {
                $data_lop = $this->lop->lop_find('', '');
                $data_monhoc = $this->monhoc->monhoc_find('', '');
                echo "<script>alert('Vui loàng chọn đủ thông tin')</script>";
                $this->view('MasterLayoutAD', [
                    'page' => 'Nhapdiem_v',
                    'data_lop' => $data_lop,
                    'data_monhoc' => $data_monhoc
                ]);
            } else {
                if ($loaidiem == "1") {
                    $this->view('MasterLayoutAD', [
                        'page' => 'DiemSinhVienQuaTrinh_v',
                        'malop' => $malop,
                        'mamon' => $mamon,
                        'ds_ndqt' => $data_ds_ndqt
                    ]);
                } else if ($loaidiem == "2") {

                } else if ($loaidiem == "3") {

                }
            }
        }
    }
    function Luudiemquatrinh(){
        $malop = $_POST['txtmalop'];
        $mamon = $_POST['txtmamon'];
        $data_ds_ndqt = $this->nhapdiem->nhapdiem_quatrinh_array($mamon, $malop, 0);
        // $row_ndqt = $data_ds_ndqt;
        // foreach ($row_ndqt = $data_ds_ndqt) {
        //     $dcc_tmp = $_POST['DCC'.$row_ndqt['masinhvien']];
        //     echo $dcc_tmp;
        // }
        // echo $data_ds_ndqt[0]['malop'], $data_ds_ndqt[1]['malop'];
        foreach ($data_ds_ndqt as $key) {
            # code...
            print_r($key[11]);
            $dcc_tmp = $_POST['DCC'.$key[11]];
            echo $dcc_tmp;
        }
    }
}
?>