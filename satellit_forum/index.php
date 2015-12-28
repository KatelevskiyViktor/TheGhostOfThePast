<?php
require_once __DIR__.'/blocks/hendler_ip.php';
require_once __DIR__.'/blocks/ie_hendler.php';
require_once __DIR__.'/blocks/autoload.php';

if(empty($_GET['exit'])){
    session_start();
    $_SESSION['errAddMessNT']='Check The Microphon';
}
else{
    $stopSess = new GenSupLib();
    $stopSess->stopSess();
}

if(isset($_GET['ctrl']) && isset($_GET['act'])){

    $arrCtrl = 'Themes Mess Input Reg NewPass Search Cont';
    $arrAct = 'AllThemes MessOnID InputForm RegForm NewPass Searching Contacts InputUser';

    if(strpos($arrCtrl, $_GET['ctrl']) === false || strpos($arrAct, $_GET['act']) === false){
        $ctrl = 'Themes';
        $act = 'AllThemes';

    }else{
        $ctrl = $_GET['ctrl'];
        $act = $_GET['act'];
    }

}else {
    $ctrl = 'Themes';
    $act = 'AllThemes';
}

$className = $ctrl.'Controller';
$controller = new $className;

$method = 'action'.$act;
$controller->$method();