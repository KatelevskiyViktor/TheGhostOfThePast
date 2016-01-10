
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
    <title>Главная страница форума:</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css" />
    <link rel="stylesheet" type="text/css" href="styles/modalbox.css" />
    <script type="text/javascript" src="js/modalbox.js"></script>

</head>


<body>




<div id="main">
    <?require_once __DIR__.'/../blocks/header.php';?>
    <div id="content">
<?
if(!isset($_SESSION['login']))
{
    echo "<p style='margin-left:13px;color:darkred;'>Если Вы зарегистрировались на форуме:
            <a class='fSizeErr' href='index.php?ctrl=Input&act=InputForm'>Авторизация!</a>
             Если нет регистрации:<a class='fSizeErr' href='index.php?ctrl=Reg&act=RegForm'> Регистрация!</a></p>";

}

else if(isset($_SESSION['login']))
{
    //Блок вывода ошибок пользователя:
    if($ErrUser = $this->ErrUser) {
        exit($this->ErrUser);
    }


    require_once __DIR__.'/../blocks/FormNewTheme.php';

}



            echo "<table id='header_theme'>
				<tr>
					<td style='width:114px;'><p style='margin-left:40px;'>№ Темы</p></td>
					<td style='width:402px;'><p style='margin-left:140px;'>Заголовок темы</p></td>
					<td style='width:123px;'><p style='margin-left:30px;'>Автор темы</p></td>
					<td style='width:114px;'><p style='margin-left:30px;'>Cообщений</p></td>
					<td style='border-right:none;width:220px;'><p style='margin-left:35px;'>Последнее сообщение</p></td>
				
				</tr>	
			</table>";

            //Блок вывода ошибок работы с БД и удаления маркера ошибок:
            if($Err = $this->Err) {
                exit("<p class='ErrP'>".$this->Err."</p>");
            }




            //Убираю косяки IE7:
            $browser = $_SERVER['HTTP_USER_AGENT'];
            if (strpos($browser, 'MSIE 7.0'))
            {
                $st='margin-bottom:-4px;';
            }

        echo "<img src='img/bg_content_top_image.png' style='$st'>";
        ?>

        <div id="bg_content_center_image">

                <?php

                    echo "<table style='width:900px;'>";

                //Создание необходимых переменных для ПН:
                $sumData = $this->sumData;
                $page = $this->page;
                $ctrl = $this->ctrl;
                $act = $this->act;


           foreach(@$this->data['viewAllThemes'] as $ThemesInfo){
                        echo "
                                <tr>
                                    <td style='width:35px;' class='short_description_theme'><p>".$ThemesInfo['id']."</p></td>
                                    <td style='width:390px;max-width:390px;border:1px solid #8B9394;padding-left:20px;height:46px;' >
                                    <p><a href='index.php?ctrl=Mess&act=MessOnID&id=".$ThemesInfo['id']."'>".$ThemesInfo['name_theme']."
                                    </p></a>

                                    ";

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

       <?php //Постраничная навигация для тем
        include __DIR__.'/../blocks/ViewPageNav.php';?>




    </div>



</div>




</body>






</html>