<?php
class ArchiveModel
    extends AbstractModel{

    public function getDateSql($date_begin, $date_end, $param = '', $additCrit = ''){
            return $this->findAny("SELECT ".$param." FROM data WHERE date > '".
                                    $date_begin."' AND date < '".$date_end."'".$additCrit."");
}

    public function getMaxValDate(){
            return $this->findAny('SELECT DISTINCT left(date,7) AS month FROM data ORDER by month DESC LIMIT 1');
    }

}