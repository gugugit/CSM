<?php
      session_start();
      $teacher_id = $_SESSION['user_id'];
      require_once('../Common/db.php');
      $sql = "select distinct issue.Title as issue_title,issue_type.Name as issue_type,issue.Introduction as issue_introduction,select_issue.Production as production,student.Name as student_name,select_issue.Score as score,student.Id as student_id from issue,issue_type,select_issue,student,teacher where issue.Id = select_issue.Issue_Id and select_issue.Student_Id = student.Id and issue.Type = issue_type.Id and select_issue.Status = 1 and issue.Teacher_Id = ";
      $sql = $sql."$teacher_id";
      $db = database::getinstance();
      $res = $db -> select1($sql);
      ?>
<!DOCTYPE html>
<html>
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
<div class="pageTitle">&nbsp;&nbsp;<span>当前位置 -- 毕业设计 -- 提交成绩</span></div>
<div class="pageColumn">
<div class="pageButton"></div>
      <table>
        <thead>
        <th width="10%">标题</th>
        <th width="10%">类型</th>
        <th width="20%">简介</th>
        <th width="15%">作品</th>
        <th width="10%">学生姓名</th>
        <th width="10%">成绩</th>
        <th width="">操作</th>
    </thead>
    <tbody>
    <?php while($row=mysqli_fetch_array($res)){?>
      <tr class = 'trLight'>
      <td><?php echo $row['issue_title']?></td>
      <td><?php echo $row['issue_type']?></td>
      <td><?php echo $row['issue_introduction']?></td>
      <td><?php echo $row['production']?></td>
      <td><?php echo $row['student_name']?></td>
      <form action = '__Submit.php' method = 'post'>
      <input type = 'hidden' name = 'student_id' value = <?php echo $row['student_id']?>>
      <td><input type = 'text' name = 'score' style = 'border:1px solid #ADD8E6' value = <?php echo $row['score']?>></td>
      <td><input type = 'submit' name = 'yes' value = 'submit'></td>
      </form>
      </tr>
      <?php }?>
    </tbody>
      </table>
</div></div>
</body>
</html>
