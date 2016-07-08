<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>教务系统界面</title>
    <link href="../images/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="../javascript/jquery.min.js"></script>
    <script type="text/javascript">
        $(function(){
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
            $('.uli').hide();
            $('.subMenu a[href="#"]').click(function(){
                $(this).next('ul').toggle();
                return false;
            });
        })
        function ChangeSrc(para){
            var str;
            switch(para){
                case 1:   str = 'ChooseIssue.php'; break;
                case 2:   str = 'SubmitWork.php'; break;
                case 3:   str = 'Communicate.php'; break;
                case 4:   str = 'issue_info.php'; break;
                case 100: str = 'scorehightest.php';break;
                case 101: str = 'scorefailcourse.php';break;
                case 102: str = 'yearscore.php';break;
                case 103: str = 'scorestatistic.php';break;
                case 104: str = 'informations.php'; break;
                case 105: str = 'help_informations.php'; break;
                default:  str = 'main.html'; break;
            }
            document.getElementById('rightMain').src = str;
        }
    </script>
</head>
<body>
<div id="wrap">
    <div id="header" >
        <div class="logo fleft"></div>
        <div class="nav fleft">
            <ul>
                <div class="nav-left fleft"></div>
                <li class="first"><a href="index.php">返回首页</a></li>
                <li><a href="javascript:void(0)" onclick="ChangeSrc(104)">通知预览</a></li>
                <li><a href="javascript:void(0)" onclick="ChangeSrc(105)">帮助信息</a></li>
                <div class="nav-right fleft"></div>
            </ul>
        </div>
        <div style="float:right"><label style="color:#075587"><?php echo $_SESSION['user']?>&nbsp;同学,欢迎您！</label>
        <a class="logout fright" href="../login.html"> </a></div>
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
            <ul>
                <li class="subMenuTitle">选课系统</li>
                <li class="subMenu"><a href="#">网上选课</a>
                    <ul class = "uli">
                        <li><a href="optional_course2.php">选修课</a></li>
                        <li><a href="general_course2.php">通识课</a></li>
                        <li><a href="drop_course2.php">退课</a></li>
                    </ul>
                </li>
                <li class="subMenu"><a href="#" target="right">信息维护</a>
                    <ul class = "uli">
                        <li><a href="showStuInfo1.php">个人信息</a></li>
                        <li><a href="changeStuPwd1.php">密码修改</a></li>
                    </ul>
                </li>
                <li class="subMenu"><a href="#" target="right">信息查询</a>
                    <ul class = "uli">
                        <li><a href="Schedulequery1.php">学生个人课表查询</a></li>
                        <li><a href="teacherInfo1.php">任课教师信息查询</a>
                        <li><a href="courseInfo1.php">课程信息查询</a></li>
                    </ul>
                    </ul>
                </li>
            </ul>
            <ul>
                <li class="subMenuTitle">排课系统</li>
                <li class="subMenu"><a href="#" target="right">信息查询</a>
                    <ul class = "uli">
                        <li><a href="schedule_all.php" target="right">专业课程课表查询</a></li>
                    </ul></li>
            </ul>
            <ul>
                <li class="subMenuTitle">毕业设计系统</li>
                <li class="subMenu"><a href="#">毕业设计</a>
                    <ul class = "uli">
                        <li><a href="javascript:void(0)" onclick="ChangeSrc(1)">选择课题</a></li>
                        <li><a href="javascript:void(0)" onclick="ChangeSrc(2)">提交报告</a></li>
                        <li><a href="javascript:void(0)" onclick="ChangeSrc(4)">课题信息</a></li>
                    </ul>
                </li>
                <li class="subMenu"> <a href="#">论坛</a>
                    <ul class = "uli">
                        <li><a href="javascript:void(0)" onclick="ChangeSrc(3)">论坛</a></li>
                    </ul>
                </li>
            </ul>
            <ul>
                <li class="subMenuTitle">成绩管理系统</li>
                <li class="subMenu"><a href="#">成绩查询</a>
                    <ul class = "uli">
                        <li><a href="javascript:void(0)" onclick="ChangeSrc(100)">课程最高成绩</a></li>
                        <li><a href="javascript:void(0)" onclick="ChangeSrc(101)">未通过成绩</a></li>
                        <li><a href="javascript:void(0)" onclick="ChangeSrc(102)">历年成绩</a></li>
                        <li><a href="javascript:void(0)" onclick="ChangeSrc(103)">成绩统计</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="sidebar fleft"><div class="btn"></div></div>
        <div class="page">
            <iframe width="100%" scrolling="auto" height="100%" frameborder="true" allowtransparency="true" style="border: medium none;" src="optional_course.php?p=1" id="rightMain" name="right">
            </iframe>
        </div>
    </div><!--#content -->
    <div class="clear"></div>
    <div id="footer"></div><!--#footer -->
</div><!--#wrap -->
<div style="text-align:center;">
    <p>© 版权所有 计科1302</p>
</div>
</body>
</html>