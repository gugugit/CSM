<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
    <style type="text/css">
    body {
        background:#FFF
    }
    </style>
        <meta charset="utf-8">
        <title>编辑学生信息</title>
        <link rel="stylesheet" type="text/css" href="/Educational_Administration_System/View/Public/css/common.css"/>
        <link rel="stylesheet" type="text/css" href="__PUBLIC_/css/main.css"/>
    </head>
    <body>
        <div class="" id="tab2">
            <div class="crumb-wrap">
                <div class="crumb-list"><i class="icon-font"> </i><a href="/Educational_Administration_System/View/index.php/Home/Stumanage/../Index/main">首页 </a><span class="crumb-step">&gt;</span><span class="crumb-name">编辑学生信息</span></div>
            </div>
          <form action="/Educational_Administration_System/View/index.php/Home/Stumanage/update/id/<?php echo ($Id); ?>" method="post"id="checkname">
            <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
            <table class="insert-tab" width="100%">
                <tbody>
            <tr>
              <th width="150"><label>ID&nbsp&nbsp</label></th>
              <td><input class="common-text" readonly="true" value = "<?php echo ($stuid); ?>" name="stuid" /></td>
          </tr>
            <tr>
              <th><label>姓名&nbsp</label></th>
              <td><input class="common-text required" id="title" value="<?php echo ($stuname); ?>" name="stuname" /></td>
          </tr>
            <tr>
              <th><label>性别&nbsp</label></th>
              <td>
                  <select value="<?php echo ($stusex); ?>" name="stusex" >
                  <option value = '男' <?php echo ($g1); ?>>男</option>
                  <option value = '女' <?php echo ($g2); ?>>女</option>
                  </select>
              </td>
          </tr>
            <tr>
              <th><label>民族&nbsp</label></th>
              <td><input value="<?php echo ($stunation); ?>" name="stunation" /></td>
          </tr>
            <tr>
              <th><label>所属学院</label></th>
              <td>
              <select name = 'stuacademy'>
                  <option value='1' <?php echo ($a1); ?>>信息科学与技术学院</option>
                  <option value='2' <?php echo ($a2); ?>>化学工程学院</option>
                  <option value='3' <?php echo ($a3); ?>>材料科学与工程学院</option>
                  <option value='4' <?php echo ($a4); ?>>文法学院</option>
                  <option value='5' <?php echo ($a5); ?>>理学院</option>
                  <option value='6' <?php echo ($a6); ?>>机电工程学院</option>
                  <option value='7' <?php echo ($a7); ?>>经济管理学院</option>
                  <option value='8' <?php echo ($a8); ?>>生命科学与技术学院</option>
                  <option value='9' <?php echo ($a9); ?>>继续教育学院</option>
                  <option value='10' <?php echo ($a10); ?>>职业技术学院</option>
                  <option value='11' <?php echo ($a11); ?>>马克思主义学院</option>
                  <option value='12' <?php echo ($a12); ?>>国际教育学院</option>
                  <option value='13' <?php echo ($a13); ?>>能源学院</option>
                  <option value='14' <?php echo ($a14); ?>>侯德榜工程师学院</option>
              </select>
          </td>
      </tr>
            <tr>
              <th><label>所属专业</label></th>
              <td>
              <select name = 'stuspeciality'>
                  <option value='1' <?php echo ($s1); ?>>计算机科学与技术</option>
                  <option value='2' <?php echo ($s2); ?>>自动化</option>
                  <option value='3' <?php echo ($s3); ?>>测控</option>
                  <option value='4' <?php echo ($s4); ?>>信工</option>
                  <option value='5' <?php echo ($s5); ?>>化工</option>
                  <option value='6' <?php echo ($s6); ?>>应化</option>
                  <option value='7' <?php echo ($s7); ?>>高材</option>
                  <option value='8' <?php echo ($s8); ?>>经管</option>
              </select>
          </td>
      </tr>
            <tr>
              <th><label>班级&nbsp</label></th>
              <td><input type="text" value = "<?php echo ($stuclass); ?>" name="stuclass" /></td>
            </tr>
            <tr>
                <th><label>年级&nbsp</label></th>
                <td>
                <select name = 'stugrade'>
                    <option value='1' <?php echo ($r1); ?>>2013级</option>
                    <option value='2' <?php echo ($r2); ?>>2014级</option>
                </select>
            </td>
        </tr>
            <tr>
                <th><label>入学时间</label></th>
                <td><input  type="date" value="<?php echo ($studate); ?>" name = 'studate' /></td>
            </tr>
            <tr>
              <th><label>联系电话</label></th>
              <td><input type="text" value = "<?php echo ($stuphone); ?>" name="stuphone" /></td>
          </tr>
            <tr>
              <th><label>身份证号</label></th>
              <td><input class="text-input" type="text" value = "<?php echo ($stucard); ?>" name="stucard" /></td>
          </tr>
            <tr>
              <th><label>出生地&nbsp</label></th>
              <td><input class="text-input" type="text" id="large-input" value = "<?php echo ($stubirthplace); ?>" name="stubirthplace" /></th>
            </tr>
            <tr>
              <th><label>生日&nbsp&nbsp</label></th>
              <td><input class="text-input" type="date" id="large-input" value = "<?php echo ($stubirthday); ?>" name="stubirthday" /></td>
          </tr>
            <tr>
              <th><label>电子邮箱</label></th>
              <td><input class="text-input" type="text" id="large-input" value = "<?php echo ($stuemail); ?>" name="stuemail" /></td>
          </tr>
            <tr>
              <th><label>登陆密码</label></th>
              <td><input class="text-input" type="text" id="large-input" value = "<?php echo ($stupassword); ?>" name="stupassword" /></td>
          </tr>
            <tr>
              <th></th>
              <td><input class="btn btn-primary btn6 mr10"onClick="return check()" type="submit" value="确认修改" />
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
                function isFloat(name)
                {
                    if( name.match(/^-?([1-9]\d*\.\d*|0\.\d*[1-9]\d*|0?\.0+|0)$/)== null)
                        return false;
                    else
                        return true;

                }
                function isMobile(phone){
                    if(!(/^1[3|4|5|8][0-9]\d{4,8}$/.test(phone))){
                        return false;
                    }

                    return ture;
                }
                function isCard(card)
                {
                    // 身份证号码为15位或者18位，15位时全为数字，18位前17位为数字，最后一位是校验位，可能为数字或字符X
                    var reg = /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/;
                    if(!reg.test(card))
                        return  false;
                    return true;
                }
                function isEmail(email){
                    var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
                    if(!myreg.test(email))
                        return false;
                    return true;
                }


                function check(){
                    if(checkname.stuid.value==""||! isNumber(checkname.stuid.value)){
                        alert("id不能为空并必为数字");
                        return false;
                    }
                    if(checkname.stuname.value==""||! isChinese(checkname.stuname.value)){
                        alert("姓名不能为空并必为汉字");
                        return false;
                    }
                    if(checkname.stusex.value==""){
                        alert("性别不能为空");
                        return false;
                    }
                    if(checkname.stunation.value==""){
                        alert("民族不能为空");
                        return false;
                    }
                    if(checkname.stuacademy.value==""){
                        alert("学院不能为空");
                        return false;
                    }
                    if(checkname.stuspeciality.value==""){
                        alert("专业不能为空");
                        return false;
                    }
                    if(checkname.stuclass.value==""){
                        alert("班级不能为空");
                        return false;
                    }
                    if(checkname.stugrade.value==""){
                        alert("年级不能为空");
                        return false;
                    }
                    if(checkname.studate.value==""){
                        alert("入学时间不能为空");
                        return false;
                    }
                    if(!isMobile(checkname.stuphone.value)){
                        alert("不是完整的11位手机号或者正确的手机号前七位");
                        return false;
                    }
                    if(!isCard(checkname.stucard.value)){
                        alert("身份证输入不合法");
                        return false;
                    }
                    if(checkname.stubirthplace.value==""||! isChinese(checkname.stubirthplace.value)){
                        alert("出生地不能为空并必为汉字");
                        return false;
                    }
                    if(checkname.stubirthday.value==""){
                        alert("生日不能为空");
                        return false;
                    }
                    if(!isEmail(checkname.stuemail.value)){
                        alert("邮箱输入不合法");
                        return false;
                    }
                    if(checkname.stupassword.value==""){
                        alert("登陆密码不能为空");
                        return false;
                    }
                    if(checkname.stupermission.value==""){
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