<?php

class SupLibAllErr
{
    public function viewErrDataUserTheme($errNum, $idActTheme){
    switch($errNum){
        case 1:return "<p class='ErrP'>При создании темы Вы забыли ввести текст заголовка или сообщения, либо количество символов к заголовке слишком велико.
                    <input type='button' onclick='history.back()' value='Вернуться и изменить'></p>";

        case 2:return "<p class='ErrP'>Такая тема уже создана! Хотите посмотреть её:
                <a class='fSizeErr' href='http://".$_SERVER['HTTP_HOST']."/satellit_forum/index.php?ctrl=Mess&act=MessOnID&id=".$idActTheme."'>
                Тема с таки же именем!</a> Если хотите поправить свою тему:
                <input type='button' onclick='history.back()' value='Вернуться и изменить'></p>";

        case 3:return "<p class='ErrP'>Поздравляю! Тема успешно добавлена! Через несколько секунд Вы будете перенаправлены в неё.</p>
                <meta http-equiv=refresh content=3;URL=http://".$_SERVER['HTTP_HOST']."/satellit_forum/index.php?ctrl=Mess&act=MessOnID&id="
        .$idActTheme.">";

    }
}

    public function viewErrDataInputModel($errNum){
        switch($errNum){
            case 1:return "<p class='ErrP'>Такой комбинации логина и пароля не существует.</p>";

            case 2:return "<p class='ErrP'>Вы не ввели логин или пароль. Попробуйте ещё раз.</p>";

            case 3:return "<p class='ErrP'>Вы набрали логин и пароль неверно 3 раза. Подождите 15 мин до следующей попытки.</p>";

        }
    }
}