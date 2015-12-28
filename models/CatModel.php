<?php
class CatModel
    extends AbstractModel{
        public function getSumVid($cat){
			
			//Запрос на количества записей в таблице для постраничной навигации
            $sqlSumVideo = 'SELECT COUNT(*) FROM data WHERE cat=:cat';
            $sumVideo = $this->findParam($sqlSumVideo, [':cat' => $cat]);
			
			return $sumVideo;
				
        }

		public function getCatVid($cat, $varPageNav){
			//Запрос на количество записей на страницу
			return $this->findParam("SELECT id, title, date, author, mini_img, view FROM data
			            WHERE cat=:cat ORDER BY id DESC LIMIT ".$varPageNav.", 20", [':cat' => $cat]);
			
		}

        public function getInfoCat($cat){

        //Запрос на количество записей на страницу
            $sqlCat = "SELECT * FROM categories WHERE id=:cat";
             $queryCat = $this->findParam($sqlCat, [':cat' => $cat]);

        return $queryCat;

    }

    public function getMaxValCat(){
            $sqlMaxValCat = 'SELECT id FROM categories ORDER BY id DESC LIMIT 1';
            return $this->findAny($sqlMaxValCat);
    }
    }