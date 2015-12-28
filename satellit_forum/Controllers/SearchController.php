<?php

/**
 * Created by PhpStorm.
 * User: ViktorKa
 * Date: 04.12.2015
 * Time: 10:56
 */
class SearchController
        extends SupLibSearch{

    public function actionSearching(){

        //Создание необходимых объектов:
        $objForView = new View();

        //Получение данных по поисковому запросу и проверка на ошибки:
        $resSearch = $this->getSearchInfoOrErr($_POST['search']);
        $objForView->search = $_POST['search'];
        switch($resSearch){
            case 'noFormat':$objForView->noFormat = true;
                break;
            case 'noDataBySearch':$objForView->noDataBySearch = true;
                break;
            default:$objForView->dataOnSearch = $resSearch;
                break;
        }
        $objForView->display('ViewSearch.php');
    }
}