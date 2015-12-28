<?php

/**
 * Created by PhpStorm.
 * User: ViktorKAAa
 * Date: 07.12.2015
 * Time: 8:35
 */
class SupLibSearch
    extends GenSupLib{

    protected function getSearchInfoOrErr($search){

        //Создание необходимых объектов:
        $objForModels = new SearchModel();

        //Проверка POST переменных:
        $search = $this->getCheckVal([$search]);

        //Проверка формата и  введённых данных:
        if(!$this->checkSearchFormat($search[0]))return 'noFormat';

        //Поиск данных ID тем по запросу в базе:
        $search = $objForModels->getThemeIDBySearch($search[0]);

        //Проверка информации запроса в базе:
        if(empty($search))return 'noDataBySearch';

        //Выборка тем по найденным ID:
        return $objForModels->getDataBySearch($search);


    }

    protected function checkSearchFormat($search){
        return empty($search) || strlen($search) < 4 ? false : true;
    }
}