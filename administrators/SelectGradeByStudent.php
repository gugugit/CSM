<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>毕业设计管理子系统</title>
<link href="../images/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
	background:#FFF
}
</style>
</head>

<body>
<div id="contentWrap">
<div class="pageTitle">&nbsp;&nbsp;<span>当前位置 -- 成绩查询 -- 学生课题成绩查询</span></div>
<div class="pageColumn">
<div class="pageButton" style="text-align:center;">
	<span>学生成绩表</span>
</div>
  <form action="SelectGradeByStudent.php" method = "post">
  	<table>
  		<!-- <caption align = "top">学生成绩表</caption> -->
        <thead>
        <th width="10%">学生姓名</th>
        <th width="10%">标题</th>
        <th width="10%">类型</th>
        <th width="20%">简介</th>
        <th width="15%">作品</th>
        <th width="10%">成绩</th>
	    </thead>
	    <tbody>
	    	<?php
	    		require_once('../Common/db.php');
			    $sql = "select issue.Title as issue_title,issue_type.Name as type_name,issue.Introduction as introduction,select_issue.Production as production,student.Name as student_name,select_issue.Score as score from issue,select_issue,student,issue_type where issue.Id = select_issue.Issue_Id and issue.Type = issue_type.Id and select_issue.Student_Id = student.Id and select_issue.Status = 1";
			    $db = database::getinstance();
			    $res = $db -> select($sql);
			    foreach ($res as $key => $val) {
			    	$student_name = $val['student_name'];
			    	$issue_title = $val['issue_title'];
			    	$issue_type = $val['type_name'];
			    	$production = $val['production'];
			    	$introduction = $val['introduction'];
			    	$score = $val['score'];
			    	echo "<tr class = 'trLight'>";
					echo "<td>$student_name</td>";
					echo "<td>$issue_title</td>";
					echo "<td>$issue_type</td>";
					echo "<td>$introduction</td>";
					echo "<td>$production</td>";
					echo "<td>$score</td>";
					echo "</tr>";
			    }
	    	?>
	    </tbody>
    </table>
    <br/><br/>
    <div><span>根据学生信息查询学生毕业设计成绩</span></div>
  	<div>
	  	<label>根据学生ID查询:</label>&nbsp;
	  	<input type="text" name="student_id" style = "border:1px solid #ADD8E6">
	</div>
	<div>
	  	<label>根据学生姓名查询:</label>
	  	<input type="text" name="student_name" style = "border:1px solid #ADD8E6">
	</div>
	<div>
	  	<input type="submit" name="submit" value="submit">
  	</div>
  	<?php
  		require_once('../Common/db.php');
  		if(!empty($_POST['submit'])){
  			$db = database::getinstance();
  			$sql = "select issue.Title as issue_title,issue_type.Name as type_name,issue.Introduction as introduction,select_issue.Summary as summary,select_issue.Production as production,student.Name as student_name,select_issue.Score as score from issue,select_issue,student,issue_type where issue.Id = select_issue.Issue_Id and issue.Type = issue_type.Id and select_issue.Student_Id = student.Id and select_issue.Status = 1";
  			if(!empty($_POST['student_id'])){
  				$student_id = $_POST['student_id'];
  				$sql = $sql." and student.Id = '$student_id'";
  			}
  			if(!empty($_POST['student_name'])){
  				$student_name = $_POST['student_name'];
  				$sql = $sql." and student.Name = '$student_name'";
  			}
			$res = $db -> select($sql);
			if(!empty($res)){
				echo "<table>";
				echo "<caption align = 'top'>学生成绩表</caption>";
		        echo "<thead>";
		        echo "<th width='10%'>学生姓名</th>";
		        echo "<th width='10%'>标题</th>";
		        echo "<th width='10%'>类型</th>";
		        echo "<th width='20%'>简介</th>";
		        echo "<th width='15%'>作品</th>";
		        echo "<th width='10%'>成绩</th>";
			    echo "</thead>";
			    echo "<tbody>";
				foreach ($res as $key => $val) {
			    	$student_name = $val['student_name'];
			    	$issue_title = $val['issue_title'];
			    	$issue_type = $val['type_name'];
			    	$production = $val['production'];
			    	$introduction = $val['introduction'];
			    	$score = $val['score'];
			    	echo "<tr class = 'trLight'>";
					echo "<td>$student_name</td>";
					echo "<td>$issue_title</td>";
					echo "<td>$issue_type</td>";
					echo "<td>$introduction</td>";
					echo "<td>$production</td>";
					echo "<td>$score</td>";
					echo "</tr>";
			    }
				echo "</tbody>";
				echo "</table>";	
			}
			else{
				echo "<script>alert('没有结果');</script>";
			}
  		}
  	?>
  </form>
</div></div>
</body>
</html>
