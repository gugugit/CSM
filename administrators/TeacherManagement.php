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
<div class="pageTitle">&nbsp;&nbsp;<span>当前位置 -- 信息管理 -- 教师信息管理</span></div>
<div class="pageColumn">
<div class="pageButton">
	<span>根据教师工号或姓名查询相应的教师信息</span>
</div>
  <form action = "TeacherManagement.php" method = 'post'>
  	<div>
	  	<label>教师ID:</label>&nbsp;&nbsp;
	  	<input type="text" name="teacher_id" style="border:1px solid #ADD8E6">
    </div>
    <div>
	  	<label>教师姓名:</label>&nbsp;
	  	<input type="text" name="teacher_name" style="border:1px solid #ADD8E6">
    </div>
    <div>
	  	<input type="submit" name="submit">
    </div>
  </form>
  <?php
  	require_once('../Common/db.php');
  	if(!empty($_POST['submit'])){
	  	$db = database::getinstance();
	  	$sql = "select teacher.Id as teacher_id,teacher.Name as teacher_name,Sex as sex,academy.Name as academy_name,speciality.Name as speciality_name,teacher.Dates_Enrollment as dates,teacher.Phone as phone,teacher.Identification_Card as identification_card,teacher.Nation as nation,teacher.BirthPlace as birth_place,teacher.BirthDay as birthday,teacher.EMail as teacher_mail,teacher.Introduction as introduction from teacher,academy,speciality where teacher.Academy = academy.Id and teacher.Speciality = speciality.Id";
  		if(!empty($_POST['teacher_id'])){
  			$teacher_id = $_POST['teacher_id'];
  			$sql .= " and teacher.Id = '$teacher_id'";
  		}
  		if(!empty($_POST['teacher_name'])){
  			$teacher_name = $_POST['teacher_name'];
  			$sql .= " and teacher.Name = '$teacher_name'";
  		}
  		$res = $db -> select($sql);
  		if(!empty($res)){
  			$val = $res[0];
  			$teacher_id = $val['teacher_id'];
  			$teacher_name = $val['teacher_name'];
			$sex = $val['sex'];
			$academy_name = $val['academy_name'];
			$speciality_name = $val['speciality_name'];
			$dates = $val['dates'];
			$phone = $val['phone'];
			$identification_card = $val['identification_card'];
			$nation = $val['nation'];
			$birth_place = $val['birth_place'];
			$birthday = $val['birthday'];
			$teacher_mail = $val['teacher_mail'];
			$teacher_introduction = $val['introduction'];
			echo "<form action = 'UpdateTeacherInfo.php' method = 'post'>";
			echo "<input type = 'hidden' name = 'teacher_id' value = '$teacher_id'>";
			echo "<div>";
			echo "<label>姓名:</label>&nbsp;&nbsp;&nbsp;";
			echo "<input type = 'text' name = 'teacher_name' value = '$teacher_name' style = 'border:1px solid #ADD8E6'>";
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
			echo "<label>任教时间:</label>&nbsp;";
			echo "<input type = 'text' name = 'teacher_time' value = '$dates' style = 'border:1px solid #ADD8E6'>";
			echo "</div>";
			echo "<div>";
			echo "<label>联系方式:</label>&nbsp;";
			echo "<input type = 'text' name = 'teacher_phone' value = '$phone' style = 'border:1px solid #ADD8E6'>";
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
			echo "<input type = 'text' name = 'teacher_mail' value = '$teacher_mail' style = 'border:1px solid #ADD8E6'>";
			echo "</div>";
			echo "<div>";
			echo "<label>简介:</label>";
			echo "</div><div>";
			echo "<textarea rows = '5' cols = '40' name = 'introduction' style = 'border:1px solid #ADD8E6'>$teacher_introduction</textarea>";
			echo "</div>";
			echo "<div>";
			echo "<input type = 'submit' name = 'submit_info'>";
			echo "</div>";
			echo "</form>";
  		}
  		else{
  			echo "<script>alert('没有此教师');</script>";
  		}
  	}
  ?>
</div></div>
</body>
</html>
