<?
include('blocks/hendler_ip.php');
include('blocks/ie_hendler.php');
session_start();
if(empty($_SESSION['login']) or empty($_SESSION['password']))
{
	exit("<p style='margin-left:13px;'>Доступ на эту страницу разрешён только зарегестрированным пользователя!Если вы зарегестрированны то войдите на сайт под своим логином и паролем</p><br><a style='margin-left:13px;' href='ViewIndex.php'>Главная    страница</a>");
}
unset ($_SESSION['password']);
unset($_SESSION['login']);
unset($_SESSION['id']);
exit("<html><head><meta    http-equiv='Refresh' content='0;    URL=ViewIndex.php'></head></html>");

?>