<?php 
class Home extends Controller{
    function Get_data(){
        $this->view('MasterLayout',[
            'page'=>'Lop_v'
        ]);
    }
}
?>