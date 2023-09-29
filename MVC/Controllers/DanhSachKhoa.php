<?php
class DanhSachKhoa extends Controller{
    protected $khoa;
    function __construct(){
        $this->khoa = $this->mode('Khoa');
    }
    function Get_data(){
        $this->view('MasterLayout',['page'=>'Khoa_v','dulieu'=>$this->khoa->khoa_find('','')
    ]);
    }
    function Timkiem(){
        if(isset($_POST['btnTimkiem'])){
            $mk=$_POST['txtMakhoa'];
            $tk=$_POST['txtTenkhoa'];
            $this->view('MasterLayout',['page'=>'Khoa_v','dulieu'=>$this->khoa->khoa_find($mk,$tk),'mk'=>$mk,'tk'=>$tk
        ]);
        }
    }
    function Xoa($makhoa){
        $kq_del=$this->khoa->khoa_del($makhoa);
        if($kq_del)
        echo"<script>alert('Xóa thành công')</script>";
        else
        echo"<script>alert('Xóa thất bại')</script>";
        $this->view('MasterLayout',['page'=>'Khoa_v','dulieu'=>$this->khoa->khoa_find('','') 
        ]); 
    }
    function Sua($makhoa){
        $this->view('MasterLayout',['page'=>'Khoa_sua','dulieu'=>$this->khoa->khoa_find($makhoa,'')
        ]);
    }
    function Sua_khoa(){
        if(isset($_POST['btnLuu'])){
            $mk=$_POST['txtMakhoa'];
            $tk=$_POST['txtTenkhoa'];
            $kq=$this->khoa->khoa_upd($mk,$tk);
            if($kq) 
            $this->view('MasterLayout',['page'=>'Khoa_v','dulieu'=>$this->khoa->khoa_find('',''),
        ]);
        }
    }
    function Them()
    {
        $this->view('MasterLayout', ['page' => 'Khoa_them']);
    }
    function Them_khoa()
    {
        if (isset($_POST['btnLuu'])) {
            $mk = $_POST['txtMakhoa'];
            $tk = $_POST['txtTenkhoa'];
           $kq = $this->khoa->khoa_ins($mk, $tk);
            if ($kq)
                echo "<script>alert('Thêm thành công')</script>";
            else
                echo "<script>alert('Thêm thất bại')</script>";
            $this->view('MasterLayout', [
                'page' => 'Khoa_v',
                'dulieu' => $this->khoa->khoa_find('', ''),
            ]);
        }
    }
}

?>