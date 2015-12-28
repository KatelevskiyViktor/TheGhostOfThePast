
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<title><?php echo "Комментарии:";?></title>
		<script type="text/javascript" src="//vk.com/js/api/openapi.js?116"></script>
        <script type="text/javascript">VK.init({apiId: 4703945, onlyWidgets: true});</script>

	</head>

	<body>
	
		<div>
		<div id="main">
	
			<?php include __DIR__.'/../blocks/header.php';?>
			<div id="content">
				<?php include __DIR__.'/../blocks/NavMenu.php';?>
				
				<div id="info">

				    <div id="vk_comments"></div>

                        <script type="text/javascript">
                            VK.Widgets.Comments("vk_comments", {limit: 10, width: "665", attach: "*"});
                        </script>
	
				</div>
			
			
			</div>
			
			<?php include __DIR__.'/../blocks/footer.php';?>
			
	
		
		</div>
		
		
	<?php require_once __DIR__.'/../blocks/yandex_info.html';?>


	
	</body>


</html>