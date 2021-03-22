<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        alert('Готово! Возвращаемся назад...');

        document.location.href = '<?php echo $_GET['loc']; ?>';
        // header('Location: /done.php?loc=/АДРЕССТРАНИЦЫ');
    </script>
</body>
</html>