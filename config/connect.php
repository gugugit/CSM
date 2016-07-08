<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "management";
$conn = mysqli_connect($host,$username,$password);
if(!$conn){
	echo "link failure";
	exit;
}
else {
	//echo "link successful";
    mysqli_select_db($conn,$db);
    mysqli_query($conn,"SET NAMES UTF8");
}

?>
