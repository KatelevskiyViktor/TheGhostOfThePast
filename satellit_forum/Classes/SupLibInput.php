<?php
class SupLibInput
    extends GenSupLib{
        protected static function getUserData($var){
            $objInputModel = new InputModel();

            //Запрос id тем в которых участвовал пользователь:
            $idThemes = $objInputModel->getIDThemes($var);


            //Запрос инфо тем в которых пользователь участвовал:
            return $objInputModel->getUserThemes($idThemes);

        }
    protected function actPN(){
        //Создание необходимых объектов:
        $objViewAllInfo = new View();
        $objInputModel = new InputModel();

        //Дополнительные расчёты для постраничной навигации:
        $varPage = intval($_GET['page']);
        $varSumThemes = $objInputModel->getIDThemesUser();
        $varVarPage = $this->getVarPage($varPage, $varSumThemes[0]["COUNT(DISTINCT themeID)"]);
        $dataUserThemes = static::getUserData($varVarPage[0]);

        //Создание необходимых View:
        $objViewAllInfo->ctrl = 'Themes';
        $objViewAllInfo->act = 'AllThemes';
        $objViewAllInfo->page = $varVarPage[1];
        $objViewAllInfo->sumData = $varSumThemes[0]["COUNT(DISTINCT themeID)"];
        $objViewAllInfo->dataUserThemes = $dataUserThemes;
    }
    }