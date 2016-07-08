<?php
      session_start();
      $teacher_id = $_SESSION['user_id'];
      require_once('../Common/db.php');
      $sql = "select issue.Title as Title,issue_type.Name as Type_Name,teacher.Name as Teacher_Name,student.Name as Student_Name,select_issue.Score as Score from issue,select_issue,issue_type,teacher,student where issue.Type = issue_type.Id and select_issue.Issue_Id = issue.Id and issue.Teacher_Id = teacher.Id and select_issue.Student_Id = student.Id and Status = 2 and issue.Teacher_Id = ";
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
function hhh(){
  window.location.href="InsertSelectIssue.php";
  window.event.returnValue = false;
}
</script>
<style type="text/css">
body {
    background:#FFF
}
</style>
</head>

<body>
<div id="contentWrap">
<div class="pageTitle"></div>
<div class="pageColumn">
<div class="pageButton"></div>
  <!-- <form action="Check.php" method="post"> -->
      <table>
        <thead>
        <th width="20%">标题</th>
        <th width="20%">类型</th>
		<th width="20%">指导老师</th>
        <th width="20%">学生</th>
        <th width="20%">成绩</th>
        
    </thead>
    <tbody>
      <?php while($row=mysqli_fetch_array($res)){?>
        <tr class = 'trLight'>
        <td><?php echo $row['Title']?></td>
        <td><?php echo $row['Type_Name']?></td>
		<td><?php echo $row['Teacher_Name']?></td>
        <td><?php echo $row['Student_Name']?></td>
        <td><?php echo $row['Score']?></td>
        <form action = 'Check.php' method = 'post'>
        <input type = 'hidden' name = 'title' value = <?php echo $row['Title'];?>>
        <input type = 'hidden' name = 'student_name' value = <?php echo $row['Student_Name'];?>>
        </form>
        </tr>
        <?php }?>
    </tbody>
      </table>
  <!-- </form> -->
</div></div>
</body>
<script type="text/javascript">
  $(function(){
    $(document).on('click',"button[name1='CheckStudent']",function()
    {
      var title = $(this).attr('par')
      var student_name = $(this).attr('par1')
      location = "Check.php?title=" + title + "&student_name=" + student_name
    })
  })
</script>
</html>
