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
                    $data_ds_ndqt = $this->nhapdiem->nhapdiem_quatrinh($mamon, $malop);
                    $this->view('MasterLayoutAD', [
                        'page' => 'DiemSinhVienQuaTrinh_v',
                        'malop' => $malop,
                        'mamon' => $mamon,
                        'ds_ndqt' => $data_ds_ndqt
                    ]);
                } else if ($loaidiem == "2") {
                    $data_ds_ndqt = $this->nhapdiem->nhapdiem_cuoikil1($mamon, $malop);
                    $this->view('MasterLayoutAD', [
                        'page' => 'DiemSinhVienCuoiKiLan1_v',
                        'malop' => $malop,
                        'mamon' => $mamon,
                        'ds_ndqt' => $data_ds_ndqt
                    ]);
                } else if ($loaidiem == "3") {
                    $data_ds_ndqt = $this->nhapdiem->nhapdiem_cuoikil2($mamon, $malop);
                    $this->view('MasterLayoutAD', [
                        'page' => 'DiemSinhVienCuoiKiLan2_v',
                        'malop' => $malop,
                        'mamon' => $mamon,
                        'ds_ndqt' => $data_ds_ndqt
                    ]);
                }
            }
        }
    }
    function Luudiemquatrinh()
    {
        if (isset($_POST['btnLuu'])) {
            $malop = $_POST['txtmalop'];
            $mamon = $_POST['txtmamon'];
            $data_ds_ndqt = $this->nhapdiem->nhapdiem_quatrinh_all($mamon, $malop);
            foreach ($data_ds_ndqt as $key) {
                $dcc_tmp = $_POST['DCC' . $key[11]];
                $dgk_tmp = $_POST['DTH' . $key[11]];
                $dkt_tmp = $_POST['DGK' . $key[11]];
                $kq = $this->nhapdiem->updatediem_quatrinh($mamon, $key[11], $dcc_tmp, $dgk_tmp, $dkt_tmp);
                if ($kq)
                    ;
            }
            echo "<script>alert('Nhập điểm quá trình thành công')</script>";
            $data_lop = $this->lop->lop_find('', '');
            $data_monhoc = $this->monhoc->monhoc_find('', '');
            $this->view('MasterLayoutAD', [
                'page' => 'Nhapdiem_v',
                'data_lop' => $data_lop,
                'data_monhoc' => $data_monhoc
            ]);
        }
        if (isset($_POST['btnHuy'])) {
            $data_lop = $this->lop->lop_find('', '');
            $data_monhoc = $this->monhoc->monhoc_find('', '');
            $this->view('MasterLayoutAD', [
                'page' => 'Nhapdiem_v',
                'data_lop' => $data_lop,
                'data_monhoc' => $data_monhoc
            ]);
        }
    }
    function He4ToWord($dtb_he4)
    {
        if ($dtb_he4 == 4)
            return "A";
        if ($dtb_he4 == 3.6)
            return "B";
        if ($dtb_he4 == 3.2)
            return "C";
        if ($dtb_he4 == 2.5)
            return "D";
        if ($dtb_he4 > 3.6 && $dtb_he4 < 4)
            return "B+";
        if ($dtb_he4 > 3.2 && $dtb_he4 < 3.6)
            return "C+";
        if ($dtb_he4 > 2.5 && $dtb_he4 < 3.2)
            return "D+";
        if ($dtb_he4 < 2.5)
            return "F";
        return "F";
    }
    function WordToHe4($dtb_word)
    {
        switch ($dtb_word) {
            case 'A':
                return 4;
            case 'B': case 'B+':
                return 3.6;
            case 'C': case 'C+':
                return 3.2;
            case 'D': case 'D+':
                return 2.5;
            default:
                return 0;
        }
    }
    function Luudiemcuoikilan1()
    {
        if (isset($_POST['btnLuu'])) {
            $malop = $_POST['txtmalop'];
            $mamon = $_POST['txtmamon'];
            $data_mh = $this->monhoc->getData($mamon);
            $pttd_mh = explode("/", $data_mh['phuongthuctinhdiem']);
            $data_ds_ndqt = $this->nhapdiem->nhapdiem_cuoikil1_all($mamon, $malop);
            foreach ($data_ds_ndqt as $key) {
                $dcc = $key[1];
                $dth = $key[2];
                $dgk = $key[3];
                $dckl1_tmp = $_POST['DCK_l1' . $key[11]];
                $dtb_he10 = ($pttd_mh[0] / 100) * $dcc + ($pttd_mh[1] / 100) * $dth + ($pttd_mh[2] / 100) * $dgk + ($pttd_mh[3] / 100) * (float) $dckl1_tmp;
                $dtb_he4 = $dtb_he10 * 0.4;
                $dtb_word = $this->He4ToWord($dtb_he4);
                if ($dtb_he10 <= 4) {
                    $kq_nd = $this->nhapdiem->updatediem_cuoikil1($mamon, $key[11], $dckl1_tmp, $dtb_he10, $dtb_he4, $dtb_word, 2, "THI LẠI");
                    if ($kq_nd)
                        ;
                } else {
                    $kq_nd = $this->nhapdiem->updatediem_cuoikil1($mamon, $key[11], $dckl1_tmp, $dtb_he10, $dtb_he4, $dtb_word, 1, "ĐẠT");
                    
                    $data_by_mamon = $this->monhoc->getData($mamon);
                    $ki = $data_by_mamon['ki'];
                    $ds_mh_pass = $this->nhapdiem->diemmonhoc_findByKiAndMaSV($ki, $key[11]);
                    
                    $tongdiem = 0;
                    $tong_stc = 0;
                    foreach ($ds_mh_pass as $key_mh) {
                        $tongdiem += $this->WordToHe4($key_mh[8])*$key_mh[15];
                        $tong_stc += $key_mh[15];
                    }
                    $dtb_he4_theo_ki = $tongdiem/$tong_stc;
                    $dtb_he10_theo_ki = $dtb_he4_theo_ki/0.4;
                    $kq_upd_dsv = $this->nhapdiem->diemsinhvien_upd($key[11], $dtb_he10_theo_ki, $dtb_he4_theo_ki, $ki);
                    if ($kq_nd && $kq_upd_dsv)
                        ;

                }
            }
            echo "<script>alert('Nhập điểm cuối kì thành công')</script>";
            $data_lop = $this->lop->lop_find('', '');
            $data_monhoc = $this->monhoc->monhoc_find('', '');
            $this->view('MasterLayoutAD', [
                'page' => 'Nhapdiem_v',
                'data_lop' => $data_lop,
                'data_monhoc' => $data_monhoc
            ]);
        }
        if (isset($_POST['btnHuy'])) {
            $data_lop = $this->lop->lop_find('', '');
            $data_monhoc = $this->monhoc->monhoc_find('', '');
            $this->view('MasterLayoutAD', [
                'page' => 'Nhapdiem_v',
                'data_lop' => $data_lop,
                'data_monhoc' => $data_monhoc
            ]);
        }
    }
    function Luudiemcuoikilan2()
    {
        if (isset($_POST['btnLuu'])) {
            $malop = $_POST['txtmalop'];
            $mamon = $_POST['txtmamon'];
            $data_mh = $this->monhoc->getData($mamon);
            $pttd_mh = explode("/", $data_mh['phuongthuctinhdiem']);
            $data_ds_ndqt = $this->nhapdiem->nhapdiem_cuoikil2_all($mamon, $malop);
            foreach ($data_ds_ndqt as $key) {
                $dcc = $key[1];
                $dth = $key[2];
                $dgk = $key[3];
                $dckl2_tmp = $_POST['DCK_l2' . $key[11]];
                $dtb_he10 = ($pttd_mh[0] / 100) * $dcc + ($pttd_mh[1] / 100) * $dth + ($pttd_mh[2] / 100) * $dgk + ($pttd_mh[3] / 100) * (float) $dckl2_tmp;
                $dtb_he4 = $dtb_he10 * 0.4;
                $dtb_word = $this->He4ToWord($dtb_he4);
                if ($dtb_he10 <= 4) {
                    $kq_nd = $this->nhapdiem->updatediem_cuoikil2($mamon, $key[11], $dckl2_tmp, $dtb_he10, $dtb_he4, $dtb_word, 2, "HỌC LẠI");
                    if ($kq_nd)
                        ;
                } else {
                    $kq_nd = $this->nhapdiem->updatediem_cuoikil2($mamon, $key[11], $dckl2_tmp, $dtb_he10, $dtb_he4, $dtb_word, 2, "ĐẠT");$data_by_mamon = $this->monhoc->getData($mamon);
                    $ki = $data_by_mamon['ki'];
                    $ds_mh_pass = $this->nhapdiem->diemmonhoc_findByKiAndMaSV($ki, $key[11]);
                    
                    $tongdiem = 0;
                    $tong_stc = 0;
                    foreach ($ds_mh_pass as $key_mh) {
                        $tongdiem += $this->WordToHe4($key_mh[8])*$key_mh[15];
                        $tong_stc += $key_mh[15];
                    }
                    $dtb_he4_theo_ki = $tongdiem/$tong_stc;
                    $dtb_he10_theo_ki = $dtb_he4_theo_ki/0.4;
                    $kq_upd_dsv = $this->nhapdiem->diemsinhvien_upd($key[11], $dtb_he10_theo_ki, $dtb_he4_theo_ki, $ki);
                    
                    if ($kq_nd && $kq_upd_dsv)
                        ;
                }
            }
            echo "<script>alert('Nhập điểm cuối kì thành công')</script>";
            $data_lop = $this->lop->lop_find('', '');
            $data_monhoc = $this->monhoc->monhoc_find('', '');
            $this->view('MasterLayoutAD', [
                'page' => 'Nhapdiem_v',
                'data_lop' => $data_lop,
                'data_monhoc' => $data_monhoc
            ]);
        }
        if (isset($_POST['btnHuy'])) {
            $data_lop = $this->lop->lop_find('', '');
            $data_monhoc = $this->monhoc->monhoc_find('', '');
            $this->view('MasterLayoutAD', [
                'page' => 'Nhapdiem_v',
                'data_lop' => $data_lop,
                'data_monhoc' => $data_monhoc
            ]);
        }
    }
}
?>