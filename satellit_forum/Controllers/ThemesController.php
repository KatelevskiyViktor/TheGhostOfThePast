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

            //Добавление новой темы + работа с данными таблицы сообщений:
            if (!empty($_POST['text']) && !empty($_POST['titleTheme']) && strlen($_POST['titleTheme']) < 120) {
                try {
                    //Проверка на повторяемость темы:
                    $idTheme = $objThemeModel->actRepTheme($_POST['titleTheme']);

                    if (!empty($idTheme)) {
                        $viewAllInfo->repTheme = true;
                        $viewAllInfo->idRepTheme = $idTheme;
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

                        //Добавление свойств во View:
                        $viewAllInfo->addSucc = true;
                        $viewAllInfo->idNewTheme = $idNewTheme[0]['id'];

                    }
                } catch (ForError $e) {
                    $viewAllInfo->Err = $e->getMessage();
                }

            } else if ((empty($_POST['text']) || empty($_POST['titleTheme']) ||
                    strlen($_POST['titleTheme']) > 120) && isset($_POST['ok'])
            ) {
                $viewAllInfo->noText = true;
            }


                try {
                    //Доп. расчёты для постраничной навигации:
                    $varSumThemes = $objThemeModel->actSumThemes();
                    $varVarPage = $this->getVarPage($varPage, $varSumThemes[0]["COUNT(*)"]);

                    //Выборка тем с учётом постраничной навигации:
                    $varAllThemes = $objThemeModel->getAllThemes($varVarPage[0]);
                }catch (ForError $e){
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