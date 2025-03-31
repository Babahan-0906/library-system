<?php require_once 'pages/init.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitaphana</title>
</head>
<body>
    <?php
    
        $sql = "SELECT * FROM user WHERE user_id='1'";
        if (mysqli_num_rows (mysqli_query ($connection, $sql)) == 0)
           header ("location: pages/login/login.php");
        else
           header ("location: pages/books/books.php");

    ?>
</body>
</html>