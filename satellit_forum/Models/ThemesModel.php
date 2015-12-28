<?php
class ThemesModel
    extends AbstractModel{

        public function actSumThemes(){

                $res = $this->getAnyData('SELECT COUNT(*) FROM themes');

                if(empty($res))throw new ForError('Ошибка! Метод actSumThemes() в
                                        ThemesModel.php не смог получить данные из базы.');

            return $res;
        }

        public function getAllThemes($var){
                $res = $this->getAnyData("SELECT * FROM themes ORDER BY id LIMIT ".$var.", 20");

            if(empty($res))throw new ForError('Ошибка! Метод getAllThemes() в
                                        ThemesModel.php не смог получить данные из базы.');

            return $res;
        }

        public function addNewTheme($TitleTheme, $login){
                $res = $this->addUpdDel("INSERT INTO themes(author, name_theme, LateMessAuth, LateMessDate,
                                                  TotalNumMess) VALUES(:login, :TitleTheme, :login, NOW(), 1)",
                    [':login' => $login, 'TitleTheme' => $TitleTheme, ':login' => $login]);

                if(empty($res))throw new ForError('Ошибка! Метод addNewTheme() в
                                           ThemesModel.php не смог добавить данные в базу.');

            return $res;
        }

        public function getNewThemeID(){
                $res = $this->getAnyData('SELECT id FROM themes ORDER BY id DESC LIMIT 1');

                if(empty($res))throw new ForError('Ошибка! Метод getNewThemeID() в
                                           ThemesModel.php не смог получить данные из базы.');

            return $res;
        //Коментр
        public function addMessNewTheme($idNewTheme, $message, $login, $avatar){
                $res = $this->addUpdDel("INSERT INTO messages(themeID, message, author, date, avatar)
                                                  VALUES(:idNewTheme, :message, :login, NOW(), :avatar)",
                    [':idNewTheme' => $idNewTheme, ':message' => $message, ':login' => $login,
                        ':avatar' => $avatar]);

                if(empty($res))throw new ForError('Ошибка! Метод addMessNewTheme() в
                                           ThemesModel.php не смог добавить данные в базу.');

            return $res;
        }

        public function actRepTheme($titleTheme){!!!!!!!!!!!!!!!!!!!!!!!!!!Закончить с ошибками добавления новой темы
                $res = $this->getAnyDataOnParam('SELECT id FROM themes WHERE name_theme = :titleTheme',
                    [':titleTheme' => $titleTheme]);

                if(empty($res))throw new ForError('Ошибка! Метод actRepTheme() в
                                           ThemesModel.php не смог получить данные из базы.');

           return $res;
        }
}