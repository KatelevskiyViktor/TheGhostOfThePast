<?php
abstract class AbstractModel{
	
    public $data = [];

    public function __set($key, $val){
		
        $this->data[$key] = $val;
		
    }

    public function __get($key){
		
        return isset($this->data[$key]);
		
    }

    public static function findAll(){
        $class  = get_called_class();
        $sql = 'SELECT * FORM ' . static::$table . ' ORDER BY date DESC';
        $db = new DB();
        $db->setClassName($class);
        $res = $db->query($sql);
        if(empty($res)){
            throw new E404Exception('Не были извлечены данные из базы');
        }
        return $res;
    }

    public function findParam($sql, $cat=[]){
        /*$class = get_called_class();*/
        $db = new DB();
        return  $db->queryOnParam($sql, $cat);
    }

    protected function findAny($sql){
		
        $db = new DB();
        return $db->queryAny($sql);
    }



}