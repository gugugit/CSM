<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>毕业设计管理子系统</title>
<link href="../images/style.css" rel="stylesheet" type="text/css" />
<link href="../images/login.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../../javascript/jquery.min.js"></script>
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
<div class="pageTitle">&nbsp;&nbsp;<span>当前位置 -- 毕业设计 -- 选择课题</span></div>
<div class="pageColumn">
<div class="pageButton">
    <h1 style="text-align:center">毕业设计课题选择</h1>
</div>
        <?php
            require_once('../Common/db.php');
            $sql = "select issue.Id as issue_id,issue_type.Name as issue_type,issue.Demand as issue_demand,teacher.Name as teacher_name,speciality.Name as speciality_name,issue.Contain - issue.Number as issue_contain,issue.Introduction as issue_introduction,issue.Title as issue_title from issue,issue_type,teacher,speciality where issue.Type = issue_type.Id and issue.Teacher_Id = teacher.Id and issue.Speciality_Id = speciality.Id";
            $db = database::getinstance();
            $res = $db -> select($sql);
            $ok = 1;
            foreach($res as $k => $val){
                $issue_id = $val['issue_id'];
                $issue_title = $val['issue_title'];
                $issue_demand = $val['issue_demand'];
                $teacher_name = $val['teacher_name'];
                $speciality_name = $val['speciality_name'];
                $issue_contain = $val['issue_contain'];
                $issue_introduction = $val['issue_introduction'];
                $issue_type = $val['issue_type'];
                if($ok == 1){
                    echo "<table>";
                    echo "<thead>";
                    echo "<th width = '12%'>标题</th>";
                    echo "<th width = '12%'>类型</th>";
                    echo "<th width = '12%'>指导教师</th>";
                    echo "<th width = '12%'>限定专业</th>";
                    echo "<th width = '12%'>要求</th>";
                    echo "<th width = '12%'>容量</th>";
                    echo "<th width = ''>简介</th>";
                    echo "<th width = '12%'>操作</th>";
                    echo "</thead>";
                    echo "<tbody>";
                    $ok = 0;
                }
                echo "<tr class = 'trLight'>";
                echo "<td>$issue_title</td>";
                echo "<td>$issue_type</td>";
                echo "<td>$teacher_name</td>";
                echo "<td>$speciality_name</td>";
                echo "<td>$issue_demand</td>";
                echo "<td>$issue_contain</td>";
                echo "<td>$issue_introduction</td>";
                echo "<td><button par = '$issue_id' name = 'InsertSelectIssue'>选择</button></td>";
                echo "</tr>";
            }
            if($ok == 0){
                echo "</tbody>";
                echo "</table>";
            }
            else{
                echo "<script>alert('抱歉,目前还没有课题!!!');</script>";
            }
        ?> 
</div></div>
</body>
<script type="text/javascript">
  $(function(){
    $(document).on('click',"button[name='InsertSelectIssue']",function()
    {
      var issue_id = $(this).attr('par')
      location = "InsertSelectIssue.php?issue_id=" + issue_id
    })
  })
</script>
</html>