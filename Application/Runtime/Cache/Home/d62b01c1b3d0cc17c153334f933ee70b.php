<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
    <style type="text/css">
    body {
        background:#FFF
    }
    </style>
        <meta charset="utf-8">
        <title>邮件发送</title>
        <link rel="stylesheet" type="text/css" href="/Educational_Administration_System/View/Public/css/common.css"/>
        <link rel="stylesheet" type="text/css" href="__PUBLIC_/css/main.css"/>

    </head>
    <body>
        <div class="tab-content">
            <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
            <table class="insert-tab" width="100%">
            <tbody>
            <tr>
              <td><input class="btn btn10" onclick="location='/Educational_Administration_System/View/index.php/Home/Degmessage/teacher'" type="button" value="给教师发送邮件" />  <input class="btn btn10" onclick="location='/Educational_Administration_System/View/index.php/Home/Degmessage/student'" value="给学生发送邮件" type="button">
			    <input class="btn btn10" onclick="location='/Educational_Administration_System/View/index.php/Home/Degmessage/warning'" value="给学生发送学位警告邮件" type="button"></td>
          </tr>
            <div class="clear"></div>
        </tbody>
        </table>
        </div>
        <!-- End #tab2 -->
    </body>
</html>