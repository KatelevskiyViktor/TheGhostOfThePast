<?php
class GenSupLib{

    protected function checkPass($fPass, $sPass){

        $checkF = $fPass != $sPass ? false : true;
        $checkS = strlen($fPass) < 4 || strlen($fPass) > 15 ? false : true;

        return $checkF && $checkS ? true : false;
    }

    protected function getIP(){
        return $ip = empty(getenv("HTTP_X_FORWARDED_FOR")) ||
                            (getenv("HTTP_X_FORWARDED_FOR") == 'unknown')?
                                getenv("REMOTE_ADDR"):getenv("HTTP_X_FORWARDED_FOR");
    }

    protected function encryptPass($pass)
    {
        $pass = md5($pass);
        $pass = strrev($pass);
        $pass = "m3w6e" . $pass . "b3p6f";
        return $pass;
    }

    protected function getCheckVal($arr = []){
        foreach($arr as $key=>$val){
            $arr[$key] = trim($val);
            $arr[$key] = htmlspecialchars($arr[$key]);
            $arr[$key] = stripcslashes($arr[$key]);
        }
        return $arr;
    }

    protected function getProcPass($password){
        $password = md5($password);
        $password = strrev($password);
        return $password = "m3w6e".$password."b3p6f";
    }

    protected function createSess($arr = []){
        foreach($arr as $key=>$val){
            $_SESSION[$key] = $val;
        }
    }

    protected function setCookie($arr = [])
    {
        foreach($arr as $key=>$val){
            setcookie($key, $val, time() + 9999999);
        }
    }

    protected function checkMail($mail)
    {
        $mail = $this->getCheckVal([$mail]);
        $objRegModel = new RegModel();
        $secCh = $objRegModel->checkMatchesMail($mail[0]);
        $firstCh = preg_match("~^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$~",
            $mail[0]);

        return empty($secCh) && $firstCh ? true : false;

    }

    protected function checkLogin($login)
    {
        $objRegModel = new RegModel();
        return $objRegModel->checkMatchesLogin($login);
    }

    public function stopSess()
    {

        unset($_SESSION['login']);
        unset($_SESSION['avatar']);
        unset($_SESSION['id']);
        session_start();
        session_destroy();
        exit("<meta http-equiv = 'Refresh' content='0; URL=index.php?ctrl=Input&act=InputForm'>");

    }

    protected function getSumErr($ip){
        $objNewPassModel = new NewPassModel();
        $objNewPassModel->actDel();

        //Определение количества попыток создания кода:
        $sumErr = $objNewPassModel->getSumErrID($ip);
        return $sumErr = empty($sumErr)?0:$sumErr[0]['col'];
    }

