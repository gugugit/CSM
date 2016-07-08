<?php
require_once('../Common/db.php');
$issue_id = $_GET['issue_id'];
$table = 'select_issue';
$db = database::getinstance();
$condition['Issue_Id'] = $issue_id;
$res = $db -> delete($table,$condition);
if($res){
	$table = 'issue';
	$Condition['Id'] = $issue_id;
	$res = $db -> delete($table,$Condition);
	if($res){
		echo "<script>alert('success');</script>";
	}
	else{
		echo "<script>alert('fail');</script>";
	}
}
else{
	echo "<script>alert('fail');</script>";
}
?>