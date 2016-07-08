<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
    <style type="text/css">
    body {
        background:#FFF
    }
    </style>
        <meta charset="utf-8">
        <title>编辑公告信息</title>
        <link rel="stylesheet" type="text/css" href="/new_management_system/Public/css/common.css"/>
        <link rel="stylesheet" type="text/css" href="__PUBLIC_/css/main.css"/>
    </head>
    <body>
        <div class="tab-content" id="tab2">
            <div class="crumb-list"><i class="icon-font"> </i><a href="/new_management_system/index.php/Home/Sysmessage/../Index/main">首页 </a><span class="crumb-step">&gt;</span><span class="crumb-name">编辑公告信息</span></div>
          <form action="/new_management_system/index.php/Home/Sysmessage/update/id/<?php echo ($Id); ?>" method="post">
              <table class="insert-tab" width="100%">
                  <tbody>
            <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
            <tr>
              <th><label>消息标题</label></th>
              <td><input size="30" class="text-input" type="text" id="large-input" value = "<?php echo ($messagetitle); ?>" name="messagetitle" /></td>
          </tr>
            <tr>
              <th><label>消息内容</label><br /></th>
              <td><textarea class="text-input textarea" id="textarea" name="messagecontent" cols="88" rows="15"><?php echo ($messagecontent); ?></textarea></td>
          </tr>
            <tr>
                <th><label>消息是否可见</label></th>
                <td><select class = 'small-input' name = 'messagevisible'>
                    <option value='0'>是</option>
                    <option value='1'>否</option>
                </select></td>
            </tr>
            <tr>
              <th></th>
              <td><input class="btn btn-primary btn6 mr10" type="submit" value="确认编辑" /><input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
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