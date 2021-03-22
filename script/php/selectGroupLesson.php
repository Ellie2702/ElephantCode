<?php
    include('config.php');

    $query = 'select g.group_lesson_id, g.lesson_name, d.discipline_name
    from group_lesson as g
    join discipline as d on g.discipline_id = d.discipline_id';
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

    if($result){
        $rows = mysqli_num_rows($result);

        for($i = 0; $i < $rows; $i++) {
            $row = mysqli_fetch_row($result);
            echo '<option value="' . $row[0] . '">' . $row[1] . ' (' . $row[2] . ')</option>' ;
        }
    }

    mysqli_close($link);
?>