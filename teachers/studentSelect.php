<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Title</title>
	<link href="../css/bootstrap.css" type="text/css" rel="stylesheet" />
	<link href="../images/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="../javascript/jquery.min.js"></script>
	<style type="text/css">
		.biao{
			height:30px;
		}
	</style>
	<script>
		$(document).ready(function () {
			var x=$("input[name='coursename']").val();
			$("iframe[name='kebiao']").attr("src","studentSelectCourse.php?p=1&coursename="+x);
		})
	</script>
</head>
<body >
<div>
<div class="pageTitle">&nbsp;&nbsp;<span>当前位置 -- 信息查询 -- 学生选课情况查询</span></div>
    <div class="pageColumn2" align="center">
        <div class="pageButton"><h1 style="text-align:center">&nbsp;&nbsp;学生选课查询统计表</h1></div>
	<form method="get" action="studentSelectCourse.php" target="kebiao">
		<div style="text-align: center">
			<label style="color:#075587;font-size:14px">请输入需要查询的课程名称：<input style="border:1px solid #c5dbe2" name="coursename" type="text" /></label>
			<input type="hidden" name="p" value="1">
			<input type="submit" value="查询">
		</div>
	</form>
</div></div>
<div style="height: 650px">
	<iframe width="100%"  scrolling="auto" height="100%" frameborder="false" src="studentSelectCourse.php?p=1" allowtransparency="true" style="border: medium none;"  name="kebiao" "></iframe>
</div>
</body>
</html>