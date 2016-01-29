<?php
class InputController
	extends SupLibInput{

    public function actionInputForm(){
		//Создание необходимых объектов:
		$objViewAllInfo = new View();

        //Проверка наличия Cookie для формы:
        if(!empty($_COOKIE['login']) && !empty($_COOKIE['password'])){
                $objViewAllInfo->login = $_COOKIE['login'];
                $objViewAllInfo->password = $_COOKIE['password'];
            }


		if(!empty($_SESSION['login'])){
			//ДОПОЛНИТЕЛЬНАЯ ИНФОРМАЦИЯ О УЧАСТИИ ПОЛЬЗОВАТЕЛЯ В ТЕМАХ:
			$data = $this->actPN();

			//Создание необходимых View:
			$objViewAllInfo->ctrl = 'Input';
			$objViewAllInfo->act = 'InputForm';
			$objViewAllInfo->page = $data[0];
			$objViewAllInfo->sumData = $data[1];
			$objViewAllInfo->dataUserThemes = $data[2];
		}



        //Вывод HTML:
		!empty($_SESSION['login'])?$objViewAllInfo->display('ViewUserData.php')
			:$objViewAllInfo->display('ViewInputForm.php');

    }

    public function actionInputUser(){

        //Создание необходимых объектов:

        $objInputModel = new InputModel();
        $objViewAllInfo = new View();
		try{
			//Удаление всех записей старше 15 минут из таблицы Users:
			$objInputModel->actDel();
		}catch(ErrDBModel $e){
			$objViewAllInfo->ErrDBModel = $e->getMessage();
		}
		//Получение IP клиента:
		$ip = empty(getenv("HTTP_X_FORWARDED_FOR"))? getenv("REMOTE_ADDR"):getenv("HTTP_X_FORWARDED_FOR");
	
		//Определение количества раз, ошибок ввода данных:
        $sumErrID = $objInputModel->getSumErrID($ip);
		$sumErrID = empty($sumErrID)?0:$sumErrID[0]['col'];
		try{
			if($sumErrID < 3){

				//Создание сессии:
				if(!empty($_POST['login']) && !empty($_POST['password'])) {

					//Обработка данных пользователя:
					$arrAuth = $this->getCheckVal([$_POST['login'],$_POST['password']]);
					$login = $arrAuth[0];
					$password = $arrAuth[1];

					//Обработка пароля:
					$procPass = $this->getProcPass($password);

					//Проверка пользователя:
					$varUser = $objInputModel->getUser($login, $procPass);

					if(!empty($varUser)){

						//Добавление в $_SESSION:
						$this->createSess(['login' => $varUser[0]['login'],
														'id' => $varUser[0]['id'], 'avatar' => $varUser[0]['avatar']]);

						//Создание cookie:
						if($_POST['cook']){$this->setCookie(['login' => $login, 'password' => $password]);}

						//ДОПОЛНИТЕЛЬНАЯ ИНФОРМАЦИЯ О УЧАСТИИ ПОЛЬЗОВАТЕЛЯ В ТЕМАХ:
						$data = $this->actPN();

						//Создание необходимых View:
						$objViewAllInfo->ctrl = 'Input';
						$objViewAllInfo->act = 'InputUser';
						$objViewAllInfo->page = $data[0];
						$objViewAllInfo->sumData = $data[1];
						$objViewAllInfo->dataUserThemes = $data[2];

					}
					else{

						if(!empty($sumErrID)){
							//Обновление количества сделанных ошибок:
							$objInputModel->updErrSum($ip);
						}else{
							//Создание 1-ой ошибки ввода данных:
							$objInputModel->insErrUsr($ip);
						}
						//Маркер ошибки ввода данных:
						throw new ErrUser($this->viewErrDataUserInput(1));
					}
				}else{
					//Маркер отсутствия(при введении) логина или пароля:
					throw new ErrUser($this->viewErrDataUserInput(2));
				}

			}
			else{
				//Маркер блокировки пользователя:
				throw new ErrUser($this->viewErrDataUserInput(3));
			}
		}catch(ErrUser $e){
			$objViewAllInfo->ErrUser = $e->getMessage();
		}catch(ErrDBModel $e){
			$objViewAllInfo->ErrDBModel = $e->getMessage();
		}


        //Создание необходимых свойств View:
        
		//Выбор HTML:
		!empty($_SESSION['login'])?$objViewAllInfo->display('ViewUserData.php')
									:$objViewAllInfo->display('ViewInputForm.php');
        


    }

}