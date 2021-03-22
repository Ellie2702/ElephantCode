<?php
    session_start();
    include('../../config.php');
    

    $testName = $_POST['test_name'];
    $disciplineId = (int)$_POST['Discipline'];
    $userId = $_SESSION['id'];

    $query = mysqli_prepare($link,"INSERT INTO tests (test_name, user_id, discipline_id) VALUES (?,?,?)");
     mysqli_stmt_bind_param($query, "sii", $testName, $userId, $disciplineId);
     mysqli_stmt_execute($query) or die("Ошибка" . mysqli_error($link));
     mysqli_stmt_close($query);
 

     $_SESSION["test_id"] = mysqli_insert_id($link);
        
    header('Location: ../../newQuestion.php');
    
    mysqli_close($link);
?>