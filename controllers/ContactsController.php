<?php

class ContactsController
    extends CommForControll{
    public  function actionContacts(){
        $objInfoInd = new ContactsModel();
        $varInfoInd = $objInfoInd->getIndInfo();

        $view = new View();
        $view->varInfoInd = $varInfoInd;

        $view->sqlNav = static::sqlNav();
        $view->sqlFoot = static::sqlFoot();


        $view->display('ViewContacts.php');

}

}