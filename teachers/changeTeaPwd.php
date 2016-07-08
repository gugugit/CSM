<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改个人密码页面</title>
    <link href="../images/style.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        body {
            background:#FFF
        }
    </style>
</head>
<body>
<div id="contentWrap">
    <div class="pageTitle">&nbsp;&nbsp;<span>当前位置 -- 信息维护 -- 密码修改</span></div>
    <div class="pageColumn2" align="center">
        <div class="pageButton"><h1 style="text-align:center">&nbsp;&nbsp;教师个人密码修改</h1></div>
        <form action="pwd.php" method="post">
            <table>
            <tr>
                <th>旧密码</th>
                <td><input style="border:1px solid #c5dbe2;width:200px;height:25px" type="password" name="oldpassword"></td>
            </tr>
            <tr>
                 <th>新密码</th>
                 <td width="60%"><input style="border:1px solid #c5dbe2;width:200px;height:25px" type="password" name="newpassword"></td>
            </tr>
            <tr>
                <th>确认密码</th>
                <td><input style="border:1px solid #c5dbe2;width:200px;height:25px" type="password" name="againpassword"></td>  
            </tr>
        </table>
        <div style="padding-top:10px"><input style="border:1px solid #bfd8e0;width:50px;height:25px" type="submit" name="ok" value="确定"></div>
        </form>
    </div></div>
</body>
</html