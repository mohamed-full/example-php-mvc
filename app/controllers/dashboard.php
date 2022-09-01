<?php

class dashboard extends controller
{
    public function index()
    {
        echo "dashboard";
    }

    public function create($user=null)
    {
        echo "create the ".$user;
    }
}
?>