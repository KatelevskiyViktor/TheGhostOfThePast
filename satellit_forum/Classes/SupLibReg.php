<?php
class SupLibReg
    extends GenSupLib{

    public function cheсkerErrRegForm($arr = [])
    {

        if (!empty($arr['login']) && !empty($arr['password']) &&
            !empty($arr['mail']) && !empty($arr['ch1']) &&
            !empty($arr['ch2']) && !empty($arr['rez']) &&
            !empty($arr['passwordSec'])
        ) {

            //Проверка логина:
            if ($this->checkLogin($arr['login'])) {

                return 'login';
            }

            //Проверка паролей:
            if (!$this->checkPass($arr['password'], $arr['passwordSec'])) {
                return 'pass';
            }

            //Проверка длины логина и пароля:
            if ((strlen($arr['login']) < 4 || strlen($arr['login']) > 15)
                || (strlen($arr['password']) < 4 || strlen($arr['password']) > 15)
            ) {
                return 'passLog';
            }

            //Проверка адреса почты:
            if (!$this->checkMail($arr['mail'])) {
                return 'mail';
            }

            //Проверка формата изображения:
            if ((@getimagesize($_FILES['fupload']['tmp_name']) == null &&
                    !empty($_FILES['fupload']['name'])) ||
                (!preg_match('/[.](GIF)|(gif)|(PNG)|(png)|(JPG)|(jpg)|(jpeg)|(JPEG)$/',
                        $_FILES['fupload']['name']) && !empty($_FILES['fupload']['name']))
            ) {

                return 'notFormat';
            }

            if (!empty($_FILES['fupload']['name']) &&
                empty($_FILES['fupload']['tmp_name'])
            ) {
                return 'img';
            }

            //Проверка данных капчи:
            if (($arr['ch1'] + $arr['ch2'] - $arr['rand']) != $arr['rez']) {
                return 'capcha';
            }

            return 'noErr';

            //Проверка введённых данных:
        } else if ((empty($arr['login']) || empty($arr['password']) ||
                empty($arr['mail']) || empty($arr['ch1']) ||
                empty($arr['ch2']) || empty($arr['rez']) ||
                empty($arr['passwordSec'])) && !empty($_POST)
        ) {

            return 'emp';

        }


    }

    public function addUserData($arr = [])
    {
        $objRegModel = new RegModel();
        //Проверка введённых данных:
        $arr = $this->getCheckVal($arr);
        //Проверка и создание изображения:
        $arr['avatar'] = $this->doIMG();
        //Шифрование пароля:
        $arr['password'] = $this->encryptPass($arr['password']);
        //Добавление пользователя:
        return $objRegModel->addUser($arr);
    }

    public function doIMG()
    {
        if (empty($_FILES['fupload']['name'])) {

            $avatar = "avatars/net_avatara.png";
        } else {

            $path_to_90_directory = 'avatars/';

            $filename = $_FILES['fupload']['name'];
            $source = $_FILES['fupload']['tmp_name'];
            $target = $path_to_90_directory . $filename;

            move_uploaded_file($source, $target);

            if (preg_match('/[.](GIF)|(gif)$/', $filename)) {
                $im = imagecreatefromgif($path_to_90_directory . $filename);
                $w = 100;
                $w_src = imagesx($im);
                $h_src = imagesy($im);

                $dest = imagecreatetruecolor($w, $w);
                if ($w_src > $h_src)
                    imagecopyresampled($dest, $im, 0, 0,
                        round((max($w_src, $h_src) - min($w_src, $h_src)) / 2), 0, $w, $w, min($w_src, $h_src), min($w_src, $h_src));

                if ($w_src < $h_src)
                    imagecopyresampled($dest, $im, 0, 0, 0, 0, $w, $w, $w_src, $w_src);

                $date = time();

                imagegif($dest, $path_to_90_directory . $date . ".gif");

                $avatar = $path_to_90_directory . $date . ".gif";

                $delfull = $path_to_90_directory . $filename;

                unlink($delfull);


            }

            if (preg_match('/[.](PNG)|(png)$/', $filename)) {
                $im = imagecreatefrompng($path_to_90_directory . $filename);
                $w = 100;
                $w_src = imagesx($im);
                $h_src = imagesy($im);

                $dest = imagecreatetruecolor($w, $w);
                if ($w_src > $h_src)
                    imagecopyresampled($dest, $im, 0, 0,
                        round((max($w_src, $h_src) - min($w_src, $h_src)) / 2), 0, $w, $w, min($w_src, $h_src), min($w_src, $h_src));

                if ($w_src < $h_src)
                    imagecopyresampled($dest, $im, 0, 0, 0, 0, $w, $w, $w_src, $w_src);

                $date = time();

                imagepng($dest, $path_to_90_directory . $date . ".png");

                $avatar = $path_to_90_directory . $date . ".png";

                $delfull = $path_to_90_directory . $filename;

                unlink($delfull);

            }


            if (preg_match('/[.](JPG)|(jpg)|(jpeg)|(JPEG)$/', $filename)) {
                $im = imagecreatefromjpeg($path_to_90_directory . $filename);

                $w = 100;
                $w_src = imagesx($im);
                $h_src = imagesy($im);

                $dest = imagecreatetruecolor($w, $w);
                if ($w_src > $h_src)
                    imagecopyresampled($dest, $im, 0, 0,
                        round((max($w_src, $h_src) - min($w_src, $h_src)) / 2), 0, $w, $w, min($w_src, $h_src), min($w_src, $h_src));

                if ($w_src < $h_src)
                    imagecopyresampled($dest, $im, 0, 0, 0, 0, $w, $w, $w_src, $w_src);

                $date = time();

                imagejpeg($dest, $path_to_90_directory . $date . ".jpg");

                $avatar = $path_to_90_directory . $date . ".jpg";

                $delfull = $path_to_90_directory . $filename;

                unlink($delfull);


            }


        }
        return $avatar;
    }

}