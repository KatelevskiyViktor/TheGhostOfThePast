<div id="footer">


<p id="imgHerString" ><img src="../img/herString.png" alt="Ниши Герои!" title="Наши Герои!"></p>

<div id='ex_heroes'>
	<div id='heroes'>

	<?php
        if(empty($this->data['sqlFoot'])) {
            $err = new ForError();
            echo $err->ErrForFoot();
        }
        else {
            foreach ($this->data['sqlFoot'] as $val) {
                echo "<div class='bg_img_heroes'>
                            <a href='index.php?ctrl=Video&act=Heroes&id=".$val['id']."'>
                            <img class='img_heroes' alt='".$val['title']."' title='".$val['title']."' src='".$val['mini_img']."'>
                            </a>
                         </div>";
            }
        }
	?>

	</div>
</div>


</div>