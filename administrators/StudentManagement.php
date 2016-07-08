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
<div class="pageTitle">&nbsp;&nbsp;<span>当前位置 -- 信息管理 -- 学生信息管理</span></div>
<div class="pageColumn">
<div class="pageButton">
	<span>根据学号或姓名查询相应学生信息</span>
</div>
  <form action = "StudentManagement.php" method = 'post'>
  	<div>
	  	<label>学生ID:</label>&nbsp;&nbsp;
	  	<input type="text" name="student_id" style="border:1px solid #ADD8E6">
    </div>
    <div>
	  	<label>学生姓名:</label>&nbsp;
	  	<input type="text" name="student_name" style="border:1px solid #ADD8E6">
    </div>
    <div>
	  	<input type="submit" name="submit">
    </div>
  </form>
  <?php
  	require_once('../Common/db.php');
  	if(!empty($_POST['submit'])){
	  	$db = database::getinstance();
	  	$sql = "select student.Id as student_id,student.Name as student_name,Sex as sex,academy.Name as academy_name,speciality.Name as speciality_name,student.Class as class,grade.Name as grade_name,student.Dates_Attendance as dates,student.Phone as phone,student.Identification_Card as identification_card,student.Nation as nation,student.BirthPlace as birth_place,student.BirthDay as birthday,student.EMail as student_mail from student,academy,speciality,grade where student.Academy = academy.Id and student.Speciality = speciality.Id and student.Grade = grade.Id";
  		if(!empty($_POST['student_id'])){
  			$student_id = $_POST['student_id'];
  			$sql .= " and student.Id = '$student_id'";
  		}
  		if(!empty($_POST['student_name'])){
  			$student_name = $_POST['student_name'];
  			$sql .= " and student.Name = '$student_name'";
  		}
  		$res = $db -> select($sql);
  		if(!empty($res)){
  			$val = $res[0];
  			$student_id = $val['student_id'];
  			$student_name = $val['student_name'];
			$sex = $val['sex'];
			$academy_name = $val['academy_name'];
			$speciality_name = $val['speciality_name'];
			$class = $val['class'];
			$grade_name = $val['grade_name'];
			$dates = $val['dates'];
			$phone = $val['phone'];
			$identification_card = $val['identification_card'];
			$nation = $val['nation'];
			$birth_place = $val['birth_place'];
			$birthday = $val['birthday'];
			$student_mail = $val['student_mail'];
			echo "<form action = 'UpdateStudentInfo.php' method = 'post'>";
			echo "<input type = 'hidden' name = 'student_id' value = '$student_id'>";
			echo "<div>";
			echo "<label>姓名:</label>&nbsp;&nbsp;&nbsp;";
			echo "<input type = 'text' name = 'student_name' value = '$student_name' style = 'border:1px solid #ADD8E6'>";
			echo "</div>";
			echo "<div>";
			echo "<label>性别:</label>&nbsp;&nbsp;&nbsp;";
			echo "<select name = 'sex'>";
			if($sex == '男' or $sex == 'male'){
				echo "<option value = 0 selected = 'selected'>男</option>";
				echo "<option value = 1>女</option>";
			}
			else{
				echo "<option value = 0>男</option>";
				echo "<option value = 1 selected = 'selected'>女</option>";
			}
			echo "</select>";
			echo "</div>";
			echo "<div>";
			echo "<label>学院:</label>&nbsp;&nbsp;&nbsp;";
			echo "<select name = 'academy'>";
			$sql = "select Id,Name from academy";
			$res = $db -> select($sql);
			foreach ($res as $key => $val) {
				$Academy_id = $val['Id'];
				$Academy_name = $val['Name'];
				if($Academy_name == $academy_name){
					echo "<option value = '$Academy_id' selected = 'selected'>$Academy_name</option>";
				}
				else{
					echo "<option value = '$Academy_id'>$Academy_name</option>";	
				}
			}
			echo "</select>";
			echo "</div>";
			echo "<div>";
			echo "<label>专业:</label>&nbsp;&nbsp;&nbsp;";
			echo "<select name = 'speciality'>";
			$sql = "select Id,Name from speciality";
			$res = $db -> select($sql);
			foreach ($res as $key => $val) {
				$Speciality_id = $val['Id'];
				$Speciality_name = $val['Name'];
				if($Speciality_name == $speciality_name){
					echo "<option value = '$Speciality_id' selected = 'selected'>$Speciality_name</option>";
				}
				else{
					echo "<option value = '$Speciality_id'>$Speciality_name</option>";	
				}
			}
			echo "</select>";
			echo "</div>";
			echo "<div>";
			echo "<label>年级:</label>&nbsp;&nbsp;&nbsp;";
			echo "<select name = 'grade'>";
			$sql = "select Id,Name from grade";
			$res = $db -> select($sql);
			foreach ($res as $key => $val) {
				$Grade_id = $val['Id'];
				$Grade_name = $val['Name'];
				if($Grade_name == $grade_name){
					echo "<option value = '$Grade_id' selected = 'selected'>$Grade_name</option>";
				}
				else{
					echo "<option value = '$Grade_id'>$Grade_name</option>";	
				}
			}
			echo "</select>";
			echo "</div>";
			echo "<div>";
			echo "<label>班级:</label>&nbsp;&nbsp;&nbsp;";
			echo "<input type = 'text' name = 'class_name' value = '$class' style = 'border:1px solid #ADD8E6'>";
			echo "</div>";
			echo "<div>";
			echo "<label>入学时间:</label>&nbsp;";
			echo "<input type = 'text' name = 'student_time' value = '$dates' style = 'border:1px solid #ADD8E6'>";
			echo "</div>";
			echo "<div>";
			echo "<label>联系方式:</label>&nbsp;";
			echo "<input type = 'text' name = 'student_phone' value = '$phone' style = 'border:1px solid #ADD8E6'>";
			echo "</div>";
			echo "<div>";
			echo "<label>身份证号:</label>&nbsp;";
			echo "<input type = 'text' name = 'identification_card' value = '$identification_card' style = 'border:1px solid #ADD8E6'>";
			echo "</div>";
			echo "<div>";
			echo "<label>民族:</label>&nbsp;&nbsp;&nbsp;";
			echo "<input type = 'text' name = 'nation_name' value = '$nation' style = 'border:1px solid #ADD8E6'>";
			echo "</div>";
			echo "<div>";
			echo "<label>籍贯:</label>&nbsp;&nbsp;&nbsp;";
			echo "<input type = 'text' name = 'birth_place' value = '$birth_place' style = 'border:1px solid #ADD8E6'>";
			echo "</div>";
			echo "<div>";
			echo "<label>生日:</label>&nbsp;&nbsp;&nbsp;";
			echo "<input type = 'text' name = 'birthday' value = '$birthday' style = 'border:1px solid #ADD8E6'>";
			echo "</div>";
			echo "<div>";
			echo "<label>邮箱:</label>&nbsp;&nbsp;&nbsp;";
			echo "<input type = 'text' name = 'student_mail' value = '$student_mail' style = 'border:1px solid #ADD8E6'>";
			echo "</div>";
			echo "<div>";
			echo "<input type = 'submit' name = 'submit_info'>";
			echo "</div>";
			echo "</form>";
  		}
  		else{
  			echo "<script>alert('没有此学生');</script>";
  		}
  	}
  ?>
</div></div>
</body>
</html>
