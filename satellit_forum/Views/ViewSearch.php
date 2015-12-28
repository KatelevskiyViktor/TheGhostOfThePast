
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<title><? echo "Сообщение по запросу - ".$this->search." ";?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="styles/style.css" />
  
    

   
</head>


<body>

<div id="main">
<?php include __DIR__.'/../blocks/header.php';?>
<div id="content">
<?

	if($this->noFormat){echo "<p class='ErrP'>Поисковый запрос не введён, либо вне форамта (Формат: > 4-х символов).</p>";exit();}
	if($this->noDataBySearch){echo "<p class='ErrP'>По Вашему запросу Я ничего не нашёл!</p>";exit();}


echo "<table id='header_theme'>
				<tr>
					<td style='width:114px;'><p style='margin-left:40px;'>№ Темы</p></td>
					<td style='width:402px;'><p style='margin-left:140px;'>Заголовок темы</p></td>
					<td style='width:123px;'><p style='margin-left:30px;'>Автор темы</p></td>
					<td style='width:114px;'><p style='margin-left:30px;'>Cообщений</p></td>
					<td style='border-right:none;width:220px;'><p style='margin-left:35px;'>Последнее сообщение</p></td>
				
				</tr>	
			</table>";

echo "<p style='margin-left:33px;font-size:18px'>Найдено соответствий с запросом в темах:</p>";
$browser = $_SERVER['HTTP_USER_AGENT'];
								if (strpos($browser, 'MSIE 7.0'))
								{
									$st='margin-bottom:-4px;';
								}
								echo "<img src='img/bg_content_top_image.png' style='$st'>";?>
								<div id='bg_content_center_image'>

									<?php

									echo "<table style='width:900px;'>";

												foreach($this->data["dataOnSearch"] as $ThemesInfo){
													echo "


														<tr>
															<td style='width:35px;' class='short_description_theme'><p>".$ThemesInfo['id']."</p></td>
															<td style='width:390px;max-width:390px;border:1px solid #8B9394;padding-left:20px;height:46px;' >
															<p><a href='index.php?ctrl=Mess&act=MessOnID&id=".$ThemesInfo['id']."'>".$ThemesInfo['name_theme']."
															</p></a>";


																			include __DIR__.'/../blocks/ViewPNMessSmall.php';


																			echo "</td>
															<td style='width:80px;' class='short_description_theme'><p class='color'>".$ThemesInfo['author']."</p></td>
															<td style='width:72px; text-align:center;' class='short_description_theme'><p>".$ThemesInfo['TotalNumMess']."</p></td>
															<td style='width:130px;' class='short_description_theme'>
																		<ul type='none' style='font:bold 10px arial,sans-serif;padding-left:0px;'>
																			<li style='margin-top:5px;'>автор: <label class='color'>".$ThemesInfo['LateMessAuth']."</label></li>
																			<li style='margin-top:5px;'>дата: <label class='color'>".$ThemesInfo['LateMessDate']."</label></li>
																		</ul>
																	</td>
																	</tr>
													";
																}

																?>
									</table>
	</div>	
<img src='img/bg_content_buttom_image.png'>
	</div>
</body>
</html>