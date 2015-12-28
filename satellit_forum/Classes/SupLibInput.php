<?php
class SupLibInput
    extends GenSupLib{
        protected static function getUserData(){
            $objInputModel = new InputModel();

            $var = 0;

            //Запрос id тем в которых участвовал пользователь:
            $idThemes = $objInputModel->getIDThemes($var);


            //Запрос инфо тем в которых пользователь участвовал:
            return $objInputModel->getUserThemes($idThemes);

        }
    }