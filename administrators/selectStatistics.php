<?php
require_once '../connect.php';
$pageSize=10;
$total_sql="select curricula.name as CourseName,COUNT(*) as count from curricula,curricula_variable where curricula.Id = curricula_variable.Curricula_Id group by curricula.Id";
$total_result=mysqli_num_rows(mysqli_query($conn,$total_sql));
$total=$total_result;
$total_pages=ceil($total/$pageSize);
$page=$_GET['p'];
if($page>$total_pages+1){
    echo "<script>alert('无此页'); window.location.href=\"selectStatistics1.php?p=1\";
                window.event.returnValue = false;</script>";
}
$showPage=5;
$start=($page-1)*$pageSize;
$sql="select curricula.name as CourseName,COUNT(*) as count from curricula,curricula_variable where curricula.Id = curricula_variable.Curricula_Id group by curricula.Id limit {$start},{$pageSize}";
$result=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>选课子系统界面</title>
    <link href="../images/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        function bbb(){

            var text=document.getElementById('aaa').value;
            if(text=='') {
                alert("请输入页号！");
                window.location.href="selectStatistics1.php?p=1";
                window.event.returnValue = false;

            }
        }
    </script>
    <style type="text/css">
        body {
            background:#FFF
        }

        div.page{
            background-color: white;
            text-align: center;
            height: 50px;
        }
        div.page input{
            border:1px solid #1D7AD9;
        }
        div.content{
            height: 50px;
        }
        div.page a{
            border:#00f 1px solid;text-decoration: none;padding: 2px 5px 2px 5px;margin: 2px;
        }
        div.page span.current{
            border:blue 1px solid ;background-color: blue;padding: 4px 6px;margin: 2px;color:#fff;font-weight: bold;
        }
        div.page span.disable{
            border:#eee 1px solid;padding:2px 5px;margin: 2px;color :#ddd;
        }
        div.page form{
            display:inline;
        }
    </style>
</head>
<body>
<div id="contentWrap">
     <div class="pageTitle">&nbsp;&nbsp;<span>当前位置 -- 报表统计查询 -- 选课情况统计查询</span></div>
    <div class="pageColumn">
        <div class="pageButton"><h1 style="text-align:center">&nbsp;&nbsp;选课情况统计查询表</h1></div>
        <table>
            <thead>
            <th >课程名称</th>
            <th >选课人数</th>
            </thead>
            <tbody>
            <?php while($row=@mysqli_fetch_array($result)){?>
                <tr>
                    <td><?php echo $row['CourseName']?></td>
                    <td><?php echo $row['count']?></td>
                </tr>
            <?php }?>
            </tbody>
        </table>
    </div>

    <div class="content">
        <?php
        mysqli_close($conn);
        $page_banner="<div class='page'>";
        $page_offset=($showPage-1)/2;

        if($page>1){
            $page_banner.="<br/><a href='".$_SERVER['PHP_SELF']."?p=1'>首页</a>";
            $page_banner.="<a href='".$_SERVER['PHP_SELF']."?p=".($page-1)."'><上一页</a>";
        }else{
            $page_banner.="<span class='disable'>首页</a></span>";
            $page_banner.="<span class='disable'><上一页</a></span>";
        }
        $start=1;
        $end=$total_pages;
        if($total_pages>$showPage){
            if($page>$page_offset+1){
                $page_banner.="...";
            }
            if($page>$page_offset){
                $start=$page-$page_offset;
                $end=$total_pages>$page+$page_offset?$page+$page_offset:$total_pages;
            }else{
                $start=1;
                $end=$total_pages>$showPage?$showPage:$total_pages;
            }
            if($page+$page_offset>$total_pages){
                $start=$start-($page+$page_offset-$end);

            }
        }
        for($i=$start;$i<$end;$i++){
            if($page==$i){
                $page_banner.="<span class='current'>{$i}</span>";
            }else{
                $page_banner.="<a href=".$_SERVER['PHP_SELF']."?p=".$i."'>{$i}</a>";
            }
        }
        if($total_pages>$showPage && $total_pages>$page+$page_offset){
            $page_banner.="...";
        }
        if($page<$total_pages){
            $page_banner.="<a href=".$_SERVER['PHP_SELF']."?p=".($page+1)."'>下一页></a>";
            $page_banner.="<a href=".$_SERVER['PHP_SELF']."?p=".($total_pages)."'>尾页</a>";
        }
        $page_banner.="共{$total_pages}页,";
        $page_banner.="<form action='selectStatistics.php' method='get'>";
        $page_banner.="跳转到第<input type='text' size='3' name='p' id='aaa'>页";
        $page_banner.="<input type='submit' value='确定'onclick='bbb()'>";
        $page_banner.="</form></div>";
        echo $page_banner;?>
    </div></div>
</body>
</html>