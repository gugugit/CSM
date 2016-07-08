<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<style type="text/css">
body {
	background: #FFF
}
</style>
<meta charset="UTF-8">
<title>添加教室</title>
<link rel="stylesheet" type="text/css" href="/Educational_Administration_System/View/Public/css/common.css"/>
<link rel="stylesheet" type="text/css" href="__PUBLIC_/css/main.css"/>

</head>
<body>
    <div>
	    <div class="crumb-list"><i class="icon-font"> </i><a href="/Educational_Administration_System/View/index.php/Home/Clamanage/../Index/main">首页 </a><span class="crumb-step">&gt;</span><span class="crumb-name">添加教室信息</span></div>
	    <form action="/Educational_Administration_System/View/index.php/Home/Clamanage/addclasroom" method="post"id="checkname">
			<table class="insert-tab" width="100%">
				<tbody>
					<tr>
		  <th><label>教室:</label></th>  <td><input type="text" name="ID"></td>
	  </tr>
	  <tr>
		  <th><label>教学楼:</label></th>
		  <td>
		          <select name='BuildID' style="font-size:16px">
		            <option value='1'>主教</option>
		            <option value='2'>电教</option>
		            <option value='3'>科教</option>
		            <option value='4'>计算机楼</option>
		          </select>
			  </td>
		  </tr>
		  <tr>
		  <th><label>容纳人数:</label></th> <td><input type="text" name="Contain"/></td>
</tr>
<tr>
	<th></th>
<td>
	<input class="btn btn-primary btn6 mr10" type="submit" onClick="return check()"name="add_clasroom_sub" value="确认添加" />
  <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button"></td>
  </tr>
  </tbody>
  </table>
</form>
		<script>
			function isChinese(name) //中文值检测
			{
				if(name.length == 0)
					return false;
				for(i = 0; i < name.length; i++) {
					if(name.charCodeAt(i) > 128)
						return true;
				}
				return false;
			}
			function isNumber(name) //数值检测
			{
				if(name.length == 0)
					return false;
				for(i = 0; i < name.length; i++) {
					if(name.charAt(i) < "0" || name.charAt(i) > "9")
						return false;
				}
				return true;
			}

			function check(){
				if(checkname.ID.value==""||! isNumber(checkname.ID.value)){
					alert("教室编号不能为空并必为数字");
					return false;
				}
				if(checkname.BuildID.value==""){
					alert("所在教学楼不能为空");
					return false;
				}
				if(checkname.Contain.value==""||! isNumber(checkname.Contain.value)){
					alert("容量不能为空并必为数字");
					return false;
				}
				return true;
			}
		</script>




	</div>
</body>
</html>