<?php
class SupLibInput
    extends GenSupLib{
       private function getUserData($var){
            $objInputModel = new InputModel();

            //Запрос id тем в которых участвовал пользователь:
            $idThemes = $objInputModel->getIDThemes($var);


            //Запрос инфо тем в которых пользователь участвовал:
            return $objInputModel->getUserThemes($idThemes);

        }
    protected function actPN(){
        //Создание необходимых объектов:
        $objInputModel = new InputModel();

        //Дополнительные расчёты для постраничной навигации:
        $varPage = intval($_GET['page']);
        $varSumThemes = $objInputModel->getIDThemesUser();
        $varVarPage = $this->getVarPage($varPage, +$varSumThemes[0]["COUNT(DISTINCT themeID)"]);

        $dataUserThemes = $this->getUserData($varVarPage[0]);

        return array($varVarPage[1], $varSumThemes[0]["COUNT(DISTINCT themeID)"], $dataUserThemes);
    }

}