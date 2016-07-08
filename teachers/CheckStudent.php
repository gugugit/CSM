<?php
      session_start();
      $teacher_id = $_SESSION['user_id'];
      require_once('../Common/db.php');
      $sql = "select issue.Id as issue_id,issue.Title as issue_title,issue_type.Name as issue_type,issue.Introduction as issue_introduction,student.Name as student_name from issue,select_issue,issue_type,student where issue.Type = issue_type.Id and select_issue.Issue_Id = issue.Id and select_issue.Student_Id = student.Id and Status = 2 and issue.Teacher_Id = ";
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
<script type="text/javascript" src="../javascript/jquery.min.js"></script>
<script type="text/javascript">
</script>
<style type="text/css">
body {
    background:#FFF
}
</style>
</head>

<body>
<div id="contentWrap">
<div class="pageTitle">&nbsp;&nbsp;<span>当前位置 -- 毕业设计 -- 审核</span></div>
<div class="pageColumn">
<div class="pageButton"></div>
      <table>
        <thead>
        <th width="15%">标题</th>
        <th width="15%">类型</th>
        <th width="40%">简介</th>
        <th width="15%">学生姓名</th>
        <th width="">操作</th>
    </thead>
    <tbody>
      <?php while($row=mysqli_fetch_array($res)){?>
        <tr class = 'trLight'>
        <td><?php echo $row['issue_title']?></td>
        <td><?php echo $row['issue_type']?></td>
        <td><?php echo $row['issue_introduction']?></td>
        <td><?php echo $row['student_name']?></td>
        <form action = 'Check.php' method = 'post'>
        <input type = 'hidden' name = 'issue_id' value = <?php echo $row['issue_id'];?>>
        <input type = 'hidden' name = 'student_name' value = <?php echo $row['student_name'];?>>
        <td>
          <label><input name="yes" type="radio" value="yes" />yes </label>
        <label><input name="yes" type="radio" value="no" />no </label>
        <input type = 'submit' name = 'submit' value = 'submit' />
        </td>
        </form>
        </tr>
        <?php }?>
    </tbody>
      </table>
</div></div>
</body>
</html>
