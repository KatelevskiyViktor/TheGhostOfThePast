<?php
abstract class AbstractModel{

    private $dbh;

    public function __construct()
    {
        $this->dbh = new PDO('mysql:dbname=satellitin_safor;host=localhost', 'root', '');
    }

    protected function getAnyData($sql)
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
		
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function getAnyDataOnParam($sql, $params = []){

        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);

        return $sth->fetchAll(PDO::FETCH_ASSOC);

    }

    protected function addUpdDel($sql, $params = []){

        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }

}