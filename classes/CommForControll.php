<?php

abstract class CommForControll{
    protected static function sqlNav(){
        //Запрос из базы для навигационного меню
        $navObj = new NavMenuModel();

        return array($navObj->forNavCat(),
        $navObj->forNavPosVid(),
        $navObj->forNavArh(),
        $navObj->forNavFriend());
    }

    protected static function sqlFoot(){
        //Запрос из базы для footer
        $footObj = new FootModel();

        return $footObj->forFoot();
    }

    public function getCatInfo($cat){
        //Запрос информации о категории из базы
        $catObj = new CatModel();

        return $catObj->getInfoCat($cat);
    }

}