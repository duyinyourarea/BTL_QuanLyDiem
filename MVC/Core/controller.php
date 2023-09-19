<?php
class Controller
{
    public function mode($mode){
        include_once './MVC/Models/'.$mode.'.php';
        return new $mode;
    }
    function view($view, $data= []){
        include_once './MVC/Views/'.$view.'.php';
    }
}
?>