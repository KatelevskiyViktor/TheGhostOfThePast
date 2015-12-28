<?php
class IndModel
    extends AbstractModel{
        public function forInd(){
            $sql = 'SELECT title, text FROM data ORDER BY id DESC LIMIT 1';
            return $this->findAny($sql);
        }


        public function forIndSet(){
            $sql = "SELECT title, meta_d, meta_k FROM settings WHERE page='index'";
            return $this->findAny($sql);
        }
    }