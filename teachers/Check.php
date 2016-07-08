<?php
require_once('../Common/db.php');
$db = database::getinstance();
$issue_id = $_POST['issue_id'];
$student_name = $_POST['student_name'];
$sql = "update issue set Number = Number + 1 where Id = '$issue_id'";
$res = $db -> update1($sql);
if($res){
	$yes = $_POST['yes'];
	if($yes == 'yes'){
		$data['Status'] = 1;
	}
	else{
		$data['Status'] = 0;
	}
	$sql = "select Id from student where Name = '$student_name'";
	$res = $db -> select($sql);
	foreach($res as $val){
		$student_id = $val['Id'];
	}
	$table = 'select_issue';
	$condition['Student_Id'] = $student_id;
	$condition['Issue_Id'] = $issue_id;
	$res = $db -> update($table,$data,$condition);
	if($res){
		echo "<script>alert('success')</script>";
	}
	else{
		echo "<script>alert('fail')</script>";
	}
}
else{
	echo "<script>alert('fail')</script>";
}
?>