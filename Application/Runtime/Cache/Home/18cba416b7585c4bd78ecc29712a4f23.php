<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($title); ?></title>

<link rel="stylesheet" href="/management_system/Public/Css/admin/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/management_system/Public/Css/admin/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/management_system/Public/Css/admin/invalid.css" type="text/css" media="screen" />

<script type="text/javascript" src="/management_system/Public/Js/admin/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="/management_system/Public/Js/admin/simpla.jquery.configuration.js"></script>
<script type="text/javascript" src="/management_system/Public/Js/admin/facebox.js"></script>
<script type="text/javascript" src="/management_system/Public/Js/admin/jquery.wysiwyg.js"></script>

</head>

<body>
<div id="body-wrapper">

  <div id="sidebar">
    <div id="sidebar-wrapper">

      	<h1 id="sidebar-title"><a href="#">普通管理员</a></h1>
      	<img id="logo" src="/management_system/Public/Images/admin/logo.png" alt="Simpla Admin logo" />

      	<div id="profile-links">
      		您好,<a href="#" title="当前用户:<?php echo ($username); ?>"><?php echo ($username); ?></a> |
	 		<a href="/management_system/index.php/Home/Coumanage/../Index/quit" title="退出">退出</a>
       	</div>

	    <ul id="main-nav">
     		<!-- 类型为nav-top-itrm current 表示选中时的样式 -->
     		 <li> <a href="#" class="nav-top-item">个人信息管理 </a>
	          <ul>
              <li><a href="/management_system/index.php/Home/Coumanage/../Index/index">个人信息</a></li>
	          </ul>
	        </li>

	        <li> <a href="#" class="nav-top-item current">教务信息管理 </a>
	          <ul>
	            <li><a href="/management_system/index.php/Home/Coumanage/../Tecmanage/index">教师信息管理</a></li>
	            <li><a href="/management_system/index.php/Home/Coumanage/../Stumanage/index">学生信息管理</a></li>
	            <li><a class = 'current' href="#">课程信息管理</a></li>
              <li><a href="/management_system/index.php/Home/Coumanage/../Clamanage/index">教室信息管理</a></li>
	          </ul>
	        </li>

	        <li> <a href="#" class="nav-top-item">通知发布</a>
	          <ul>
	            <li><a href="/management_system/index.php/Home/Coumanage/../Sysmessage/index">系统通知发布</a></li>
	            <li><a href="/management_system/index.php/Home/Coumanage../Degmessage/index">学位警告通知</a></li>
	          </ul>
	        </li>

	        <li> <a href="#" class="nav-top-item">其他</a>
	          <ul>
	            <li><a href="#">查看登陆日志</a></li>
	            <li><a href="#">管理员管理</a></li>
	          </ul>
	        </li>
	     </ul>

    </div>
  </div>
  <!-- End #sidebar -->


  <div id="main-content">

    <noscript>
    <!-- Show a notification if the user has disabled javascript -->
	    <div class="notification error png_bg">
	      	<div> Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
	        Download From
	        </div>
	    </div>
    </noscript>


    <!-- Page Head -->
    <h2>个人信息</h2>
	<br></br>