    public function actText($text)
    {
        require_once __DIR__ . '/../blocks/bb_interpreter.php';
        function createBBtags($text, $configBBcode, $replace = true)
        {
            static $bb_open, $bb_close, $bb_single, $tmp_open, $tmp_close,
            $tmp_single, $max_len, $links, $images, $video,
            $html_open, $html_close, $html_single, $formatters;

            if (empty($bb_open)) {
                extract($configBBcode);
                $bb_open = array_keys($setup_bb);
                $bb_close = array_values($setup_bb);
                $html_open = array_keys($setup_html);
                $html_close = array_values($setup_html);
                $bb_single = array_keys($single_tags);
                $html_single = array_values($single_tags);
            }


            $text = str_replace($tmp_open, '', $text);
            $text = str_replace($tmp_close, '', $text);
            $text = str_replace($tmp_single, '', $text);


            $text = str_replace("\r", "", $text);
            $text = str_replace("\t", "    ", $text);

            if (!$replace) {
                $text = str_replace($bb_open, '', $text);
                $text = str_replace($bb_close, '', $text);
                $text = str_replace($bb_single, '', $text);
                $text = preg_replace('#\\[(code|url|img|video)[^\s]*?\].*?\[/\\1\]#usi', '', $text);
            } else {


                $text = str_ireplace($bb_open, $tmp_open, $text);
                $text = str_ireplace($bb_close, $tmp_close, $text);
                $text = str_ireplace($bb_single, $tmp_single, $text);

                $open_cnt = array();
                foreach ($tmp_open as $k => $v) {
                    $text = preg_replace("#" . $v . "\s*?" . $tmp_close[$k] . "#us", "", $text);
                    $cnt = substr_count($text, $v);

                    if ($cnt > 0) {
                        $open_cnt[$v] = $cnt;
                        $close_cnt[$v] = substr_count($text, $tmp_close[$k]);
                    }

                }

                foreach ($open_cnt as $k => $v) {
                    if ($v > $close_cnt[$k]) {
                        for ($i = 0; $i < $v - $close_cnt[$k]; ++$i)
                            $text = preg_replace('#' . $k . '(?!.*' . $k . ')#us', '', $text);
                    }

                }
            }

            $text = mBwordwrap($text, 100);
            $text = htmlspecialchars($text);

            if (count($formatters))
                $text = preg_replace_callback('#\[code=([^\] ]+?)\](.+?)\[/code=\\1\]#si', 'getFormat', $text);

            if ($links) {
                $text = preg_replace_callback('#\[url=http(s*)://([^\] ]+?)\](.+?)\[/url\]#si', 'createLink1', $text);
                $text = preg_replace_callback('#\[url\]http(s*)://(.+?)\[/url\]#si', 'createLink2', $text);
            }

            if ($images)
                $text = preg_replace_callback('#\[img\]http://([^\] \?]+?)\[/img\]#si', 'createImg', $text);


            if ($video)
                $text = preg_replace_callback('#\[video\]http://([^\] \?]+?).flv\[/video\]#si', 'createSwf', $text);

            if ($replace) {
                $text = str_replace($tmp_open, $html_open, $text);
                $text = str_replace($tmp_close, $html_close, $text);
                $text = str_replace($tmp_single, $html_single, $text);
            }
            $text = str_replace('  ', '&nbsp;&nbsp;', $text);
            $text = nl2br($text);
            return $text;
        }

        function mBwordwrap($text, $width = 90, $break = "\n")
        {
            return preg_replace('#([^\s]{' . $width . '})#', '$1' . $break, $text);
        }

        function createLink1($match)
        {
            $match[2] = str_replace("\n", "", $match[2]);
            return '<a href="http' . $match[1] . '://' . htmlspecialchars($match[2])
            . '" target="_blanck" >' . htmlspecialchars($match[3]) . '</a>';
        }

        function createLink2($match)
        {
            $match[2] = str_replace("\n", "", $match[2]);
            return '<a href="http' . $match[1] . '://' . htmlspecialchars($match[2])
            . '" target="_blanck" >' . htmlspecialchars($match[2]) . '</a>';
        }


        function createImg($match)
        {
            $match[1] = str_replace("\n", "", $match[1]);
            return '<img src="http://' . htmlspecialchars($match[1]) . '" border="0" />';
        }


        function createSwf($match)
        {
            $match[1] = str_replace("\n", "", $match[1]);
            return '<center><object type="application/x-shockwave-flash" data="'
            . IRB_BB_PATH . '/images/video.swf" height="300" width="400">'
            . '<param name="bgcolor" value="#333333" /><param name="allowFullScreen" value="true" />'
            . '<param name="allowScriptAccess" value="always" />'
            . '<param name="movie" value="'
            . IRB_BB_PATH . '/images/video.swf" />'
            . '<param name="FlashVars" value="way=http://'
            . htmlspecialchars($match[1]) . '.flv&amp;swf='
            . IRB_BB_PATH . '/images/video.swf&amp;w=400&amp;h=300&amp;'
            . 'pic=http://&amp;autoplay=0&amp;tools=1&amp;'
            . 'skin=white&amp;volume=70&amp;q=&amp;comment=" />'
            . '</object></center>';
        }

        function getFormat($match)
        {

            global $configBBcode;

            $format = str_replace("\n", "", strtolower($match[1]));

            if (in_array($format, $configBBcode['formatters'])) {

                include_once dirname(__FILE__) . '/formatters/' . $format . '.php';

                return $format($match[2]);
            }

            return 'No formatter ' . $match[1];
        }

        return $message = createBBtags($text, $configBBcode);

    }

    public function getVarPage($page = 0, $sqlResult)
    {

        $counter_messages = ceil($sqlResult / 20);

        if ($page > 0 && $page <= $counter_messages) {
            return array($var = ($page - 1) * 20, $page);
        } else {
            return array($var = 0,
                $page = 1);
        }

    }
}