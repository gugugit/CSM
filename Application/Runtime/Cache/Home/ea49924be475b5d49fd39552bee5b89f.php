<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理</title>
<link href="/Educational_Administration_System/View/Public/images/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Educational_Administration_System/View/Public/javascript/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	//setMenuHeight
	$('.menu').height($(window).height()-51-27-26);
	$('.sidebar').height($(window).height()-51-27-26);
	$('.page').height($(window).height()-51-27-26);
	$('.page iframe').width($(window).width()-15-168);

	//menu on and off
	$('.btn').click(function(){
		$('.menu').toggle();

		if($(".menu").is(":hidden")){
			$('.page iframe').width($(window).width()-15+5);
			}else{
			$('.page iframe').width($(window).width()-15-168);
				}
		});

	//
	$("#main-nav li ul").hide(); // Hide all sub menus
	$("#main-nav li a.current").parent().find("ul").slideToggle("slow");
	$('.subMenu a[href="#"]').click(function(){
		$(this).next('ul').slideToggle("normal");
		return false;
		});
})
</script>


</head>

<body>
<div id="wrap">
	<div id="header">
    <div class="logo fleft">
		<div style="margin-left:550px"><img id="logo" src="/Educational_Administration_System/View/Public/Images/admin/logo.png" alt="Simpla Admin logo" /></div>
	</div>
    <a class="logout fright" href="/Educational_Administration_System/View/index.php/Home/Currmanage/../Index/quit"> </a>
    <div class="clear"></div>
    <div class="subnav">
    	<div class="subnavLeft fleft"></div>
        <div class="fleft"></div>
        <div class="subnavRight fright"></div>
    </div>
    </div><!--#header -->
    <div id="content">
    <div class="space"></div>
    <div class="menu fleft">
    	<ul id="main-nav">
        	<li class="subMenuTitle"><h2>后台信息管理</h2></li>
            <li class="subMenu current"><a href="#"><h2>教务信息管理</h2></a>
            	<ul>
                	<li><a href="/Educational_Administration_System/View/index.php/Home/Currmanage/../Tecmanage">教师信息管理</a></li>
                    <li><a href="/Educational_Administration_System/View/index.php/Home/Currmanage/../Stumanage">学生信息管理</a></li>
                    <li><a href="/Educational_Administration_System/View/index.php/Home/Currmanage/../Currmanage">课程信息管理</a></li>
                    <li><a href="/Educational_Administration_System/View/index.php/Home/Currmanage/../Clamanage">教室信息管理</a></li>
                </ul>
            </li>
            <li class="subMenu"><a href="#" target="right"><h2>通知发布</h2></a>
				<ul>
					<li><a href="/Educational_Administration_System/View/index.php/Home/Currmanage/../Sysmessage">系统通知发布</a></li>
					<li><a href="/Educational_Administration_System/View/index.php/Home/Currmanage/../Degmessage">学位警告通知</a></li>
				</ul>
			</li>
            <li class="subMenu"><a href="#" target="right"><h2>其他</h2></a>
				<ul>
					<li><a href="/Educational_Administration_System/View/index.php/Home/Currmanage/../Logmanage">查看登陆日志</a></li>
					<li><a href="/Educational_Administration_System/View/index.php/Home/Currmanage/../Administormanage">管理员管理</a></li>
				</ul>
			</li>
        </ul>
    </div>
    <div class="sidebar fleft"><div class="btn"></div></div>
    <div class="page">
    <iframe width="100%" scrolling="auto" height="100%" frameborder="false" allowtransparency="true" style="border: medium none;" src="/Educational_Administration_System/View/index.php/Home/Currmanage/main" id="rightMain" name="right"></iframe>
    </div>
    </div><!--#content -->
    <div class="clear"></div>
    <div id="footer"></div><!--#footer -->
</div><!--#wrap -->
<div style="text-align:center;">
<p>来源：<a href="http://www.mycodes.net/" target="_blank">北京化工大学</a></p>
</div>
</body>
</html>