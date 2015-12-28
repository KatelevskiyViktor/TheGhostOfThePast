
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<title>Обработчик регистрации</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>


<body>
<div id="main">

<?php
var_dump($_POST);die;
include __DIR__.'/../blocks/header.php';?>

<div id="content">
<?php 
				


if (isset($_POST['login'])){$login = $_POST['login']; if($login ==''){unset ($login);}}
if (isset($_POST['mail']))
{	$mail = $_POST['mail'];
		$s=0;
		for($i = 0; $i <= strlen($mail); $i++ )
		{
			if($mail[$i] == '@')
				{
					$s++;
				}
		}
		
		if($mail == '' || $s == 0 || strlen($mail) > 40)
			 {
				unset ($mail);
			 }
}
if (isset($_POST['password'])){$password = $_POST['password']; if($password ==''){unset ($password);}}
if (isset($_POST['ch1'])){$ch1 = $_POST['ch1']; if($ch1 ==''){unset ($ch1);}}
if (isset($_POST['ch2'])){$ch2 = $_POST['ch2']; if($ch2 ==''){unset ($ch2);}}
if (isset($_POST['rez'])){$rez = $_POST['rez']; if($rez ==''){unset ($rez);}}

if(empty($login) || empty($password) || empty($mail) || empty($ch1) || empty($ch2) || empty($rez) )
	{
	if(empty($mail) || strlen($mail) > 40)
	{exit ("");}
	
	
	exit ("");
	}

if(($ch1+$ch2-2) != $rez)
	{
		exit ("<p style='margin-left:13px;'>Вы неправильно решили пример!<input type='button' value='Назад' onclick='history.back()'></p>");
	}
else!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	{
//		$login = stripslashes($login);
//		$password = stripslashes($password);
//		$ch1 = stripslashes($ch1);
//		$ch2 = stripslashes($ch2);
//		$rez = stripslashes($rez);
//
//		$mail = stripslashes($mail);
//		$mail = htmlspecialchars($mail);
//		$mail = trim($mail);
//
//		$login = htmlspecialchars($login);
//		$password = htmlspecialchars($password);
//		$ch1 = htmlspecialchars($ch1);
//		$ch2 = htmlspecialchars($ch2);
//		$rez = htmlspecialchars($rez);
//
//
//		$login = trim($login);
//		$password = trim($password);
//		$ch1 = trim($ch1);
//		$ch2 = trim($ch2);
//		$rez = trim($rez);
		
//		$result4 = mysql_query("SELECT login FROM users WHERE mail = '$mail'",$db);
//		$myrow4 = mysql_fetch_array($result4);
//		if(!$result4)
//				{
//					include('blocks/error.php');
//				}
//
//		if(isset($myrow4['login']))
//		exit("<p style='margin-left:13px;'>Почта указанная вами в базе данный уже есть. <input type='button' value='Изменить' onclick='history.back()'></p>");
//
//		if(strlen($login) < 4 or strlen($login) > 15)
//		{
//			echo "<p style='margin-left:13px;'>Логин должен состаять не менее, чем из 4-х символов и не более чем из 15-ти!<input type='button' value='Вернуться' onclick='history.back()'></p>";
//			exit();
//		}
//
//		if(strlen($password) < 4 or strlen($password) > 15)
//		{
//			echo "<p style='margin-left:13px;'>Пароль должен состаять не менее, чем из 4-х символов и не более чем из 15-ти! <input type='button' value='Вернуться' onclick='history.back()'></p>";
//			exit();
//		}
//
//		 if(empty($_FILES['fupload']['name']))
//		 {
//
//			$avatar = "avatars/net_avatara.png";
//		}
//
//		else
//		{
//			$path_to_90_directory = 'avatars/';
////			if(preg_match('/[.](JPG)|(jpg)|(gif)|(GIF)|(png)|(PNG)$/',$_FILES['fupload']['name']))
////			{
//				$filename = $_FILES['fupload']['name'];
//				$source = $_FILES['fupload']['tmp_name'];
//				$target = $path_to_90_directory.$filename;
//
//				move_uploaded_file($source, $target);
//
//				if(preg_match('/[.](GIF)|(gif)$/', $filename))
//				{
//					$im =imagecreatefromgif($path_to_90_directory.$filename);
//				}
//
//				if(preg_match('/[.](PNG)|(png)$/', $filename))
//				{
//					$im =imagecreatefrompng($path_to_90_directory.$filename);
//				}
//
//				if(preg_match('/[.](JPG)|(jpg)|(jpeg)|(JPEG)$/', $filename))
//				{
//					$im =imagecreatefromjpeg($path_to_90_directory.$filename);
//				}
//
//
//			$w = 100;
//			$w_src = imagesx($im);
//			$h_src = imagesy($im);
//
//			$dest = imagecreatetruecolor($w,$w);
//			if($w_src > $h_src)
//			imagecopyresampled($dest, $im, 0, 0,
//									round((max($w_src,$h_src)-min($w_src,$h_src))/2),0,$w,$w, min($w_src,$h_src), min($w_src,$h_src));
//
//			if($w_src < $h_src)
//			imagecopyresampled($dest, $im, 0, 0, 0, 0, $w, $w, $w_src, $w_src);
//
//			$date = time();
//
//			imagejpeg($dest, $path_to_90_directory.$date.".jpg");
//
//			$avatar = $path_to_90_directory.$date.".jpg";
//
//			$delfull = $path_to_90_directory.$filename;
//			unlink($delfull);
////			}
////
////			else
////			{
////				exit("<p style='margin-left:13px;'>Аватар должен быть в формате JPG, GIF или PNG <input type='button' value='Вернуться' onclick='history.back()'></p>");
////
////			}
//			}
//			$password = md5($password);
//			$password = strrev($password);
//			$password = "m3w6e".$password."b3p6f";
		
//		$result = mysql_query("SELECT id FROM users WHERE login='$login'",$db);
//		$myrow = mysql_fetch_array($result);
//		if($result)
//			{
//
//
////				if(!empty($myrow['id']))
////				{
////					exit("<p style='margin-left:13px;'>Введённый вами логин уже зарегестрирован. Введите другой. <input type='button' value='Назад' onclick='history.back()'></p>");
////				}
////				$result2 = mysql_query("INSERT INTO users(login, password,avatar,mail) VALUES('$login', '$password','$avatar','$mail')");
//				if($result2 == 'TRUE')
//				{
//					echo "<p style='margin-left:13px;'>Вы успешно зарегестрировались! Теперь Вы будете автоматически перенаправленны на страницу авторизации.";
//					exit("<meta http-equiv = 'Refresh' content='5; URL=input.php'>");
//				}
//				else
//				{
//
//
//					echo "<p style='margin-left:10px;'>Ошибка! Данные в базу не добавлены. Пожалуйста сообщите об этом администартору, указав в письме код ошибки.<strong>HUGO03@mail.ru</strong><input type='button' value='Назад' onclick='history.back()'></p>";
//										echo "<strong><p style='margin-left:10px;'>Код ошибки: </p></strong>";exit("<label style='margin-left:10px;'>".mysql_error()."</label>");
//
//				}
//			}
//			else
//				{
//					include('blocks/error.php');
//				}
	}

?>
</div>


</div>




</body>






</html>