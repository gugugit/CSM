<?php
require_once('../Common/db.php');
$data['Name'] = $_POST['teacher_name'];
if($_POST['sex'] == 0){
	$data['Sex'] = '男';
}
else{
	$data['Sex'] = '女';
}
$data['Academy'] = $_POST['academy'];
$data['Speciality'] = $_POST['speciality'];
$data['Dates_Enrollment'] = $_POST['teacher_time'];
$data['Phone'] = $_POST['teacher_phone'];
$data['Identification_Card'] = $_POST['identification_card'];
$data['Nation'] = $_POST['nation_name'];
$data['BirthPlace'] = $_POST['birth_place'];
$data['BirthDay'] = $_POST['birthday'];
$data['EMail'] = $_POST['teacher_mail'];
$data['Introduction'] = htmlspecialchars($_POST['introduction'],ENT_QUOTES);
$db = database::getinstance();
$table = 'teacher';
$condition['Id'] = $_POST['teacher_id'];


// echo "name:",$data['Name'],'<br/>';
// echo "Sex:",$data['Sex'],'<br/>';
// echo "Academy:",$data['Academy'],'<br/>';
// echo "Speciality:",$data['Speciality'],'<br/>';
// echo "Dates_Enrollment:",$data['Dates_Enrollment'],'<br/>';
// echo "Phone:",$data['Phone'],'<br/>';
// echo "Identification_Card:",$data['Identification_Card'],'<br/>';
// echo "Nation:",$data['Nation'],'<br/>';
// echo "BirthPlace:",$data['BirthPlace'],'<br/>';
// echo "BirthDay:",$data['BirthDay'],'<br/>';
// echo "EMail:",$data['EMail'],'<br/>';
// echo "Introduction:",$data['Introduction'],'<br/>';
// echo "Id:",$condition['Id'],'<br/>';
$res = $db -> update($table,$data,$condition);
if($res){
	echo "<script>alert('success');</script>";
	header('Location:TeacherManagement.php');
}
else{
	echo "<script>alert('fail');</script>";
	header('Location:TeacherManagement.php');
}
?>