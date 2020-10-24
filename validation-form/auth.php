<?php

	include "C:\Users\LENOVO\Downloads\openserver\domains\localhost\libs\db_connect.php";
	$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
	$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

	$pass = md5($pass);


	if (!$conn->connect_error)
	{

	$result = $conn->query("SELECT * FROM `users` where `login` = '$login' and `pass` = '$pass'");
	$user = $result->fetch_assoc();
	if ($user == NULL){
		echo "Ошибка авторизации! Такая комбинация имени и пароля не найдена";
		echo "<br><a href = '../../form.html'> Попробовать еще раз </a> ";
		exit();
		}
	setcookie('user', $user['name'], time() + 3600, "/");
	setcookie('id', $user['id'], time() + 3600, "/");
		}
	else {
    die("Connection failed: " . $conn->connect_error);
	}


	$conn->close();
	if ($user['role_id'] == 2)
	{
		setcookie('role_id', $user['role_id'], time() + 3600, "/" );
		header('Location: /admin.php');
	} else header('Location: /cabinet.php');