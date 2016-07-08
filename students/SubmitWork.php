<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>毕业设计管理子系统</title>
<link href="../images/style.css" rel="stylesheet" type="text/css" />
<link href="../images/login.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
    background:#FFF
}
</style>
</head>

<body>
<div id="contentWrap">
<div class="pageTitle">&nbsp;&nbsp;<span>当前位置 -- 毕业设计 -- 提交报告</span></div>
<div class="pageColumn">
<div class="pageButton"></div>
      <?php
      	require_once('../Common/db.php');
      	$db = database::getinstance();
      	session_start();
      	$student_id = $_SESSION['user_id'];
      	$sql = "select issue.Id as issue_id,issue.Title as issue_title,issue_type.Name as issue_type,teacher.Name as teacher_name,issue.Introduction as issue_introduction from select_issue,issue,issue_type,teacher where issue.Id = select_issue.Issue_Id and issue.Type = issue_type.Id and issue.Teacher_Id = teacher.Id and Student_Id = '$student_id' and Status = 1";
  		$res = $db -> select($sql);
  		if(!empty($res)){
  			foreach ($res as $key => $val) {
  				$issue_title = $val['issue_title'];
  				$issue_type = $val['issue_type'];
  				$teacher_name = $val['teacher_name'];
  				$issue_introduction = $val['issue_introduction'];
  				echo "<div><table style = 'width:400px;font-size:18px;cellpadding:0;cellspacing:0;' align = 'left'><tbody>";
  				echo "<caption align = 'top'>毕业设计课题信息</caption>";
  				echo "<tr class='trLight'>";
  				echo "<td width = '200px'>课题标题</td>";
  				echo "<td width = '200px'>$issue_title</td>";
  				echo "</tr>";
  				echo "<tr class='trLight'>";
  				echo "<td width = '200px'>课题类型</td>";
  				echo "<td width = '200px'>$issue_type</td>";
  				echo "</tr>";
  				echo "<tr class='trLight'>";
  				echo "<td width = '200px'>指导老师</td>";
  				echo "<td width = '200px'>$teacher_name</td>";
  				echo "</tr>";
  				echo "<tr class='trLight'>";
  				echo "<td width = '200px'>课题简介</td>";
  				echo "<td width = '200px'>$issue_introduction</td>";
  				echo "</tr>";
  				echo "</tbody></table></div>";
  			}
            echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>";
            echo "<form action = 'submit_summary.php' method = 'post'>";
  			echo "<div><span>本周评价你做了吗???</span>";
            echo "&nbsp;&nbsp;&nbsp;&nbsp;";
            echo "<a href = 'summary_info.php?student_id=$student_id'>查看以前的自我评价</a>";
            echo "</div><div>";
            echo "<textarea name = 'summary1' rows = '5' cols = '50' style = 'border:1px solid #ADD8E6'></textarea>";
            echo "<br/><br/>";
            echo "<input type = 'submit' name = 'submit_summary' value = 'submit'>";
            echo "</div></form>";
            // select summary
  		}
        else{
            echo "<script>alert('你还没有选择毕业设计课题哦!!!');location.href = 'ChooseIssue.php'</script>";
        }
  		// no issue
      ?>
</div></div>
</body>
</html>
