<?php
class NewPassController
    extends SupLibNewPass{
    public function actionNewPass(){
        //Удаление сессий вызова других View при повторном заходе через страницу авторизации:
        if($_SERVER['HTTP_REFERER'] != 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']){
            unset($_SESSION['mailForNewPass']);
            unset($_SESSION['newPassOnID']);
        }

        //Создание необходимых объектов:
        $objViewAll = new View();

        //Проверка на ошибки и обновление пароля:
        switch($this->checkerNewPassPostData($_POST)){
            //Маркер ошибок формата почты:
            case 'mail':$objViewAll->ErrMail = true;
                break;
            //Маркер ошибок формата пароля:
            case 'pass':$objViewAll->ErrPass = true;
                break;
            //Маркер ошибок формата временного кода:
            case 'key':$objViewAll->ErrKey = true;
                break;
            //Маркер отсутствия ошибок:
            case 'noErr':$objViewAll->ErrNo = true;
                break;
            //Маркер обозначающий превышение числа ошибок:
            case 'sumAttOff':$objViewAll->ErrSumAtt = true;
                break;
        }





        if($_SESSION['mailForNewPass']){$objViewAll->display('ViewNewPassCode.php');}
		else if($_SESSION['newPassOnID']){$objViewAll->display('ViewNewPass.php');}
        else{$objViewAll->display('ViewNewPassMail.php');}

    }

}