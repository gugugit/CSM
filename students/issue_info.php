<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>教务管理系统界面</title>
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
<div class="pageTitle">&nbsp;&nbsp;<span>当前位置 -- 毕业设计 -- 课题信息</span></div>
<div class="pageColumn">
<div class="pageButton"></div>
    <?php
        require_once('../Common/db.php');
        session_start();
        $db = database::getinstance();
        $user_id = $_SESSION['user_id'];
        $sql = "select * from select_issue where Student_Id = '$user_id' and Status = 1";
        $res = $db -> select($sql);
        if($res){
            $sql = "select issue.Title as issue_title,issue_type.Name as issue_type,teacher.Name as teacher_name,select_issue.Score as score from issue,issue_type,teacher,select_issue where issue.Id = select_issue.Issue_Id and issue.Type = issue_type.Id and issue.Teacher_Id = teacher.Id and select_issue.Student_Id = '$user_id' and select_issue.Status = 1";
            $result = $db -> select($sql);
            $ok = 1;
            foreach ($result as $key => $val) {
                $issue_title = $val['issue_title'];
                $issue_type = $val['issue_type'];
                $teacher_name = $val['teacher_name'];
                $score = $val['score'];
                if(empty($score)){
                    $score = '还没有成绩哦';
                }
                if($ok == 1){
                    $ok = 0;
                    echo "<table>";
                    echo "<thead>";
                    echo "<th width = '20%'>标题</th>";
                    echo "<th width = '20%'>类型</th>";
                    echo "<th width = '20%'>指导教师</th>";
                    echo "<th width = '20%'>成绩</th>";
                    echo "</thead>";
                }
                echo "<tr class = 'trLight'>";
                echo "<td>$issue_title</td>";
                echo "<td>$issue_type</td>";
                echo "<td>$teacher_name</td>";
                echo "<td>$score</td>";
                echo "</tr>";
            }
            if($ok == 0){
                echo "</tbody>";
                echo "</table>";
            }
        }
        else{
            $sql = "select issue.Title as issue_title,issue_type.Name as issue_type,teacher.Name as teacher_name,select_issue.Status as status from issue,issue_type,teacher,select_issue where issue.Id = select_issue.Issue_Id and issue.Type = issue_type.Id and issue.Teacher_Id = teacher.Id and select_issue.Student_Id = '$user_id' and select_issue.Status != 1";
            $result = $db -> select($sql);
            $ok = 1;
            foreach ($result as $key => $val) {
                $issue_title = $val['issue_title'];
                $issue_type = $val['issue_type'];
                $teacher_name = $val['teacher_name'];
                $status = $val['status'];
                if($status == 0){
                    $status = '不通过';
                }
                else{
                    $status = '待审核';
                }
                if($ok == 1){
                    $ok = 0;
                    echo "<table>";
                    echo "<thead>";
                    echo "<th width = '20%'>标题</th>";
                    echo "<th width = '20%'>类型</th>";
                    echo "<th width = '20%'>指导教师</th>";
                    echo "<th width = '20%'>状态</th>";
                    echo "</thead>";
                }
                echo "<tr class = 'trLight'>";
                echo "<td>$issue_title</td>";
                echo "<td>$issue_type</td>";
                echo "<td>$teacher_name</td>";
                echo "<td>$status</td>";
                echo "</tr>";
            }
            if($ok == 0){
                echo "</tbody>";
                echo "</table>";
            }
        }
    ?>
</div></div>
</body>
</html>
