<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="../css/bootstrap.css" type="text/css" rel="stylesheet" />
    <link href="../images/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="../javascript/jquery.min.js"></script>
    <style type="text/css">
        .biao{
            height:30px;
        }
    </style>
</head>
<body >
<div id="contentWrap">
    <div class="pageTitle">&nbsp;&nbsp;<span>当前位置 -- 信息查询 -- 学生个人课表查询</span></div>
    <div class="pageColumn">
        <div class="pageButton"><h1 style="text-align:center">&nbsp;&nbsp;学生个人课表查询展示</h1></div>
<form method="get" action="Schedule.php" target="kebiao">
    <div>
        <table align="center" height="50px" >
            <tr>
                <td >
                    <span style="font-size:18px">学年</span>
                    <select name="select1">
                        <option value="2013-2014">2013-2014</option>
                        <option value="2014-2015">2014-2015</option>
                        <option value="2015-2016">2015-2016</option>
                        <option value="2016-2017">2016-2017</option>
                    </select>
                    <span style="font-size:18px">学期</span>
                    <select name="select2">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    <span style="font-size:18px">个人课表</span>
                </td>
                <td>
                    <input type="submit" value="查询" />
                </td>
            </tr>
        </table>

    </div>
</form>
</div>
<div style="height: 1000px">
    <iframe width="100%"  scrolling="auto" height="100%" frameborder="false" allowtransparency="true" style="border: medium none;"  name="kebiao" "></iframe>
</div>
</body>
</html>