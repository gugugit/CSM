<?php
    require_once ('test.php');
 ?>
<!DOCTYPE html>
<html>
<head>
    <link href="../images/bootstrap.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="../javascript/jquery.min.js"></script>
</head>
<body>
    <form action="permulation.php" method="post">
        <div>
            请选择专业 &nbsp;
            <select name = "select1">
                <?php Get_Speciality(1) ?>
            </select>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            请选择要排的课程
            <select name = "select2">
                <?php $ID = Get_curricula(1) ?>
            </select>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            该课还有
            <input type="text" style = "width:30px;" id = "input1" class = "input1" name = "input1" disabled="true" value = <?php Get_reset_hours(0,0,0,0,0,0,0) ?> >
            学时没有安排
        </div>
        <div>
            <div> &nbsp; </div>
            开始周&nbsp;
            <select name = "select_start_week">
                <option value = "0"> 请选择起始周 </option>
                <?php
                    for ($i = 1; $i <= 18; $i++) {
                        echo "<option value = {$i}>{$i}</option>";
                    }
                ?>
            </select>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            结束周 &nbsp;
            <select name = "select_end_week">
                <option value = "0"> 请选择结束周 </option>
                <?php
                    for ($i = 1; $i <= 18; $i++) {
                        echo "<option value = {$i}> {$i} </option>";
                    }
                ?>
            </select>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            星期 &nbsp;
            <select name = "select_day">
                <option value = "0"> 请选择星期 </option>
                <?php
                    for ($i = 1; $i <= 7; $i++) {
                        echo "<option value = {$i}> {$i} </option>";
                    }
                ?>
            </select>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            上课时间
            <select name = "select_time">
                <option value = "0"> 请选择节次 </option>
                <option value = "1"> 上午1-2节 </option>
                <option value = "2"> 上午3-5节 </option>
                <option value = "3"> 下午1-2节 </option>
                <option value = "4"> 下午3-5节 </option>
                <option value = "5"> 晚上1-3节 </option>
            </select>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            请选择教该课的老师
            <select name = "select3">
                <?php Get_teacher("#",1,1,1,1) ?>
            </select>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            请选择教室
            <select name = "select4">
                <?php Get_classroom("#",1,1,1,1) ?>
            </select>
        </div>
        <div>
            <div> &nbsp; </div>
            <div>如果课程还有学时没安排，请选择下面一栏</div>
            开始周&nbsp;
            <select name = "select_start_week_1">
                <option value = "0"> 请选择起始周 </option>
                <?php
                    for ($i = 1; $i <= 18; $i++) {
                        echo "<option value = {$i}>{$i}</option>";
                    }
                ?>
            </select>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            结束周 &nbsp;
            <select name = "select_end_week_1">
                <option value = "0"> 请选择结束周 </option>
                <?php
                    for ($i = 1; $i <= 18; $i++) {
                        echo "<option value = {$i}> {$i} </option>";
                    }
                ?>
            </select>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            星期 &nbsp;
            <select name = "select_day_1">
                <option value = "0"> 请选择星期 </option>
                <?php
                    for ($i = 1; $i <= 7; $i++) {
                        echo "<option value = {$i}> {$i} </option>";
                    }
                ?>
            </select>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            上课时间
            <select name = "select_time_1">
                <option value = "0"> 请选择节次 </option>
                <option value = "1"> 上午1-2节 </option>
                <option value = "2"> 上午3-5节 </option>
                <option value = "3"> 下午1-2节 </option>
                <option value = "4"> 下午3-5节 </option>
                <option value = "5"> 晚上1-3节 </option>
            </select>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            请选择教该课的老师
            <select name = "select3_1">
                <?php Get_teacher("#",1,1,1,1) ?>
            </select>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            请选择教室
            <select name = "select4_1">
                <?php Get_classroom("#",1,1,1,1) ?>
            </select>
        </div>
        <div style = "text-align:center">
            <div> &nbsp; </div>
            <input type="submit" value="提交">
        </div>
    </form>
    <div class = "kebiao">
        <?php Get_table(0)?>
    </div>
