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
        <link rel="stylesheet" type="text/css" href="/Educational_Administration_System/View/Public/css/common.css"/>
        <link rel="stylesheet" type="text/css" href="__PUBLIC_/css/main.css"/>
    </head>
    <body>
        <div class="tab-content">
            <div class="crumb-list"><i class="icon-font"> </i><a href="/Educational_Administration_System/View/index.php/Home/Sysmessage/../Index/main">首页 </a><span class="crumb-step">&gt;</span><span class="crumb-name">查看公告信息</span></div>

          <form action="/Educational_Administration_System/View/index.php/Home/Sysmessage/update/id/<?php echo ($Id); ?>" method="post">
            <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
            <table class="insert-tab" width="100%">
                <tbody>
            <tr>
              <th><label>消息标题</label><br /></th>
              <td><label style="color:red"><font size="3" color="red"><?php echo ($messagetitle); ?></font></label></td>
          </tr>
            <tr>
              <th><label>消息内容</label><br /></th>
              <td><textarea readonly="true" class="common-textarea" id="content" name="messagecontent" style="width:80%" cols="89" rows="15"><?php echo ($messagecontent); ?></textarea></td>
          </tr>
            <tr>
                <th><label>消息是否可见</label></th>
                <td size="100"><label><font size="3" color="red"><?php echo ($messagevisible); ?></font></label></td>
            </tr>
            <tr>
            <th></th>
            <td>
                <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
            </td>
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