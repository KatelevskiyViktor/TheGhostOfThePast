
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<title>Регистрация</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>


<body>

<div id="main">

<?php

include __DIR__.'/../blocks/header.php' ?>

<div id="content" style='text-align:center;'>
<?php

//Блок возможных ошибок:

    if($this->ErrIMG){
        echo "<p class='ErrP'>Размер изображения не должен превышать 2Мб.
                <input type='button' onclick='history.back()' value='Вернуться и исправить'></p>";
                     }
    if($this->ErrMail){
        echo "<p class='ErrP'>Формат адреса электронной почты указан неправильно. Либо такой адрес уже есть в базе.
                        <input type='button' onclick='history.back()' value='Вернуться и исправить'></p>";
    }

    if($this->ErrEmpty){
        echo "<p class='ErrP'>Одно или несколько полей были не заполнены, попробуйте ещё раз.
                <input type='button' onclick='history.back()' value='Вернуться и исправить'></p>";
    }

    if($this->ErrCapcha){
        echo "<p class='ErrP'>Вы неправильно решили пример!
                <input type='button' onclick='history.back()' value='Вернуться и исправить'></p>";
    }

    if($this->ErrLogPass){
        echo "<p class='ErrP'>Пароль и логин должны быть больше 4-х и меньше 15-ти символов.
                <input type='button' onclick='history.back()' value='Вернуться и исправить'></p>";
    }

    if($this->ErrLog){
        echo "<p class='ErrP'>Такой логин уже зарегистрирован. Выберите другой логин.
                <input type='button' onclick='history.back()' value='Вернуться и исправить'></p>";
    }

    if($this->ErrNotFormat){
        echo "<p class='ErrP'>Не правильный формат фото. Нужно: jpg, gif, png.
                <input type='button' onclick='history.back()' value='Вернуться и исправить'></p>";
    }

    if($this->ErrPass){
        echo "<p class='ErrP'>Введённые пароли не совпадают, либо не соответствуют формату (Формат: > 3-х символов).
                <input type='button' onclick='history.back()' value='Вернуться и исправить'></p>";
    }

    if($this->UsAdded){
        echo "<p class='ErrP'>Отлично! Вы добавлены, поздравляю)))
                Через несколько секунд Вы будете перенаправлены на страницу авторизации.</p>
                <meta http-equiv = 'Refresh' content='5; URL=index.php?ctrl=Input&act=InputForm'>";
    }
?>

<form id="reg_form" action="index.php?ctrl=Reg&act=RegForm" method="post" name="reg_form" enctype="multipart/form-data" >
<p>
<label>Ваш логин:<br>
<input name="login" type="text" size="15" placeholder = 'Введите логин...'></label>
</p>

<p class="p_reg">
<label>Ваш пароль:<br>
<input name="password" type="password" size="15" placeholder = 'Введите пароль...'></label>
</p>

    <p class="p_reg">
        <label>Ваш пароль ещё раз:<br>
            <input name="passwordSec" type="password" size="15" placeholder = 'Пароль ещё раз...'></label>
    </p>



<p class="p_reg">
<label>Адрес вашей электронной почты:<br>
<input name="mail" type="text" size="15" placeholder = 'Адрес эл.почты...'></label>
</p>

<p class="p_reg">
    <label>Фото для аватара(Формат: jpg, gif, png и < 2Мб):<br>
    <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
    <input style="background-image:none;" name="fupload" type="file"></label>
</p>

<p class="p_reg">
Подставьте свои значения и впишите результат:<br>
<input name="ch1" type="text" size="2" maxlength="2"> +
    <input name="ch2" type="text" size="2" maxlength="2"> -
    <?php
            $rand = mt_rand(1, 9);
            echo $rand."<input type='hidden' name='rand' value='".$rand."'>";
    ?>
    = <input name="rez" type="text" size="2" maxlength="2">
</p>


<p class="p_reg">

<input name="submit" type="submit" value="Зарегистрироваться">
</p>
</form>
</div>


</div>




</body>






</html>