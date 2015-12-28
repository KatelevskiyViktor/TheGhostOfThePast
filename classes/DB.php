<?php
class DB{
    private $dbh;

    public function __construct(){
        $this->dbh = new PDO('mysql:dbname=satellitin_safor;host=localhost', 'root', '' );
    }

    public function queryOnParam($sql, $params=[]){
		
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
		
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
    public function queryAny($sql){

        $sth = $this->dbh->prepare($sql);
        $sth->execute();

        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
}

