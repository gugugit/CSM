<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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

<?php 
include ("allincluding.php");
?> 
  <!--学年 学期 课程ID 课程名称 课程性质 学分 绩点 成绩 开课学院  -->
  <table>
    <thead>
    <th width="10%">学年</th>
      <th width="10%">学期</th>
      <th width="10%">课程ID</th>
      <th width="15%">课程名称</th>
      <th width="15%">课程性质</th>
      <th width="10%">学分</th>
      <th width="5%">绩点</th>
      <th width="10%">成绩</th>
      <th width="15%">开课学院</th>
     </thead>
    <tbody>
    	<?php $line->yearscore();?>
    </tbody>
  </table>

</body>
</html>