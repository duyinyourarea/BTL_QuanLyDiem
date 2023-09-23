<?php
class DanhSachSinhVien extends Controller{
    protected $sinhvien;
    function __construct(){
        $this->sinhvien = $this->mode('SinhVien');
    }
    function Get_data(){
        $this->view('MasterLayout',['page'=>'Sinhvien_v','dulieu'=>$this->sinhvien->sinhvien_find('','')
    ]);
    }
    function Timkiem(){
        if(isset($_POST['btnTimkiem'])){
            $masinhvien=$_POST['txtMasinhvien'];
            $tensinhvien=$_POST['txtTensinhvien'];
            $this->view('MasterLayout',['page'=>'Sinhvien_v','dulieu'=>$this->sinhvien->sinhvien_find($masinhvien,$tensinhvien),'masinhvien'=>$masinhvien,'tensinhvien'=>$tensinhvien
        ]);
        }
    }
    function Xoa($masinhvien){
        $kq_del=$this->sinhvien->sinhvien_del($masinhvien);
        if($kq_del)
        echo"<script>alert('Xóa thành công')</script>";
        else
        echo"<script>alert('Xóa thất bại')</script>";
        $this->view('MasterLayout',['page'=>'Sinhvien_v','dulieu'=>$this->sinhvien->sinhvien_find('','') 
        ]); 
    }
    function Sua($masinhvien){
        $this->view('MasterLayout',['page'=>'Sinhvien_sua','dulieu'=>$this->sinhvien->sinhvien_find($masinhvien,'')
        ]);
    }
    function Sua_sinhvien(){
        if(isset($_POST['btnLuu'])){
            $masinhvien=$_POST['txtMasinhvien'];
            $tensinhvien=$_POST['txtTensinhvien'];
            $gioitinh=$_POST['txtGioitinh'];
            $sodienthoai=$_POST['txtSodienthoai'];
            $email=$_POST['txtEmail'];
            $malop=$_POST['txtMalop'];
            $kq=$this->sinhvien->sinhvien_upd($masinhvien,$tensinhvien,$gioitinh,$sodienthoai,$email,$malop);
            if($kq) 
            $this->view('MasterLayout',['page'=>'Sinhvien_v','dulieu'=>$this->sinhvien->sinhvien_find('',''),
        ]);
        }
    }
}
