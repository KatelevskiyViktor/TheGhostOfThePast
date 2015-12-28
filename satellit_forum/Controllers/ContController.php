<?php
class ContController{
           public function actionContacts(){

               //Вывод HTML:
               $objViewAll = new View();
               $objViewAll->display('ViewContacts.php');
        }

}