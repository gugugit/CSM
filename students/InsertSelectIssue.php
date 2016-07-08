<?php
require_once('../Common/db.php');
session_start();
$db = database::getinstance();
$student_id = $_SESSION['user_id'];
$issue_id = $_GET['issue_id'];
$sql = "select * from select_issue where Student_Id = '$student_id'";
$res = $db -> select($sql);
if(!empty($res)){
	echo "<script>alert('你已经选择课题了!!!');location.href='ChooseIssue.php';</script>";
}
else{
	$table = 'select_issue';
	$data['Status'] = 2;
	$data['Student_Id'] = $student_id;
	$data['Issue_Id'] = $issue_id;
	$res = $db -> insert($table,$data);
	if($res >= 0){
		echo "<script>alert('选择成功!!!');location.href='ChooseIssue.php';</script>";
	}
	else{
		echo "<script>alert('抱歉,没有选上!!!');location.href='ChooseIssue.php';</script>";
	}
}
?>