<?php
    session_start();
    include('../../config.php');
    

    $userId = $_POST['selectuser'];

    $query = mysqli_prepare($link,"delete from users where user_id = ?");
     mysqli_stmt_bind_param($query, "i", $userId);
     mysqli_stmt_execute($query) or die("Ошибка" . mysqli_error($link));
     mysqli_stmt_close($query);
 

     $_SESSION["test_id"] = mysqli_insert_id($link);
        
    header('Location: ../../removeUser.php');
    
    mysqli_close($link);
?>