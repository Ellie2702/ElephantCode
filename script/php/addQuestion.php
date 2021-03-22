<?php
    include('../../config.php');
    session_start();

    $quest = $_POST['question'];

    $IsAns1 = $_POST['Isanswer1'];
    $ans1 = $_POST['answer1'];

    $IsAns2 = $_POST['Isanswer2'];
    $ans2 = $_POST['answer2'];

    $IsAns3 = $_POST['Isanswer3'];
    $ans3 = $_POST['answer3'];

    $IsAns4 = $_POST['Isanswer4'];
    $ans4 = $_POST['answer4'];

    $IsAns1 = (int) ($IsAns1 != null);
    $IsAns2 = (int) ($IsAns2 != null);
    $IsAns3 = (int) ($IsAns3 != null);
    $IsAns4 = (int) ($IsAns4 != null);

    $query = mysqli_prepare($link,"INSERT INTO questions (question_text, test_id) VALUES (?,?)");
    mysqli_stmt_bind_param($query, "si", $quest, $_SESSION["test_id"]);
    mysqli_stmt_execute($query) or die("Ошибка" . mysqli_error($link));
    mysqli_stmt_close($query);
 

    $questId = mysqli_insert_id($link);

    $query1 = mysqli_prepare($link,"INSERT INTO answers (question_id, answer_text, is_correct) VALUES (?,?,?)");
    mysqli_stmt_bind_param($query1, "isi", $questId, $ans1, $IsAns1);
    mysqli_stmt_execute($query1) or die("Ошибка 1: " . mysqli_error($link));
    mysqli_stmt_close($query1);

    $query2 = mysqli_prepare($link,"INSERT INTO answers (question_id, answer_text, is_correct) VALUES (?,?,?)");
    mysqli_stmt_bind_param($query2, "isi", $questId, $ans2, $IsAns2);
    mysqli_stmt_execute($query2) or die("Ошибка 2: " . mysqli_error($link));
    mysqli_stmt_close($query2);

    $query3 = mysqli_prepare($link,"INSERT INTO answers (question_id, answer_text, is_correct) VALUES (?,?,?)");
    mysqli_stmt_bind_param($query3, "isi", $questId, $ans3, $IsAns3);
    mysqli_stmt_execute($query3) or die("Ошибка 3: " . mysqli_error($link));
    mysqli_stmt_close($query3);

    $query4 = mysqli_prepare($link,"INSERT INTO answers (question_id, answer_text, is_correct) VALUES (?,?,?)");
    mysqli_stmt_bind_param($query4, "isi", $questId, $ans4, $IsAns4);
    mysqli_stmt_execute($query4) or die("Ошибка 4: " . mysqli_error($link));
    mysqli_stmt_close($query4);
        

    header('Location: /newQuestion.php?varname=$id>');
    echo 'Добавлено!';

    mysqli_close($link);
?>