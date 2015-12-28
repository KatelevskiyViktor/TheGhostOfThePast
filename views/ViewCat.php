<?php

//Параметры для ПН
$sumData = $this->data['sumVid'];
$page = $this->data['page'];
$ctrl = $this->data['ctrl'];
$act = $this->data['act'];
$strShiftParam = "&cat=";
$varShiftParam = $this->data['cat'];

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<title><?php echo $this->data['getInfoCat'][0]["title"]; ?></title>
		<meta name="description" content="<? echo $this->data['getInfoCat'][0]["meta_d"]; ?>">
		<meta name="keywords" content="<? echo $this->data['getInfoCat'][0]["meta_k"]; ?>">
	</head>

	<body>
	
		<div id="main">
			<?php include __DIR__.'/../blocks/header.php';?>
			<div id="content">
				<?php include __DIR__.'/../blocks/NavMenu.php';?>
							
				<div id="info">

                    <?php
                        echo "<p class='border_cat'>";
                                    if(!empty($this->data['getInfoCat'])){
                                            echo $this->data['getInfoCat'][0]['text'];
                                    } else{
                                            $errCatInfo = new ForError();
                                            echo $errCatInfo->getErrForCat(0);
                                    }
                         echo "</p>";

                        if($cat <= 7){
                            if(!empty($this->data['varShortInf'])){
                                require_once __DIR__.'/../blocks/ShortInfoVidPage.php';
                            }else{
                                $errCatInfo = new ForError();
                                echo $errCatInfo->getErrForCat(1);
                            }
                        }

                    ?>
			
			</div>
						
			</div>

			<div class="clear"></div>

			<?php
                require_once __DIR__.'/../blocks/ViewPageNav.php';
                include __DIR__.'/../blocks/footer.php';
                require_once __DIR__.'/../blocks/yandex_info.html';
            ?>

		</div>
	
	</body>


</html>