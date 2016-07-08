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
<div class="pageTitle">&nbsp;&nbsp;<span>当前位置 -- 课题信息查询 -- 根据课题情况查询</span></div>
<div class="pageColumn">
<div class="pageButton">
	<span>根据课题信息查询相关的毕业设计课题</span>
</div>
  <form action="SelectIssueByIssue.php" method = "post">
  	<div>
	  	<label>根据课题ID查询:</label>&nbsp;
	  	<input type="text" name="issue_id" style = "border:1px solid #ADD8E6">
	</div>
	<div>
	  	<label>根据课题标题查询:</label>
	  	<input type="text" name="issue_title" style = "border:1px solid #ADD8E6">
	</div>
	<div>
	  	<label>根据课题类型查询:</label>
	  	<input type="text" name="issue_type" style = "border:1px solid #ADD8E6">
	</div>
	<div>
	  	<input type="submit" name="submit" value="submit">
  	</div>
  	<?php
  		require_once('../Common/db.php');
  		if(!empty($_POST['submit'])){
  			$db = database::getinstance();
  			$sql = "select teacher.name as teacher_name,student.Name as student_name,issue.Title as issue_title,issue.Introduction as introduction,issue_type.Name as type_name,select_issue.Status as status,speciality.Name as speciality_name from speciality,student,teacher,issue,select_issue,issue_type where select_issue.Student_Id = student.Id and select_issue.Issue_Id = issue.Id and issue.Type = issue_type.Id and issue.Teacher_Id = teacher.Id and issue.Speciality_Id = speciality.Id and select_issue.Status != 0";
  			if(!empty($_POST['issue_id'])){
  				$issue_id = $_POST['issue_id'];
  				$sql = $sql." and issue.Id = '$issue_id'";
  			}
  			if(!empty($_POST['issue_title'])){
  				$issue_title = $_POST['issue_title'];
  				$sql = $sql." and issue.Title = '$issue_title'";
  			}
  			if(!empty($_POST['issue_type'])){
  				$issue_type = $_POST['issue_type'];
  				$sql = $sql." and issue_type.Name = '$issue_type'";
  			}
  			// echo $sql."<br/>";
			$res = $db -> select($sql);
			if(!empty($res)){
				echo "<table>";
				echo "<thead>";
				echo "<th width = '12%'>学生姓名</th>";
				echo "<th width = '12%'>标题</th>";
				echo "<th width = '12%'>类型</th>";
				echo "<th width = '12%'>指导教师</th>";
				echo "<th width = '12%'>专业</th>";
				echo "<th width = '12%'>简介</th>";
				echo "<th width = '12%'>状态</th>";
				echo "</thead>";
				echo "<tbody>";
				foreach ($res as $key => $val) {
					if($val['status'] == 1){
						$status = '已通过';
					}
					else{
						$status = '待审核';
					}
					$student_name = $val['student_name'];
					$issue_title = $val['issue_title'];
					$type_name = $val['type_name'];
					$teacher_name = $val['teacher_name'];
					$speciality_name = $val['speciality_name'];
					$introduction = $val['introduction'];
					echo "<tr class = 'trLight'>";
					echo "<td>$student_name</td>";
					echo "<td>$issue_title</td>";
					echo "<td>$type_name</td>";
					echo "<td>$teacher_name</td>";
					echo "<td>$speciality_name</td>";
					echo "<td>$introduction</td>";
					echo "<td>$status</td>";
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
