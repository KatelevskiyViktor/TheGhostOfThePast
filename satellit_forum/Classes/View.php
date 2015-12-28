<?php
class View{
    protected $data = [];

    public function  __set($key, $val){
        $this->data[$key] = $val;
    }

    public function __get($key){
        return $this->data[$key];
    }

    public function display($template){

        include __DIR__.'/../Views/'.$template;
    }

}