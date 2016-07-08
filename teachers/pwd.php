<?php
header("Content-Type:text/html ;charset=utf-8");
session_start();
require_once ("../connect.php");
$mypwd=$_SESSION['pwd'];
$myid=$_SESSION['id'];
$oldpwd=$_POST['oldpassword'];
$newpwd=$_POST['newpassword'];
$againpwd=$_POST['againpassword'];
if(empty($oldpwd) || empty($newpwd)|| empty($againpwd)){
	echo "<script>alert('请输入完整信息！');history.back();</script>";
}
else if($oldpwd!=$mypwd){
     echo "<script>alert('旧密码不正确，请重新输入！');location.href='changeTeaPwd.php';</script>";
}
else if($newpwd!=$againpwd){
    echo "<script>alert('两次输入的新密码不相同，请重新输入！');location.href='changeTeaPwd.php';</script>";
}
else if($oldpwd==$mypwd){
    $sql="update teacher set Password='".$newpwd."' where Id='$myid';";
    $res=mysqli_query($conn, $sql);
    echo "<script>alert('恭喜您，修改密码成功！');location.href='changeTeaPwd.php'</script>"; 
}
?>