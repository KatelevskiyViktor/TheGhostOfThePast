<?php
class ForError{
    public function ErrForFoot(){
        return 'Ошибка! Метод forFoot() в FootModel.php не смог получить данные из базы.';
    }

    public function ErrForNav($val){
        switch($val){
            case 0:
                return "<br /><br /> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Ошибка! Метод forNavCat()
в <br />&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  NavMenuModel.php не смог получить
 <br />&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp данные из базы.";

            case 1:
                return "<br /><br /> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Ошибка! Метод forNavPosVid()
в <br />&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  NavMenuModel.php не смог получить
 <br />&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp данные из базы.";

            case 2:
                return "<br /><br /> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Ошибка! Метод forNavArh()
в <br />&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  NavMenuModel.php не смог получить
 <br />&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp данные из базы.";

            case 3:
                return "<br /><br /> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Ошибка! Метод forNavFriend()
в <br />&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  NavMenuModel.php не смог получить
 <br />&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp данные из базы.";
        }
    }

    public function ErrForInd($val){

        switch($val) {
            case 0:
                return 'Ошибка! Метод forIndSet() в IndModel.php не смог получить данные из базы.';

            case 1:
                return 'Ошибка! Метод forInd() в IndModel.php не смог получить данные из базы.';
        }
    }

    public function getErrForCat($val){

    switch($val) {
        case 0:
            return 'Ошибка! Метод getInfoCat() в CatModel.php не смог получить данные из базы.';

        case 1:
            return 'Ошибка! Метод getCat() в CatModel.php не смог получить данные из базы.';
    }
}

    public function getErrForDate(){
                return 'Ошибка! Метод getDateSql() в ArchiveModel() не смог получить данные из базы.';
    }

    public function getErrForVidOnId(){
                return 'Ошибка! Метод getQuerVidId() в VidOnIdModel() не смог получить данные из базы.';
    }


    public function getErrForHeroes(){
        return 'Ошибка! Метод getHero() в HeroesModel() не смог получить данные из базы.';
    }


}