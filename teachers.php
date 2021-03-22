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
        <div class="teachers">
            <?php
                include('script/php/allTeach.php');
            ?>

            <div class="teachCard">
                <img src="./images/teachers/1.JPG" alt="teach">

                <div class="teachCardInfo">
                    <div class="teachName">
                        Елена Вальяк
                    </div>
                    <div class="teachDesc">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempora, rerum aperiam maiores beatae sit voluptates neque culpa delectus, nisi, id repellendus illo obcaecati eius! Numquam dolorem quae quisquam aut iure!
                    </div>

                    Веду индивидуальные занятия по следующим специальностям:
                    <div class="teachDisc">
                        <div class="spec">
                            Римское право
                        </div>
                        <div class="spec">
                            Международное право
                        </div>
                        <div class="spec">
                            Римское право
                        </div>
                        <div class="spec">
                            Международное право
                        </div>
                        <div class="spec">
                            Римское право
                        </div>
                        <div class="spec">
                            Международное право
                        </div>
                    </div>

                    Почта для связи: elenaValiak23@yandex.ru
                </div>
            </div>
        </div>

    </main>
    <footer>
        2020 © ElephantLaw - слона едят по кусочкам
    </footer>
</body>

</html>