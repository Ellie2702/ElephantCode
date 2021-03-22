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
        <form method="POST" class="addUser" action="/script/php/addGroupLesson.php">
            <div class="fields">
                <label for="GroupName">Наименование:</label>
                <input type="text" placeholder="Наименование" name="group_name" required>
            </div>

            <div class="fields">
                <label for="GroupDesc">Описание</label>
            </div>

            <div class="fields">
                <textarea class="descriptField" name="group_desc" required></textarea>
            </div>

            <div class="fields">
                <label for="discipline" aria-required="true">Дисциплина:</label>
            </div>

            <div class="fields">
                <select name="discipline_name" required>
                    <?php
                        include('script/php/selectDiscipline.php');
                    ?>
                </select>
            </div>

            <div class="fields">
                <label for="teacher">Преподаватель:</label>
            </div>

            <div class="fields">
                <select  name="teacher_name[]" multiple>
                    <?php
                        include('script/php/selectTeachers.php');
                    ?>
                </select>
            </div>

            <div class="fields">
                <label for="vacant">Количество мест:</label>
                <input type="number" placeholder="10" name="vacant_count" required>
            </div>

            <div class="fields">
               <button type="submit">Добавить</button> 
               <button type="reset">Очистить</button>
            </div>
            
        </form>
    </main>
    <footer>
        2020 © ElephantLaw - слона едят по кусочкам
    </footer>
</body>

</html>