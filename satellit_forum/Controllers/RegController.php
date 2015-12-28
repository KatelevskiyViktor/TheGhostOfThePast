<?php
class RegController
    extends SupLibReg{
    public function actionRegForm(){

        //Создание необходимых объектов:
        $objViewAll = new View();

        //БЛОК ПРОВЕРКИ И ДОБАВЛЕНИЯ ДАННЫХ ПОЛЬЗОВАТЕЛЯ:

       switch($this->cheсkerErrRegForm($_POST)){
           //Маркер ошибки пароля:
           case 'pass':$objViewAll->ErrPass = true;
               break;
           //Маркер ошибки почты:
           case 'mail':$objViewAll->ErrMail = true;
               break;
           //Маркер ошибки незаполненных полей:
           case 'emp':$objViewAll->ErrEmpty = true;
               break;
           //Маркер ошибки размера фото:
           case 'img':$objViewAll->ErrIMG = true;
               break;
           //Маркер ошибки капчи:
           case 'capcha':$objViewAll->ErrCapcha = true;
               break;
           //Маркер ошибки длинны логина и пароля:
           case 'passLog':$objViewAll->ErrLogPass = true;
               break;
           //Маркер ошибки логина(повторение):
           case 'login':$objViewAll->ErrLog = true;
               break;
           //Маркер ошибки расширения фото:
           case 'notFormat':$objViewAll->ErrNotFormat = true;
               break;
           //Добавление пользователя + сообщение при добавлении:
           case 'noErr':$objViewAll->UsAdded = $this->addUserData($_POST);
               
       };
        //Вывод HTML:
        $objViewAll->display('ViewRegForm.php');
    }


}