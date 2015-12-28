<?
require_once __DIR__.'/bb_interpreter.php';
if($this->noText) {
        echo "<p class='ErrP'>При создании темы Вы забыли ввести текст заголовка или сообщения, либо количество символов к заголовке слишком велико.
                    <input type='button' onclick='history.back()' value='Вернуться и изменить'></p>";
}
if($this->repTheme === true){
        echo "<p class='ErrP'>Такая тема уже создана! Хотите посмотреть её:
                <a class='fSizeErr' href='http://".$_SERVER['HTTP_HOST']."/satellit_forum/index.php?ctrl=Mess&act=MessOnID&id=".$this->idNewTheme."'>
                Тема с таки же именем!</a> Если хотите поправить свою тему:
                <input type='button' onclick='history.back()' value='Вернуться и изменить'></p>";

}
if($this->addSucc === true){
    echo "<p class='ErrP'>Поздравляю! Тема успешно добавлена! Через несколько секунд Вы будете перенаправлены на неё.</p>
            <meta http-equiv=refresh content=3;URL=http://".$_SERVER['HTTP_HOST']."/satellit_forum/index.php?ctrl=Mess&act=MessOnID&id="
            .$this->idNewTheme.">";
}

?>

<script type="text/javascript" >
    var irb_bb_path = '<?php echo IRB_BB_PATH ?>/satellit_forum/images/';
</script>
<script type="text/javascript" src="<?php echo IRB_BB_PATH ?>/satellit_forum/js/bb.js"></script>
<script type="text/javascript" src="<?php echo IRB_BB_PATH ?>/satellit_forum/js/modalbox.js"></script>
</div>

<div id="modalbox" style="filter:alpha(opacity=100);">
    <div id="body2">
        <p>Смайлики</p>
        <img src="<?php echo IRB_BB_PATH ?>/satellit_forum/smiles/(.gif" border="0" onclick="click_sm('text', '('); hideModalbox();" />&nbsp;
        <img src="<?php echo IRB_BB_PATH ?>/satellit_forum/smiles/angry.gif" border="0" onclick="click_sm('text', 'angry'); hideModalbox();" />&nbsp;
        <img src="<?php echo IRB_BB_PATH ?>/satellit_forum/smiles/worry.gif" border="0" onclick="click_sm('text', 'worry'); hideModalbox();" />&nbsp;
        <img src="<?php echo IRB_BB_PATH ?>/satellit_forum/smiles/break.gif" border="0" onclick="click_sm('text', 'break'); hideModalbox();" />&nbsp;
        <img src="<?php echo IRB_BB_PATH ?>/satellit_forum/smiles/cry.gif" border="0" onclick="click_sm('text', 'cry'); hideModalbox();" />&nbsp;
        <img src="<?php echo IRB_BB_PATH ?>/satellit_forum/smiles/D.gif" border="0" onclick="click_sm('text', 'D'); hideModalbox();" />&nbsp;
        <img src="<?php echo IRB_BB_PATH ?>/satellit_forum/smiles/fear.gif" border="0" onclick="click_sm('text', 'fear'); hideModalbox();" />
        <br />
        <img src="<?php echo IRB_BB_PATH ?>/satellit_forum/smiles/think.gif" border="0" onclick="click_sm('text', 'think'); hideModalbox();" />&nbsp;
        <img src="<?php echo IRB_BB_PATH ?>/satellit_forum/smiles/ii.gif" border="0" onclick="click_sm('text', 'ii'); hideModalbox();" />&nbsp;
        <img src="<?php echo IRB_BB_PATH ?>/satellit_forum/smiles/sorrow.gif" border="0" onclick="click_sm('text', 'sorrow'); hideModalbox();" />&nbsp;
        <img src="<?php echo IRB_BB_PATH ?>/satellit_forum/smiles/no.gif" border="0" onclick="click_sm('text', 'no'); hideModalbox();" />&nbsp;
        <img src="<?php echo IRB_BB_PATH ?>/satellit_forum/smiles/tongue.gif" border="0" onclick="click_sm('text', 'tongue'); hideModalbox();" />&nbsp;
        <img src="<?php echo IRB_BB_PATH ?>/satellit_forum/smiles/wacko.gif" border="0" onclick="click_sm('text', 'wacko'); hideModalbox();" />&nbsp;
        <img src="<?php echo IRB_BB_PATH ?>/satellit_forum/smiles/woo.gif" border="0" onclick="click_sm('text', 'woo'); hideModalbox();" />
        <br />
        <a href="#" onclick="hideModalbox(); return false;">Отмена</a>
    </div>
</div>

<div id="main2"></div>

