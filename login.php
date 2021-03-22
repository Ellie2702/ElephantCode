<?php
    session_start();
    if (isset($_SESSION['user'])) {
        header('Location: index.php');
        exit(0);
    }
    include('config.php');
?>

<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='utf-8'>
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/ico">
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <link rel="stylesheet" type="text/css" href="/css/style.css" media="screen,projection">
    <title>Добро пожаловать!</title>
    
</head>

<body>
    <header>
        <div class="banner">
            <div class="banner-logo">
                <img src="/images/logo.jpg" alt="">
            </div>
        </div>
        
    </header>
    <div class="menu">
        <div class="menuItem">
            <a href="/index.php">Главная</a>
        </div>

        <div class="menuItem">
            <a href="/teachers.php">Преподаватели</a>
        </div>

        <div class="menuItem">
            <a href="/groupCourses.php">Групповые курсы</a>
        </div>

        <div class="menuItem last-flex-item">
            <a href="/index.php">Вход</a>
        </div>

    </div>

    <main>
        <div class="div-center">
            <form method="POST" class="formLogin" action="/script/php/loginAction.php">
                <div class="fields">
                    <label for="userName">Логин:</label>
                    <input type="text" placeholder="Username" name="User_Name" required>
                </div>

                <div class="fields">
                    <label for="Password">Пароль:</label>
                    <input type="password" placeholder="Password" name="User_Pass" required>
                </div>
                <button type="submit">Войти</button>
            </form>
        </div>
    </main>
    <footer>
        2020 © ElephantLaw - слона едят по кусочкам
    </footer>
</body>

</html>