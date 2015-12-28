<?php
    if(empty($this->data['resIndSet']))
    {
        $errInd = new ForError();
        echo $errInd->ErrForNav(0);
    }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="description" content="<?php echo $this->data['resIndSet'][0]['meta_d']; ?>">
        <meta name="keywords" content="<?php echo $this->data['resIndSet'][0]['meta_k']; ?>">

		<link rel="stylesheet" type="text/css" href="../css/style.css">

		<title><?php echo $this->data['resIndSet'][0]['title']; ?></title>


		
		
	</head>

	<body>
		

		<div id="main">
	
			<?php require_once __DIR__.'/../blocks/header.php';?>
			<div id="content">
				<?php require_once __DIR__ . '/../blocks/NavMenu.php';?>
				
				<div id="info">

					<?php
                        if(!empty($this->data['resInd'])) {
                            echo "<div style ='padding-bottom:30px;' class='cratkoe_opisanie2'>
                            <h4 style='margin-top:10px;margin-bottom:10px;'>" . $this->data['resInd'][0]['title'] . "</h4>
                            <label style='color:#900000;'>".$this->data['resInd'][0]['text']."</label>
                            <img style='position:relative;top:-200px;left:-4px;' src='../img/new.png' alt='Новинка!' title='Новинка!'>

                            <script type='text/javascript' src='//yastatic.net/share/share.js' charset='utf-8'>
                            </script><div class='yashare-auto-init' data-yashareL10n='ru' data-yashareType='small'
                             data-yashareQuickServices='vkontakte,facebook,twitter,odnoklassniki,moimir,gplus'
                             data-yashareTheme='counter'></div>";
                        }else{
                            $errResInd = new ForError();
                            echo $errResInd->ErrForInd(1);
                        }

					?>
					<!--<div id = "new_video">
						<h4 style='color:#900000;'>Новое видео в плейлистах<span style='color:#424242;'>*</span> :</h4>
							<p>Добавлено видео в плейлист: <a href = '/satellit-info.ru/view_post.php?id=18'>КОБ. Величко Михаил Викторович<a></p>
						
						* - обновления в некоторых плейлистах здесь не фиксируются. 
					</div>-->
					
				</div>
				

			</div>

            <?php require_once __DIR__.'/../blocks/footer.php';?>
			</div>

	<?php require_once __DIR__.'/../blocks/yandex_info.html';?>
	</body>


</html>