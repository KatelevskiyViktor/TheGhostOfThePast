<?php
require_once __DIR__.'/blocks/ie_hendler.php';
require_once __DIR__ . '/blocks/autoload.php';


if(isset($_GET['ctrl']) && isset($_GET['act'])){

    $arrCtrl = 'Video Contacts';
    $arrAct = 'Contacts Date Cat VidOnID Ind Heroes';

    if(strpos($arrCtrl, $_GET['ctrl']) === false || strpos($arrAct, $_GET['act']) === false){
        $ctrl = 'Video';
        $act = 'Ind';
    }else{
        $ctrl = $_GET['ctrl'];
        $act = $_GET['act'];

    }

}else {
    $ctrl = 'Video';
    $act = 'Ind';
}
$className = $ctrl.'Controller';
$controller = new $className;

$method = 'action'.$act;
$controller->$method(); 



