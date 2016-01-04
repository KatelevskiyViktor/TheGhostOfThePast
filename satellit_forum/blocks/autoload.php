<?php
//Автозагрузка классов
function __autoload($class){
    if(file_exists(__DIR__.'/../Controllers/'.$class.'.php')){
        require_once __DIR__.'/../Controllers/'.$class.'.php';
    }else if(file_exists(__DIR__.'/../Models/'.$class.'.php')){
        require_once __DIR__.'/../Models/'.$class.'.php';
    }else if(file_exists(__DIR__.'/../Classes/'.$class.'.php')){
        require_once __DIR__.'/../Classes/'.$class.'.php';
    }else if(file_exists(__DIR__.'/../ErrClasses/'.$class.'.php')){
        require_once __DIR__.'/../ErrClasses/'.$class.'.php';
    }
}