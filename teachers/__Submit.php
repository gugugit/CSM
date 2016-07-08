<?php
require_once('../Common/db.php');
$score = $_POST['score'];
$student_id = $_POST['student_id'];
$db = database::getinstance();
$data['Score'] = $score;
$condition['Student_Id'] = $student_id;
$table = 'select_issue';
$res = $db -> update($table,$data,$condition);
if($res){
	echo "<script>alert('success');</script>";
	// header("Location:SubmitScore.php");
}
else{
	echo "<script>alert('fail');</script>";
	// header("Location:SubmitScore.php");
}
?>