<?php
class NavMenuModel
    extends AbstractModel{
    public function forNavCat(){
        $sql = 'SELECT id, title FROM categories';
        return $this->findAny($sql);
    }

    public function forNavPosVid(){
        $sql = 'SELECT id, title FROM data ORDER BY date DESC, id DESC LIMIT 5';
        return $this->findAny($sql);
    }

    public function forNavArh(){
        $sql = 'SELECT DISTINCT left(date,7) AS month FROM data ORDER by month DESC LIMIT 5';
        return $this->findAny($sql);
    }

    public function forNavFriend(){
        $sql = 'SELECT site, name FROM friends  ';
        return $this->findAny($sql);
    }

}