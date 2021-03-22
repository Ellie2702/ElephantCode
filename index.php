<?php
    session_start();
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
                <img src="/images/logo.png" alt="">
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
        <div class="siteDescript">
            ElephantLaw предоставляет широкий перечень услуг в сфере
            обучения праву. С нами вы можете ликвидировать пробелы, приобрести новые знания,
            подготовиться к будущей сессии. Наши программы и курсы позволят вам быть на шаг
            впереди.
            
        </div>

        <div class="title">
            Отрасли права
        </div>

        <div class="disciplines">
            
            <?php
                include('script/php/showDisciplines.php');
            ?>
        </div>
    </main>
    <footer>
        2020 © ElephantLaw - слона едят по кусочкам
    </footer>
</body>

</html>