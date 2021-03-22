<?php
    include('config.php');

    $query = 'select u.user_id, u.username, u.first_name, u.last_name 
    from users as u
    inner join roles as r on (u.role_id = r.role_id)
    where r.role_id = 2';
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

    if($result){
        $rows = mysqli_num_rows($result);

        for($i = 0; $i < $rows; $i++) {
            $row = mysqli_fetch_row($result);
            echo '<option value="' . $row[0] . '">' . $row[2] . ' ' . $row[3] . '(' . $row[1] .') </option>' ;
        }
    }

    mysqli_close($link);
?>