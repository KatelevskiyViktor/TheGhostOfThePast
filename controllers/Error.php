<?php
class Error
    extends CommForControll{
    public function actionErr($e){
        $view = new View();
        $view->error = $e->getMessage();
        $view->sqlNav = static::sqlNav();
        $view->sqlFoot = static::sqlFoot();
        $view->display('error.php');
}
}