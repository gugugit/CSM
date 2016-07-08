<?php
require_once ("../connect.php");
session_start();
$se=$_GET['selectcourse'];
$user=$_SESSION['id'];
$sql="select shouke.Curricula_Id as '备选课ID',shouke.Start_week as '备选开始周',shouke.End_week as '备选结束周',shouke.Day as '备选星期',shouke.Start_class as '备选开始时间',shouke.End_class as '备选结束时间' from shouke,curricula,curricula_type where shouke.Curricula_Id not in ( select curricula_variable.Curricula_Id from curricula_variable where curricula_variable.Student_Id='$user') and shouke.Curricula_Id=curricula.Id and curricula.Type=curricula_type.Id and curricula_type.Name='专业选修' and shouke.Curricula_Id='$se'";
$sql1="select shouke.Curricula_Id as '已选课ID',shouke.Start_week as '已选开始周',shouke.End_week as '已选结束周',shouke.Day as '已选星期',shouke.Start_class as '已选开始时间',shouke.End_class as '已选结束时间' from shouke where shouke.Curricula_Id in ( select curricula_variable.Curricula_Id from curricula_variable where curricula_variable.Student_Id='$user')";
$sql2= "select DISTINCT curricula_variable.Year as '学年',curricula_variable.Term as '学期' from student,academy,speciality,grade,curricula_variable where academy.Id=student.Academy and curricula_variable.Student_Id=student.Id and speciality.Id=student.Speciality and grade.Id=student.Grade and student.Id='$user'";
$sql4="select curricula_variable.Curricula_Id from curricula_variable where curricula_variable.Student_Id='$user'";
$res=mysqli_query($conn,$sql);
$res1=mysqli_query($conn,$sql1);
$res2=mysqli_query($conn,$sql2);
$res3=mysqli_query($conn,$sql4);
$rows=mysqli_num_rows($res);
$rows1=mysqli_num_rows($res1);
// echo $rows."条";
// echo $rows1;
// $result3[] = "";
// $result[] = "";
// $result1[] = "";
while($resres=mysqli_fetch_array($res)){
	$result[]=$resres;
}
while($resres1=mysqli_fetch_array($res1)){
	$result1[]=$resres1;
}
while($resres2=mysqli_fetch_array($res2)){
	$result2[]=$resres2;
}
while($resres3=mysqli_fetch_array($res3)){
	$result3[]=$resres3;
}
if($rows == 0){
	echo "<script>alert('该课已被选择，不可再选！');location.href='optional_course.php?p=1';</script>";
}
// print_r($result3);
// print_r($result);
// print_r($result1);
// print_r($result2);
// // echo $result2[0][0]."&nbsp;";
// // echo $result2[0][1];
$year=$result2[0][0];
$term=$result2[0][1];
$ok = 1;
for($i=0;$i<$rows1;$i++){
	if($result[0][4]==$result1[$i][4]){
		if($result[0][3]==$result1[$i][3]){
			if(($result[0][2]<$result1[$i][1])||($result[0][1]>$result1[$i][2])){
				$ok=1;
			}else{
				$ok=0;
			}
		}else{
			$ok=1;
		}
	}else{
		$ok=1;
	}
	if ($ok == 0) break;
}
if($ok){
	$re=$result[0][0];
	$sql3="INSERT INTO curricula_variable(Student_Id,Curricula_Id,Year,Term) VALUES('$user','$re','$year','$term')";
	$r=mysqli_query($conn,$sql3);
	if($r){
		echo "<script>alert('恭喜您，选课成功！');location.href='optional_course.php?p=1';</script>";
	}
}else{
	echo "<script>alert('课程上课时间冲突，请重新选择！');location.href='optional_course.php?p=1';</script>";
}
?>