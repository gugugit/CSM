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
        <form method="post" action="/Educational_Administration_System/View/index.php/Home/Tecmanage/search" id="search">
            按照Id查询教师<input type="text" id="sid" name="searchid"/> 按照姓名查询教师 <input type="text" id="sname" name="searchname"/>
            <input class="btn btn-primary btn6 mr10"  type="submit" value="查询" />
        </form>
        <div style="margin-left:90%"><a href="/Educational_Administration_System/View/index.php/Home/Tecmanage/add"><h2><font size="3" color="green">添加教师信息</font></h2></a></div>

        <div style="margin-left:15%">

        </div><div class="pageButton"></div>
        查询结果如下
        <table>
            <thead>
            <!--<th width="10"><input name="" type="checkbox" value="" /></th>-->
            <th width="7%">id</th>
            <th width="7%">姓名</th>
            <th width="7%">性别</th>
            <th width="7%">密码</th>
            <th width="7%">学院</th>
            <th width="7%">专业</th>
            <th width="7%">入校时间</th>
            <th width="7%">联系电话</th>
            <th width="7%">身份证号</th>
            <th width="7%">民族</th>
            <th width="7%">出生地</th>
            <th width="7%">出生日期</th>
            <th width="7%">邮箱</th>
            <th width="7%">选项</th>
            </thead>
            <tbody>
            <?php if(is_array($teacher_list)): $i = 0; $__LIST__ = $teacher_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <!--<td class="checkBox"><input name="" type="checkbox" value="" /></td>-->
                    <td><?php echo ($vo['id']); ?></td>
                    <td><?php echo ($vo['name']); ?></td>
                    <td><?php echo ($vo['sex']); ?></td>
                    <td><?php echo ($vo['password']); ?></td>
                    <td><?php $ac=$vo['academy']; switch($ac){ case 1: echo "信息科学与技术学院"; break; case 2: echo "化学工程学院"; break; case 3: echo "材料与工程学院"; break; case 4: echo "文法学院"; break; case 5: echo "理学院"; break; case 6: echo "机电工程学院"; break; case 7: echo "经济管理学院"; break; case 8: echo "生命科学与技术学院"; break; case 9: echo "继续教育学院"; break; case 10: echo "职业技术学院"; break; case 11: echo "马克思主义学院"; break; case 12: echo "国际教育学院"; break; case 13: echo "能源学院"; break; case 14: echo "侯德榜工程师学院"; break; default: echo "error!"; break; }?>
                    </td>
                    <td><?php $ac=$vo['speciality']; switch($ac){ case 1: echo "计算机科学与技术"; break; case 2: echo "自动化"; break; case 3: echo "测控技术与仪器"; break; case 4: echo "信息工程"; break; case 5: echo "化学工程"; break; case 6: echo "应用化学"; break; case 7: echo "高分子材料科学与工程"; break; case 8: echo "经济管理"; break; }?></td>
                    <td><?php echo ($vo['dates_enrollment']); ?></td>
                    <td><?php echo ($vo['phone']); ?></td>
                    <td><?php echo ($vo['identification_card']); ?></td>
                    <td><?php echo ($vo['nation']); ?></td>
                    <td><?php echo ($vo['birthplace']); ?></td>
                    <td><?php echo ($vo['birthday']); ?></td>
                    <td><?php echo ($vo['email']); ?></td>
                    <!--<td><a href="/Educational_Administration_System/View/index.php/Home/Tecmanage/read/id/<?php echo ($vo['id']); ?>"><?php echo ($vo['title']); ?></a></td>-->
                    <td>
                        <a href="/Educational_Administration_System/View/index.php/Home/Tecmanage/edit/id/<?php echo ($vo['id']); ?>" title="编辑"><img src="/Educational_Administration_System/View/Public/Images/admin/icons/pencil.png" alt="编辑" /></a>
                        <a href="/Educational_Administration_System/View/index.php/Home/Tecmanage/delete/id/<?php echo ($vo['id']); ?>" title="删除"><img src="/Educational_Administration_System/View/Public/Images/admin/icons/cross.png" alt="删除" /></a>
                    </td>
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