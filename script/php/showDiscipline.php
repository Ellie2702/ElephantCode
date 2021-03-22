<?php
    include('config.php');
    session_start();
    $num = (int)$_GET['i'];

    $query = mysqli_prepare($link, 'select u.first_name, u.last_name, u.email, t.description, d.discipline_name
    from users as u
    join teachers as t on t.user_id = u.user_id
    join discipline as d 
    join private_lesson as p on p.discipline_id = d.discipline_id
    where d.discipline_id = ?');
    mysqli_stmt_bind_param($query, "i", $num);
    mysqli_stmt_execute($query);
    mysqli_stmt_bind_result($query, $first, $last, $mail, $desc, $disc_name);
    mysqli_stmt_fetch($query);
    mysqli_stmt_close($query);

    if(isset($disc_name)) 
    $_SESSION['disc_name'] = $disc_name;
    else if(isset($disc_name[0])) 
    $_SESSION['disc_name'] = $disc_name[0];


    if($first){
    echo '<div class="teacherCard">
    <img src="/images/teachers/noPhoto.png" alt=""> <div class="teacherDesk"><div class="teacherName">' . $first . ' ' . $last . '</div>
    <div class="teacherInfo">' . $desc . '</div>
    <div class="mail">
        <div class="teacherEmail">Для записи на курсы напишите преподавателю на почту:</div>
        <a href="/index.php">' . $mail . '</a></div>
        </div>';
    } else echo '<div class="notFoundResult">Пока таких преподавателей нет</div>';
    

    mysqli_close($link);
?>