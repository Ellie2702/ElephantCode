<?php
    include('config.php');

    $query = 'select * from discipline';
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

    if($result){
        $rows = mysqli_num_rows($result);

        for($i = 0; $i < $rows; $i++) {
            $row = mysqli_fetch_row($result);
            echo '<option value="' . $row[0] . '">' . $row[1] . '</option>' ;
        }
    }

    mysqli_close($link);
?>