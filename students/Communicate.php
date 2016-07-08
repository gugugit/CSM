<?php
session_start();
?>
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
  window.location.href="detail.php";
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
    <div class="pageTitle">&nbsp;&nbsp;<span>当前位置 -- 论坛</span></div>
    <div class="pageColumn">
        <div class="pageButton" style="text-align:center;">
            <span>师生交流论坛</span>
        </div>
        <table>
            <thead>
                <th width="30%">主题</th>
                <th width="">发布时间</th>
                <th width="20%">详细</th>
            </thead>
            <tbody>
                <?php
                    require_once('../Common/db.php');
                    $db = database::getinstance();
                    $sql = "select question.Question_Id as question_id,question.Title as question_title,question.Time as question_time from question,luntan where luntan.Question_Id = question.Question_Id and question.Start = 1";
                    $res = $db -> select($sql);
                    foreach ($res as $key => $val) {
                        $question_id = $val['question_id'];
                        $question_title = $val['question_title'];
                        $question_time = $val['question_time'];
                        echo "<tr class = 'trLight'>";
                        echo "<td>$question_title</td>";
                        echo "<td>$question_time</td>";
                        echo "<td><a href = 'Question_Detail.php?question_id=$question_id&question_title=$question_title'>详细</a></td>";
                    }
                ?>                
            </tbody>
        </table>
    </div>
    <br/>
    <form action = 'InsertQuestion1.php' method = 'post'>
        <div class="pageColumn1">
            <div class="pageButton1">
                <span>我要发帖</span>
            </div>
            <div>
                <span>主题: </span>
                <input type="text" name="title" style="border:1px solid #ADD8E6">
            </div>
            <div>
                <span>内容: </span>
            </div>
            <div>
                <textarea name = 'content' rows="5" cols="30" style="border:1px solid #ADD8E6"></textarea>
            </div>
            <div>
                <input type="hidden" name="user_id" value = <?php echo $_SESSION['user_id']?>>
                <input type="submit" name="submit" value = 'submit'>
            </div>
        </div>
    </form>
</div>
</body>
</html>
