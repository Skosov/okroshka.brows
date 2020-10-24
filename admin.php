<!DOCTYPE html>
<html lang="rus">
<head>
	<meta charset="UTF-8">
    <link href="css/style.css" rel="stylesheet">
	<title>Панель администратора</title>
</head>
<?php
if ($_COOKIE['role_id'] == 2):
?>
<body>
	<div class="container">
	<header class="header_lk">
    <div class="username">
        <p>Добро пожаловать, <?=$_COOKIE['user']?></p>
    </div>
	</header>
	<div class="admin-container">
	<div id="users-list">
		<div class="user-info">
		<div> ID Пользователя </div> 
		<div> Логин пользователя</div>
		<div> Статус блокировки</div> 
		</div>
	</div>
	<div class="admin-panel">
	<form action="admin.php" method="post">
		<input type="text" placeholder="БАН" name = 'ban'>
		<input type="submit">
	</form>
	<form action="admin.php" method = 'post'>
		<input type="text" placeholder="РАЗБАН" name= 'unban'>
		<input type="submit">
	</form>
	</div>
	</div>
	<?php
	$ban = $_POST['ban'];
	$unban = $_POST['unban'];
	include "libs/db_connect.php";


	if (!$conn->connect_error)
	{
	$conn->query("UPDATE `users` set `ban_status` = '1' where `id` = $ban");
	$conn->query("UPDATE `users` set `ban_status` = '0' where `id` = $unban");
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
	</div>
	<?php else:?>
        <p> Нет доступа в личный кабинет, пожалуйста, <a href = 'form.html'> авторизуйтесь </a></p>
    <?php endif;?>
</body>
</html>


<script src="js/get_users.js"></script>