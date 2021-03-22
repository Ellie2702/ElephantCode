<?php
    include('config.php');

    $query = 'select t.teacher_id, u.first_name, u.last_name
    from teachers as t
    join users as u on t.user_id = u.user_id';
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

    if($result){
        $rows = mysqli_num_rows($result);

        for($i = 0; $i < $rows; $i++) {
            $row = mysqli_fetch_row($result);
            echo '<option value="' . $row[0] . '">' . $row[1] . ' ' . $row[2] . '</option>' ;
        }
    }

    mysqli_close($link);
?>