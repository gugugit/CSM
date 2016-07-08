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
<div class="pageTitle">&nbsp;&nbsp;<span>当前位置 -- 毕业设计 -- 查看以往评价</span></div>
<div class="pageColumn">
<div class="pageButton"></div>
    <table>
        <thead>
            <th width="">内容</th>
            <th width="20%">提交时间</th>
        </thead>
        <tbody>
            <?php
                require_once('../Common/db.php');
                session_start();
                $db = database::getinstance();
                $user_id = $_GET['student_id'];
                $sql = "select Id as summary_id,Content as content,Time as time from summary where Student_Id = '$user_id' order by Time desc";
                $res = $db -> select($sql);
                foreach ($res as $key => $val) {
                    $content = $val['content'];
                    $time = $val['time'];
                    echo "<tr class = 'trLight'>";
                    echo "<td>$content</td>";
                    echo "<td>$time</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</div></div>
</body>
</html>
