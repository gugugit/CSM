<?php
session_start();
require_once('../Common/db.php');
$user_id = $_SESSION['user_id'];
$summary = $_POST['summary1'];
$table = 'summary';
$data['Student_Id'] = $user_id;
$data['Content'] = $summary;
echo $user_id;
echo "<br/>";
echo $summary;
$db = database::getinstance();
$res = $db -> insert($table,$data);
if($res){
	echo "<script>alert('success');</script>";
}
else{
	echo "<script>alert('fail');</script>";	
}
?>