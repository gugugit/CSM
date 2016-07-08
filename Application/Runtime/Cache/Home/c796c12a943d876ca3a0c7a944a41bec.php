<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>信息</title>
    <link href="/Educational_Administration_System/View/Public/images/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/Educational_Administration_System/View/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="__PUBLIC_/css/main.css"/>
    <script type="text/javascript" src="/Educational_Administration_System/View/Public/javascript/jquery.min.js"></script>
    <style type="text/css">
        body {
            background:#FFF
        }
    </style>
</head>
<body>

<div id="contentWrap">
    <div class="pageTitle"></div>
    <div class="pageColumn">
        <div class="pageButton"></div>
        <table>
            <thead>
            <!--<th width="10"><input name="" type="checkbox" value="" /></th>-->
            <th width="25%">日志编号</th>
            <th width="25%">管理员Id</th>
            <th width="25%">操作时间</th>
            <th width="25%">操作内容</th>
            </thead>
            <tbody>
            <?php if(is_array($log_list)): $i = 0; $__LIST__ = $log_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <!--<td class="checkBox"><input name="" type="checkbox" value="" /></td>-->
                    <td><?php echo ($vo['id']); ?></td>
                    <td><?php echo ($vo['userid']); ?></td>
                    <td><?php echo ($vo['time']); ?></td>
                    <td><?php $ac=$vo['type']; switch($ac){ case 0: echo "登录"; break; case 1: echo "退出"; break; case 2: echo "添加教师信息"; break; case 3: echo "添加学生信息"; break; case 4: echo "添加课程信息"; break; case 5: echo "添加教室信息"; break; case 6: echo "添加管理员信息"; break; case 7: echo "更改教师信息"; break; case 8: echo "更改学生信息"; break; case 9: echo "更改课程信息"; break; case 10: echo "更改教室信息"; break; case 11: echo "更改管理员信息"; break; case 12: echo "删除教师信息"; break; case 13: echo "删除学生信息"; break; case 14: echo "删除课程信息"; break; case 15: echo "删除教室信息"; break; case 16: echo "删除管理员信息"; break; case 17: echo "添加系统通知"; break; case 18: echo "修改系统通知"; break; case 19: echo "删除系统通知"; break; case 20: echo "向教师发邮件"; break; case 21: echo "向学生发邮件"; break; case 22: echo "向学生发送学位警告"; break; }?></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
            <tfoot>
            <tr>
                <td clospan = "4">
                    <div class="pagination">
      					<font size="4" color="red"><h2><?php echo ($page_method); ?></h2></font>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
</div></div>
</body>
</html>