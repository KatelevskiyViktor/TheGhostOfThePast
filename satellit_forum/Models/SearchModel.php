<?php
/**
 * Created by PhpStorm.
 * User: ViktorKa
 * Date: 07.12.2015
 * Time: 9:38
 */
class SearchModel
    extends AbstractModel{

    public function getThemeIDBySearch($search){
    return $this->getAnyDataOnParam("SELECT themeID FROM messages WHERE MATCH(message) AGAINST(:search)
			                          UNION SELECT themeID FROM messages WHERE MATCH(author) AGAINST(:search)
			                          UNION SELECT id FROM themes WHERE MATCH(name_theme) AGAINST(:search)",
                                        [':search' => $search]);
    }

    public function getDataBySearch($themeID){

        //Создание строки запроса. Creating the string query:
        $allStringSql = '';
        for($i = 0; $i != count($themeID); $i++){
           $partString = $i > 0 ? "UNION SELECT * FROM themes WHERE id=".$themeID[$i]['themeID']." ":
                                    "SELECT * FROM themes WHERE id=".$themeID[$i]['themeID']." ";
               $allStringSql = $allStringSql.$partString;
        }
        return $this->getAnyData($allStringSql);
    }
}