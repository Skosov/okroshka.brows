<?php
include "libs/db_connect.php";




$name = filter_var(trim($_POST['feedback_name']), FILTER_SANITIZE_STRING);

$phone = filter_var(trim($_POST['feedback_number']), FILTER_SANITIZE_STRING); 


	if (mb_strlen($name) < 2 || mb_strlen($name) > 20) {
		echo "Недопустимая длина имени";
		echo "<br><a href = '../../index.html'> Попробовать еще раз </a> ";
		exit();
	}
	else if (mb_strlen($phone) != 11)
	{
		echo("Недопустимая длина номера телефона");
		echo "<br><a href = '../../index.html'> Попробовать еще раз </a> ";
		exit();
	}

if (!$conn->connect_error)
	{

	$conn->query("INSERT INTO `feedback` (`name`, `phone`) VALUES ('$name', '$phone')");
	}
	else {
    die("Connection failed: " . $conn->connect_error);
	}

$conn->close();

header('Location: /index.html');

