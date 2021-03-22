<?php
    session_start();
    include('../../config.php');


    $name = $_POST['group_name'];
    $desc = $_POST['group_desc'];
    $disc = $_POST['discipline_name'];
    $teacher_ids = $_POST['teacher_name'];
    $vacant = $_POST['vacant_count'];

    $count = count($teacher_ids);

    $query = mysqli_prepare($link, "insert into group_lesson ( discipline_id, descript, vacant_place, lesson_name)
    values ( ?,?,?,?)");

    mysqli_stmt_bind_param($query, "isis", $disc, $desc, $vacant, $name);
    mysqli_stmt_execute($query) or die("Ошибка" . mysqli_error($link));
    mysqli_stmt_close($query);

    $id = mysqli_insert_id($link);  

    for($i = 0; $i < $count; $i++) {

    $query = mysqli_prepare($link, "insert into teacher_group_courses ( teacher_id, group_lesson_id)
    values (?,?)");

    mysqli_stmt_bind_param($query, "ii", $teacher_ids[$i], $id);
    mysqli_stmt_execute($query) or die("Ошибка" . mysqli_error($link));
    mysqli_stmt_close($query);
    }

    if($result) {
        echo 'Ok!';
    } 

    mysqli_close($link);
?>