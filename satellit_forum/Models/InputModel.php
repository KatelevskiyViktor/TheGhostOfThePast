<?php
class InputModel
    extends AbstractModel{

        public function actDel(){
			$res = $this->addUpdDel("DELETE FROM ip WHERE UNIX_TIMESTAMP()-UNIX_TIMESTAMP(date)>900");
            if(!$res)throw new ErrDBInputModel('Ошибка! Метод actDel в
                                           InputModel не смог получить данные из базы.') ;
        }

        public function getSumErrID($ip){
            return $this->getAnyDataOnParam("SELECT col FROM ip WHERE ip =:ip", [':ip' => $ip]);
        }

        public function getUser($login, $password){
            return $this->getAnyDataOnParam('SELECT * FROM users WHERE login = :login AND password = :password',
                                                [':login' => $login, ':password' => $password]);
        }

		public function updErrSum($ip){
			return $this->getAnyDataOnParam('UPDATE ip SET col=col+1, date = NOW() WHERE ip = :ip', [':ip' => $ip]);
		}
		
		public function insErrUsr($ip){
			return $this->getAnyDataOnParam('INSERT INTO ip(ip,date,col) VALUES(:ip,NOW(),1)', [':ip' => $ip]);
		}

		public function getIDThemesUser(){
			return $this->getAnyDataOnParam('SELECT COUNT(DISTINCT themeID) FROM messages WHERE author=:login', [':login' => $_SESSION['login']]);
		}
		
		public function getUserThemes($arr){
			$newArr = [];
				for($i = 0; $i < count($arr); $i++){
					$newArr[$i] = $this->getAnyDataOnParam('SELECT * FROM themes WHERE id = :themeID', [':themeID' => $arr[$i]['themeID']]);
				}
			return $newArr; 
		}
		
		
		public function getIDThemes($var){
			return $this->getAnyDataOnParam('SELECT DISTINCT themeID FROM messages WHERE author=:login ORDER BY date DESC LIMIT '.$var.', 20', [':login' => $_SESSION['login']]);
		}
}