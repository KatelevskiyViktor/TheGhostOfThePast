<?php

if($ThemesInfo['TotalNumMess'] > 20) {

			echo "<div id='page_navigation2'>На страницу:

						<select  onchange='document.location=this.value' style=' width:35px;height:16px;font:9px arial,sans-serif;'>";

							$j=ceil($ThemesInfo['TotalNumMess']/20);
							$i=1;

							while($i <= $j) {

								echo "<option value='index.php?ctrl=Mess&act=MessOnID&id=".$ThemesInfo['id']."&page=".$i."'>".$i."&nbsp&nbsp</option>";
								$i++;
							}

					echo "</select></p></div>";
}

	?>