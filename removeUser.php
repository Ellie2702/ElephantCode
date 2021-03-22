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
        <form method="POST" class="addUser" action="/script/php/removeUser.php">
            <div class="fields">
                <label for="userName">Администраторы:</label>
                <select name="selectuser">
                    <?php
                        include('script/php/selectAdmins.php')
                    ?>
                </select>
            </div>
            <div class="fields">
               <button type="submit">Удалить</button> 
            </div>
            
        </form>

        <form method="POST" class="addUser" action="/script/php/removeUserT.php">
            <div class="fields">
                <label for="userName">Преподаватели:</label>
                <select name="selectuser">
                    <?php
                        include('script/php/selectTeachersrem.php')
                    ?>
                </select>
            </div>
            <div class="fields">
               <button type="submit">Удалить</button> 
            </div>
            
        </form>

        <form method="POST" class="addUser" action="/script/php/removeUser.php">
            <div class="fields">
                <label for="userName">Ученики:</label>
                <select name="selectuser">
                    <?php
                        include('script/php/selectStudents.php')
                    ?>
                </select>
            </div>
            <div class="fields">
               <button type="submit">Удалить</button>
            </div>
            
        </form>
    </main>
    <footer>
        2020 © ElephantLaw - слона едят по кусочкам
    </footer>
</body>

</html>