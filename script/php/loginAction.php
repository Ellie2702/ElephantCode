<?php
    session_start();
    include('../../config.php');

    if(isset($_POST['User_Name'])) $login = $_POST['User_Name']; else die('нет логина');
    if(isset($_POST['User_Pass'])) $pass = $_POST['User_Pass']; else die('нет пароля');

    $query = mysqli_prepare($link, 'select user_id, username, users.password, first_name, last_name, email, role_id from users where username = ?');

    mysqli_stmt_bind_param($query, "s", $login);
    mysqli_stmt_execute($query);
    mysqli_stmt_bind_result($query, $id, $user_name, $hash_pass, $first, $last, $email, $role);
    mysqli_stmt_fetch($query);
    mysqli_stmt_close($query);

    if(isset($id)) {
        if(password_verify ( $pass, $hash_pass ) == 1) {
            // echo 'hello, ' . $first . ' ' . $last;
            header('Location: /index.php');
            $_SESSION['id'] = $id;
            $_SESSION['user'] = $login;
            $_SESSION['first'] = $first;
            $_SESSION['last'] = $last;
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $role;
            if($role == 2) {
                $query = mysqli_prepare($link, 'select teacher_id from teachers
                where user_id = ?');

                mysqli_stmt_bind_param($query, "i", $id);
                mysqli_stmt_execute($query);
                mysqli_stmt_bind_result($query, $Teacherid);
                mysqli_stmt_fetch($query);
                mysqli_stmt_close($query);
                $_SESSION['teacherId'] = $Teacherid;
            }
        }
    }
    else {
        header('Location: /login.php');
    } 
    // die('Произошла ошибка' . mysqli_error($link));

    mysqli_close($link);
?>