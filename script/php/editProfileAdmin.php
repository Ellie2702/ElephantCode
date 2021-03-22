<?php
    session_start();
    include('../../config.php');
    

    $userName = $_POST['User_Name'];
    $pass = $_POST['User_Password'];
    $first = $_POST['First_Name'];
    $last = $_POST['Last_Name'];
    $userId = $_SESSION['id'];
    $mail = $_SESSION['email'];


    if($userName != '') {
        $query = mysqli_prepare($link,"update users set username = ? where user_id = ?");
        mysqli_stmt_bind_param($query, "si", $userName, $userId);
        mysqli_stmt_execute($query) or die("Ошибка" . mysqli_error($link));
        mysqli_stmt_close($query);
    }

    if($pass != '') {
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $query = mysqli_prepare($link,"update users set password = ? where user_id = ?");
        mysqli_stmt_bind_param($query, "si", $hash, $userId);
        mysqli_stmt_execute($query) or die("Ошибка" . mysqli_error($link));
        mysqli_stmt_close($query);
    }

    if($first != '') {
        $query = mysqli_prepare($link,"update users set first_name = ? where user_id = ?");
        mysqli_stmt_bind_param($query, "si", $first, $userId);
        mysqli_stmt_execute($query) or die("Ошибка" . mysqli_error($link));
        mysqli_stmt_close($query);
        $_SESSION['first'] = $first;
    }

    if($last != '') {
        $query = mysqli_prepare($link,"update users set last_name = ? where user_id = ?");
        mysqli_stmt_bind_param($query, "si", $last, $userId);
        mysqli_stmt_execute($query) or die("Ошибка" . mysqli_error($link));
        mysqli_stmt_close($query);
        $_SESSION['last'] = $last;
    }

    if($mail != '') {
        $query = mysqli_prepare($link,"update users set last_name = ? where user_id = ?");
        mysqli_stmt_bind_param($query, "si", $mail, $userId);
        mysqli_stmt_execute($query) or die("Ошибка" . mysqli_error($link));
        mysqli_stmt_close($query);
        $_SESSION['last'] = $last;
    }

        
   header('Location: ../../done.php?loc=profileAdmin.php');
    
    mysqli_close($link);
?>