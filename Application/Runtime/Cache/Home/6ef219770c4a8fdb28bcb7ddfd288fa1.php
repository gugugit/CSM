<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
    <style type="text/css">
    body {
        background:#FFF
    }
    </style>
        <meta charset="utf-8">
        <title>发送毕业警告</title>
        <link rel="stylesheet" type="text/css" href="/Educational_Administration_System/View/Public/css/common.css"/>
        <link rel="stylesheet" type="text/css" href="__PUBLIC_/css/main.css"/>
    </head>
    <body>
        <div class="tab-content" id="tab2">
            <div class="crumb-list"><i class="icon-font"> </i><a href="/Educational_Administration_System/View/index.php/Home/Degmessage/../Index/main">首页 </a><span class="crumb-step">&gt;</span><span class="crumb-name">发送毕业警告</span></div>
          <form action="/Educational_Administration_System/View/index.php/Home/Degmessage/send" method="post">
              <table class="insert-tab" width="100%">
                  <tbody>
            <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
            <tr>
              <th><label>接收学生id</label></th>
              <td><input size="30" class="text-input large-input" type="text" id="large-input" name="stuid" /></td>
          </tr>
          <tr>
            <th><label>邮件标题</label></th>
            <td><input size="30" class="text-input large-input" value="亲爱的同学，你的成绩已到达警告的程度。" type="text" id="large-input" name="mailtitle" /></td>
        </tr>
            <tr>
              <th><label>邮件内容</label><br /></th>
              <td><textarea class="text-input textarea" name="mailcontent" cols="79" rows="15">亲爱的同学，你的大学成绩已经到达危险的边缘，请加紧努力学习，以防毕不了业。</textarea></td>
          </tr>
            <tr>
                <th></th>
              <td><input class="btn btn-primary btn6 mr10" type="submit" value="确定发送" />
                  <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button"></td>
         </td>
          </tr>
      </tbody>
      </table>
            <div class="clear"></div>
            <!-- End .clear -->
          </form>
        </div>
        <!-- End #tab2 -->
    </body>
</html>