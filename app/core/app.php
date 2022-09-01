<?php

class App
{
    protected $controller ='home';
    protected $method='index';
    protected $parameter=[];

    protected $print=[];

    public function __construct()
    {
        $url = $this->parseurl();
        
        if(file_exists('../app/controllers/'.$url[0].'.php'))
        {
            $this->controller=$url[0];
            $this->print["class"]=$url[0];
            unset($url[0]);
        }

        require_once '../app/controllers/'.$this->controller.'.php';
        $this->controller=new $this->controller;

        if(isset($url[1]))
        {
            if(method_exists($this->controller,$url[1]))
            {
                $this->method=$url[1];
                $this->print["method"]=$url[1];
                unset($url[1]);
            }
        }

        $this->parameter = $url ? array_values($url) : [];
        $this->print['params']=$this->parameter;

        call_user_func_array([$this->controller,$this->method],$this->parameter);

        echo "</br>";
        
        print_r($this->print);

    }

    public function parseurl(){
        if($_GET['url'])
        {
            return $url = explode('/',filter_var( rtrim($_GET['url'],'/') , FILTER_SANITIZE_URL));
        }
    }

}
?>