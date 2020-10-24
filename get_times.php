<?php
include "libs/db_connect.php";

$times = [];

if (!$conn->connect_error) {
    $day = $_GET['day'];
    $sql = "SELECT ap_time.time FROM ap_time INNER JOIN days ON day_id = days.id WHERE days.name = '$day' and ap_time.user_id = 0;";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result))
    {
        $times[] = $row['time'];
    }

    $json = json_encode($times, JSON_UNESCAPED_UNICODE);
    echo $json;
}
else {
    die("Connection failed: " . $conn->connect_error);
}

$conn->close();