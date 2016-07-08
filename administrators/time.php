<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>简单漂亮的后台管理界面模板 - 源码之家</title>
<link href="../images/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	background:#FFF
}
input {
 color: #122e29;
 border: 1px solid #005344;
 background-color: ;
}
input:focus {
 color: #ed1941;
 border: 1px solid #2468a2;
 background-color: ;
}
</style>
</head>

<body>

<br/>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"><!--$_SERVER["PHP_SELF"] 将表单数据发送到页面本身，而不是跳转到另一张页面。这样，用户就能够在表单页面获得错误提示信息。-->



使用时间:
	教学第<input type="php" name="Start_week" />周到第<input type="php" name="End_week" />周 周 <select name="Day">
	
	<option value="1">一</option>
	<option value="2">二</option>
	<option value="3">三</option>
	<option value="4">四</option>
	<option value="5">五</option>
	<option value="6">六</option>
	<option value="7">日</option></select>
	<br/><br/>
	

<input type="submit" value="提交"/>
<br/><br/>
</form>



<div id="contentWrap">
<div class="pageTitle"></div>
<div class="pageColumn">
<div class="pageButton"></div>
  <table>
    <thead>
    <th width="25"><input name="" type="checkbox" value="" /></th>
     <th width="10%">教学楼名称</th>
      <th width="10%">教室号</th>
	  <th width="10%">教室容量</th>
      <th width="20%">事件</th>
	  <th width="10%">日期</th>
	  <th width="10%">开始时间</th>
	  <th width="10%">结束时间</th>
	   <th width="10%">教学周</th>
      <th width="10%">结束教学周</th>
        </thead>
    
<?php
echo"<center>";
//连接数据库
header("Content-Type:text/html ;charset=utf-8");

require_once ("../config/connect.php");
//数据显示在表格中
$time = time();
echo date("y-m-d",$time); //2010-08-29


$result=mysqli_query($conn,"SELECT * FROM activity,shouke");
$a=@$_POST['Day'];
$b=@$_POST['Start_week'];
$c=@$_POST['End_week'];//将跳转输入值转入a
if(strlen($a)==0||strlen($b)==0||strlen($c)==0)
{$a=0;
$b=0;
$c=0;}

$result = mysqli_query($conn,"select activity.*, building.`Name`,classroom.Contain from activity,building,classroom where ($b<=activity.Week and $c>=activity.Week ) and  activity.Day=$a AND building.Id=activity.Building_Id AND classroom.Building_Id=activity.Building_Id AND classroom.Id=activity.Classroom_Id");

$result1 = mysqli_query($conn,"select shouke.*, building.`Name`,classroom.Contain from shouke,building,classroom where (($b>=shouke.Start_week and $b<=shouke.End_week )OR($c>=shouke.Start_week and $c<=shouke.End_week )) and  shouke.Day=$a AND building.Id=shouke.Building_Id AND classroom.Building_Id=shouke.Building_Id AND classroom.Id=shouke.Classroom_Id");
while($row=mysqli_fetch_array($result1))
{
	?>
<tr>
<td class="checkBox"><input name="" type="checkbox" value="" /></td>
<td><?php echo $row['Name'];?></td>
<td><?php echo $row['Classroom_Id'];?></td>
<td><?php echo $row['Contain'];?></td>
<td><?php echo $row['Curricula_Id'];?></td>
<td><?php echo $row['Day'];?></td>
<td><?php echo $row['Start_class'];?></td>
<td><?php echo $row['End_class'];?></td>
<td><?php echo $row['Start_week'];?></td>
<td><?php echo $row['End_week'];?></td>
</tr>
<?php
}
while($row=mysqli_fetch_array($result))
{
?>
<tr>
<td class="checkBox"><input name="" type="checkbox" value="" /></td>
<td><?php echo $row['Name'];?></td>
<td><?php echo $row['Classroom_Id'];?></td>
<td><?php echo $row['Contain'];?></td>
<td><?php echo $row['Event'];?></td>
<td><?php echo $row['Day'];?></td>
<td><?php echo $row['Start_time'];?></td>
<td><?php echo $row['End_time'];?></td>
<td><?php echo $row['Week'];?></td>
</tr>
<?php
}

?>
<?php
echo"</center>";

?>

  </table>
</div></div>
</body>
</html>


