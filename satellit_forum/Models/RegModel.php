<?php
class RegModel
    extends AbstractModel{

        public function addUser($arr = []){
            return $this->addUpdDel('INSERT INTO users(login, avatar, mail, password)
                    VALUES (:login, :avatar, :mail, :password)',
                    [':login' => $arr['login'], ':avatar' => $arr['avatar'], ':mail' => $arr['mail'],
                        ':password' => $arr['password']]);
        }

    public function checkMatchesMail($mail){
        return $this->getAnyDataOnParam("SELECT id, login FROM users WHERE mail = :mail",[':mail' => $mail]);
    }

    public function checkMatchesLogin($login){
        return $this->getAnyDataOnParam("SELECT id FROM users WHERE login = :login",[':login' => $login]);
    }
}