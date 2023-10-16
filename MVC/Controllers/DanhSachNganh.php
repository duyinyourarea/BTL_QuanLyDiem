<?php
class DanhSachNganh extends Controller{
    protected $nganh;
    function __construct(){
        $this->nganh = $this->mode('Nganh');
    }
    function Get_data(){
        $this->view('MasterLayoutAD',['page'=>'Nganh_v','dulieu'=>$this->nganh->nganh_find('','')
    ]);
    }
    function Timkiem(){
        if(isset($_POST['btnTimkiem'])){
            $mn=$_POST['txtManganh'];
            $tn=$_POST['txtTennganh'];
            $mk=$_POST['txtMakhoa'];
            $this->view('MasterLayoutAD',['page'=>'Nganh_v','dulieu'=>$this->nganh->nganh_find($mn,$tn,$mk),'mn'=>$mn,'tn'=>$tn,'mk'=>$mk
        ]);
        }
    }
    function Xoa($manganh){
        $kq_del=$this->nganh->nganh_del($manganh);
        if($kq_del)
        echo"<script>alert('Xóa thành công')</script>";
        else
        echo"<script>alert('Xóa thất bại')</script>";
        $this->view('MasterLayoutAD',['page'=>'Nganh_v','dulieu'=>$this->nganh->nganh_find('','') 
        ]); 
    }
    function Sua($manganh){
        $this->view('MasterLayoutAD',['page'=>'Nganh_sua','dulieu'=>$this->nganh->nganh_find($manganh,'')
        ]);
    }
    function Sua_nganh(){
        if(isset($_POST['btnLuu'])){
            $mn=$_POST['txtManganh'];
            $tn=$_POST['txtTennganh'];
            $mk=$_POST['txtMakhoa'];
            $kq=$this->nganh->nganh_upd($mn,$tn,$mk);
            if($kq) 
            $this->view('MasterLayoutAD',['page'=>'Nganh_v','dulieu'=>$this->nganh->nganh_find('',''),
        ]);
        }
    }
    function Them()
    {
        $this->view('MasterLayoutAD', ['page' => 'Nganh_them']);
    }
    function Them_nganh()
    {
        if (isset($_POST['btnLuu'])) {
            $mn=$_POST['txtManganh'];
            $tn=$_POST['txtTennganh'];
            $mk=$_POST['txtMakhoa'];
           $kq = $this->nganh->nganh_ins($mn, $tn, $mk);
            if ($kq)
                echo "<script>alert('Thêm thành công')</script>";
            else
                echo "<script>alert('Thêm thất bại')</script>";
            $this->view('MasterLayoutAD', [
                'page' => 'Nganh_v',
                'dulieu' => $this->nganh->nganh_find('', ''),
            ]);
        }
    }
}

?>