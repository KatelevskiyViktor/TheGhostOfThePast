<?php
class InputModel
    extends AbstractModel{

        public function actDel(){
			$res = $this->addUpdDel("DELETE FROM ip WHERE UNIX_TIMESTAMP()-UNIX_TIMESTAMP(date)>9");
            if(!$res)throw new ErrDBModel('Ошибка! Метод actDel() в
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
			$res = $this->addUpdDel('UPDATE ip SET col=col+1, date = NOW() WHERE ip = :ip', [':ip' => $ip]);
			if(!$res)throw new ErrDBModel('Ошибка! Метод addUpdDel в
                                           InputModel не смог получить данные из базы.') ;
		}
		
		public function insErrUsr($ip){
			$res = $this->addUpdDel('INSERT INTO ip(ip,date,col) VALUES(:ip,NOW(),1)', [':ip' => $ip]);
			if(!$res)throw new ErrDBModel('Ошибка! Метод insErrUsr() в
                                           InputModel не смог получить данные из базы.') ;
		}

		public function getIDThemesUser(){
			$res = $this->getAnyDataOnParam('SELECT COUNT(DISTINCT themeID) FROM messages WHERE author=:login', [':login' => $_SESSION['login']]);
			if(!$res)throw new ErrDBModel('Ошибка! Метод getIDThemesUser() в
                                           InputModel не смог получить данные из базы.') ;
			return $res;
		}
		
		public function getUserThemes($arr){
			$newArr = [];
				for($i = 0; $i < count($arr); $i++){
					$newArr[$i] = $this->getAnyDataOnParam('SELECT * FROM themes WHERE id = :themeID', [':themeID' => $arr[$i]['themeID']]);
					if(!$newArr[$i])throw new ErrDBModel('Ошибка! Метод getUserThemes() в
                                           InputModel не смог получить данные из базы.') ;
				}

			return $newArr; 
		}
		
		
		public function getIDThemes($var){
			$res =  $this->getAnyDataOnParam('SELECT DISTINCT themeID FROM messages WHERE author=:login ORDER BY date DESC LIMIT '.$var.', 20',
												[':login' => $_SESSION['login']]);
			if(!$res)throw new ErrDBModel('Ошибка! Метод getIDThemes() в
                                           InputModel не смог получить данные из базы.') ;
			return $res;
		}
}