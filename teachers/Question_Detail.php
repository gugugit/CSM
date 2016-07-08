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
        <div class="pageButton">
            <span>主题: <?php echo $_GET['question_title']?></span>
        </div>
    </div>
    <?php
        require_once('../Common/db.php');
        $question_id = $_GET['question_id'];
        $db = database::getinstance();
        $sql = "select Question_Id as question_id,Title as question_title,Content as question_content,Time as question_time,Sender_Id as sender_id,question.Start as start,Sender_Name as sender_name from question where Question_Id = '$question_id' order by Time asc";
        $res = $db -> select($sql);
        $num = 1;
        foreach ($res as $key => $val) {
            $question_id = $val['question_id'];
            $question_title = $val['question_title'];
            $question_time = $val['question_time'];
            $sender_id = $val['sender_id'];
            $start = $val['start'];
            $sender_name = $val['sender_name'];
            $question_content = $val['question_content'];
            $time = $val['question_time'];
            echo "<hr style = 'border:1px solid #ADD8E6'>";
            echo "<div><p>$question_content</p>";
            echo "<span>$sender_name</span>&nbsp;&nbsp;";
            echo $num."楼&nbsp;$question_time";
            $num = $num + 1;
            // if($sender_id == $_SESSION['user_id']){
            //     $user_name = $sender_name;
            // }
        }
        echo "<hr style = 'border:1px solid #ADD8E6'>";
        $user_id = $_SESSION['user_id'];
        $sql = "select Name from student where Id = '$user_id'";
        $res = $db -> select($sql);
        foreach ($res as $key => $val) {
            $user_name = $val['Name'];
        }
        $sql = "select Name from teacher where Id = '$user_id'";
        $res = $db -> select($sql);
        foreach ($res as $key => $val) {
            $user_name = $val['Name'];
        }
    ?>
    <br>
    <form action="InsertQuestion.php" method="post">
        <div>
            <label>reply:</label>
            <div><textarea style="border:1px solid #ADD8E6" rows="5" cols="30" name = "question_content"></textarea></div>
            <input type="hidden" name="question_id" value = <?php echo $question_id?> >
            <input type="hidden" name="user_id" value = <?php echo $_SESSION['user_id']?>>
            <input type="hidden" name="user_name" value = <?php echo $user_name?>>
            <input type="hidden" name="question_title" value = <?php echo $_GET['question_title']?>>
            <input type="submit" name = 'submit' value = 'reply'>
        </div>
    </form>
</div>
</body>
</html>
