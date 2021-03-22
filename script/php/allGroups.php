<?php
    include('config.php');

    $query = 'select g.group_lesson_id, g.lesson_name, g.descript, g.vacant_place,d.discipline_name
    from group_lesson as g
    join discipline as d on g.discipline_id = d.discipline_id
    ';
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

    if ($result){
        $rows = mysqli_num_rows($result);

        for ($i = 0; $i < $rows; $i++) {
            $row = mysqli_fetch_row($result);
            echo '<div class="groupCard">
            <div class="groupName"> ' . $row[1] . '</div>
            <div class="groupDesc">' . $row[2]. '</div>
            ';
            $query1 = mysqli_prepare($link,'select u.first_name, u.last_name
            from users as u
            inner join teachers as t on t.user_id = u.user_id
            inner join teacher_group_courses as g on g.teacher_id = t.teacher_id
            where g.group_lesson_id = ?
            ');

            mysqli_stmt_bind_param($query1, "i", $row[0]);
            mysqli_stmt_execute($query1);
            mysqli_stmt_bind_result($query1, $First, $Last);

            echo '<div class="teachersList">';
            while (mysqli_stmt_fetch($query1)) {
                echo '<div class="teacher">' . $First . ' ' . $Last . '</div>'; 
            };
            echo '</div>';
            mysqli_stmt_close($query1);

            echo 'Курс по дисциплине: <div class="spec">' . $row[4] . '</div> <div class="vacant">' . $row[3] . '</div>
            </div>' ;
        }
    }

    mysqli_close($link);
?>