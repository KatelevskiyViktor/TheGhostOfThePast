<?$db = mysql_connect("localhost","ViK","sofiya");
mysql_select_db("my_blog",$db);?>
<div style="height:170px;
	width:9999999px;
	background-image:url('../img/frame.png');
	background-repeat:repeat-x;
	margin:auto auto;
	";>

<?
$result33 = mysql_query('SELECT id, mini_img FROM heroes',$db);!!!!!!!!!!!!!!!!!!!!Разберись с надписью футера
$myrow33 = mysql_fetch_array($result33);
do
{$i++;
if($i == 1)
	echo "<a href='ViewHeroes.php?id=$myrow33[id]'><img style='margin-top:28px;margin-right:4px;' src='$myrow33[mini_img]'></a>";
else
	echo "<a href='ViewHeroes.php?id=$myrow33[id]'><img style='margin-top:28px;margin-left:4px;margin-right:4px;' src='$myrow33[mini_img]'></a>";
	
}
while($myrow33 = mysql_fetch_array($result33));
?>

</div>