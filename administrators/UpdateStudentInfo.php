<?php
require_once('../Common/db.php');
$data['Name'] = $_POST['student_name'];
if($_POST['sex'] == 0){
	$data['Sex'] = '男';
}
else{
	$data['Sex'] = '女';
}
$data['Academy'] = $_POST['academy'];
$data['Speciality'] = $_POST['speciality'];
$data['Class'] = $_POST['class_name'];
$data['Grade'] = $_POST['grade'];
$data['Dates_Attendance'] = $_POST['student_time'];
$data['Phone'] = $_POST['student_phone'];
$data['Identification_Card'] = $_POST['identification_card'];
$data['Nation'] = $_POST['nation_name'];
$data['BirthPlace'] = $_POST['birth_place'];
$data['BirthDay'] = $_POST['birthday'];
$data['EMail'] = $_POST['student_mail'];
$db = database::getinstance();
$table = 'student';
$condition['Id'] = $_POST['student_id'];
$res = $db -> update($table,$data,$condition);
if($res){
	echo "<script>alert('success');</script>";
	header('Location:StudentManagement.php');
}
else{
	echo "<script>alert('fail');</script>";
	header('Location:StudentManagement.php');
}
?>