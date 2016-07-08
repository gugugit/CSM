<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>基础表</title>
<link href="images/style.css" rel="stylesheet" type="text/css" />
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
<form name="form1" method="POST" action="">
查询 ：<input type="text" name="search" size=30 style="border:1px solid #ADD8E6">
<input type="submit" value="确定" name="submit" >
</form>

<!--<?php
if(!empty($_POST["submit"])){
  echo "结果为：".$_POST["search"]."";
}
?>-->
 
   <table>
    <thead>
    <th width="15%">学号</th>
      <th width="15%">姓名</th>
      <th width="20%">专业</th>
      <th width="20%">班级</th>
      <th width="15%">获得学分</th>
      <th width="15%">平均绩点</th>
     </thead>
    <tbody>
    <?php $line->manager_search();?>
    </tbody>
  </table>
  
  <div class="pageButton"></div>
  </div>
</div>

</div>		
</body>
</html>