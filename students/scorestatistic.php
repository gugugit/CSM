<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>成绩统计</title>
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

<!-- 学生基本信息总览表 -->
  <table>
    <thead>
    <th width="100%">基本信息</th>
    </thead>
    </table>
<?php 
include ("allincluding.php");
?> 
    <table>
    <tbody>
    	<tr>
        <td width="25%">学号：<?php echo $_SESSION['ID'];?></td>
        <td width="25%">姓名：<?php echo $Name;?></td>
        <td width="50%">学院：<?php echo $Aca?></td>
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
  <!-- 学生成绩信息显示表 -->
  <table>
    <thead>
    <th width="20%">课程性质名称</th>
      <th width="20%">学分要求</th>
      <th width="20%">获得学分</th>
      <th width="20%">未通过学分</th>
      <th width="20%">还需学分</th>
        </thead>
    <tbody>
    	<?php $line->statistic();?>
    </tbody>
  </table>
  <div class="pageColumn">
  <div>
  <font color="#0000FF">
  <table>
  <th width="20%">本专业共：<?php $line->countstudents();?>人</th>
  <th width="20%">全课程平均绩点：<?php $line->averagescore();?></th>
  <th width="20%">学分绩点总和：<?php $line->allscore();?></th>
  <th width="40%">统计时间：<?php echo strftime ("%hh%m %a %d %b" ,time());?></th>
  </table>
  </div>

</body>
</html>