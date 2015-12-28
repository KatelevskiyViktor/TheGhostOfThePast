<?php

class VideoController
    extends CommForControll{

    public function actionDate(){

        $objDateSup = new SupportingLib();
        $objDateMod = new ArchiveModel();

        //Безопасность для $_GET и проверка указанного в $_GET значение даты на соответствие имеющимся
        $varMaxValDate = $objDateMod->getMaxValDate();
        $varDate = $objDateSup->getRightVal($varMaxValDate[0]['month'],
                                    $objDateSup->actProcStr($_GET['date']),
                                    '2013-08-01', $varMaxValDate[0]['month']);
        $varPage = intval($_GET['page']);

        //Дополнительные расчёты для запроса
        $varDateSup = $objDateSup->actDate($objDateSup->actProcStr($varDate));

        //Подсчёт количества записей за выбранный период для постраничной навигации
        $varSumForDate = $objDateMod->getDateSql($varDateSup[1], $varDateSup[2],'COUNT(*)');

        //Дополнительные расчёты для постраничной навигации(ПН)
        $varAdditSup = $objDateSup->actPageNav($varPage, $varSumForDate[0]["COUNT(*)"]);

        //Запрос из базы за указанную дату с учётом ПН
        $varSqlForSelectDate = $objDateMod->getDateSql($varDateSup[1], $varDateSup[2],
                                                            'id, title, date, author, mini_img, view',
                                                            " ORDER BY id LIMIT $varAdditSup[0], 20");
        $view = new View();

        $view->title = $varDateSup[0];
        $view->ctrl = 'Video';
        $view->act = 'Date';
        $view->varShortInf = $varSqlForSelectDate;

        //Дополнительные параметры для постраничной навигации
        $view->page = $varAdditSup[1];
        $view->sumVid = +$varSumForDate[0]["COUNT(*)"];

        $view->sqlNav = static::sqlNav();
        $view->sqlFoot = static::sqlFoot();

        $view->display('ViewDate.php');


    }

    public function actionCat(){

        //Безопасность для $_GET и дополнительная проверка параметра cat
        $varCat = intval($_GET['cat']);
        $objCatMod = new CatModel();
        $varMaxValCat = $objCatMod->getMaxValCat();
        $objCatSup = new SupportingLib();
        $varCat =  $objCatSup->getRightVal($varMaxValCat[0]['id'], $varCat, 0, 1);

        $varPage = intval($_GET['page']);

        //Подсчёт количества видео в категории для ПН(постраничная навигация):
		$varSumVid = $objCatMod->getSumVid($varCat);

		//Дополнительные операции для ПН:
        $varAdditSup = $objCatSup->actPageNav($varPage, $varSumVid[0]["COUNT(*)"]);

        //Выборка видеo по категории:
		$varVidCat = $objCatMod->getCatVid($varCat, $varAdditSup[0]);



        $view = new View();

        //Создание свойства для видео по категории
        $view->varShortInf = $varVidCat;

        //Создание свойств для ПН
        $view->cat = $varCat;
        $view->page = $varAdditSup[1];
        $view->sumVid = +$varSumVid[0]["COUNT(*)"];
        $view->ctrl = 'Video';
        $view->act = 'Cat';

        //Создание свойства для информации по категории
        $view->getInfoCat = static::getCatInfo($varCat);

        //Создание свойств для навигационного меню и футера
        $view->sqlNav = static::sqlNav();
        $view->sqlFoot = static::sqlFoot();

        //Подключение страницы вывода
        $view->display('ViewCat.php');
    }

    public function actionVidOnID(){

        $id = intval($_GET['id']);

        //Проверка ID
        $objVidOnId = new VidOnIdModel();
        $objNewSumViews = new SupportingLib();
        $varMostID = $objVidOnId->actMostID();
        $id = $objNewSumViews->actID($id, $varMostID);


        //Получение видео по ID
        $varVidID = $objVidOnId->getQuerVidId($id);

        //Дополнительные расчёты для инфо о просмотрах
        $varActNewSumViews = $objNewSumViews->actNewSumView($varVidID[0]['view']);

        //Обновление информации по просмотрам
        $objVidOnId->actUpdViewNum($varActNewSumViews, $id);

        $view = new View();
        $view->varVidID = $varVidID;

        $view->sqlNav = static::sqlNav();
        $view->sqlFoot = static::sqlFoot();

        $view->display('ViewVidOnID.php');
    }

    public function actionInd(){

        //Запрос последнего видео из базы в index
        $indObj = new IndModel();
        $resInd = $indObj->forInd();
        $resIndSet = $indObj->forIndSet();

        //Создание объектов класса View для вывода информации
        $view = new View();
        $view->resInd = $resInd;
        $view->resIndSet = $resIndSet;

        $view->sqlNav = static::sqlNav();
        $view->sqlFoot = static::sqlFoot();


        $view->display('ViewIndex.php');
    }

    public function actionHeroes(){
        $id = intval($_GET['id']);

        //Проверка ID
        $objHeroes = new HeroesModel();
        $objHeroesSup = new SupportingLib();
        $varMostID = $objHeroes->actMostID();
        $id = $objHeroesSup->actID($id, $varMostID);

        //Получение видео по ID
        $varHero = $objHeroes->getHero($id);

        //Обновление информации по просмотрам
        $objHeroes->actUpdView($objHeroesSup->actNewSumView($varHero[0]['view']), $id);

        $view = new View();
        $view->varHero = $varHero;

        $view->sqlNav = static::sqlNav();
        $view->sqlFoot = static::sqlFoot();

        $view->display('ViewHeroes.php');


    }


}