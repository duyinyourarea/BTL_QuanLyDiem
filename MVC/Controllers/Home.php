<?php 
class Home extends Controller{
    function Get_data(){
        $this->view('Login_v',[
            'page'=>'Home'
        ]);
    }
    
}
?>