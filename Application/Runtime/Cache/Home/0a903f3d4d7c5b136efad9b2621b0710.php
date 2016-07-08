<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <style type="text/css">
        body {
            background:#FFF
        }
    </style>
    <meta charset="utf-8">
    <title>编辑信息</title>
    <link rel="stylesheet" type="text/css" href="/new_management_system/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="__PUBLIC_/css/main.css"/>

</head>
<body>
<div class="tab-content" id="tab2">
    <div class="crumb-list"><i class="icon-font"> </i><a href="/new_management_system/index.php/Home/Currmanage/../Index/main">首页 </a><span class="crumb-step">&gt;</span><span class="crumb-name">编辑课程信息</span></div>

    <form action="/new_management_system/index.php/Home/Currmanage/update/id/<?php echo ($Id); ?>" method="post">
        <table class="insert-tab" width="100%">
            <tbody>
            <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
            <tr>
                <th><label>Id</label></th>
                <td><label><?php echo ($curriculaid); ?></label></td>
            </tr>
            <tr>
                <th><label>名称</label></th>
                <td><input class="text-input" type="text" id="inputname" value ="<?php echo ($curriculaname); ?>" name="curriculaname"/></td>
            </tr>
            <tr>
                <th><label>学分</label></th>
                <td><input class="text-input" type="text" id="inputcredit" value ="<?php echo ($curriculacredit); ?>" name="curriculacredit"/></td>
            </tr>
            <tr>
                <th><label>学时</label></th>
                <td><input class="text-input" type="text" id="inputhours" value ="<?php echo ($curriculahours); ?>" name="curriculahours"/></td>
            </tr>
            <tr>
                <th><label>专业</label></th>
                <td><select name="curriculaspecialityid">
                    <option value="1">计算机科学与技术</option>
                    <option value="2">自动化</option>
                    <option value="3">测控技术与仪器</option>
                    <option value="4">信息工程</option>
                    <option value="5">化学工程</option>
                    <option value="6">应用化学</option>
                    <option value="7">高分子材料科学与工程</option>
                    <option value="8">经济管理</option>
                </select></td>
            </tr>
            <tr>
                <th><label>学院</label></th>
                <td><select name="curriculaacademyid">
                    <option value="1">信息与技术学院</option>
                    <option value="2">化学工程学院</option>
                    <option value="3">材料科学与工程学院</option>
                    <option value="4">文法学院</option>
                    <option value="5">理学院</option>
                    <option value="6">机电工程学院</option>
                    <option value="7">经济管理学院</option>
                    <option value="8">生命科学与技术学院</option>
                    <option value="9">继续教育学院</option>
                    <option value="10">职业技术学院</option>
                    <option value="11">马克思主义学院</option>
                    <option value="12">国际教育学院</option>
                    <option value="13">能源学院</option>
                    <option value="14">侯德榜工程师学院</option>
                </select></td>
            </tr>
            <tr>
                <th><label>类型</label></th>
                <td><select name="curriculatype">
                    <option value="1">公共基础必修</option>
                    <option value="2">专业必修</option>
                    <option value="3">专业选修</option>
                    <option value="4">通识</option>
                    <option value="5">实践环节必修</option>
                </select></td>
            </tr>
            <tr>
                <th><label>课程容量</label></th>
                <td><input class="text-input" type="text" id="inputcontain" value ="<?php echo ($curriculacontain); ?>" name="curricontain"/></td>
            </tr>
            <tr>
                <th></th>
          <td>
              <input class="btn btn-primary btn6 mr10" type="submit" value="确认修改" />
              <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button"></td>
          </tr>
        <div class="clear"></div>
    </tbody>
    </table>
        <!-- End .clear -->
    </form>
</div>
<!-- End #tab2 -->
</body>
</html>