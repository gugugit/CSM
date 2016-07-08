<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>信息</title>
<link href="/CSM/Public/images/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/CSM/Public/css/common.css"/>
<link rel="stylesheet" type="text/css" href="__PUBLIC_/css/main.css"/>
<script type="text/javascript" src="/CSM/Public/javascript/jquery.min.js"></script>
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
	<form method="post" action="/CSM/index.php/Home/Stumanage/search" id="search">
		按照Id查询学生<input type="text" id="sid" name="searchid"/> 按照姓名查询学生 <input type="text" id="sname" name="searchname"/>
		<input class="btn btn-primary btn6 mr10"  type="submit" value="查询" />
	</form><div style="margin-left:90%"><a href="/CSM/index.php/Home/Stumanage/add"><h2><font size="3" color="green">添加学生信息</font></h2></a></div>
<div class="pageButton"></div>
	<div style="margin-left:15%">


	</div>
	<table>
      <thead>
      <!--<th width="10"><input name="" type="checkbox" value="" /></th>-->
      <th width="15%">学生ID</th>
        <th width="20%">学生姓名</th>
        <th width="10%">学生性别</th>
        <th width="20%">所属学院ID</th>
		<th width="20%">所属专业ID</th>
		<th width="25%">选项</th>
          </thead>
      <tbody>
  		<?php if(is_array($student_list)): $i = 0; $__LIST__ = $student_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
          <!--<td class="checkBox"><input name="" type="checkbox" value="" /></td>-->
          <td><?php echo ($vo['id']); ?></td>
          <td><a href="/CSM/index.php/Home/Stumanage/read/id/<?php echo ($vo['id']); ?>"><font color="green"><?php echo ($vo['name']); ?></font></a></td>
          <td><?php echo ($vo['sex']); ?></td>
		  <td><?php echo ($vo['academy']); ?></td>
		  <td><?php echo ($vo['speciality']); ?></td>
		  <td>
  			<a href="/CSM/index.php/Home/Stumanage/edit/id/<?php echo ($vo['id']); ?>" title="编辑"><img src="/CSM/Public/Images/admin/icons/pencil.png" alt="编辑" /></a>
  			<a href="/CSM/index.php/Home/Stumanage/delete/id/<?php echo ($vo['id']); ?>" title="删除"><img src="/CSM/Public/Images/admin/icons/cross.png" alt="删除" /></a>
		</td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      </tbody>
  	<tfoot>
  		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
  			<td clospan = "6">
  				<div class="pagination" style="margin-left:30%">
  					<font size="4" color="red"><h2><?php echo ($page_method); ?></h2></font>
			</td>
  		</tr>
  	</tfoot>
    </table>
</div>
</div></div>
</body>
</html>