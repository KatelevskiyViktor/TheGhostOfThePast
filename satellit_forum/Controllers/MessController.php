<?php
class MessController
    extends GenSupLib{
   public function actionMessOnID(){

       //Создание необходимых объектов:
       $objModelMess = new MessModel();
       $viewAllInfo = new View();

       //Проверка пользовательских данных:
       $varPage = intval($_GET['page']);
       $idTheme = intval($_GET['id']);
       $text = $this->getCheckVal([$_POST['text']]);

       //Обработка BB текста сообщения для проверки на flood:
       $text = $this->actText($text[0]);

       //Проверка на flood:
       $flood = $objModelMess->checkMess($text);

       //Определение общего количества сообщений в теме:
       $sumMessTheme = $objModelMess->getSumMessTheme($idTheme);

       //Доп. расчёты для постраничной навигации:
       $varVarPage = $this->getVarPage($varPage, $sumMessTheme[0]['COUNT(id)']);

       if (!empty($_POST['text']) && !$flood) {

               //Создание необходимых переменных и их проверка:
               $login = $_SESSION['login'];
               $avatar = $_SESSION['avatar'];

               //Добавление нового сообщения:
               $objModelMess->addNewMess($idTheme, $text, $login, $avatar);

               //Обновление данных последнего сообщения в теме:
               $objModelMess->updLastMesOnTh($idTheme, $login, $sumMessTheme[0]['COUNT(id)']+1);


       }else if(empty($_POST['text']) && isset($_POST['ok'])){
           $viewAllInfo->noText = true;
       }else if($flood){
           $viewAllInfo->flood = true;
       }

       //Запрос данных для выведения сообщений:
       $titleTheme = $objModelMess->getTitleTheme($idTheme);
       $valMessOnTheme = $objModelMess->getMessOnID($idTheme, $varVarPage[0]);

       //Выведение всех данных:
       $viewAllInfo->ctrl = 'Mess';
       $viewAllInfo->act = 'MessOnID';
       $viewAllInfo->id = $idTheme;
       $viewAllInfo->page = $varVarPage[1];
       $viewAllInfo->sumData = $sumMessTheme[0]['COUNT(id)'];
       $viewAllInfo->valMessOnTheme = $valMessOnTheme;
       $viewAllInfo->titleTheme = $titleTheme;

       $viewAllInfo->display('ViewThemeMess.php');
   }

}