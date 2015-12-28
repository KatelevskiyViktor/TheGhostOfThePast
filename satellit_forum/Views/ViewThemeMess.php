
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
    <title>Главная страница форума:</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="styles/style.css" />
    <link rel="stylesheet" type="text/css" href="styles/modalbox.css" />
    <script type="text/javascript" src="../js/modalbox.js"></script>

</head>


<body>




<div id="main">
    <?php

    require_once __DIR__.'/../blocks/header.php';?>
    <div id="content">
        <div style='background-image:url(img/theme_bg.png);width:970px;height:60px;text-align:center;
                margin-bottom:-10px;'><p style='padding-top:18px;position:relative; z-index:1;'><?php echo $this->titleTheme[0]["name_theme"];?></p></div>


        <img src='img/bg_content_top_image.png'>


        <div id="bg_content_center_image">
                <table>
            <?php



                               foreach($this->valMessOnTheme as $MessOnTheme){

                                   $style_avatar = $MessOnTheme["avatar"] == 'avatars/net_avatara.png'?
                                       'margin-bottom:10px;':'margin-bottom:10px;border:2px solid;';

                                    echo "
            					<tr style='margin-left:-15px;'>

                                    <td style='width:200px;text-align:center; vertical-align: top;' class='short_description_theme2'>

                                        <p style = 'font:bold 14px arial,sans-serif;color:#900000;'>".$MessOnTheme["author"]."</p>
                                        <img style='".$style_avatar."' src='".$MessOnTheme["avatar"]."'>
                                        <p style = 'font:bold 9px arial,sans-serif;'>Сообщение добавлено: </br>
                                        <label class='color'>".$MessOnTheme["date"]."</label></p>

                                    </td>

                                    <td style='background-color:white;width:610px;' class='short_description_theme2'>
                                            <p style='font:14px arial,sans-serif;'>".$MessOnTheme["message"]."</p>
                                        </td>

                                </tr>";
                                }





            ?>
            </table>
        </div>


        <img src='img/bg_content_buttom_image.png'>

       <?php

       //Создание необходимых переменных для ПН:
       $sumData = $this->sumData;
       $page = $this->page;
       $ctrl = $this->ctrl;
       $act = $this->act;
       $strShiftParam = '&id=';
       $varShiftParam = $this->id;

       //ПН для сообщений:
       require_once __DIR__ . '/../blocks/ViewPNMessBig.php';

       if(!isset($_SESSION['login'])) {
           echo "<p style='margin-left:13px;color:darkred;'>Если Вы зарегистрировались на форуме:
            <a class='fSizeErr' href='index.php?ctrl=Input&act=InputForm'>Авторизация!</a>
             Если нет регистрации:<a class='fSizeErr' href='index.php?ctrl=Reg&act=RegForm'> Регистрация!</a></p>";
        } else if(isset($_SESSION['login']) && $_GET['id'] != 1) {
                //Форма добавления новых тем:
           require_once __DIR__.'/../blocks/FormNewMess.php';
           echo "<a style='margin-left:10px;' href='./index.php?new_theme=true'><img src='img/new_theme.png' alt='Создать новую тему'></a>";
        }



        ?>


    </div>



</div>




</body>






</html>