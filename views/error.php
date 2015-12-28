
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<title><?php echo $this->data['resIndSet'][0]['title']; ?></title>
<meta name="description" content="<?php echo $this->data['resIndSet'][0]['meta_d']; ?>">
<meta name="keywords" content="<?php echo $this->data['resIndSet'][0]['meta_k']; ?>">


</head>

<body>

    <div id="main">

        <?php require_once __DIR__.'/../blocks/header.php';?>
        <div id="content">
            <?php require_once __DIR__ . '/../blocks/NavMenu.php';?>

            <div id="info">

                <?php

                echo $this->error;

                ?>


            </div>


        </div>

        <?php require_once __DIR__.'/../blocks/footer.php';?>
    </div>








<?php require_once __DIR__.'/../blocks/yandex_info.html';?>
</body>


</html>