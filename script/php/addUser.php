<?php
    session_start();
    include('../../config.php');


    $login = $_POST['user_name'];
    $pass = $_POST['user_pass'];
    $first = $_POST['first_name'];
    $last = $_POST['last_name'];
    $mail = $_POST['user_mail'];
    $role = (int) $_POST['user_role'];

    $pass_hash = password_hash($pass, PASSWORD_DEFAULT);


    $query = mysqli_prepare($link, "insert into users ( username, password, first_name, last_name, email, role_id)
    values ( ?,?,?,?,?, ?)");
    mysqli_stmt_bind_param($query, "sssssi", $login, $pass_hash, $first, $last, $mail, $role);
    mysqli_stmt_execute($query) or die("Ошибка" . mysqli_error($link));
    mysqli_stmt_close($query);


    if($role = 2) {
        $id = mysqli_insert_id($link);       
        $query = "INSERT INTO teachers ( user_id ) VALUES (  " . $id . ")";
        $result = mysqli_query($link, $query) or die("Ошибка" . mysqli_error($link));
    }

    if($result) {
        header('Location: ../../newUser.php');
    } 
    else die('Произошла ошибка' . mysqli_error($link));

    
     

    mysqli_close($link);
?>