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
        <div class="profileConteiner">
            <div class="functionList">
                <a href="./newUser.php">Добавить пользователя</a>
                <a href="./removeUser.php">Удалить пользователя</a>
                <a href="./newCourse.php">Добавить групповой курс</a>
                <a href="./editCourse.php">Редактировать курс</a>
                <a href="./newCourse.php">Удалить курс</a>
                <a href="./newTest.php">Добавить тест</a>
                <a href="./removeTest.php">Удалить тест</a>
                <a href="./checkResults.php">Просмотр результатов</a>
            </div>
            <div class="UserPanel">
                <div class="HiUser"> 
                    Здравствуйте, <? echo   $_SESSION['first'] . ' ' .  $_SESSION['last'];?>!
                </div>

                <form method="POST" class="formChange" action="/script/php/editProfileAdmin.php">
                    <div class="fields">
                        <label for="userName">Логин:</label>
                        <input type="text" placeholder="Username" name="User_Name">
                    </div>

                    <div class="fields">
                        <label for="password">Пароль:</label>
                        <input type="password" placeholder="Password" name="User_Password">
                    </div>

                    <div class="fields">
                        <label for="first_name">Имя:</label>
                        <input type="text" placeholder="Имя" name="First_Name">
                    </div>
                    <div class="fields">
                        <label for="last_name">Фамилия:</label>
                        <input type="text" placeholder="Фамилия" name="Last_Name">
                    </div>

                    <div class="fields">
                        <label for="Email">Почта:</label>
                        <input type="text" placeholder="@mail.ru" name="email">
                    </div>
                    <button type="submit">Изменить</button>
                </form>

            </div>
        </div>
    </main>
    <footer>
        2020 © ElephantLaw - слона едят по кусочкам
    </footer>
</body>

</html>