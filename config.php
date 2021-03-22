<?php
    $db_host = 'localhost';
    $db_name = 'elephant';
    $db_user = 'mysql';
    $db_pass = 'mysql';
    
    // $db_host = 'localhost';
    // $db_name = 'elephlaw_main';
    // $db_user = 'elephlaw_main';
    // $db_pass = 'Main123';

    $link = mysqli_connect($db_host, $db_user, $db_pass, $db_name) 
    or die('Произошла ошибка' . mysqli_error($link));
?>