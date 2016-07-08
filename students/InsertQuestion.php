<?php
session_start();
$user_id = $_POST['user_id'];
$user_name = $_POST['user_name'];
$question_id = $_POST['question_id'];
$question_content = $_POST['question_content'];
$question_title = $_POST['question_title'];
require_once('../Common/db.php');
$db = database::getinstance();
$data['Question_Id'] = $question_id;
$data['Sender_Id'] = $user_id;
$data['Sender_Name'] = $user_name;
$data['Start'] = 0;
$data['Content'] = $question_content;
$table = 'question';
$res = $db -> insert($table,$data);
if($res){
	echo "<script>alert('success');location.href = 'Question_detail.php?question_id=$question_id&question_title=$question_title';</script>";
}
else{
	echo "<script>alert('fail');location.href = 'Question_detail.php?question_id=$question_id&question_title=$question_title';</script>";
}
?>