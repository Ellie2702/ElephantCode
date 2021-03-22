<?php
    session_start();
    include('../../config.php');

    $disc = $_POST['discipline_name'][0];
    $id = $_SESSION['teacherId'];

    $query = mysqli_prepare($link, 'select private_lesson_id from private_lesson where teacher_id = ? and discipline_id = ?');

    mysqli_stmt_bind_param($query, "ii", $id, $disc);
    mysqli_stmt_execute($query);
    mysqli_stmt_bind_result($query, $result);
    mysqli_stmt_fetch($query);
    mysqli_stmt_close($query);

    if($result) {
        echo 'Данная дисциплина уже закреплена';
    }  else {
        $query = mysqli_prepare($link,"insert into private_lesson (discipline_id, teacher_id) values (?, ?)");
        mysqli_stmt_bind_param($query, "ii", $disc, $id);
        mysqli_stmt_execute($query) or die("Ошибка" . mysqli_error($link));
        mysqli_stmt_close($query);
        
        header('Location:/profileTeacher.php');
        echo 'Добавлено!';

    } 
    

    mysqli_close($link);
?>