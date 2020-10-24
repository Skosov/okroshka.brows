<?php
	include 'libs/db_connect.php';
	if (!$conn->connect_error)
	{
	$result = $conn->query("SELECT * FROM `comments`");
     $arr = [];
     $inc = 0;
            while ($row = $result->fetch_assoc()) {
                # code...
                $jsonArrayObject = (array('id' => $row["id"], 'comment-text' => $row["comment-text"], 'ban_status' => $row["ban_status"]));
                $arr[$inc] = $jsonArrayObject;
                $inc++;
            }
            $json_array = json_encode($arr);
            echo $json_array;
	}
	else {
    die("Connection failed: " . $conn->connect_error);
	}


	$conn->close();
