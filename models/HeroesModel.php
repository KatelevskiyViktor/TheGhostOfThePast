<?php
class HeroesModel
    extends AbstractModel{

    public function actMostID(){
        $sql = 'SELECT id FROM heroes ORDER BY id DESC LIMIT 1';
        return $this->findAny($sql);
    }

    public function getHero($id){


        $queryVidID = "SELECT * FROM heroes WHERE id = :id";

        return $this->findParam($queryVidID, [':id' => $id]);

    }

    public function actUpdView($newSumViews, $id){

        $queryUpdSumView = "UPDATE heroes SET view=:new_view WHERE id=:id";

        return $this->findParam($queryUpdSumView, [':id' => $id, ':new_view' => $newSumViews]);

    }

}