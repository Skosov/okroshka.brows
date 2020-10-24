<?php
	include "C:\Users\LENOVO\Downloads\openserver\domains\localhost\libs\db_connect.php";

	$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
	$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
	$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
	$number = filter_var(trim($_POST['number']), FILTER_SANITIZE_STRING);



	if(mb_strlen($login) < 4 || mb_strlen($login) > 20)
	{
		echo "Недопустимая длина логина";
		echo "<br><a href = '../../form.html'> Попробовать еще раз </a> ";
		exit();
	} 
	else if (mb_strlen($name) < 2 || mb_strlen($name) > 20) {
		echo "Недопустимая длина имени";
		echo "<br><a href = '../../form.html'> Попробовать еще раз </a> ";
		exit();
	}
	else if (mb_strlen($number) != 11)
	{
		echo("Недопустимая длина номера телефона");
		echo "<br><a href = '../../form.html'> Попробовать еще раз </a> ";
		exit();
	}
	else if (mb_strlen($pass) < 3 || mb_strlen($pass) > 20) {
		echo "Недопустимая длина пароля";
		echo "<br><a href = '../../form.html'> Попробовать еще раз </a> ";
		exit();
	}
	$pass = md5($pass);
	if (!$conn->connect_error)
	{
		$res = $conn->query("INSERT INTO `users` (`login`, `pass`,`number`, `name`) VALUES ('$login', '$pass', '$number' , '$name')");
		if ($res === false )
		{
			echo "Ошибка регистрации!";
			$result = $conn->query("SELECT `login` FROM `users` where `login` = '$login'");
			$user = $result->fetch_assoc();
			if ($login = $user['login'])
			{
				echo "<br> Логин ".$user['login']." занят";
			}
			echo "<br><a href = '../../form.html'> Попробовать еще раз </a> ";
			exit();
		}
	}
	else {
    die("Connection failed: " . $conn->connect_error);
	}

$conn->close();

header('Location: /form.html');
