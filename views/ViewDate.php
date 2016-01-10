<?php
//Переменные для ПН
$sumData = $this->data['sumVid'];
$page = $this->data['page'];
$ctrl = $this->data['ctrl'];
$act = $this->data['act'];
$strShiftParam = "&date=";
$varShiftParam = $this->data['title'];
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<title><?php echo "Видео за ".$this->data['title'];?></title>
		
	</head>

	<body>
	
		<div id="main">
			<?php include __DIR__.'/../blocks/header.php';?>
			<div id="content">
				<?php include __DIR__.'/../blocks/NavMenu.php';?>

				<div id="info">
				
        <?php
            if(!empty($this->data['varShortInf'])){
                require_once __DIR__.'/../blocks/ShortInfoVidPage.php';
            }
        else{
            $errDate = new ErrDBModel();
            echo $errDate->getErrForDate();
        }
        ?>

			</div>

			</div>

            <div class="clear"></div>
        <?php
            require_once __DIR__.'/../blocks/ViewPageNav.php';
            include __DIR__.'/../blocks/footer.php';
        ?>
		</div>

	<?php require_once __DIR__.'/../blocks/yandex_info.html';?>
	</body>

</html>