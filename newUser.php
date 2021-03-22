<?php
    session_start();
    include('config.php');

    if(isset($_SESSION['role'])) {
        
    } else {
        header('Location: /index.php');
    }
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
            <?if (isset($_SESSION['user'])) {?>
                <?if ($_SESSION['role'] == 1) {?>
                    <a href="/profileAdmin.php">Профиль</a>
                <?} else if ($_SESSION['role'] == 2) {?>
                    <a href="/profileTeacher.php">Профиль</a>
                <?} else if ($_SESSION['role'] == 3) {?>
                    <a href="/student.php">Профиль</a>
                <?}?>
                
                <a href="/logout.php">Выход</a>
            <?} else {?>
                <a href="/login.php">Вход</a>
            <?}?>
        </div>
    </div>

    <main>
        <form method="POST" class="addUser" action="/script/php/addUser.php">
            <div class="fields">
                <label for="userName">Логин:</label>
                <input type="text" placeholder="Логин" name="user_name" required>
            </div>

            <div class="fields">
                <label for="password">Пароль:</label>
                <input type="password" placeholder="Пароль" name="user_pass" required>
            </div>

            <div class="fields">
                <label for="FirstName">Имя:</label>
                <input type="text" placeholder="Имя" name="first_name" required>
            </div>

            <div class="fields">
                <label for="LastName">Фамилия:</label>
                <input type="text" placeholder="Фамилия" name="last_name" required>
            </div>

            <div class="fields">
                <label for="email">Почта:</label>
                <input type="text" placeholder="e-mail" name="user_mail" required>
            </div>

            <div class="fields">
                <label for="userRole">Роль:</label>
                <select name="user_role">
                    <?php
                        include('script/php/selectRole.php');
                    ?>
                </select>
            </div>

            <div class="fields">
               <button type="submit">Добавить</button> 
               <button type="reset">Очстить</button>
            </div>
            
        </form>
    </main>
    <footer>
        2020 © ElephantLaw - слона едят по кусочкам
    </footer>
</body>

</html>