<!--View для выведения навигационного меню-->
<ul id="menu">
				<li class="zag_nav"><label><img src="../img/cat.png"></label>
					<ul style="margin-top:20px;" class="cat_menu">
                      <?php
                      if(empty($this->data['sqlNav'][0])){
                          $errNav = new ForErrDBThemesModel();
                          echo $errNav->ErrForNav(0);
                      }
                      else{
                        foreach($this->data['sqlNav'][0] as $val){
                                echo "<li class='nav_link'><a class='green' href='index.php?ctrl=Video&act=Cat&cat=".$val['id']."'>".$val['title']."</a></li>";
                        }
                      }
                        ?>

					</ul></li>
				<li class="zag_nav"><label><img src="../img/kray.png"></label>
				<ul class="cat_menu2">
					<?php
                    if(empty($this->data['sqlNav'][1])){
                        $errNav = new ForErrDBThemesModel();
                        echo $errNav->ErrForNav(1);
                    }
                    else {
                        foreach ($this->data['sqlNav'][1] as $val) {
                            echo "<li class='nav_link'><a class='red' href='index.php?ctrl=Video&act=VidOnId&id=" . $val['id'] . "'>" . $val['title'] . "</a></li>";
                        }
                    }
                    ?>
					</ul></li>
				<li class="zag_nav"><label><img src="../img/arhiv.png"></label>
				<ul class="cat_menu2">
					<?php
                    if(empty($this->data['sqlNav'][2])){
                        $errNav = new ForErrDBThemesModel();
                        echo $errNav->ErrForNav(2);
                    }
                    else {
                        foreach ($this->data['sqlNav'][2] as $val) {
                            echo "<li class='nav_link'><a class='red' href='index.php?ctrl=Video&act=Date&date=" . $val['month'] . "'>" . $val['month'] . "</a></li>";
                        }
                    }
                    ?>
					</ul></li>
				<li class="zag_nav"><label><img src="../img/interes.png"></label>
				<ul class="cat_menu2">
                    <?php
                    if(empty($this->data['sqlNav'][3])){
                        $errNav = new ForErrDBThemesModel();
                        echo $errNav->ErrForNav(3);
                    }
                    else {
                        foreach ($this->data['sqlNav'][3] as $val) {
                            echo "<li class='nav_link'><a class='red' href='" . $val['site'] . "'>" . $val['name'] . "</a></li>";
                        }
                    }
                    ?>
					</ul></li>
			</ul>