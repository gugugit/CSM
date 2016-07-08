<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>教室信息管理</title>
<link href="/Educational_Administration_System/View/Public/images/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/Educational_Administration_System/View/Public/css/common.css"/>
<link rel="stylesheet" type="text/css" href="__PUBLIC_/css/main.css"/>
<style type="text/css">
body {
	background:#FFF
}
</style>
</head>
<body>
<script>
    function change()
    {
    	switch()
    }
</script>
<div id="contentWrap1">
<div class="pageTitle"></div>
<div class="pageColumn">
	<form method="post" action="/Educational_Administration_System/View/index.php/Home/Clamanage/search" id="search">
	按照教室号查询:&nbsp<input type="text" size="30" id="sid" name="searchid"/> 按照教学楼查询:
	<select name = 'searchname'>
		<option value="">=请选择=</option>
		<option value="1">主教</option>
		<option value="2">电教</option>
		<option value="3">科教</option>
		<option value="4">计算机楼</option>
	</select>&nbsp
	<input class="btn btn-primary btn6 mr10" type="submit" value="查询" />
</form>
<div style="margin-left:90%"><a href="/Educational_Administration_System/View/index.php/Home/Clamanage/addclasroom"><h2><font size="3" color="green">添加教室</font></h2></a></div>

		<div style="margin-left:15%">

        </div>
        <br></br>
        <form action="/Educational_Administration_System/View/index.php/Home/Clamanage/main" method="post" id='f' name='f'>
          <div style="margin-left:90%">
          </div>
        </form>
        <br></br>
	<table>
      <thead>
        <th width="25%">教室编号</th>
        <th width="25%">所在教学楼</th>
        <th width="25%">教室容量</th>
        <th width="25%">操作</th>
      </thead>
      <tbody>
        <?php if(is_array($classroom_list)): $i = 0; $__LIST__ = $classroom_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo ($vo['id']); ?></td>
            <td><?php echo ($vo['name']); ?></td>
            <td><?php echo ($vo['contain']); ?></td>
            <td>
              <a href="/Educational_Administration_System/View/index.php/Home/Clamanage/deleteclasroom/id/<?php echo ($vo['id']); ?>/building_id/<?php echo ($vo['building_id']); ?>?userId=<?php echo $row['id'] ?>" onclick="return confirm('确定要删除吗？')">删除</a><img src="/Educational_Administration_System/View/Public/Images/admin/icons/cross.png" alt="删除" /></a>
            </td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      </tbody>
  	  <tfoot>
  		 <tr>
  			<td clospan = "4">
  				<div class="pagination">
  					<?php echo ($page_method); ?>
  				</div>
  			</td>
  		 </tr>
  	  </tfoot>
    </table>
</div>
</div>
</body>
</html>