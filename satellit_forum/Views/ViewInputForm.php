
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
    <title>Страница авторизации</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>


<body>

<div id="main">
    <?php require_once __DIR__.'/../blocks/header.php';?>

    <div id="content">
        <?php
        //Блок вывода ошибок работы с БД и удаления маркера ошибок:
        if($ErrUser = $this->ErrUser) {
           echo $ErrUser;
        }

           echo "<center>
                        <form id='inputForm' method='post' action='index.php?ctrl=Input&act=InputUser'>
                            <p>
                                <label>Введите логин:</br>
                                    <input type='text' name='login' size='15' maxlength='15'";
                                            if(!empty($_COOKIE['login']))
                                            {
                                                echo ' value = "'.$_COOKIE['login'].'">';
                                            }
                                            echo "</label>
                            </p>

                            <p>
                                <label>Введите пароль:</br>
                                    <input type='password' name='password' size='15' maxlength='15'";
                                            if(!empty($_COOKIE['password']))
                                            {
                                                echo ' value = "'.$_COOKIE['password'].'">';
                                            }

                                echo "</label>
                            </p>

                            <p><input name='cook' type='checkbox' value='1'>Запомнить меня</p>
                            <p><input type='submit' name='submit' value='Войти'></p>
                            <p><a href='index.php?ctrl=Reg&act=RegForm'>Зарегистрироваться</a></p>
                            <p><a href='index.php?ctrl=NewPass&act=NewPass'>Забыли пароль?</a></p>
                        </form>
                        </center>";


?>


</div>



</body>






</html>