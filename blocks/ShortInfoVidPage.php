<?php

foreach($this->varShortInf as $varCat) {
    printf("
					<div class='cratkoe_opisanie'>
						<div style='height:155px; float:left;'>
						<a href='index.php?ctrl=Video&act=VidOnId&id=%s'><img class='mini' src='%s'></a>
						</div>
						<div style='height:155px;'>
						<h4 class='post_name'><a class='blog' href='index.php?ctrl=Video&act=VidOnId&id=%s'>%s</a></h4>
						<p class='post_adds'><span style='color:#900000;'>Дата добавления:</span></br> %s</p>
						<p class='post_adds'><span style='color:#900000;'>Автор:</span></br> %s</p>
						
					
						<p class='post_adds'><span style='color:#900000;'>Просмтров:</span> %s</p></div>
				</div>
", $varCat["id"], $varCat["mini_img"], $varCat["id"], $varCat["title"], $varCat["date"], $varCat["author"], $varCat["view"]);

}
							?>