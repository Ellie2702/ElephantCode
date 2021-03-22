<?php
    include('config.php');

    $query = 'select * from roles';
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 


    mysqli_close($link);
?>