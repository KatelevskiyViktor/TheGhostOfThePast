
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<title><?php echo $this->data['varVidID'][0]["title"]; ?></title>
		<meta name="description" content="<?php echo $this->data['varVidID'][0]["meta_d"]; ?>">
		<meta name="keywords" content="<?php echo $this->data['varVidID'][0]["meta_k"]; ?>">


			
	</head>

	<body>
	
		<div id="main">
			<?php include __DIR__.'/../blocks/header.php';?>
			<div id="content">
				
			<?php include __DIR__.'/../blocks/NavMenu.php';?>
							
				<div id="info">
				
				
<?php
        if(!empty($this->data['varVidID'])) {
            echo "<div class='cratkoe_opisanie2'>
                        <h4 style='color:black;margin-top:10px;margin-bottom:10px;'>" . $this->data['varVidID'][0]['title'] . "</h4>
                        <p class='post_adds'><span style='color:#900000;'>Автор:</span>" . $this->data['varVidID'][0]['author'] . "</p>
                        <p class='post_adds'><span style='color:#900000;'>Дата:</span>" . $this->data['varVidID'][0]['date'] .
                "</p><img  style='display:none;'
                        src=".$this->data['varVidID'][0]['mini_img']."><span style='color:#900000;display:inline;'>" .
                        $this->data['varVidID'][0]['text'] . "
                        </span>

                                    <script type='text/javascript' src='//yastatic.net/share/share.js' charset='utf-8'>
                                    </script><div class='yashare-auto-init' data-yashareL10n='ru' data-yashareType='small'
                                     data-yashareQuickServices='vkontakte,facebook,twitter,odnoklassniki,moimir,gplus'
                                     data-yashareTheme='counter'></div>";
            require_once __DIR__ . '/../blocks/yandex_info.html';

            echo "<p style='margin-top:10px;'><span style='color:#900000;'>
                                Просмотров:</span>" . $this->data['varVidID'][0]['view'] . "</p>
                    </div>";
        }else{
            $objErrVidOnId = new ForErrDBThemesModel();
            echo $objErrVidOnId->getErrForVidOnId();
        }
?>
			</div>
							
			</div>

			<div class="clear"></div>
			<?php include __DIR__.'/../blocks/footer.php';?>
		</div>

	</body>


</html>