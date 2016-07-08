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
<div class="pageTitle">&nbsp;&nbsp;<span>当前位置 -- 课题信息查询 -- 根据学生信息查询</span></div>
<div class="pageColumn">
<div class="pageButton">
    <span>根据学生信息查询相关的毕业设计课题</span>
</div>
  <form action="SelectIssueByStudent.php" method = "post">
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
            $sql = "select student.Name as student_name,issue.Title as issue_title,teacher.Name as teacher_name,speciality.Name as speciality_name,issue_type.Name as type_name,issue.Introduction as introduction,select_issue.Status as status from select_issue,issue,student,issue_type,teacher,speciality where select_issue.Issue_Id = issue.Id and student.Id = select_issue.Student_Id and issue.Type = issue_type.Id and issue.Teacher_Id = teacher.Id and issue.Speciality_Id = speciality.Id and select_issue.Status != 0";
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
                    $student_name1 = $val['student_name'];
                    $issue_title = $val['issue_title'];
                    $type_name = $val['type_name'];
                    $teacher_name = $val['teacher_name'];
                    $speciality_name = $val['speciality_name'];
                    $introduction = $val['introduction'];
                    echo "<tr class = 'trLight'>";
                    echo "<td>$student_name1</td>";
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
