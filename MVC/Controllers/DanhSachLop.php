<?php
class DanhSachLop extends Controller{
    protected $lop;
    function __construct(){
        $this->ls = $this->mode('Lop');
    }
    function Get_data(){
        $this->view('MasterLayout',['page'=>'Lop_v','dulieu'=>$this->lop->lop_find('','')
    ]);
    }
    function Timkiem(){
        if(isset($_POST['btnTimkiem'])){
            $malop=$_POST['txtMalop'];
            $tenlop=$_POST['txtTenlop'];
            $this->view('MasterLayout',['page'=>'Lop_v','dulieu'=>$this->lop->lop_find($malop,$tenlop),
            'malop'=>$malop,
            'tenlop'=>$tenlop
        ]);
        }
    }
    function Xoa($malop){
        $kq_del=$this->lop->loaisach_del($malop);
        if($kq_del)
        echo"<script>alert('Xóa thành công')</script>";
        else
        echo"<script>alert('Xóa thất bại')</script>";
        $this->view('MasterLayout',['page'=>'Lop_v','dulieu'=>$this->lop->lop_find('','') 
        ]); 
    }
}
?>