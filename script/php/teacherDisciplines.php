<?php
    session_start();
    include('config.php');

    
    $id = (int)$_SESSION['teacherId'];

    $query = mysqli_prepare($link, 'select d.discipline_name 
    from discipline as d 
    join private_lesson as p on (p.discipline_id = d.discipline_id)
    where p.teacher_id = ?');

    mysqli_stmt_bind_param($query, "i", $id);
    mysqli_stmt_execute($query);
    mysqli_stmt_bind_result($query, $result);

    while (mysqli_stmt_fetch($query)) {
        echo '<div class="spec">' . $result . '</div>';
    };
    mysqli_stmt_close($query);

    mysqli_close($link);
?>