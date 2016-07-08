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
<div class="pageTitle">&nbsp;&nbsp;<span>当前位置 -- 毕业设计 -- 发布课题</span></div>
<div class="pageColumn">
<div class="pageButton"></div>
  <form action="InsertIssue.php" method="post">
      <div>
          <label>课题标题: </label>
          <input type="text" name="title" style="border:1px solid #ADD8E6;"></input>
      </div>
      <div>
          <label>课题类型: </label>
          <select name="type">
              <option value = 0>--请选择--</option>
              <?php
                require_once('../Common/db.php');
                $sql = "select * from issue_type";
                $db = database::getinstance();
                $res = $db -> select($sql);
                foreach($res as $k => $val){
                    $Id = $val['Id'];
                    $Name = $val['Name'];
                    echo "<option value='$Id'>$Name</option>";
                }
              ?>
          </select>
      </div>
      <div>
          <label>课题要求: </label>
          <div><textarea rows="5" cols="30" name="demand" style="border:1px solid #ADD8E6"></textarea></div>
      </div>
      <div>
          <label>课题限定专业: </label>
          <select name="speciality">
            <option value = 0>--请选择--</option>
              <?php
                require_once('../Common/db.php');
                $sql = "select * from speciality";
                $db = database::getinstance();
                $res = $db -> select($sql);
                foreach($res as $k => $val){
                    $Id = $val['Id'];
                    $Name = $val['Name'];
                    echo "<option value='$Id'>$Name</option>";
                }
              ?>
          </select>
      </div>
      <div>
          <label>课题限定人数: </label>
          <input type="text" name="people" style="border:1px solid #ADD8E6">
      </div>
      <div>
          <label>简要介绍: </label>
          <div><textarea rows="5" cols="40" name="Introduction" style="border:1px solid #ADD8E6"></textarea></div>
      </div>
      <div>
        <input type="submit" name="submit" value = "提交">
      </div>
  </form>
</div></div>
</body>
</html>
