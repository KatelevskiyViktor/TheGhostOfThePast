<?php
class VidOnIdModel
    extends AbstractModel{

    public function getQuerVidId($id){

        //Запрос на количество записей на страницу
        $queryVidID = "SELECT * FROM data WHERE id = :id";

        return $this->findParam($queryVidID, [':id' => $id]);

    }

    public function actUpdViewNum($newSumViews, $id){

        $queryUpdSumView = "UPDATE data SET view=:new_view WHERE id=:id";

        return $this->findParam($queryUpdSumView, [':id' => $id, ':new_view' => $newSumViews]);

    }

    public function actMostID(){
        $sql = 'SELECT id FROM data ORDER BY id DESC LIMIT 1';
        return $this->findAny($sql);
    }

}