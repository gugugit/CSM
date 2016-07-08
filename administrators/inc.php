<?php
$mysqli=new mysqli('localhost','root','','management');
if(mysqli_connect_errno())
{
	echo mysqli_connect_errno();
}
else 
{
$mysqli->set_charset("utf8");
}
?>