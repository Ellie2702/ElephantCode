<?php
    include('config.php');

    $query = 'select t.test_id, t.test_name, d.discipline_name
    from tests as t
    inner join discipline as d on (t.discipline_id = d.discipline_id)';
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 

    if($result){
        $rows = mysqli_num_rows($result);

        for($i = 0; $i < $rows; $i++) {
            $row = mysqli_fetch_row($result);
            echo '<option value="' . $row[0] . '">' . $row[1] . ' (' . $row[2] . ')</option>' ;
        }
    }

    mysqli_close($link);
?>