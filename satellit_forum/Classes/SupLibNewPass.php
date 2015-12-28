<?php 
class SupLibNewPass
	extends GenSupLib{

	private function addCode($mail){
		$objNewPassModel = new NewPassModel();
		$sumErr = $this->getSumErr($this->getIP());

		if($sumErr > 9){
			session_destroy();
			return 'sumAttOff';
		}
		//Создание первой ошибки:
		else if($sumErr == 0)$objNewPassModel->insErrUsr($this->getIP());
		//Обновление количества сделанных попыток:
		else $objNewPassModel->updErrSum($this->getIP());


		if($userData = $this->checkMail($mail)){
			$_SESSION['mailForNewPass'] = $mail;

			//Создание и отправка кода:
			$key = mt_rand(100000, 999999);
			$objNewPassModel->addKey($key, $mail);
			mail($mail, "Ваши данные:", "Логин:".$userData[0]['login']."; Код:".$key.";");
			return true;
		}
		return false;

	}

	private function checkKey($code){
		$objNewPassModel = new NewPassModel();
		$sumErr = $this->getSumErr($this->getIP());

		//Обновление счётчика количества попыток создания кода:
		if($sumErr > 9){
			unset($_SESSION['mailForNewPass']);
			return 'sumAttOff';
		}
		else if($sumErr == 0)$objNewPassModel->insErrUsr($this->getIP());
		//Обновление количества сделанных попыток:
		else $objNewPassModel->updErrSum($this->getIP());

		if(strlen($code) == 6 && is_numeric($code)){

			$userID = $objNewPassModel->checkCode($code);
			if(!empty($userID)){
				unset($_SESSION['mailForNewPass']);
				$_SESSION['newPassOnID'] = $userID;
				return true;
			}

		}
		return false;
	}

	 public function checkerNewPassPostData($arr = []){
			//Проверка и правка POST переменных:
			$arr = $this->getCheckVal($arr);

			//Проверка формата и наличия адреса эл. почты в базе:
			if ($arr['mail_post']) {
				$mailErr = $this->addCode($arr['mail_post']);

			   if(!$mailErr)return 'mail';
			   else if($mailErr == 'sumAttOff')return 'sumAttOff';
			}
			//Проверка введённого кода:
			if($arr['key']){
				$key = $this->checkKey($arr['key']);
				if($key === false)return 'key';
				if($key === 'sumAttOff' ) return 'sumAttOff';
			}
			//Проверка и добавление нового пароля:
			if($arr['pass1']){
				if(!$this->checkPass($arr['pass1'], $arr['pass2']))return 'pass';
				$arr['pass1'] = $this->encryptPass($arr['pass1']);
				
				$objNewPassModel = new NewPassModel;
				$objNewPassModel->addNewPass($arr['pass1']);

				unset($_SESSION['newPassOnID']);
				return 'noErr';
			}
	}
}
?>