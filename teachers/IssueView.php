<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>毕业设计管理子系统</title>
<link href="../images/style.css" rel="stylesheet" type="text/css" />
<link href="../images/login.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../javascript/jquery.min.js"></script>
<style type="text/css">
body {
    background:#FFF
}
</style>
</head>

<body>
<div id="contentWrap">
<div class="pageTitle">&nbsp;&nbsp;<span>当前位置 -- 毕业设计 -- 查看课题</span></div>
<div class="pageColumn">
<div class="pageButton"></div>
  <table>
        <thead>
            <th width="10%">标题</th>
            <th width="10%">类型</th>
            <th width="10%">要求</th>
            <th width="10%">专业</th>
            <th width="10%">容量</th>
            <th width="10%">已选人数</th>
            <th width="30%">介绍</th>
            <th width="10%">操作</th>
        </thead>
    <tbody>
        <?php
        require_once('../Common/db.php');
        $db = database::getinstance();
        session_start();
        $teacher_id = $_SESSION['user_id'];
        $sql = "select issue.Title as issue_title,issue.Id as issue_id,issue_type.Name as issue_type,issue.Demand as issue_demand,issue.Contain as issue_contain,issue.Introduction as issue_introduction,issue.Number as issue_number,speciality.Name as speciality_name from issue,issue_type,speciality where issue.Type = issue_type.Id and issue.Speciality_Id = speciality.Id and issue.Teacher_Id = '$teacher_id'";
        $res = $db -> select($sql);
        foreach ($res as $key => $val) {
            $issue_id = $val['issue_id'];
            $issue_title = $val['issue_title'];
            $issue_type = $val['issue_type'];
            $issue_demand = $val['issue_demand'];
            $issue_contain = $val['issue_contain'];
            $issue_number = $val['issue_number'];
            $issue_introduction = $val['issue_introduction'];
            $speciality_name = $val['speciality_name'];
            echo "<tr class='trLight'";
            echo "<input type = 'hidden' name = 'issue_id' value = '$issue_id'>";
            echo "<td>$issue_title</td>";
            echo "<td>$issue_type</td>";
            echo "<td>$issue_demand</td>";
            echo "<td>$speciality_name</td>";
            echo "<td>$issue_contain</td>";
            echo "<td>$issue_number</td>";
            echo "<td>$issue_introduction</td>";
            echo "<td><button par = '$issue_id' name = 'DeleteIssue'>delete</button></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
      </table>
</div></div>
</body>
<script type="text/javascript">
  $(function(){
    $(document).on('click',"button[name='DeleteIssue']",function()
    {
      var issue_id = $(this).attr('par')
      location = "DeleteIssue.php?issue_id=" + issue_id
    })
  })
</script>
</html>
