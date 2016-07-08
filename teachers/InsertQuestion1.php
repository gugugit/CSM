<?php
session_start();
require_once('../Common/db.php');
$user_id = $_POST['user_id'];
$content = $_POST['content'];
$title = $_POST['title'];
$user_name = $_SESSION['user_name'];
$db = database::getinstance();
$sql = "select MAX(Question_Id) as question_id from luntan";
$res = $db -> select($sql);
foreach ($res as $key => $val) {
	$question_id = $val['question_id'];
}
$question_id = $question_id + 1;
$table = 'luntan';
$data['Question_Id'] = $question_id;
$res = $db -> insert($table, $data);
if(!empty($res)){
	$table = 'question';
	$data['Sender_Id'] = $user_id;
	$data['Sender_Name'] = $user_name;
	$data['Content'] = $content;
	$data['Title'] = $title;
	$data['Start'] = 1;
	$res = $db -> insert($table,$data);
	if(!empty($res)){
		echo "<script>alert('success');location.href = 'Communicate.php'</script>";
	}
	else{
		echo "<script>alert('fail');location.href = 'Communicate.php'</script>";
	}
}
else{
	echo "<script>alert('fail');location.href = 'Communicate.php'</script>";
}
?>