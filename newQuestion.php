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
        <form method="POST" class="addUser" action="/script/php/addQuestion.php">
            <div class="fields">
                <label for="question">Вопрос:</label>
                <input type="text" placeholder="Вопрос"  class="answers" name="question" required>
            </div>
            
            <div class="fields">
                <label for="answer">Ответы:</label>
            </div>

            <div class="fields">
                <input type="checkbox" class="checkBoxs" name="Isanswer1">
                <input type="text" placeholder="Ответ1" class="answers" name="answer1" required>
            </div>

            <div class="fields">
                <input type="checkbox" class="checkBoxs" name="Isanswer2">
                <input type="text" placeholder="Ответ2" class="answers" name="answer2" required>
            </div>

            <div class="fields">
                <input type="checkbox" class="checkBoxs" name="Isanswer3">
                <input type="text" placeholder="Ответ3" class="answers" name="answer3" required>
            </div>

            <div class="fields">
                <input type="checkbox" class="checkBoxs" name="Isanswer4">
                <input type="text" placeholder="Ответ4" class="answers" name="answer4" required>
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