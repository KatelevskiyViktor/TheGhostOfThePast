<?php

//Вывод постраничной навигации
if($sumData > 20 && $page <= (ceil($sumData/20)) && $page > 0)
{

    //Формирование переменных строки ссылок
    $urlServPhpSelf = $_SERVER['PHP_SELF'];
    $urlPage = $urlServPhpSelf."?ctrl=".$ctrl."&act=".$act.$strShiftParam.$varShiftParam."&page=";
    $urlForFirstPageAct = $urlServPhpSelf."?ctrl=".$ctrl."&act=".$act.$strShiftParam.$varShiftParam;
    $strAAct = "<a id='active' href='";
    $strA = "<a href='";
    $strEndA = "'>";
    $strAEndTeg = "</a>&nbsp&nbsp";
    $strNBSP = ".....&nbsp&nbsp";
    $urlServReqUri = $_SERVER['REQUEST_URI'];


    //Вспомогательная функция вывода
    function actOutUrl_1($urlServReqUri,$urlPage,$i,$strAAct,$strEndHref,$strAEnd,$strA){
        if($urlServReqUri == $urlPage.$i)
            echo $strAAct.$urlPage.$i.$strEndHref.$i.$strAEnd;
        else
            echo $strA.$urlPage.$i.$strEndHref.$i.$strAEnd;
    }




    echo "<div id='page_navigation'>";

                if($page > 1)
                { $previous = $page - 1;
                    echo $strA.$urlPage.$previous."'><<".$strAEndTeg;
                }

                $j=ceil($sumData/20);
                $i=1;
                while($i <= $j)
                {
                    if($page <= 8)
                    {
                        if($i <= 8)
                        {

                            if(($i == 1) && ($urlServReqUri == $urlForFirstPageAct))
                            {
                                echo $strAAct.$urlPage.$i.$strEndA.$i.$strAEndTeg;
                                $i++;
                            }
                            actOutUrl_1($urlServReqUri,$urlPage,$i,$strAAct,$strEndA,$strAEndTeg,$strA);
                        }

                        if($i == 9)
                        {
                            if($urlServReqUri == $urlPage.$i)
                                echo $strAAct.$urlPage.$i.$strEndA.$i.$strAEndTeg;
                            else
                            {
                                echo $strA.$urlPage.$i.$strEndA.$i.$strAEndTeg;
                                if($j > 10)
                                    echo $strNBSP;
                            }
                        }

                        if($i == $j && $j > 9)
                        {
                            actOutUrl_1($urlServReqUri,$urlPage,$i,$strAAct,$strEndA,$strAEndTeg,$strA);
                        }
                    }
                    else if($page >= 9 && $page < $j)
                    {
                        if($i == 1) {
                            echo $strA.$urlPage."1".$strEndA."1".$strAEndTeg;
                            echo $strNBSP;
                        }

                        if($i >=($page-4) && ($i < $page)) {
                            actOutUrl_1($urlServReqUri,$urlPage,$i,$strAAct,$strEndA,$strAEndTeg,$strA);
                        }

                        if($i == $page) {
                            actOutUrl_1($urlServReqUri,$urlPage,$i,$strAAct,$strEndA,$strAEndTeg,$strA);
                        }

                        if (($i > $page) && ($i <= ($page+4)) && ($i != $j)) {
                            actOutUrl_1($urlServReqUri,$urlPage,$i,$strAAct,$strEndA,$strAEndTeg,$strA);
                        }

                        if($i == $j) {
                            if(($j-6) > $page)
                            {
                                echo $strNBSP;
                            }
                            actOutUrl_1($urlServReqUri,$urlPage,$i,$strAAct,$strEndA,$strAEndTeg,$strA);

                        }
                    }
                    else
                    {
                        if($i == 1 && $j >= $page)
                        {

                            if($urlServReqUri == $urlPage.$i)
                                echo $strAAct.$urlPage.$i.$strEndA.$i.$strAEndTeg.$strNBSP;
                            else
                                echo $strA.$urlPage.$i.$strEndA.$i.$strAEndTeg.$strNBSP;
                        }

                        if(($i >= ($page-6))&& ($i <= $page))
                        {
                            actOutUrl_1($urlServReqUri,$urlPage,$i,$strAAct,$strEndA,$strAEndTeg,$strA);
                        }

                    }


                    $i++;

                }
                if($page < $j)
                {
                    $next = $page + 1;
                    echo $strA.$urlPage.$next."'>>>".$strAEndTeg;
                }

    echo "</div>";

}
?>