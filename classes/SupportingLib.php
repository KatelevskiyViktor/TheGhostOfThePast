<?php
class SupportingLib
{

    public function actNewSumView($views)
    {
        return $views + 1;
    }

    public function actID($id, $mostID)
    {

        if ($id > 0 && $id <= $mostID[0]['id']) {
            return $id;
        } else {
            return 1;
        }

    }

    public function actDate($date)
    {
        $date_title = $date;
        $date_begin = $date;
        $date++;
        $date_end = $date;

        $date_begin = $date_begin . "-01";
        $date_end = $date_end . "-01";

        return array($date_title, $date_begin, $date_end);
    }


    public function actProcStr($str = [])
    {
        for ($i = 0; $str[$i]; $i++) {
            $str[$i] = trim($str[$i]);
            $str[$i] = htmlspecialchars($str[$i]);
            $str[$i] = mysql_escape_string($str[$i]);
        }

        return $str;
    }

    public function actPageNav($page,$sqlResult){

        $counter_messages = ceil($sqlResult/20);

        if($page > 0 && $page <= $counter_messages)
        {
           return array($var =($page - 1) * 20, $page);
        }
        else{
            return array($var=0,
            $page=1);
        }

    }

    public function getRightVal($maxVal, $compVal, $minVal, $default){
        return ($compVal > $maxVal.'-01' || $compVal < $minVal.'-01' || $compVal == 0) ?
            $compVal = $default : $compVal;
    }

}
?>