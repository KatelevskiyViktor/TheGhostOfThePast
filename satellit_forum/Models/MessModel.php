<?php
class MessModel
    extends AbstractModel{

        public function getMessOnID($id, $var){
            return $this->getAnyDataOnParam('SELECT id, message, author, date, avatar FROM messages WHERE themeID = :id ORDER BY id LIMIT '.$var.', 20'
                ,[':id' => $id]);
        }

        public function getTitleTheme($id){
            return $this->getAnyDataOnParam('SELECT name_theme FROM themes WHERE id = :id', [':id' => $id]);
        }

        public function addNewMess($idTheme, $message, $login, $avatar){
            return $this->getAnyDataOnParam("INSERT INTO messages(themeID, message, author, date, avatar)
                                              VALUES(:idNewTheme, :message, :login, NOW(), :avatar)",
                                                [':idNewTheme' => $idTheme, ':message' => $message, ':login' => $login,
                                                ':avatar' => $avatar]);
        }

        public function updLastMesOnTh($idTheme, $login, $sumMessTheme){
            return $this->getAnyDataOnParam('UPDATE themes SET LateMessAuth = :login, LateMessDate = NOW(),
                                            TotalNumMess = :sumMessTheme WHERE id = :idTheme', [':login' => $login,
                                            ':sumMessTheme' => $sumMessTheme, ':idTheme' => $idTheme]);
        }

        public function getSumMessTheme($idTheme){
            return $this->getAnyDataOnParam('SELECT COUNT(id) FROM messages WHERE themeID = :idTheme',
                                                [':idTheme' => $idTheme]);
        }


        public function checkMess($mess){
            $lastMess = $this->getAnyData('SELECT message FROM messages ORDER BY id DESC LIMIT 1');
            return $mess === $lastMess[0]['message'] ? true : false ;
        }
}