<div id="post" >
    <form  method="post" action="">

        <select name="color" onchange="click_bb('text', 'color=' + this.options[this.selectedIndex].value)">
            <option value="цвет">цвет</option>
            <option value="gray">серый</option>
            <option value="green">зеленый</option>
            <option value="purple">фиолетовый</option>
            <option value="olive">оливковый</option>
            <option value="silver">серебряный</option>
            <option value="aqua">морской</option>
            <option value="yellow">желтый</option>
            <option value="blue">синий</option>
            <option value="orange">оранжевый</option>
            <option value="red">красный</option>
        </select>
        &nbsp;
        <select name="size" onchange="click_bb('text', 'size=' + this.options[this.selectedIndex].value)">
            <option value="размер">размер</option>
            <option value="1">мелкий</option>
            <option value="2">небольшой</option>
            <option value="3">средний</option>
            <option value="4">большой</option>
            <option value="5">огромный</option>
        </select>
        &nbsp;
        <select name="head" onchange="click_bb('text', 'h=' + this.options[this.selectedIndex].value)">
            <option value="размер">заголовки</option>
            <option value="1">H1</option>
            <option value="2">H2</option>
            <option value="3">H3</option>
            <option value="4">H4</option>
            <option value="5">H5</option>
        </select>
        <br />

        <img id="1" src="<?php echo IRB_BB_PATH ?>/satellit_forum/images/bold.gif"
             onmouseover="change(1, 'bold_on')" onmouseout="change(1, 'bold')" onclick="click_bb('text', 'b');" />&nbsp;
        <img id="2" src="<?php echo IRB_BB_PATH ?>/satellit_forum/images/italics.gif"
             onmouseover="change(2, 'italics_on')" onmouseout="change(2, 'italics')" onclick="click_bb('text', 'i');" />&nbsp;
        <img id="3" src="<?php echo IRB_BB_PATH ?>/satellit_forum/images/underline.gif"
             onmouseover="change(3, 'underline_on')" onmouseout="change(3, 'underline')" onclick="click_bb('text', 'u');" />&nbsp;
        <img id="4" src="<?php echo IRB_BB_PATH ?>/satellit_forum/images/strikethrough.gif"
             onmouseover="change(4, 'strikethrough_on')" onmouseout="change(4, 'strikethrough')" onclick="click_bb('text', 's');" />&nbsp;
        <img id="7" src="<?php echo IRB_BB_PATH ?>/satellit_forum/images/justify.gif"
             onmouseover="change(7, 'justify_on')" onmouseout="change(7, 'justify')" onclick="click_bb('text', 'justify');" />&nbsp;
        <img id="8" src="<?php echo IRB_BB_PATH ?>/satellit_forum/images/left.gif"
             onmouseover="change(8, 'left_on')" onmouseout="change(8, 'left')" onclick="click_bb('text', 'left');" />&nbsp;
        <img id="9" src="<?php echo IRB_BB_PATH ?>/satellit_forum/images/center.gif"
             onmouseover="change(9, 'center_on')" onmouseout="change(9, 'center')" onclick="click_bb('text', 'center');" />&nbsp;
        <img id="10" src="<?php echo IRB_BB_PATH ?>/satellit_forum/images/right.gif"
             onmouseover="change(10, 'right_on')" onmouseout="change(10, 'right')" onclick="click_bb('text', 'right');" />&nbsp;

        <img id="11" src="<?php echo IRB_BB_PATH ?>/satellit_forum/images/list_ordered.gif"
             onmouseover="change(11, 'list_ordered_on')" onmouseout="change(11, 'list_ordered')" onclick="click_bb('text', 'list=ol');" />&nbsp;
        <img id="12" src="<?php echo IRB_BB_PATH ?>/satellit_forum/images/list_unordered.gif"
             onmouseover="change(12, 'list_unordered_on')" onmouseout="change(12, 'list_unordered')" onclick="click_bb('text', 'list=ul');" />&nbsp;
        <img id="22" src="<?php echo IRB_BB_PATH ?>/satellit_forum/images/li.gif"
             onmouseover="change(22, 'li_on')" onmouseout="change(22, 'li')" onclick="click_bb('text', '*');" />&nbsp;
        <img id="18" src="<?php echo IRB_BB_PATH ?>/satellit_forum/images/quote.gif"
             onmouseover="change(18, 'quote_on')" onmouseout="change(18, 'quote')" onclick="click_bb('text', 'quote');" />&nbsp;
        <img id="19" src="<?php echo IRB_BB_PATH ?>/satellit_forum/images/smile.gif"
             onmouseover="change(19, 'smile_on')" onmouseout="change(19, 'smile')" onclick="showModalbox()" />&nbsp;
        <img id="20" src="<?php echo IRB_BB_PATH ?>/satellit_forum/images/insert_hyperlink.gif"
             onmouseover="change(20, 'insert_hyperlink_on')" onmouseout="change(20, 'insert_hyperlink')" onclick="click_url();" />&nbsp;
        <img id="21" src="<?php echo IRB_BB_PATH ?>/satellit_forum/images/insert_picture.gif"
             onmouseover="change(21, 'insert_picture_on')" onmouseout="change(21, 'insert_picture')" onclick="click_bb('text', 'img');" />&nbsp;
        <br />
            <input style='width:485px;' name='titleTheme' placeholder='Введите заголовок темы...' type='text' ></p></br>

        <textarea placeholder="Введите текст сообщения..." style='background-image:url(../img/bg_input.png);' id="text" name="text" cols="66" rows="7" onselect='savesel(this)' onchange='savesel(this)' onclick='savesel(this)' onfocus='savesel(this)' onkeyup='savesel(this)'><?php echo htmlspecialchars($text) ?></textarea>

        <br />
        <input type="submit" name="ok" value="отправить" />
    </form>
</div><a name='new_th'></a>
</br>
