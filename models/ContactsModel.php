<?php

class ContactsModel
    extends AbstractModel{
    public function getIndInfo(){
        $sql = "SELECT title, meta_d, meta_k FROM settings WHERE page='index'";
        return $this->findAny($sql);
    }

}