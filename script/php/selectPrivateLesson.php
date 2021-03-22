<?php
    include('config.php');

    $query = 'select p.private_lesson_id, d.discipline_name, u.first_name, u.last_name
    from private_lesson as p
    join discipline as d on (p.discipline_id = d.discipline_id)
    join teachers as t on (p.teacher_id = t.teacher_id)
    join users as u on (t.user_id = u.user_id)';
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

    if($result){
        $rows = mysqli_num_rows($result);

        for($i = 0; $i < $rows; $i++) {
            $row = mysqli_fetch_row($result);
            echo '<option value="' . $row[0] . '">' . $row[1] . ' (' . $row[2] . ' ' . $row[3] . ')</option>' ;
        }
    }

    mysqli_close($link);
?>