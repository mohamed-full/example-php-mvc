<?php
//file system controller

class controller
{
    public function model($value)
    {

        require_once "../app/models/".$value.".php";//model
        return new $value;

    }

    public function view($view,$data=[]){
        require_once '../app/views/'.$view.'.php';
    }
}
    