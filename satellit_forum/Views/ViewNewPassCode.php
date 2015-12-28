<?php
////Проверка временного кода
//if (isset($_POST['key'])){
//	$key = $_POST['key'];
//
//	if((strlen($key) > 6) || (strlen($key) < 6) || !is_numeric($key))
//	{
//		$key = "";
//	}
//
//	}



?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
    <title>Страница авторизации</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>


<body>
<div id="main">
    <?php include('blocks/header.php'); ?>
    <!---->
    <div id="content">
        <?//
        //
        //if(isset($key) && !isset($pass1) && !isset($pass2))
        //{ $result4 = mysql_query("SELECT tmp_kod FROM users WHERE tmp_kod = '$key'",$db);
        //	$myrow4 = mysql_fetch_array($result4);
        //	if(!$result4)
        //	{
        //		include('blocks/error.php');
        //	}
        //	else if(!$myrow4 || empty($key))
        //	{
        //		echo "<p style='margin-left:10px;'>Вы не правильно ввели временный код попробуйте ещё раз</p>
        //		<form style='margin-left:10px;' method='post' action=''>
        //					<input type='text' size='90' name='key' placeholder='Введите полученный код...'>
        //					<input type='submit' value='Отправить'>
        //				</form>
        //		";
        //		exit();
        //	}
        //	else{
        //	echo "<form style='margin-left:10px;' method='post' action=''>
        //			<input name='pass1' type='password' placeholder='Введите новый пароль...'>
        //			<input name='pass2' type='password' placeholder='Введите новый пароль ещё раз...'>
        //			<input type='submit' value='Отправить'>
        //		</form>";
        //
        //		exit();
        //		}
        //}
        //else if(isset($pass1) && isset($pass2))
        //{
        //	if($pass1 == $pass2 && strlen($pass1) >= 3 && strlen($pass1) <= 15)
        //	{		$pass2 = md5($pass2);
        //			$pass2 = strrev($pass2);
        //			$pass2 = "m3w6e".$pass2."b3p6f";
        //
        //		$result3 = mysql_query("UPDATE users SET password = '$pass2' WHERE mail = '$_SESSION[mail_sess]'", $db);
        //		if($result3)
        //		{
        //			echo "<p style='margin-left:10px;'>Ваш пароль успешно обнавлён! Сейчас Вы будете перенаправлены на страницу авторизации.</p>";
        //			unset($_SESSION['mail_sess']);
        //			unset($_SESSION['temp_for_mail']);
        //			exit("<meta http-equiv = 'Refresh' content='5; URL=input.php'>");
        //		}
        //		else if(!$result3)
        //
        //		{
        //			echo "<p style='margin-left:10px;'>Ошибка! Данные в базу не добавлены. Пожалуйста сообщите об этом администартору,
        //					 указав в письме код ошибки.<strong>HUGO03@mail.ru</strong>
        //						<input type='button' value='Назад' onclick='history.back()'></p>";
        //					echo "<p style='margin-left:10px;'><strong>Код ошибки: </strong></p>";
        //							exit("<label style='margin-left:10px;'>".mysql_error()."</label>");
        //
        //		}
        //	}
        //	else
        //	{
        //	if($pass1 != $pass2)echo "<p style='margin-left:10px;'>Пароли не совпадают. Пожалуйста попробуйте ещё раз.</p>";
        //	else if(strlen($pass1) < 3)echo "<p style='margin-left:10px;'>Пароль не должен быть менее 3-х символов. Пожалуйста попробуйте ещё раз.</p>";
        //	else if(strlen($pass1) > 15)echo "<p style='margin-left:10px;'>Пароль не должен быть более 15-ти символов. Пожалуйста попробуйте ещё раз.</p>";
        //
        //		echo "<form style='margin-left:10px;' method='post' action=''>
        //			<input name='pass1' type='password' placeholder='Введите новый пароль...'>
        //			<input name='pass2' type='password' placeholder='Введите новый пароль ещё раз...'>
        //			<input type='submit' value='Отправить'>
        //		</form>";
        //		exit();
        //	}
        //
        //
        //}
        //if(isset($mail)  && !empty($mail))
        //{
        //
        //	if(isset($_POST['submit_mail']))
        //	{
        //		$result = mysql_query("SELECT login, mail FROM users WHERE mail='$mail'");
        //		$myrow = mysql_fetch_array($result);
        //		$_SESSION['mail_sess'] = $myrow['mail'];
        //		if(!$result)
        //		{
        //			include('blocks/error.php');
        //		}
        //		else if(!$myrow)
        //		{
        //			exit ("<p style='margin-left:10px;'>Такого адреса электронной почты в базе нет!
        //					<input type='button' value='Назад' onclick='history.back()'></p>");
        //
        //		}
        //		else if(isset($_SESSION['mail_sess'])|| $myrow)
        //		{	if(!isset($_SESSION['temp_for_mail']))
        //			{
        //			$kod = mt_rand(100000, 999999);
        //			$result2 = mysql_query("UPDATE users SET tmp_kod = $kod WHERE mail='$mail'",$db);}
        //			if(!$result2)
        //			{
        //				echo "<p style='margin-left:10px;'>Код в базу не добавлен. Пожалуйста сообщите об этом администартору, указав в письме код ошибки.<strong>HUGO03@mail.ru</strong><input type='button' value='Назад' onclick='history.back()'></p>";
        //					echo "<strong>Код ошибки: </strong>";
        //					exit("<label style='margin-left:10px;'>".mysql_error()."</label>");
        //			}
        //			else
        //			{
        //			if(!isset($_SESSION['temp_for_mail']))
        //				{mail("$myrow[mail]", "Ваши данные:", "Логин:$myrow[login]; Код:$kod;");
        //					$_SESSION['temp_for_mail'] = 1;
        //				}
        //
        //
        //			}
        //		}
        //
        //	}
        //	else{
        //		exit("<p style='margin-left:10px;'>Вы вошли на страницу без необходимых параметров!
        //			<input type='button' value='Вернуться' onclick='history.back()'></p>");
        //	}
        //
        //}
        //
        //
        //
        //
        //
        //else{
        //
        //if(($_SERVER['HTTP_REFERER'] == "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']) && empty($mail))
        //{echo "<p style='margin-left:10px;'>Вы не указали своей почты.</p>";}
        //if(isset($mail))
        //{unset($_SESSION['mail_sess']);
        //unset($_SESSION['temp_for_mail']);}
        //
        //}
        //
        if($this->ErrKey) echo "<p class='ErrP'>Вы не правильно ввели временный код попробуйте ещё раз.</p>";
        else echo "<p class='pErr'>На адрес вашей электронной почты было отправленно письмо с кодом который вам нужно ввести.</p>";

        echo "<form class='pErr' method='post' action=''>
            					<input type='text' name='key' size='70' placeholder='Введите код...'>
            				<input type='submit' value='Отправить'>
            			</form>
                            <br />
                        <form class='pErr' action='' method='post'>
                                <input type='hidden' name='mail_post' value='".$_SESSION['mailForNewPass']."'>
                                <input type='hidden' name='contAtt'>
                                <input type='submit' value='Отправить код ещё раз'>
	                        </form>
            			";

        ?>
    </div>
</div>



</body>






</html>