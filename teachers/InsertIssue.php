<?php
session_start();
require_once('../Common/db.php');
// $user = $_POST['user'];
// $passwd = $_POST['passwd'];
// $db = database::getinstance();
// $sql = "select * from administrator where Id = '$user' and Password = '$passwd'";
// $res = $db -> select($sql);
// if($res){
// 	header("Location:index.html");
// }
// else{
// 	echo "<script>alert('error');</script>";
// 	header("Location:login.html");
// }
$title = $_POST['title'];
$type = $_POST['type'];
$demand = $_POST['demand'];
$speciality = $_POST['speciality'];
$people = $_POST['people'];
$introduction = $_POST['Introduction'];
$teacher_id = $_SESSION['user_id'];
// echo 'teacher_id:',$teacher_id;
// insert into database
$table = 'issue';
$data['Title'] = $title;
$data['Teacher_Id'] = $teacher_id;
$data['Demand'] = $demand;
$data['Speciality_Id'] = $speciality;
$data['Contain'] = $people;
$data['Introduction'] = $introduction;
$data['Type'] = $type;
$db = database::getinstance();
$res = $db -> insert($table,$data);
if($res){
	echo "<script>alert('success');</script>";
}
else{
	echo "<script>alert('error');</script>";
}
?>