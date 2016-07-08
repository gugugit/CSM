<?php


if(strlen($_POST['Building_Id']&&$_POST['Classroom_Id']&&$_POST['Event']&&$_POST['Week']&&$_POST['Day']&&$_POST['Start_time']&&$_POST['End_time'])>0)
{
header("Content-Type:text/html ;charset=utf-8");
require_once ("../config/connect.php");







$sql="INSERT INTO activity (Building_Id,Classroom_Id,Event,Week, Day,Start_time,End_time)
VALUES
('$_POST[Building_Id]','$_POST[Classroom_Id]','$_POST[Event]','$_POST[Week]','$_POST[Day]','$_POST[Start_time]','$_POST[End_time]')";//插入数据


$result2=mysqli_query($conn,"select * from classroom where Building_Id=$_POST[Building_Id] and Id=$_POST[Classroom_Id]");


$result3=mysqli_query($conn,"select activity.* from activity,shouke where (('$_POST[Start_time]'>=activity.Start_time and '$_POST[Start_time]'<=activity.End_time )OR('$_POST[End_time]'>=activity.Start_time and '$_POST[End_time]'<=activity.End_time )) AND activity.Building_Id=$_POST[Building_Id] and activity.Classroom_Id=$_POST[Classroom_Id] AND activity.`Week`=$_POST[Week] AND activity.`Day`=$_POST[Day] ");


$result4=mysqli_query($conn,"select shouke.* from activity,shouke where shouke.Building_Id=$_POST[Building_Id] AND shouke.Classroom_Id=$_POST[Classroom_Id] AND shouke.`Day`=$_POST[Day] AND ($_POST[Week]>=shouke.Start_week and $_POST[Week]<=shouke.End_week ) AND (('$_POST[Start_time]'>=shouke.Start_class and '$_POST[Start_time]'<=shouke.End_class )OR('$_POST[End_time]'>=shouke.Start_class and '$_POST[End_time]'<=shouke.End_class ))");


if(!(mysqli_fetch_array($result2)))
{
	echo "<script>window.alert('教室不存在！');history.back(1);</script>";
}
else
{
	if(mysqli_fetch_array($result3)||mysqli_fetch_array($result4))
	{
		echo "<script>window.alert('此时间此教室已被占用！');history.back(1);</script>";
	}
	else{
	if (!mysqli_query($conn,$sql))
	{
		die('Error: ' . mysqli_error());
	}
	echo "1 record added";}
}
}
else echo "<script>window.alert('您有没填的信息哦！');history.back(1);</script>";
?>

