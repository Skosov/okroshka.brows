<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Личный кабинет</title>
    <link href="css/style.css" rel="stylesheet">
</head>
<?php if($_COOKIE['user'] != ''):
?>
<body onload="selectFromDB('Понедельник')">
<div class="container">
<header class="header_lk">
    <div class="username">
        <p>Добро пожаловать, <?=$_COOKIE['user']?></p>
    </div>
</header>
    <span style="margin-right: 50px">
    <form method="post" action = 'cabinet.php'>
            <div class="lists">
        <select id="days" name = "days" onchange="selectFromDB(this[this.selectedIndex].innerText)"> 
        </select>
    </span>
    <span>
        <select id="times" name="times">
        </select>
    </span>
        </div>
    <input type="submit"value="Записаться" id = 'input-sumbit'>
    </form> 
       <?php
            include "libs/db_connect.php";
            $days = $_POST['days'];
            $times =  $_POST['times'];
            $id = $_COOKIE['id'];
            echo "<div class = 'select'><p>Ваша запись: $days $times</p> </div>";
            if (!$conn->connect_error)
            {
                $conn->query("UPDATE `ap_time` set `user_id` = '$id' where `id` = (select `id` from `ap_time` INNER JOIN `days` ON `ap_time.day_id` = `days.id` and `days.name` = '$days' and `ap_time.time` = '$times')");
            }
            else {
            die("Connection failed: " . $conn->connect_error);
            }
            $conn->close();

        ?>
    

    <div class = "links">
        <a href="index.html">На главную </a>
        <a href="exit.php"> Выход </a>
    </div>
 
    <?php else:?>
        <p> Нет доступа в личный кабинет, пожалуйста, <a href = 'form.html'> авторизуйтесь </a></p>

    <?php endif;?>
</body>
</html>

<script src="js/script.js"></script>
