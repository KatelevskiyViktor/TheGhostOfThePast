
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
	
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<title><? echo $this->data['varInfoInd'][0]["title"]; ?></title>
		<meta name="description" content="<? echo $this->data['varInfoInd'][0]["meta_d"]; ?>">
		<meta name="keywords" content="<? echo $this->data['varInfoInd'][0]["meta_k"]; ?>">
	</head>

	<body>
	
		<div id="main">
			<?php include __DIR__.'/../blocks/header.php';?>
			<div id="content">
				<?php include __DIR__.'/../blocks/NavMenu.php';?>
				<div id="info">
				<div style='border:2px dashed #424242; paddin:0 10px; width:744px;'>

					<p style='font-size:14px;margin:10px;'>По ошибкам и возникшим проблемам обращайтесь сюда: </p>

                    <p style='font-size:14px;margin:10px;'>

                        <a target="_blank" href="http://vk.com/karpendiaz">
                            <img src="../img/vk.png">
                        </a>
                        <img src="../img/mail.png">

                    </p>
					</div>
				</div>
				
			</div>

			<div id="clear"></div>

			<?php
                include __DIR__.'/../blocks/footer.php';
                require_once __DIR__.'/../blocks/yandex_info.html';
            ?>
		</div>
		
		
	
	</body>


</html>