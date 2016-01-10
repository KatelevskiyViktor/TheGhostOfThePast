<?php
class ThemesController
    extends GenSupLib{
    public function actionAllThemes()
    {
        //Создание необходимых объектов:
        $objThemeModel = new ThemesModel();
        $viewAllInfo = new View();

        //Проверка пользовательских данных и создание свойств для вывода инфо:
        $varPage = intval($_GET['page']);
        try {
            //Добавление новой темы + работа с данными таблицы сообщений:
            if (!empty($_POST['text']) && !empty($_POST['titleTheme']) && strlen($_POST['titleTheme']) < 120) {

                //Проверка на повторяемость темы:
                $idTheme = $objThemeModel->actRepTheme($_POST['titleTheme']);

                if (!empty($idTheme)) {
                    throw new ErrUser($this->viewErrDataUserTheme(2, $idTheme));
                } else {

                    //Создание необходимых переменных
                    $arr = $this->getCheckVal([$_POST['text'], $_POST['titleTheme']]);
                    $text = $arr[0];
                    $titleTheme = $arr[1];

                    $login = $_SESSION['login'];
                    $avatar = $_SESSION['avatar'];


                    //Обработка BB текста сообщения:
                    $text = $this->actText($text);

                    //Добавление новой темы:
                    $objThemeModel->addNewTheme($titleTheme, $login);

                    //Определение ID новой темы:
                    $idNewTheme = $objThemeModel->getNewThemeID();


                    //Добавление сообщения новой темы в таблицу сообщений:
                    $objThemeModel->addMessNewTheme($idNewTheme[0]['id'], $text, $login, $avatar);

                    //Создание маршкера ошибки повторяемой темы:
                    throw new ErrUser("".$this->viewErrDataUserTheme(3, $idNewTheme[0]['id'])."");

                }


            } else if ((empty($_POST['text']) || empty($_POST['titleTheme']) ||
                    strlen($_POST['titleTheme']) > 120) && isset($_POST['ok'])) {

                throw new ErrUser($this->viewErrDataUserTheme(1));
            }
        } catch (ErrDBModel $e) {
            $viewAllInfo->Err = $e->getMessage();
        }catch(ErrUser $e){
            $viewAllInfo->ErrUser = $e->getMessage();
        }

                try {
                    //Доп. расчёты для постраничной навигации:
                    $varSumThemes = $objThemeModel->actSumThemes();
                    $varVarPage = $this->getVarPage($varPage, $varSumThemes[0]["COUNT(*)"]);

                    //Выборка тем с учётом постраничной навигации:
                    $varAllThemes = $objThemeModel->getAllThemes($varVarPage[0]);
                }catch (ErrDBModel $e){
                    $viewAllInfo->Err = $e->getMessage();
                }



        //Вывод информации:
        $viewAllInfo->ctrl = 'Themes';
        $viewAllInfo->act = 'AllThemes';
        $viewAllInfo->page = $varVarPage[1];
        $viewAllInfo->sumData = $varSumThemes[0]["COUNT(*)"];
        $viewAllInfo->viewAllThemes = $varAllThemes;
        $viewAllInfo->display('ViewAllThemes.php');

    }



}