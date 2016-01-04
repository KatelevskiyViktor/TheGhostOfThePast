
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<title><?php echo $this->data['varHero'][0]["title"];?></title>
		<meta name="description" content="<? echo $this->data['varHero'][0]["meta_d"]; ?>">
		<meta name="keywords" content="<? echo $this->data['varHero'][0]["meta_k"]; ?>">

	</head>

	<body>
	
		<div id="main">
			<?php include __DIR__."/../blocks/header.php";?>
			<div id="content">
				
			<?php include __DIR__."/../blocks/NavMenu.php";?>
				<div id="info">
				
				
<?php
        if(!empty($this->data['varHero'])) {
            echo "<div class='cratkoe_opisanie2'>
                        <h4 style='margin-top:30px;margin-bottom:10px;'>" . $this->data['varHero'][0]['title'] . "</h4>

                            <img style='border:2px solid #424242;margin-top:10px;margin-bottom:10px;' src='" . $this->data['varHero'][0]['max_img'] . "'
                                alt='" . $this->data['varHero'][0]['title'] . "' title='" . $this->data['varHero'][0]['title'] . "'>

                            <p style='font-size:14px;margin:10px;'>" . $this->data['varHero'][0]['text'] . "</p>

                                        <script type='text/javascript' src='//yastatic.net/share/share.js' charset='utf-8'>
                                        </script><div class='yashare-auto-init' data-yashareL10n='ru' data-yashareType='small'
                                         data-yashareQuickServices='vkontakte,facebook,twitter,odnoklassniki,moimir,gplus'
                                         data-yashareTheme='counter'></div>";
            require_once __DIR__ . "/../blocks/yandex_info.html";

            echo "<p><label style='color:#900000;'>Просмотров:</label>" . $this->data['varHero'][0]['views'] . "</p>
                        </div>";
        }else{
            $objForErrHero = new ForErrDBThemesModel();
            echo $objForErrHero->getErrForHeroes();

        }
?>
			</div>
							
			</div>
			
			
			
			<div id="clear"></div>
			<?php include __DIR__."/../blocks/footer.php";?>
		</div>
		
		
	
	</body>


</html>