</body>
<script>
$(function(){
    $("select[name='select1']").change(function(){
        var speciality_id=$("select[name='select1'] option:selected").attr('value');
        $.post(
            "test.php",
            {
                'speciality_id':speciality_id
            },
            function (data)
            {
                $("select[name='select2']").empty();
                $("select[name='select2']").append(data);
                var curricula_id=$("select[name='select2'] option:selected").attr('value');
                
                var select_start_week=$("select[name='select_start_week'] option:selected").attr('value');
                var select_end_week=$("select[name='select_end_week'] option:selected").attr('value');
                var select_day=$("select[name='select_day'] option:selected").attr('value');
                var select_time=$("select[name='select_time'] option:selected").attr('value');


                var select_start_week_1=$("select[name='select_start_week_1'] option:selected").attr('value');
                var select_end_week_1=$("select[name='select_end_week_1'] option:selected").attr('value');
                var select_day_1=$("select[name='select_day_1'] option:selected").attr('value');
                var select_time_1=$("select[name='select_time_1'] option:selected").attr('value');

                // 教师
                $.post(
                    "test.php",
                    {
                        'curricula_id':curricula_id,
                        'select_start_week':select_start_week,
                        'select_end_week':select_end_week,
                        'select_day':select_day,
                        'select_time':select_time
                    },
                    function (data)
                    {
                        $("select[name='select3']").empty();
                        $("select[name='select3']").append(data);
                    }
                )

                // 教师_1
                $.post(
                    "test.php",
                    {
                        'curricula_id_2_1':curricula_id,
                        'select_start_week_1':select_start_week_1,
                        'select_end_week_1':select_end_week_1,
                        'select_day_1':select_day_1,
                        'select_time_1':select_time_1
                    },
                    function (data)
                    {
                        $("select[name='select3_1']").empty();
                        $("select[name='select3_1']").append(data);
                    }
                )


                // 课时
                $.post(
                    "test.php",
                    {
                        'curricula_id_3':curricula_id,
                        'select_start_week':select_start_week,
                        'select_end_week':select_end_week,
                        'select_time':select_time
                    },
                    function (data)
                    {
                        $("#input1").val(data);
                    }
                )
                // 教室
                $.post(
                    "test.php",
                    {
                        'curricula_id_2':curricula_id,
                        'select_start_week':select_start_week,
                        'select_end_week':select_end_week,
                        'select_day':select_day,
                        'select_time':select_time
                    },
                    function (data)
                    {
                        $("select[name='select4']").empty();
                        $("select[name='select4']").append(data);
                    }
                )
                // 教室_1
                $.post(
                    "test.php",
                    {
                        'curricula_id_2_2_1':curricula_id,
                        'select_start_week_1':select_start_week_1,
                        'select_end_week_1':select_end_week_1,
                        'select_day_1':select_day_1,
                        'select_time_1':select_time_1
                    },
                    function (data)
                    {
                        $("select[name='select4_1']").empty();
                        $("select[name='select4_1']").append(data);
                    }
                )
            }
        )
        $.post(
            "test.php",
            {
                'curricula_id_10':speciality_id
            },
            function (data)
            {
                $(".kebiao").empty();
                $(".kebiao").append(data);
            }
        )
    })

    $("select[name='select2']").change(function(){
        var curricula_id=$("select[name='select2'] option:selected").attr('value');
        var select_start_week=$("select[name='select_start_week'] option:selected").attr('value');
        var select_end_week=$("select[name='select_end_week'] option:selected").attr('value');
        var select_day=$("select[name='select_day'] option:selected").attr('value');
        var select_time=$("select[name='select_time'] option:selected").attr('value');


        var select_start_week_1=$("select[name='select_start_week_1'] option:selected").attr('value');
        var select_end_week_1=$("select[name='select_end_week_1'] option:selected").attr('value');
        var select_day_1=$("select[name='select_day_1'] option:selected").attr('value');
        var select_time_1=$("select[name='select_time_1'] option:selected").attr('value');

        // 教师
        $.post(
            "test.php",
            {
                'curricula_id':curricula_id,
                'select_start_week':select_start_week,
                'select_end_week':select_end_week,
                'select_day':select_day,
                'select_time':select_time
            },
            function (data)
            {
                $("select[name='select3']").empty();
                $("select[name='select3']").append(data);
            }
        )

        // 教师_1
        $.post(
            "test.php",
            {
                'curricula_id_2_1':curricula_id,
                'select_start_week_1':select_start_week_1,
                'select_end_week_1':select_end_week_1,
                'select_day_1':select_day_1,
                'select_time_1':select_time_1
            },
            function (data)
            {
                $("select[name='select3_1']").empty();
                $("select[name='select3_1']").append(data);
            }
        )


        // 课时
        $.post(
            "test.php",
            {
                'curricula_id_3':curricula_id,
                'select_start_week':select_start_week,
                'select_end_week':select_end_week,
                'select_time':select_time,

                'select_start_week_1':select_start_week_1,
                'select_end_week_1':select_end_week_1,
                'select_day_1':select_day_1,
                'select_time_1':select_time_1
            },
            function (data)
            {
                $("#input1").val(data);
            }
        )
        // 教室
        $.post(
            "test.php",
            {
                'curricula_id_2':curricula_id,
                'select_start_week':select_start_week,
                'select_end_week':select_end_week,
                'select_day':select_day,
                'select_time':select_time
            },
            function (data)
            {
                $("select[name='select4']").empty();
                $("select[name='select4']").append(data);
            }
        )
        // 教室_1
        $.post(
            "test.php",
            {
                'curricula_id_2_2_1':curricula_id,
                'select_start_week_1':select_start_week_1,
                'select_end_week_1':select_end_week_1,
                'select_day_1':select_day_1,
                'select_time_1':select_time_1
            },
            function (data)
            {
                $("select[name='select4_1']").empty();
                $("select[name='select4_1']").append(data);
            }
        )
    })

    $("select[name='select_start_week']").change(function(){
        var curricula_id=$("select[name='select2'] option:selected").attr('value');
        var select_start_week=$("select[name='select_start_week'] option:selected").attr('value');
        var select_end_week=$("select[name='select_end_week'] option:selected").attr('value');
        var select_day=$("select[name='select_day'] option:selected").attr('value');
        var select_time=$("select[name='select_time'] option:selected").attr('value');


        var select_start_week_1=$("select[name='select_start_week_1'] option:selected").attr('value');
        var select_end_week_1=$("select[name='select_end_week_1'] option:selected").attr('value');
        var select_day_1=$("select[name='select_day_1'] option:selected").attr('value');
        var select_time_1=$("select[name='select_time_1'] option:selected").attr('value');
        // 教师
        $.post(
            "test.php",
            {
                'curricula_id':curricula_id,
                'select_start_week':select_start_week,
                'select_end_week':select_end_week,
                'select_day':select_day,
                'select_time':select_time
            },
            function (data)
            {
                $("select[name='select3']").empty();
                $("select[name='select3']").append(data);
            }
        )


        // 教室
        $.post(
            "test.php",
            {
                'curricula_id_2':curricula_id,
                'select_start_week':select_start_week,
                'select_end_week':select_end_week,
                'select_day':select_day,
                'select_time':select_time
            },
            function (data)
            {
                $("select[name='select4']").empty();
                $("select[name='select4']").append(data);
            }
        )


        // 课时
        $.post(
            "test.php",
            {
                'curricula_id_3':curricula_id,
                'select_start_week':select_start_week,
                'select_end_week':select_end_week,
                'select_time':select_time,

                'select_start_week_1':select_start_week_1,
                'select_end_week_1':select_end_week_1,
                'select_day_1':select_day_1,
                'select_time_1':select_time_1
            },
            function (data)
            {
                $("#input1").val(data);
            }
        )
    })

    $("select[name='select_end_week']").change(function(){
        var curricula_id=$("select[name='select2'] option:selected").attr('value');
        var select_start_week=$("select[name='select_start_week'] option:selected").attr('value');
        var select_end_week=$("select[name='select_end_week'] option:selected").attr('value');
        var select_day=$("select[name='select_day'] option:selected").attr('value');
        var select_time=$("select[name='select_time'] option:selected").attr('value');

        var select_start_week_1=$("select[name='select_start_week_1'] option:selected").attr('value');
        var select_end_week_1=$("select[name='select_end_week_1'] option:selected").attr('value');
        var select_day_1=$("select[name='select_day_1'] option:selected").attr('value');
        var select_time_1=$("select[name='select_time_1'] option:selected").attr('value');
        // 教师
        $.post(
            "test.php",
            {
                'curricula_id':curricula_id,
                'select_start_week':select_start_week,
                'select_end_week':select_end_week,
                'select_day':select_day,
                'select_time':select_time
            },
            function (data)
            {
                $("select[name='select3']").empty();
                $("select[name='select3']").append(data);
            }
        )


        // 教室
        $.post(
            "test.php",
            {
                'curricula_id_2':curricula_id,
                'select_start_week':select_start_week,
                'select_end_week':select_end_week,
                'select_day':select_day,
                'select_time':select_time
            },
            function (data)
            {
                $("select[name='select4']").empty();
                $("select[name='select4']").append(data);
            }
        )

        // 课时
        $.post(
            "test.php",
            {
                'curricula_id_3':curricula_id,
                'select_start_week':select_start_week,
                'select_end_week':select_end_week,
                'select_time':select_time,

                'select_start_week_1':select_start_week_1,
                'select_end_week_1':select_end_week_1,
                'select_day_1':select_day_1,
                'select_time_1':select_time_1
            },
            function (data)
            {
                $("#input1").val(data);
            }
        )
    })

    $("select[name='select_day']").change(function(){
        var curricula_id=$("select[name='select2'] option:selected").attr('value');
        var select_start_week=$("select[name='select_start_week'] option:selected").attr('value');
        var select_end_week=$("select[name='select_end_week'] option:selected").attr('value');
        var select_day=$("select[name='select_day'] option:selected").attr('value');
        var select_time=$("select[name='select_time'] option:selected").attr('value');
        
        var select_start_week_1=$("select[name='select_start_week_1'] option:selected").attr('value');
        var select_end_week_1=$("select[name='select_end_week_1'] option:selected").attr('value');
        var select_day_1=$("select[name='select_day_1'] option:selected").attr('value');
        var select_time_1=$("select[name='select_time_1'] option:selected").attr('value');

        //教师
        $.post(
            "test.php",
            {
                'curricula_id':curricula_id,
                'select_start_week':select_start_week,
                'select_end_week':select_end_week,
                'select_day':select_day,
                'select_time':select_time
            },
            function (data)
            {
                $("select[name='select3']").empty();
                $("select[name='select3']").append(data);
            }
        )


        // 教室
        $.post(
            "test.php",
            {
                'curricula_id_2':curricula_id,
                'select_start_week':select_start_week,
                'select_end_week':select_end_week,
                'select_day':select_day,
                'select_time':select_time
            },
            function (data)
            {
                $("select[name='select4']").empty();
                $("select[name='select4']").append(data);
            }
        )


        // 课时
        $.post(
            "test.php",
            {
                'curricula_id_3':curricula_id,
                'select_start_week':select_start_week,
                'select_end_week':select_end_week,
                'select_time':select_time,

                'select_start_week_1':select_start_week_1,
                'select_end_week_1':select_end_week_1,
                'select_day_1':select_day_1,
                'select_time_1':select_time_1
            },
            function (data)
            {
                $("#input1").val(data);
            }
        )
    })

    $("select[name='select_time']").change(function(){
        var curricula_id=$("select[name='select2'] option:selected").attr('value');
        var select_start_week=$("select[name='select_start_week'] option:selected").attr('value');
        var select_end_week=$("select[name='select_end_week'] option:selected").attr('value');
        var select_day=$("select[name='select_day'] option:selected").attr('value');
        var select_time=$("select[name='select_time'] option:selected").attr('value');

        var select_start_week_1=$("select[name='select_start_week_1'] option:selected").attr('value');
        var select_end_week_1=$("select[name='select_end_week_1'] option:selected").attr('value');
        var select_day_1=$("select[name='select_day_1'] option:selected").attr('value');
        var select_time_1=$("select[name='select_time_1'] option:selected").attr('value');

        $.post(
            "test.php",
            {
                'curricula_id':curricula_id,
                'select_start_week':select_start_week,
                'select_end_week':select_end_week,
                'select_day':select_day,
                'select_time':select_time
            },
            function (data)
            {
                $("select[name='select3']").empty();
                $("select[name='select3']").append(data);
            }
        )


        // 教室
        $.post(
            "test.php",
            {
                'curricula_id_2':curricula_id,
                'select_start_week':select_start_week,
                'select_end_week':select_end_week,
                'select_day':select_day,
                'select_time':select_time
            },
            function (data)
            {
                $("select[name='select4']").empty();
                $("select[name='select4']").append(data);
            }
        )


        // 课时
        $.post(
            "test.php",
            {
                'curricula_id_3':curricula_id,
                'select_start_week':select_start_week,
                'select_end_week':select_end_week,
                'select_time':select_time,

                'select_start_week_1':select_start_week_1,
                'select_end_week_1':select_end_week_1,
                'select_day_1':select_day_1,
                'select_time_1':select_time_1

            },
            function (data)
            {
                $("#input1").val(data);
            }
        )
    })

    $("select[name='select_start_week_1']").change(function(){
        var curricula_id=$("select[name='select2'] option:selected").attr('value');
        var select_start_week=$("select[name='select_start_week'] option:selected").attr('value');
        var select_end_week=$("select[name='select_end_week'] option:selected").attr('value');
        var select_day=$("select[name='select_day'] option:selected").attr('value');
        var select_time=$("select[name='select_time'] option:selected").attr('value');


        var select_start_week_1=$("select[name='select_start_week_1'] option:selected").attr('value');
        var select_end_week_1=$("select[name='select_end_week_1'] option:selected").attr('value');
        var select_day_1=$("select[name='select_day_1'] option:selected").attr('value');
        var select_time_1=$("select[name='select_time_1'] option:selected").attr('value');

        // 教师_1
        $.post(
            "test.php",
            {
                'curricula_id_2_1':curricula_id,
                'select_start_week_1':select_start_week_1,
                'select_end_week_1':select_end_week_1,
                'select_day_1':select_day_1,
                'select_time_1':select_time_1
            },
            function (data)
            {
                $("select[name='select3_1']").empty();
                $("select[name='select3_1']").append(data);
            }
        )

        // 教室_1
        $.post(
            "test.php",
            {
                'curricula_id_2_2_1':curricula_id,
                'select_start_week_1':select_start_week_1,
                'select_end_week_1':select_end_week_1,
                'select_day_1':select_day_1,
                'select_time_1':select_time_1
            },
            function (data)
            {
                $("select[name='select4_1']").empty();
                $("select[name='select4_1']").append(data);
            }
        )

        // 课时
        $.post(
            "test.php",
            {
                'curricula_id_3':curricula_id,
                'select_start_week':select_start_week,
                'select_end_week':select_end_week,
                'select_time':select_time,

                'select_start_week_1':select_start_week_1,
                'select_end_week_1':select_end_week_1,
                'select_day_1':select_day_1,
                'select_time_1':select_time_1
            },
            function (data)
            {
                $("#input1").val(data);
            }
        )
    })

    $("select[name='select_end_week_1']").change(function(){
        var curricula_id=$("select[name='select2'] option:selected").attr('value');
        var select_start_week=$("select[name='select_start_week'] option:selected").attr('value');
        var select_end_week=$("select[name='select_end_week'] option:selected").attr('value');
        var select_day=$("select[name='select_day'] option:selected").attr('value');
        var select_time=$("select[name='select_time'] option:selected").attr('value');

        var select_start_week_1=$("select[name='select_start_week_1'] option:selected").attr('value');
        var select_end_week_1=$("select[name='select_end_week_1'] option:selected").attr('value');
        var select_day_1=$("select[name='select_day_1'] option:selected").attr('value');
        var select_time_1=$("select[name='select_time_1'] option:selected").attr('value');

        // 教师_1
        $.post(
            "test.php",
            {
                'curricula_id_2_1':curricula_id,
                'select_start_week_1':select_start_week_1,
                'select_end_week_1':select_end_week_1,
                'select_day_1':select_day_1,
                'select_time_1':select_time_1
            },
            function (data)
            {
                $("select[name='select3_1']").empty();
                $("select[name='select3_1']").append(data);
            }
        )


        // 教室_1
        $.post(
            "test.php",
            {
                'curricula_id_2_2_1':curricula_id,
                'select_start_week_1':select_start_week_1,
                'select_end_week_1':select_end_week_1,
                'select_day_1':select_day_1,
                'select_time_1':select_time_1
            },
            function (data)
            {
                $("select[name='select4_1']").empty();
                $("select[name='select4_1']").append(data);
            }
        )

        // 课时
        $.post(
            "test.php",
            {
                'curricula_id_3':curricula_id,
                'select_start_week':select_start_week,
                'select_end_week':select_end_week,
                'select_time':select_time,

                'select_start_week_1':select_start_week_1,
                'select_end_week_1':select_end_week_1,
                'select_day_1':select_day_1,
                'select_time_1':select_time_1
            },
            function (data)
            {
                $("#input1").val(data);
            }
        )
    })

    $("select[name='select_day_1']").change(function(){
        var curricula_id=$("select[name='select2'] option:selected").attr('value');
        var select_start_week=$("select[name='select_start_week'] option:selected").attr('value');
        var select_end_week=$("select[name='select_end_week'] option:selected").attr('value');
        var select_day=$("select[name='select_day'] option:selected").attr('value');
        var select_time=$("select[name='select_time'] option:selected").attr('value');
        
        var select_start_week_1=$("select[name='select_start_week_1'] option:selected").attr('value');
        var select_end_week_1=$("select[name='select_end_week_1'] option:selected").attr('value');
        var select_day_1=$("select[name='select_day_1'] option:selected").attr('value');
        var select_time_1=$("select[name='select_time_1'] option:selected").attr('value');

        // 教师_1
        $.post(
            "test.php",
            {
                'curricula_id_2_1':curricula_id,
                'select_start_week_1':select_start_week_1,
                'select_end_week_1':select_end_week_1,
                'select_day_1':select_day_1,
                'select_time_1':select_time_1
            },
            function (data)
            {
                $("select[name='select3_1']").empty();
                $("select[name='select3_1']").append(data);
            }
        )


        // 教室_1
        $.post(
            "test.php",
            {
                'curricula_id_2_2_1':curricula_id,
                'select_start_week_1':select_start_week_1,
                'select_end_week_1':select_end_week_1,
                'select_day_1':select_day_1,
                'select_time_1':select_time_1
            },
            function (data)
            {
                $("select[name='select4_1']").empty();
                $("select[name='select4_1']").append(data);
            }
        )

        // 课时
        $.post(
            "test.php",
            {
                'curricula_id_3':curricula_id,
                'select_start_week':select_start_week,
                'select_end_week':select_end_week,
                'select_time':select_time,

                'select_start_week_1':select_start_week_1,
                'select_end_week_1':select_end_week_1,
                'select_day_1':select_day_1,
                'select_time_1':select_time_1
            },
            function (data)
            {
                $("#input1").val(data);
            }
        )
    })

    $("select[name='select_time_1']").change(function(){
        var curricula_id=$("select[name='select2'] option:selected").attr('value');
        var select_start_week=$("select[name='select_start_week'] option:selected").attr('value');
        var select_end_week=$("select[name='select_end_week'] option:selected").attr('value');
        var select_day=$("select[name='select_day'] option:selected").attr('value');
        var select_time=$("select[name='select_time'] option:selected").attr('value');

        var select_start_week_1=$("select[name='select_start_week_1'] option:selected").attr('value');
        var select_end_week_1=$("select[name='select_end_week_1'] option:selected").attr('value');
        var select_day_1=$("select[name='select_day_1'] option:selected").attr('value');
        var select_time_1=$("select[name='select_time_1'] option:selected").attr('value');

        // 教师_1
        $.post(
            "test.php",
            {
                'curricula_id_2_1':curricula_id,
                'select_start_week_1':select_start_week_1,
                'select_end_week_1':select_end_week_1,
                'select_day_1':select_day_1,
                'select_time_1':select_time_1
            },
            function (data)
            {
                $("select[name='select3_1']").empty();
                $("select[name='select3_1']").append(data);
            }
        )

        // 教室_1
        $.post(
            "test.php",
            {
                'curricula_id_2_2_1':curricula_id,
                'select_start_week_1':select_start_week_1,
                'select_end_week_1':select_end_week_1,
                'select_day_1':select_day_1,
                'select_time_1':select_time_1
            },
            function (data)
            {
                $("select[name='select4_1']").empty();
                $("select[name='select4_1']").append(data);
            }
        )

        // 课时
        $.post(
            "test.php",
            {
                'curricula_id_3':curricula_id,
                'select_start_week':select_start_week,
                'select_end_week':select_end_week,
                'select_time':select_time,

                'select_start_week_1':select_start_week_1,
                'select_end_week_1':select_end_week_1,
                'select_day_1':select_day_1,
                'select_time_1':select_time_1

            },
            function (data)
            {
                $("#input1").val(data);
            }
        )
    })

})



</script>
</html>
