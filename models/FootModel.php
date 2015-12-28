<?php

class FootModel
        extends AbstractModel{
            public function forFoot(){
                $sql = 'SELECT id, mini_img, title FROM heroes ORDER BY id DESC';
                return $this->findAny($sql);
             }
}