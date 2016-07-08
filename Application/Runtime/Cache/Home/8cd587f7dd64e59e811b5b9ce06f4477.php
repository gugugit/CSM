<?php if (!defined('THINK_PATH')) exit();?><html>
    <head>
    <style type="text/css">
    body {
        background:#FFF
    }
    </style>
        <meta charset="utf-8">
        <title>添加管理员</title>
        <link rel="stylesheet" type="text/css" href="/new_new_management_system/Public/css/common.css"/>
        <link rel="stylesheet" type="text/css" href="__PUBLIC_/css/main.css"/>

    </head>
    <body>
        <div class="tab-content" id="tab2">
            <div class="crumb-list"><i class="icon-font"> </i><a href="/new_new_management_system/index.php/Home/Administormanage/../Index/main">首页 </a><span class="crumb-step">&gt;</span><span class="crumb-name">添加管理员</span></div>
           <form action="/new_new_management_system/index.php/Home/Administormanage/add/id/<?php echo ($Id); ?>" method="post"id="checkname">
               <table class="insert-tab" width="100%">
                   <tbody>
            <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
            <tr>
              <th><label>ID&nbsp&nbsp</label></th>
              <td><input value = "<?php echo ($id); ?>" name="id" /></td>
          </tr>
            <tr>
              <th><label>密码&nbsp</label></th>
             <td><input value="<?php echo ($password); ?>" name="password" /></td>
         </tr>
            <!--<tr>-->
              <!--<th><label>权限&nbsp</label></th>-->
              <!--<td><select value="<?php echo ($permission); ?>" name="permission" >-->
                  <!--<option value = '1' <?php echo ($g1); ?>>超级管理员</option>-->
				  <!--<option value = '2' <?php echo ($g2); ?>>普通管理员</option>-->
              <!--</td>-->
          <!--</tr>-->

            <tr>
                <th></th>
              <td><input class="btn btn-primary btn6 mr10"onClick="return check()" type="submit" value="确认添加" />
                  <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button"></td>
         </tr>
            <div class="clear"></div>
        </tbody>
    </table>
            <!-- End .clear -->
          </form>
          <script>
                function isChinese(name) //中文值检测
                {
                    if(name.length == 0)
                        return false;
                    for(i = 0; i < name.length; i++) {
                        if(name.charCodeAt(i) > 128)
                            return true;
                    }
                    return false;
                }
                function isNumber(name) //数值检测
                {
                    if(name.length == 0)
                        return false;
                    for(i = 0; i < name.length; i++) {
                        if(name.charAt(i) < "0" || name.charAt(i) > "9")
                            return false;
                    }
                    return true;
                }
                function len(s) {
                    var l = 0;
                    var a = s.split("");
                    for (var i=0;i<a.length;i++) {
                        if (a[i].charCodeAt(0)<299) {
                            l++;
                        } else {
                            l+=2;
                        }
                    }
                    return l;
                }
                function check() {
                    if (checkname.id.value == "" || !isNumber(checkname.id.value)) {
                        alert("id不能为空并必为数字");
                        return false;
                    }
                    if(len(checkname.password.value)==0){ alert("密码不能为空");
                        return false;
                    }
                     if(len(checkname.password.value)<=3&&len(checkname.password.value)>0){ alert("密码强度过低");
                        return false;
                    }
                    if (checkname.permission.value == "") {
                        alert("权限不能为空");
                        return false;
                    }
                    return true;
                }
            </script>

        </div>
        <!-- End #tab2 -->
    </body>
</html>