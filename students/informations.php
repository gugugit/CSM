<?php
require_once("../connect.php");
$sql="select * from notification";
$res=mysqli_query($conn,$sql);
$rows=mysqli_num_rows($res);
if($res && $rows>0){
    while($row=mysqli_fetch_assoc($res)){
        $result_rows[]=$row;
    }
}
// echo "<table border='1' cellspacing='2' width='60%' align='center' bgcolor='#abcdef' cellpadding='3'>";
//  echo "<tr align=center><td>通知消息编号</td><td>通知消息时间</td><td>通知消息标题</td><td>通知消息内容</td></tr>";
// while($rows){
//  echo "<tr align=center>";
//  echo "<td>{$row['Id']}</td><td>{$row['Time']}</td><td>{$row['Title']}</td><td>{$row['Content']}</td>";
//  $rows--;
// }
// echo "</table>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>通知预览界面</title>
    <link href="../images/style.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        body {
            background:#FFF
        }
    </style>
</head>
<body>
<div id="contentWrap">
    <div class="pageTitle">&nbsp;&nbsp;<span>当前位置 -- 通知预览</span></div>
    <div class="pageColumn">
        <div class="pageButton"><h1>&nbsp;&nbsp;相关新闻消息通知</h1></div>
        <table>
            <thead>
            <th width="7%">消息编号</th>
            <th width="10%">发布时间</th>
            <th width="10%">公告标题</th>
            <th width="20%">消息内容</th>
            </thead>
            <tbody>
            <?php $i=1;foreach($result_rows as $rows):?>
            <tr>
                <td><?php echo $rows['Id']?></td>
                <td><?php echo $rows['Time']?></td>
                <td><?php echo $rows['Title']?></td>
                <td style="text-align:left"><?php echo $rows['Content']?></td>
            </tr>
            <?php $i++;endforeach;?>
            </tbody>
        </table>
    </div></div>
</body>
</html>