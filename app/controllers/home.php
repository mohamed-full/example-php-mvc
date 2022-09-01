<?php

class home extends controller
{

    public function index($create='null')
    {
        $this->view('index',['title'=>$create]);
    }

    public function create($create='null')
    {
        $this->view('index',['title'=>$create]);
    }

    public function modelc($user=null) //model
    {
        $usera=$this->model('user');
        $usera->name=$user;
        $this->view('index',['title'=>$usera->name]);
    }

}