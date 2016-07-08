<?php if (!defined('THINK_PATH')) exit();?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>用户中心</title>
    <link rel="stylesheet" type="text/css" href="/Educational_Administration_System/View/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="__PUBLIC_/css/main.css"/>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
    </div>
</div>
<div class="container clearfix">
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"> </i><a href="/Educational_Administration_System/View/index.php/Home/Stumanage/../Index/main">首页 </a><span class="crumb-step">&gt;</span><span class="crumb-name">查看学生信息</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <table class="insert-tab" width="100%">
                        <tbody><tr>
                            <th>学生id：</th>
                            <td width="150"><?php echo ($id); ?></td>
                            <th>学生姓名：</th>
                            <td><?php echo ($name); ?></td>
                        </tr>
                            <tr>
                                <th>学生性别：</th>
                                <td><?php echo ($sex); ?></td>
                                <th>民族：</th>
                                <td><?php echo ($nation); ?></td>
                            </tr>
                            <tr>
                                <th>所属学院：</th>
                                <td><?php echo ($academy); ?></td>
                                <th>所属专业：</th>
                                <td><?php echo ($speciality); ?></td>
                            </tr>
                            <tr>
                                <th>班级编号：</th>
                                <td><?php echo ($class); ?></td>
                                <th>所属年级:</th>
                                <td><?php echo ($grade); ?></td>
                            </tr>
                            <tr>
                                <th>入学时间：</th>
                                <td><?php echo ($date); ?></td>
                                <th>联系电话：</th>
                                <td><?php echo ($phone); ?></td>
                            </tr>
                            <tr>
                                <th>出生地：</th>
                                <td><?php echo ($birthplace); ?></td>
                                <th>生日：</th>
                                <td><?php echo ($birthday); ?></td>
                            </tr>
                            <tr>
                                <th>身份证号：</th>
                                <td><?php echo ($identification); ?></td>
                                <th>电子邮箱：</th>
                                <td><?php echo ($email); ?></td>
                            </tr>
                            <tr>
                                <th>权限id：</th>
                                <td><?php echo ($permission); ?></td>
                                <th>登陆密码：</th>
                                <td><?php echo ($password); ?></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td></td>
                                <th></th>
                                <td>
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
</div>
</body>
</html>