<!--
    <ul class="shortcut-buttons-set">
      <li>
      	<a class="shortcut-button" href="/management_system/index.php/Home/Coumanage/../Paper">
      		<span>
      			<img src="/management_system/Public/Images/admin/icons/pencil_48.png" alt="icon" /><br />
        		写文章
        	</span>
        </a>
      </li>

      <li>
      	<a class="shortcut-button" href="/management_system/index.php/Home/Coumanage/../Article">
      		<span>
      			<img src="/management_system/Public/Images/admin/icons/paper_content_pencil_48.png" alt="icon" /><br />
        		写新闻
        	</span>
        </a>
      </li>

      <!--
      <li>
      	<a class="shortcut-button" href="#">
      		<span>
      			<img src="/management_system/Public/Images/admin/icons/image_add_48.png" alt="icon" /><br />
        		上传图片
        	</span>
        </a>
      </li>

      <li>
      	<a class="shortcut-button" href="#">
      		<span>
      			<img src="/management_system/Public/Images/admin/icons/clock_48.png" alt="icon" /><br />
        		添加事件
        	</span>
        </a>
      </li>
      -->

    </ul>


    <div class="clear"></div>


    <div class="content-box">

      <!-- Start Content Box -->
      <div class="content-box-header">
        <h3></h3>
        <ul class="content-box-tabs">
          <li><a href="#tab1" class="default-tab">信息</a></li>
          <!-- href must be unique and match the id of target div -->
          <li><a href="#tab2">详细信息</a></li>
        </ul>
        <div class="clear"></div>
      </div>

      <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
          <!-- This is the target div. id must match the href of this div's tab -->
          <div class="notification attention png_bg"> <a href="#" class="close"><img src="/management_system/Public/Images/admin/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
            <div>您好，<?php echo ($username); ?>，下面是您的信息！ </div>
          </div>

          <!-- 表头 -->
          <table>
            <thead>
              <tr>
                <th>

                </th>
                <th>课程ID</th>
                <th>课程名</th>
                <th>教师ID</th>
                <th>课程学分</th>
                <th>课程性质</th>
                <th>开课学院</th>
                <th>开课学期</th>
                <th>上课时间</th>
                <th>上课地点</th>
                <th>学时</th>
              </tr>
            </thead>

            <!-- 表内容部分 -->
            <tbody>
              <?php if(is_array($news_list)): $i = 0; $__LIST__ = $news_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td></td>
                <td><?php echo ($vo['subject']); ?></td>
                <td><a href="#" title="title"><?php echo ($vo['author']); ?></a></td>
                <td><?php echo ($vo['createtime']); ?></td>
                <td><?php echo ($vo['lastmodifytime']); ?></td>
                <td>
                  <!-- Icons -->
                  <a href="/management_system/index.php/Home/Coumanage/edit/id/<?php echo ($vo['id']); ?>" title="编辑"><img src="/management_system/Public/Images/admin/icons/pencil.png" alt="编辑" /></a>
                  <a href="/management_system/index.php/Home/Coumanage/delete/id/<?php echo ($vo['id']); ?>" title="删除"><img src="/management_system/Public/Images/admin/icons/cross.png" alt="删除" /></a>
                </td>
              </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>

              <!-- 表尾 -->
            <tfoot>
              <tr>
                <td colspan="6">
                  <div class="pagination">
                  	<?php echo ($page_method); ?>
                    <!--
                  	<a href="#" title="First Page">&laquo; First</a>
                  	<a href="#" title="Previous Page">&laquo; Previous</a>
                  	<a href="#" class="number" title="1">1</a>
                  	<a href="#" class="number" title="2">2</a>
                  	<a href="#" class="number current" title="3">3</a>
                  	<a href="#" class="number" title="4">4</a>
                  	<a href="#" title="Next Page">Next &raquo;</a>
                  	<a href="#" title="Last Page">Last &raquo;</a>
                  -->
                  </div>
                  <div class="clear"></div>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>



        <!-- End #tab1 -->
        <div class="tab-content" id="tab2">
          <form action="#" method="post">
            <fieldset>
            <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
            <p>
              <label>Small form input</label>
              <input class="text-input small-input" type="text" id="small-input" name="small-input" />
              <span class="input-notification success png_bg">Successful message</span>
              <!-- Classes for input-notification: success, error, information, attention -->
              <br />
              <small>A small description of the field</small> </p>
            <p>
              <label>Medium form input</label>
              <input class="text-input medium-input datepicker" type="text" id="medium-input" name="medium-input" />
              <span class="input-notification error png_bg">Error message</span> </p>
            <p>
              <label>Large form input</label>
              <input class="text-input large-input" type="text" id="large-input" name="large-input" />
            </p>
            <p>
              <label>Checkboxes</label>
              <input type="checkbox" name="checkbox1" />
              This is a checkbox
              <input type="checkbox" name="checkbox2" />
              And this is another checkbox </p>
            <p>
              <label>Radio buttons</label>
              <input type="radio" name="radio1" />
              This is a radio button<br />
              <input type="radio" name="radio2" />
              This is another radio button </p>
            <p>
              <label>This is a drop down list</label>
              <select name="dropdown" class="small-input">
                <option value="option1">Option 1</option>
                <option value="option2">Option 2</option>
                <option value="option3">Option 3</option>
                <option value="option4">Option 4</option>
              </select>
            </p>
            <p>
              <label>Textarea with WYSIWYG</label>
              <textarea class="text-input textarea wysiwyg" id="textarea" name="textfield" cols="79" rows="15"></textarea>
            </p>
            <p>
              <input class="button" type="submit" value="Submit" />
            </p>
            </fieldset>
            <div class="clear"></div>
            <!-- End .clear -->
          </form>
        </div>
        <!-- End #tab2 -->
      </div>
      <!-- End .content-box-content -->
    </div>
    <!-- End .content-box -->
  <!--
    <div class="content-box column-left">
      <div class="content-box-header">
        <h3>内容框 左</h3>
      </div>
    -->
      <!-- End .content-box-header -->
  <!--    <div class="content-box-content">
        <div class="tab-content default-tab">
          <h4>测试</h4>
          <p> 备用 </p>
        </div>
        <!-- End #tab3 -->
      <!--</div>
      <!-- End .content-box-content -->
    <!--</div>
    <!-- End .content-box -->
  <!--  <div class="content-box column-right closed-box">
  <!--    <div class="content-box-header">
        <!-- Add the class "closed" to the Content box header to have it closed by default -->
  <!--      <h3>内容框 右</h3>
      </div>
      <!-- End .content-box-header -->
<!--      <div class="content-box-content">
        <div class="tab-content default-tab">
          <h4>哈哈</h4>
          <p> 备用 </p>
        </div>
        <!-- End #tab3 -->
<!--      </div>
      <!-- End .content-box-content -->
<!--    </div>
    <!-- End .content-box -->
    <div class="clear" style="margin-top:300px"></div>
    <div>
    <div id="footer"> <small>
      <!-- Remove this notice or replace it with whatever you want -->
      &#169; Copyright 2010 Your Company | Powered by <a href="http://www.865171.cn">admin templates</a> | <a href="#">Top</a> </small> </div>
    <!-- End #footer -->
  </div>
</div>
  <!-- End #main-content -->
</div>
</body>
<!-- Download From www.exet.tk-->
</html>