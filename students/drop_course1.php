<?php
require_once ("../connect.php");
session_start();
$se=$_GET['selectcourse'];
$sql="delete from curricula_variable where Curricula_Id='$se'";
$res=mysqli_query($conn,$sql);
if($res){
	echo "<script>alert('恭喜您，退课成功！');location.href='drop_course.php?p=1';</script>";
}
?>