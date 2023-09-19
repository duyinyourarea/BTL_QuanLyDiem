<?php 
class DanhSachMonHoc extends Controller{
    protected $monhoc;
    function __construct(){
        $this->monhoc = $this->mode('Monhoc');
    }
    function Get_data(){
        $this->view('MasterLayout',['page'=>'Lop_v','dulieu'=>$this->monhoc->lop_find('','')
    ]);
    }
}
?>