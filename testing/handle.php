<?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        include "index.html";
        exit(0);
    }

    $questions = $_POST['questions']['quest'];
    $answers = $_POST['questions']['ans'];
    $bools = $_POST['questions']['ansBool'];

    print_r($_POST);
    echo '<br><br>';
    echo '<br><br>';
    print_r($bools);

    echo '<br><br>';
    for ($i=0; $i < count($questions); $i++) { 
        echo 'Вопрос #' . $i . ':';
        echo $questions[$i][0]; /* !!!!!!!!!! */
        echo '<br>';
        echo '<br>';
        echo 'Ответы на него:';
        echo '<br>';
        for ($j=0; $j < count($answers[$i]); $j++) { 
            echo $answers[$i][$j];/* !!!!!!!!!! */
            if (in_array($j, $bools[$i])) { /* !!!!!!!!!! */
                echo ' (верный)';
            }
            echo '<br>';
        }
        echo '<hr>';
   }
?>