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

        echo "<div id='input_content_bg'><p>Вы вошли на сайт как:<br><span style='color:#900000;'>"
				.$_SESSION["login"]."</span>(<a href='index.php?ctrl=Input&act=InputForm&exit=1'>Выйти</a>)</p>
	<p>&nbspВаш аватар:<br><img style='border:2px solid; ' src='".$_SESSION['avatar']."'></p></div>
	<p style='margin-left:33px;font-size:18px'>Темы в которых Вы участвовали:</p>
	<img src='img/bg_content_top_image.png'>

	<div id='bg_content_center_image'>
		<table style='width:900px;'>";

		//Создание необходимых переменных для ПН:
		$sumData = $this->sumData;
		$page = $this->page;
		$ctrl = $this->ctrl;
		$act = $this->act;
!!!!!!!!!!!!!!!!!!!!!!!!!Закончить с постраничной навигациейв viewuserdata.php('отображает ПН но при переходе не берёт из базы инфо')


		foreach($this->dataUserThemes as $ThemesInfo){

            echo "
					<tr>
						<td style='width:35px;' class='short_description_theme'><p>".$ThemesInfo[0]['id']."</p></td>
						<td style='width:390px;max-width:390px;border:1px solid #8B9394;padding-left:20px;height:46px;' ><p><a href='index.php?ctrl=Mess&act=MessOnID&id=".$ThemesInfo[0]['id']."'>".$ThemesInfo[0]['name_theme']."</p></a>";

			$TotalNumMess = $ThemesInfo[0]['TotalNumMess'];
			$themeID = $ThemesInfo[0]['id'];
			include __DIR__.'/../blocks/ViewPNMessSmall.php';


            echo "</td>
						<td style='width:80px;' class='short_description_theme'><p style='color:#900000;'>".$ThemesInfo[0]['author']."</p></td>
						<td style='width:72px; text-align:center;' class='short_description_theme'><p>".$ThemesInfo[0]['TotalNumMess']."</p></td>
						<td style='width:130px;' class='short_description_theme'><ul type='none' style='font:bold 10px arial,sans-serif;padding-left:0px;'>
																					<li style='margin-top:5px;'>автор: <label style='color:#900000;'>".$ThemesInfo[0]['LateMessAuth']."</label></li>
																					<li style='margin-top:5px;'>дата: <label style='color:#900000;'>".$ThemesInfo[0]['LateMessDate']."</label></li>
																				</ul>
								</td>
								</tr>
						";}

        ?>
        </table>
    </div>
	<img src='img/bg_content_buttom_image.png'>

<?php include __DIR__.'/../blocks/ViewPageNav.php';?>





</div>



</body>






</html>