<?php
class NewPassModel
    extends AbstractModel{

    public function checkMatchesMail($mail){
        return $this->getAnyDataOnParam("SELECT id, login FROM users WHERE mail = :mail",[':mail' => $mail]);
    }

    public function checkMatchesLogin($login){
        return $this->getAnyDataOnParam("SELECT id FROM users WHERE login = :login",[':login' => $login]);
    }

    public function addKey($key, $mail){
        return $this->addUpdDel("UPDATE users SET tmp_kod = :key WHERE mail=:mail",[':key' => $key,':mail' => $mail]);
    }
	
	public function checkCode($code){
		return $this->getAnyDataOnParam('SELECT id FROM users WHERE tmp_kod = :code',[':code' => $code]);
	}
	
	public function addNewPass($pass){
		return $this->addUpdDel('UPDATE users SET password = :pass WHERE id = :sess',
                                                    [':sess' => $_SESSION['newPassOnID'][0]['id'], ':pass' => $pass]);
	}

    public function actDel(){
        return $this->getAnyData("DELETE FROM sumErrNewPassCode WHERE UNIX_TIMESTAMP()-UNIX_TIMESTAMP(date)>900");
    }

    public function getSumErrID($ip){
        return $this->getAnyDataOnParam('SELECT col FROM sumErrNewPassCode WHERE ip =:ip', [':ip' => $ip]);
    }

    public function updErrSum($ip){
        return $this->addUpdDel("UPDATE sumErrNewPassCode SET col=col+1, date = NOW() WHERE ip = :ip", [':ip' => $ip]);
    }

    public function insErrUsr($ip){
        return $this->addUpdDel('INSERT INTO sumErrNewPassCode(ip,date,col) VALUES(:ip,NOW(),1)', [':ip' => $ip]);
    }
}