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
            //
            $('.subMenu a[href="#"]').click(function(){
                $(this).next('ul').toggle();
                return false;
            });
        })
        function ChangeSrc(para){
            var str;
            switch(para){
                case 7:   str = 'StudentManagement.php'; break;
                case 8:   str = 'TeacherManagement.php'; break;
                case 9:   str = 'SelectIssueByStudent.php'; break;
                case 10:  str = 'SelectIssueByTeacher.php'; break;
                case 11:  str = 'SelectIssueByIssue.php'; break;
                case 12:  str = 'SelectGradeByStudent.php'; break;
                case 100: str = 'informations.php'; break;
                case 101: str = 'help_informations.php'; break;
                case 102: str = 'manager_score.php'; break;
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
                <li><a href="javascript:void(0)" onclick="ChangeSrc(100)">通知预览</a></li>
                <li><a href="javascript:void(0)" onclick="ChangeSrc(101)">帮助信息</a></li>
                <div class="nav-right fleft"></div>
            </ul>
        </div>
       <div style="float:right"><label style="color:#075587"><?php echo $_SESSION['user']?>&nbsp;管理员,欢迎您！</label>
        <a class="logout fright" href="../login.html"> </a>
        <!-- <a href="../index.php?id=''"></a> -->
        <?php
        $user_id = $_SESSION['user_id'];
        echo "<a href = '../index.php?id=$user_id'>后台管理</a>";
        ?>
        </div>
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
                 <li class="subMenu"><a href="#" target="right">报表统计查询</a>
                    <ul class = "uli">
                        <li><a href="studentInfo1.php">学生信息查询</a></li>
                        <li><a href="teacherInfo1.php">教师信息查询</a>
                        <li><a href="adminInfo1.php">管理员信息查询</a></li>
                        <li><a href="selectStatistics1.php">选课情况统计查询</a></li>
                    </ul>
                </li>
            </ul>
            <ul>
                <li class="subMenuTitle">排课系统</li>
                <li class="subMenu"><a href="permutation_course.php" target="right">排课</a></li>
                <li class="subMenu"><a href="#">查询教室使用情况</a>
                    <ul class = "uli">
                        <li class="subMenu"><a href="time.php" target="right">按时间查询</a></li>
                        <li class="subMenu"><a href="class.php" target="right">按教室查询</a></li>
                    </ul>
                </li>
                <li class="subMenu"><a href="../teachers/main1.php" target="right">教师课程安排情况</a></li>
                <li class="subMenu"><a href="tep.html" target="right">临时活动安排教室</a></li>
            </ul>
            <ul>
                <li class = "subMenuTitle">毕业设计系统</li>
                <li class = "subMenu"><a href = "#">信息管理</a>
                    <ul class = "uli">
                        <li><a href = "javascript:void(0)" onclick="ChangeSrc(7)">学生信息管理</a></li>
                        <li><a href = "javascript:void(0)" onclick="ChangeSrc(8)">教师信息管理</a></li>
                    </ul>
                </li>
                <li class="subMenu"><a href = "#">课题信息查询</a>
                    <ul class = "uli">
                        <li><a href = "javascript:void(0)" onclick="ChangeSrc(9)">根据学生账号查询</a></li>
                        <li><a href = "javascript:void(0)" onclick="ChangeSrc(10)">根据老师账号查询</a></li>
                        <li><a href = "javascript:void(0)" onclick="ChangeSrc(11)">根据课题情况查询</a></li>
                    </ul>
                </li>
                <li class="subMenu"><a href = "#">成绩查询</a>
                    <ul class = "uli">
                        <li><a href = "javascript:void(0)" onclick="ChangeSrc(12)">学生课题成绩查询</a></li>
                    </ul>
                </li>
            </ul>
            <ul>
                <li class = "subMenuTitle">成绩管理系统</li>
                <li class = "subMenu"><a href = "#">成绩统计</a>
                <ul class = "uli">
                    <li><a href = "javascript:void(0)" onclick="ChangeSrc(102)">成绩统计</a></li>
                </ul>
            </ul>
        </div>
        <div class="sidebar fleft"><div class="btn"></div></div>
        <div class="page">
            <iframe width="100%" scrolling="auto" height="100%" frameborder="false" allowtransparency="true" style="border: medium none;" src="studentInfo.php?p=1" id="rightMain" name="right"></iframe>
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