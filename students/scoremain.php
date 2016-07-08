<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>基础表</title>
<link href="../images/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	background:#FFF
}
</style>
</head>
<body>
<div id="contentWrap">
<div class="pageTitle"></div>
<div class="pageColumn">
<div class="pageButton"></div>
<?php 
include ("allincluding.php");
?>
<!-- 学生基本信息总览表 -->
  <table>
    <thead>
    <th width="100%">基本信息</th>
    </thead>
    </table>
    <table>
    <tbody>
    	<tr>
        <td width="25%">学号：<?php echo $_SESSION['ID'];?></td>
        <td width="25%">姓名：<?php echo $Name;?></td>
        <td width="50%">学院：<?php echo $Aca;?></td>
      </tr>
      <tr>
        <td width="20%">班级：<?php echo $Class;?></td>
        <td width="30%">专业方向：</td>
        <td width="50%">专业：<?php echo $Sp;?></td>
      </tr>   
      <tr>
        <td width="20%">已选学分：<?php echo $sumscore;?></td>
        <td width="30%">获得学分：<?php echo $getscore;?></td>
        <td width="50%">重修学分：<?php echo $sumscore-$getscore?></td>
      </tr> 
    </tbody>
  </table>
  <div class="pageButton"></div>
  </div>
  
</div>
<?php 
$result=$mysqli->query("SELECT* FROM student WHERE Id like '{$_SESSION['ID']}'");
while ($row=$result->fetch_array())
{
	echo "ID:".$row["Id"]."用户名:".$row["Name"]."<br />";
}
?>
</div>
  		
</body>
</html>
